<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arrival;
use App\Models\Take;
use App\Models\Tour;
use App\Models\Image;
use Carbon\Carbon;
use DB;

class FrontController extends Controller
{   
    public function index()
    {   
        $today = Carbon::today();
        $arrivals = Arrival::All();
        $futureArr = Arrival::whereDate('begin','>', $today)->first();
        if($arrivals->isEmpty() || $futureArr==null){
            return redirect('/welcome');
        }
        else{
            $closests=[];
            $tours = Tour::All(); 
            foreach($tours as $tour){
                $arr = new Arrival();
                $closests[] = $arr->closest($tour);
            }
            $min = collect($closests)->min('begin');
            $closestArrival = Arrival::whereDate('begin', $min)->first();
            $tourId = $closestArrival->tour->id;
            
            return redirect('/'.$tourId);
        }
    }

    public function mainpage($id, $aid=null)
    {   
        // dd($aid);
        $tours = Tour::All();
        $tour = Tour::find($id);
        $arr = new Arrival();
        if($aid==null){
            $closestArrival = $arr->closest($tour);
        }else{
            $closestArrival = Arrival::find($aid);   
        }
        // dd($closestArrival);
        $groupTakes = $closestArrival->takes->whereNotNull('value')->groupBy('item_type');
        return view('main')
            ->with('tour', $tour)
            ->with('tours', $tours)
            ->with('groupTakes', $groupTakes)
            ->with('closestArrival', $closestArrival);
        
    }

}
