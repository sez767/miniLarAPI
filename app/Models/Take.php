<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Arrival;

class Take extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'item_type',
        'value',
        'arrival_id',
    ];

    public function arrivals(){

        return $this->belongsTo('App\Models\Arrival');

    }
}
