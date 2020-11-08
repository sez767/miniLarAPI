<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Arrival\BulkDestroyArrival;
use App\Http\Requests\Admin\Arrival\DestroyArrival;
use App\Http\Requests\Admin\Arrival\IndexArrival;
use App\Http\Requests\Admin\Arrival\StoreArrival;
use App\Http\Requests\Admin\Arrival\UpdateArrival;
use App\Models\Arrival;
use App\Models\Take;
use App\Models\Tour;
use App\Models\Image;
use Illuminate\Filesystem\Filesystem;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ArrivalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexArrival $request
     * @return array|Factory|View
     */
    public function index(IndexArrival $request)
    {
        $tours=Tour::All();
        
        // create and AdminListing instance for a specific model and
                $data = AdminListing::create(Arrival::class)->processRequestAndGet(
                    // pass the request with params
                    $request,
                    
                    // set columns to query
                    ['id', 'name', 'begin', 'end','tour_id', 'description'],

                    // set columns to searchIn
                    ['id', 'name', 'begin', 'end','tour_id', 'description']
                );
                
        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }
        
        return view('admin.arrival.index', ['data' => $data])
                    ->with('tours', $tours);
                
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $tours=Tour::All();
        $this->authorize('admin.arrival.create');
        return view('admin.arrival.create')
            ->with('tours', $tours);
                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArrival $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreArrival $request)
    {
       $validatedData = $request->validate([
        'name' => ['nullable', 'string'],
        'description' => ['nullable', 'string'],
        'begin' => ['nullable','date', 'after:today'],
        'end'=>['nullable', 'date', 'after_or_equal:begin'],
        ]);
       
        $arrival = Arrival::create($request->all());
        
        
        foreach ($request->items as $item) { 
            $take = new Take();
            // dd($request->all());
           
            
            $take->arrival_id = $arrival->id;
            $take->item_type =$item['type'];
            $take->value =$item['value'];
            $take->save();
            
        }
        if ($request->has('hideimage')) {
            $count=1;
            foreach ($request->hideimage as $image) {
                $file_data = $image;
                $file_name = 'main_image_'.$count .'.png';
                @list($type, $file_data) = explode(';', $file_data);
                @list(, $file_data) = explode(',', $file_data);
                
                if($file_data!=""){
                  $file = Storage::disk('public')->put($arrival->id.'/'.$file_name,base64_decode($file_data));
                  $count++;
                }    
                $photo = Image::create([
                    'arrival_id' => $arrival->id,
                    'filename' => $file_name,
                    'filedata' => $file_data
                ]);
                // dd($photo);
            }
        };
        
       
        
        
// dd($request->input('documents'))
        if ($request->ajax()) {
            return ['redirect' => url('admin/arrivals'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }
        
         return redirect('admin/arrivals');
    }

    /**
     * Display the specified resource.
     *
     * @param Arrival $arrival
     * @throws AuthorizationException
     * @return void
     */
    public function show(Arrival $arrival)
    {
        $this->authorize('admin.arrival.show', $arrival);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Arrival $arrival
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Arrival $arrival)
    {
        $this->authorize('admin.arrival.edit', $arrival);

        $tours=Tour::All();
        return view('admin.arrival.edit', [
            'arrival' => $arrival,
            'tours'=> $tours,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArrival $request
     * @param Arrival $arrival
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateArrival $request, Arrival $arrival)
    {
        $validatedData = $request->validate([
            'name' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'begin' => ['nullable','date', 'after:today'],
            'end'=>['nullable', 'date', 'after_or_equal:begin'],
            'photos.*'=>['mimes:jpg,jpeg,png'],
            ]);
        // dd($request->all());
        $sanitized = $request->getSanitized();
        $arrival->update($sanitized);
        $arrival->takes()->delete();
        $arrival->images()->delete();
        $oldfile = new Filesystem;
        $oldfile->cleanDirectory('storage/'.$arrival->id);
        $oldfile->cleanDirectory('storage/'.$arrival->id.'_photos');

        foreach ($request->items as $item) { 
            $take = new Take();
            $take->arrival_id = $arrival->id;
            $take->item_type =$item['type'];
            $take->value =$item['value'];
            $take->save();
        }    
        
        if ($request->has('hideimage')) {
            $count=1;
            foreach ($request->hideimage as $image) {
                $file_data = $image;
                $file_name = 'main_image_'.$count .'.png';
                @list($type, $file_data) = explode(';', $file_data);
                @list(, $file_data) = explode(',', $file_data);
                if($file_data!=""){
                    $file = Storage::disk('public')->put($arrival->id.'/'.$file_name,base64_decode($file_data));
                    $count++;
                }    
                Image::create([
                    'arrival_id' => $arrival->id,
                    'filename' => $file_name,
                    'filedata' => $file_data
                ]);
            }   
        }
      
        if ($request->has('hidephoto')){
            foreach ($request->hidephoto as $image) {
                $file_data = $image;
                $file_name = 'image_'.uniqid() .'.png';
                @list($type, $file_data) = explode(';', $file_data);
                @list(, $file_data) = explode(',', $file_data);

                if($file_data!=""){
                    $file = Storage::disk('public')->put($arrival->id.'_photos/'.$file_name,base64_decode($file_data));
                    
                }    
                Image::create([
                    'arrival_id' => $arrival->id,
                    'filename' => $file_name,
                    'filedata' => $file_data
                ]);
            }   
        
        }
          
            return redirect('admin/arrivals');
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyArrival $request
     * @param Arrival $arrival
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyArrival $request, Arrival $arrival)
    {   
        //нада провэрку на екзіст!!!!!!!!!!!!!!

        $oldfile = new Filesystem;
        $oldfile->cleanDirectory('storage/'.$arrival->id);
        $oldfile->cleanDirectory('storage/'.$arrival->id.'_photos');
        $arrival->images()->delete();
        $arrival->takes()->delete();
        $arrival->delete();
        
        
       
        

        

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyArrival $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyArrival $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Arrival::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
