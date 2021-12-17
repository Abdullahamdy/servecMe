<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationScreen extends Model
{
    protected $fillable = ['secreen_name'];

    public function image()
    {
        return $this->morphMany('App\Models\Image', 'imagable');
    }
}
