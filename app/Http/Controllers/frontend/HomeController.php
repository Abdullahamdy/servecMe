<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\ApplicationScreen;
use App\Models\Category;
use App\Models\Client;
use App\Models\Product;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends Controller
{

    public function index(Request $request){

        $screens = ApplicationScreen::all();
return view('frontend.index',compact('screens'));

    }

public function subscripe(Request $request){
        $client = new Client();
        $client->email= $request->email;
        $client->save();
        return back();
}
}
