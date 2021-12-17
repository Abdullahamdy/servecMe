<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $guarded = [];


    public function image()
    {
        return $this->morphMany('App\Models\Image', 'imagable');
    }

}
