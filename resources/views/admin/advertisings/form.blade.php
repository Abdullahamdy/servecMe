
@if($model->id)

<div class="row">
    <div class="col-md-4">

        @foreach($model->get() as $imag)
            @foreach($imag->image as $img)
 <img src="{{asset('Accessories/advertising/'.$img->filename)}}" class="" alt="jfafahfa" style="width:100%">
 <button
 {{-- @dd($img->id) --}}

 id="{{$img->id}}"
 data-token="{{ csrf_token() }}"
 data-route="{{url('admin/edit-advertisingAttachment/'.$img->id)}}"
 type="button"
 class="destroy btn btn-danger btn-xs">
<i class="fa fa-trash-o"></i>
</button>
 <br>
 <br>
 <br>
@endforeach
        @endforeach




</div>
</div>

@endif
{!! \App\MyHelper\Field::text('tittle' , 'الاسم ' ) !!}
{!! \App\MyHelper\Field::text('message' , 'النص ' ) !!}

{!! \App\MyHelper\Field::fileWithPreview('image' , 'الصور' ,true) !!}


@push('scripts')


@endpush

