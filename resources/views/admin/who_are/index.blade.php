@extends('admin.layouts.main',[
								'page_header'		=> 'من نحن',
								'page_description'	=> 'عرض ',
								'link' => url('admin/who-are')
								])
@section('content')

    <div class="ibox box-primary">
        <div class="ibox-title">
            <div class="pull-right">


                <a href="{{url('admin/who-are/create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>  أضافة بيانات عنكم
                </a>
            </div>
            <div class="clearfix"></div>
        </div>



{{--        --}}
        <div class="row">
            {!! Form::open([
                'method' => 'GET'
            ]) !!}
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    {!! Form::text('name',old('name'),[
                        'class' => 'form-control',
                        'placeholder' => 'الأسم'
                    ]) !!}
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    <button class="btn btn-primary btn-block" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="ibox-content">
            @if(!empty($records) && count($records)>0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>

                        <th class="text-center">من نحن</th>
                        <th class="text-center">تعديل</th>
                        <th class="text-center">المرفقات</th>
                        <th class="text-center">حذف</th>
                        </thead>
                        <tbody>
                        @foreach($records as $record)

                                <tr id="removable{{$record->id}}">
                                <td>{{optional($record)->message}}</td>


                                    <td class="text-center"><a href="{{url('admin/who-are/' . $record->id .'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a></td>
                                 <td class="text-center"><a href="{{url('admin/show-who-are/' . $record->id)}}" class="btn btn-xs btn-warning"><i class="fas fa-eye"></i>
                                     </a>
                                 </td>
                                 <td class="text-center">
                                    <button
                                    id="{{$record->id}}"
                                    data-token="{{ csrf_token() }}"
                                    data-route="{{url('admin/who-are/'.$record->id)}}"
                                    type="button"
                                    class="destroy btn btn-danger btn-xs">
                                <i class="fa fa-trash-o"></i>
                            </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $records->appends(request()->all())->render() !!}
            @else
                <div>
                    <h3 class="text-info" style="text-align: center">No Data For Show</h3>
                </div>
            @endif


        </div>
    </div>
@stop

@section('script')
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'showImageNumberLabel':false,

        })
    </script>
@stop

@section('script')
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'showImageNumberLabel':false,

        })
    </script>
@stop
