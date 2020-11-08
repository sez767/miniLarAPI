<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Take;
use App\Models\Image;
use Carbon\Carbon;

class Arrival extends Model
{
    protected $table = 'arrival';

    protected $fillable = [
        'name',
        'description',
        'begin',
        'end',
        'tour_id',
    
    ];
    
    
    protected $dates = [
        'begin',
        'end',
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/arrivals/'.$this->getKey());
    }
    public function takes()
    {
        return $this->hasMany('App\Models\Take');
    }
    public function tour(){

        return $this->belongsTo('App\Models\Tour', 'tour_id');
    }
    
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
    public function closest($tour)
    {
        $closestArrival = new Arrival();
        $today = Carbon::today();
        $min = 9999;
        foreach ($tour->arrivals as $arrival) {
            if($today < $arrival->begin && $arrival->begin->diffInDays($today) < $min){
                $min = $arrival->begin->diffInDays($today);
                $closestArrival = $arrival;
            }
        }
        return $closestArrival;
    }
}
