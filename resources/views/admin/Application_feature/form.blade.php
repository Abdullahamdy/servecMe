@php

$images = $images->where('imagable_id',$model->id)->get();

@endphp
@if($model->id)

<div class="row">
    <div class="col-md-4">

    @foreach($images as $img)
 <img src="{{asset('Accessories/applicationFeature/'.$img->filename)}}" class="" alt="jfafahfa" style="width:100%">
 <button
 {{-- @dd($img->id) --}}

 id="{{$img->id}}"
 data-token="{{ csrf_token() }}"
 data-route="{{url('admin/edit-applicationFeature/'.$img->id)}}"
 type="button"
 class="destroy btn btn-danger btn-xs">
<i class="fa fa-trash-o"></i>
</button>
 <br>
 <br>
 <br>
@endforeach





</div>
</div>

@endif
{!! \App\MyHelper\Field::text('tittle' , 'العنوان ' ) !!}
{!! \App\MyHelper\Field::text('message' , 'النص ' ) !!}

{!! \App\MyHelper\Field::fileWithPreview('image' , 'الصور' ,true) !!}


@push('scripts')


@endpush

