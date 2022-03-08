@extends('layouts.publicsite')
@section('pagecontent')
@php
$pic = str_replace('public/', '', $article->item_photo);
@endphp

<script>
    function changePrice() {
        let price = document.getElementById('item_price');
        alert(price.value());
    }
</script>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-7">
            <img src="../{{ 'storage/'.$pic }}" class="img-fluid" height="400" width="500" style="border-radius: 20px;">
        </div>
        <div class="col">
            <h1 style="font-size: 40px; font-weight:bold; color: #2c6945">{{ $article->item_name }}</h1>
            <div class="form-group col-lg-4 col-md-3 col-sm-12">
                <br>
                <input type="number" class="form-control" value="1">
                <br>
                <span id="item_price" style="font-weight: bold; font-size: 20px">#{{ $article->item_price }}</span>
                <br>
                <br>
                <button class="btn btn-lg col-lg-12" style="background-color: #f0735d; color:white">Buy Now</button>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
                {{ $article->item_description }}
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
<div class="row mb-5">
<h2>You may also like:</h2>
</div>

            @foreach($related_items as $related)
            <div class="col-lg-3">
                @php
                $pic = str_replace('public/', '', $related->item_photo);
                @endphp
                <img src="../{{ 'storage/'.$pic }}" alt="{{ $related->item_name }}" class="img-fluid rounded">
                <br>
                <strong class="mx-auto fs-5 text">{{ $related->item_name }}</strong><br>
                <span class="text-danger fs-6 text">#{{ number_format($related->item_price) }}
                </span>
                <a href='{{ "../menu/$related->slug" }}'>
                    <button style="background-color: #f0735d; color:yellow;" class="float-end btn btn-sm pull-end">Order now!</button>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endsection