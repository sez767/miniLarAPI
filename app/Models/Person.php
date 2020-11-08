<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'phone_number',
        'gmail',
        'new',
        'tour_name',
        'arrival_name'
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

   
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/people/'.$this->getKey());
    }
   
}
