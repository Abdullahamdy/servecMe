{{--
@foreach ($images as $image)
@foreach ($details as $detail)

<img src="{{asset('Accessories/products/'.$detail->name.'/' . $image->filename)}}" class="" alt="">

@endforeach
@endforeach --}}




@extends('admin.layouts.main',[
								'page_header'		=> 'المرفقات',
								'page_description'	=> 'عرض ',
								'link' => url('admin/advertising')
								])
@section('content')

    <div class="ibox box-primary">
      
       <br>
       <br>

         
        <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>

                        <th class="text-center">الصور</th>

                        <th class="text-center">حذف</th>
                        </thead>
                        <tbody>





                                      
                                        @foreach ($details as $record)
                                        @foreach($record->image as $img)
                                        {{-- @dd($img->filename) --}}
                                        




                                            <tr id="removable{{$record->id}}">
                                                <td>


                                        <div class="row">
                                            <div class="col-md-3" style="width:30%;display:inline-block ; justify-content:space-around"  >
                                                <img src="{{asset('Accessories/advertising/'.$img->filename)}}" class="" alt="" style="width:100%">
                                            </div>
                                        </div>

                                    </td>
                                    {{-- <td>
                                        {{$detail->description}}
                                    </td> --}}

                                 <td class="text-center">
                                    
                                    <button

                                    id="{{$record->id}}"
                                    data-token="{{ csrf_token() }}"
                                    data-route="{{url('admin/delete-advertisingAttachment/'.$img->filename)}}"
                                    type="button"
                                    class="destroy btn btn-danger btn-xs">
                                <i class="fa fa-trash-o"></i>
                            </button>
                                </td>
                            </tr>
                        @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- {!! $images->appends(request()->all())->render() !!} --}}



        </div>
    </div>
@stop

@section('script')

@stop


