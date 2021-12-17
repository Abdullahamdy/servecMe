<?php

namespace App\Models;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Client extends Authenticatable
{
    use  Notifiable;
    use Favoriteability;
    protected $guarded = [];
    protected $hidden = [
        'password','pivot'
    ];
    public function Products(){
        return $this->belongsToMany('App\Models\Product','client_product','client_id','product_id')->withPivot('is_favourite','status','total_price');
    }

    public function Trader(){
        return $this->belongsTo('App\Models\TraderType','trader_id');
    }
}
