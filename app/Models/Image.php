<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   
    protected $fillable = [
        'filename',
        'arrival_id',
        'filedata'
    ];
    public function arrival(){

        return $this->belongsTo('App\Models\Arrival');

    }

}
