@extends('layouts.publicsite')
@section('pagecontent')
@php
$bg_pic = str_replace('public/', '', $category->cover_image);
@endphp
<div style="background-color: #e43537;">
    <div class="container" style="background-image: url('storage/{{ $bg_pic }}'); height: 200px; padding-top:50px; background-color: #e43537">
        <div class="row">
            <h1 style="color: #fccb2c; font-weight: bold; font-size: 50px">{{ $category->cat_name }}</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($category_items as $item)
        @php
        $pic = str_replace('public/', '', $item->item_photo);
        @endphp
        <div class="col-lg-3 border-radius-5 mt-5">
            <img src="{{ url('storage/'.$pic)}}" class="img-fluid fit-image" style="border-radius: 10px;">
            <br>
            <strong class="mx-auto fs-5 text">{{ $item->item_name }}</strong><br>
            <span class="text-danger fs-6 text">#{{ number_format($item->item_price) }}
            </span>
            <a href='{{ "../menu/$item->slug" }}'>
                <button style="background-color: #f0735d; color:white;" class="float-end btn btn-sm pull-end">Order now!</button>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection