<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\TraderType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class clientloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.authClient.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFormAccount()
    {
        $trader_type = TraderType::all();
        return view('frontend.authClient.register',compact('trader_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

    }
    public function register(Request $request)
    {
        $record = new Client();

        $validation = $this->validate($request,[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'trader_id'=>'required',
            'email'=>'required|unique:clients',
            'password'=>'required|string',

        ]);

        if($validation){

            $record->create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'trader_id'=>$request->trader_id,
                'password'=>Hash::make($request->password),
                'is_active'=>1,
            ]);
            
            return view('frontend.authClient.login');
        }

    }

    public function login(Request $request){

        $validate =  $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'

        ]);

        if (Auth::guard('client')->attempt($validate)) {


           return redirect()->route('main');


        }else{
            return redirect()->back();
        }

    }
    public function logout () {
        //logout client
        auth('client')->logout();
        // redirect to homepage
        return redirect('/');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
