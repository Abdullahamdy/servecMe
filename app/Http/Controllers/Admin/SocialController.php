<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
class SocialController extends Controller
{



    protected $model ;
    protected $viewsDomain = 'admin/socialMedia.';
    protected $url = 'admin/social-media';
    public function __construct()
    {
        $this->model = new SocialMedia();

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
        return $this->view('create',compact('model'));
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

            'facebook'=>'required',
            'snap_chat'=>'required',
            'inesta'=>'required',
            'twitter'=>'required',
            'app_store'=>'required',
            'google_play'=>'required',




        ];

    $error_sms =
        [

            'facebook.required' => 'الرجاء ادخال حسابك علي فيسبوك ',
            'snap_chat.required' => 'الرجاء ادخال رقمك علي سناب شات ',
            'app_store.required' => 'الرجاء ادخال حسابك علي متجر التطبيقات ',
            'google_play.required' => 'الرجاء ادخال حسابك علي جوجل بلاي ',
            'inesta.required' => 'الرجاء ادخال حسابك علي انستجرام  ',
            'twitter.required' => 'الرجاء ادخال حسابك علي تويتر  ',

        ];

    $data = validator()->make($request->all(), $rules, $error_sms);

    if ($data->fails()) {
        return back()->withInput()->withErrors($data->errors());
    }

    $record = $this->model->create($request->all());
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
        return $this->view('edit',compact('model'));
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

                'facebook'=>'required',
                'snap_chat'=>'required',
                'inesta'=>'required',
                'twitter'=>'required',
                'app_store'=>'required',
                'google_play'=>'required',




            ];

        $error_sms =
            [

                'facebook.required' => 'الرجاء ادخال حسابك علي فيسبوك ',
                'snap_chat.required' => 'الرجاء ادخال رقمك علي سناب شات ',
                'app_store.required' => 'الرجاء ادخال حسابك علي متجر التطبيقات ',
                'google_play.required' => 'الرجاء ادخال حسابك علي جوجل بلاي ',
                'inesta.required' => 'الرجاء ادخال حسابك علي انستجرام  ',
                'twitter.required' => 'الرجاء ادخال حسابك علي تويتر  ',

            ];



    $data = validator()->make($request->all(), $rules, $error_sms);

    if ($data->fails()) {
        return back()->withInput()->withErrors($data->errors());
    }

    $record = $this->model->findOrFail($id);

    $record->update($request->all());

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
      //  Log::createLog($record, auth()->user(), 'عملية حذف', 'حذف اهتمام #' . $record->name);
        return Response::json($data, 200);


    }
}
