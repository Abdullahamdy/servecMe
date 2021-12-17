<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Cart;
use ChristianKuri\LaravelFavorite\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function showProduct($id){
if(auth()->user()->trader_id==2){
    $products = Product::where('category_id',$id)->where('trader_id',2)->get();
    $cat = Category::where('id',$id)->first();
     return view('frontend.product',compact('products','cat'));

}elseif(auth()->user()->trader_id==1){
    $products = Product::where('category_id',$id)->where('trader_id',1)->get();
    $cat = Category::where('id',$id)->first();
     return view('frontend.product',compact('products','cat'));

}


    }

    public function addcart($id){
        $product = Product::where('id',$id)->first();
        foreach($product->image as $img){

            }


        // dd($product->image);

        $cartADD = Cart::add(['id' =>$product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->total_price, 'options' => ['user_id'=>auth()->user()->id,'company'=>$product->company_name,'category'=>$product->categories->name,'img'=>$img->filename]]);
       return redirect()->back();
    }
    public function showcart(){

      $carts =   Cart::content();
    //   foreach ($carts as $cart) {
    //     $user_id = $cart->options->user_id;
    //       if ($user_id == auth()->user()->id) {
    //         $cart=   Cart::content();
    //       }
    //   }
   return view('frontend.shoppingcart',compact('carts'));


}


    public function removeCart($id){

         $carts =   Cart::content();
         foreach ($carts as $cart) {
            if ($cart->options->user_id == auth()->user()->id) {
                Cart::remove($id);
                return back();

            }
        }

    }

public function updateCart(Request $request ,$id){
   Cart::update($id,$request->quantity);
   session()->flash('success_message','Quantity it was updated successfully');
   return response()->json(['success'=>true]);

}


public function favourite($id){

   $product =  Product::where('id',$id)->first();
//    $fa = $product->addFavorite();
$user=auth()->user();
 $user->toggleFavorite($product);

return back();



}

public function showFavourite(){

    $user = Auth::user();
$userFavourite = $user->favorite(Product::class);
return view('frontend.favourite',compact('userFavourite'));

}


public function search(Request $request) {
 if($request->has('q')){
     $q = $request->q;
     $result  = Product::where('name','like','%'.$q.'%')->get();

     return response()->json(['data'=>$result]);
 }

}

public function ProductDetails($id){
    $products = Product::where('id',$id)->get();
    $categories = Category::all();
    return view('frontend.product_details',compact('products','categories'));

}

public function store(Request $request)
{  
   $rating = new Rating();
    $rating->product_id  = $request->prod;
    $rating->rating  = $request->rating;
    $rating->user_id  = $request->user;
    $rating->comment  = $request->message;
    $rating->status  = 1;
    $rating->save();

    return response()->json(['success'=>'Successfully']);
}





}

