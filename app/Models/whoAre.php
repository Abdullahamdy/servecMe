<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class whoAre extends Model
{

    protected $fillable = ['message'];
    public function image()
    {
        return $this->morphMany('App\Models\Image', 'imagable');
    }
}
