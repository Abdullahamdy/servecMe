<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationFeature extends Model
{
    protected $fillable = ['message','tittle'];


    public function image()
    {
        return $this->morphMany('App\Models\Image', 'imagable');
    }
}
