<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\client_product;
use App\Models\Image;
use App\Models\Product;
use App\Models\TraderType;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class ProductController extends Controller
{



    protected $model ;
    protected $category ;
    protected $trader ;
    protected $image ;
    protected $viewsDomain = 'admin/products.';
    protected $url = 'admin/product';
    public function __construct()
    {
        $this->model = new Product();
        $this->category = new Category();
        $this->trader = new TraderType();
        $this->image = new Image();


    }
    public function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $records = $this->model->where(function ($q) use ($request) {
            if ($request->id) {
                $q->where('id', $request->id);
            }
            if ($request->name) {
                $q->where(function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->name . '%');
                });
            }

        })->paginate();
        return $this->view('index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->model;
        $category = $this->category;
        $trader = $this->trader;
        $image= $this->image;
        return $this->view('create',compact('model','category','trader','image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules =
        [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'company_name' => 'required',
            'image'=>'array',



        ];

    $error_sms =
        [
            'name.required' => 'الرجاء ادخال الاسم ',
            'price.required' => 'الرجاء ادخال السعر ',
            'category_id.required'=>'الرجاء ادخال القسم التابع',
            'company_name.required'=>'الرجاء ادخال اسم الشركه'

        ];

    $data = validator()->make($request->all(), $rules, $error_sms);

    if ($data->fails()) {
        return back()->withInput()->withErrors($data->errors());
    }

    // $record = $this->model->create($request->except('image'));
  $record = Product::create([
    'name'=>$request->name,
    'company_name'=>$request->company_name,
       'price'=>$request->price,
        'category_id'=>$request->category_id,
        'discount'=>$request->discount,
         'description'=>$request->description ,
        'trader_id'=>$request->trader_id,
         'total_price'=>$request->price-$request->discount,
    ]);
    if ($request->hasfile('image')) {


        $files= $request->file('image');
        foreach($files as $file){
            $name = $file->getClientOriginalName();
            $name = Str::random(40) . '.' . pathinfo($name, PATHINFO_EXTENSION); 

            $newname =  $name ;

            $new = $file->storeAs('Accessories/products/', $name, 'upload_attachments');



            $images= new Image();
            $images->filename = $name;
            $record->image()->save($images);


    }
}

    session()->flash('success', 'تمت الاضافة بنجاح');
    return redirect($this->url);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->model->findOrFail($id);
        $category = $this->category;
        $trader = $this->trader;
        $image= $this->image;
        return $this->view('edit',compact('model','category','trader','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules =
        [
            'name' => 'required',
            'price' => 'required',
            'image'=>'array',


        ];

    $error_sms =
        [
            'name.required' => 'الرجاء ادخال الاسم ',
            'price.required' => 'الرجاء ادخال السعر ',

        ];


    $data = validator()->make($request->all(), $rules, $error_sms);

    if ($data->fails()) {
        return back()->withInput()->withErrors($data->errors());
    }

    $record = $this->model->findOrFail($id);
    $record ->update([
        'name'=>$request->name,
        'company_name'=>$request->company_name,
           'price'=>$request->price,
            'category_id'=>$request->category_id,
            'discount'=>$request->discount,
             'description'=>$request->description ,
            'trader_id'=>$request->trader_id,
             'total_price'=>$request->price-$request->discount,
        ]);

    $record->update($request->except('image'));
    if ($request->hasfile('image')) {

        $files= $request->file('image');
        foreach($files as $file){

  
            $name = $file->getClientOriginalName();
            $name = Str::random(40) . '.' . pathinfo($name, PATHINFO_EXTENSION); 

            
             $file->storeAs('Accessories/products/', $name, 'upload_attachments');



            $images= new Image();
            $images->filename = $name;
            $record->image()->save($images);




    }
    // Log::createLog($record, auth()->user(), 'عملية تعديل', 'تعديل اهتمام #' . $record->id);

    }
    // Log::createLog($record, auth()->user(), 'عملية تعديل', 'تعديل اهتمام #' . $record->id);
    session()->flash('success', 'تمت تحديث بنجاح');
    return redirect($this->url);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = $this->model->findOrFail($id);

        $record->delete();

        $data = [
            'status' => 1,
            'message' => 'تم الحذف بنجاح',
            'id' => $id
        ];
      $images =   Image::where('imagable_id',$record->id)->get();
     foreach($images as $image){



        File::delete(public_path('Accessories/products/'.$image->filename));
     }


     $images =   Image::where('imagable_id',$record->id)->delete();
        return Response::json($data, 200);


    }


    public function getAttachment($id){
      $images =   Image::where('imagable_id',$id)->get();
      $details = Product::where('id',$id)->get();
      return $this->view('show',compact('images','details'));


    }


    public function deleteAttachment($filename){
        // dd($filename);
        $image = Image::where('filename',$filename)->first();

        $image->delete();
        $data = [
            'status' => 1,
            'message' => 'تم الحذف بنجاح',
            'id' => $filename
        ];
        File::delete(public_path('Accessories/products/'.$filename));
        return Response::json($data, 200);



    }

    public function shoppingBasket(){
        $records = Product::whereHas('Clients',function($q){
            $q->where('client_product.status','binding');
        })->get();

        // dd($records[0]->Clients[0]);

        return $this->view('shopping',compact('records'));


}


public function shoppingaccept(){
    $records = Product::whereHas('Clients',function($q){
        $q->where('client_product.status','accept');

    })->get();


    return $this->view('shopping',compact('records'));


}
public function shoppingRefuse(){
    $records = Product::whereHas('Clients',function($q){
        $q->where('client_product.status','refuse');

    })->get();


    return $this->view('shopping',compact('records'));


}
public function deleteBasket($id){
    $record = Product::find($id);
    $record->Clients()->detach();



    $data = [
        'status' => 1,
        'message' => 'تم الحذف بنجاح',
        'id' => $id
    ];

    return Response::json($data, 200);



}
public function editAttachment($id){
   $image = Image::where('id',$id)->first();
   $data = [
       'status' => 1,
       'message' => 'تم الحذف بنجاح',
       'id' => $id
   ];
   File::delete(public_path('Accessories/products/'.$image->filename));
   $image->delete();
   return Response::json($data, 200);




}

}




