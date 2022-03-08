@extends('layouts.publicsite')
@section('pagecontent')

<div class="container">
    <div class="row">
        <div class="col">
            <img src="{{ asset('storage/staticfiles/egusifufu.png') }}" class="img-fluid" height="500" style="margin-top:100px">
        </div>
        <div class="col">
            <h1 style="font-family: 'Playfair Display', serif; padding-top: 200px; font-size: 70px">Enjoy Our Delicious Meals</h1>
            <p>
                Let's take the stress of preparing meals off your shoulders. Focus on other stuff, while we work hard
                to prepare delicious meals for you. And we deliver to the comfort of your home, your office, or anywhere else.
            </p>
            <!-- <button class="btn" style="background-color: #f0735d; color:white; margin-top:50px; padding:10px">Explore Now!</button> -->
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <ul>
                @foreach($categories as $category)
                @php
                $pic = str_replace('public/', '', $category->thumbnail);
                @endphp
                <li style="margin-top:50px">
                    <a href="category/{{ $category->slug }}" style="text-decoration: none">
                        <img src="{{ 'storage/'.$pic }}" alt="{{ $category->cat_name }}" height="50" width="50" style="display: inline-block; border-radius: 10px;">
                        <span class="menu-category"> {{ $category->cat_name }}</span>

                    </a>
                </li>
                <hr>
                @endforeach
            </ul>
        </div>

        <div class="col-lg-8">
            <div class="row">
                @foreach($featuredmenu as $menu)
                @php
                $pic = str_replace('public/', '', $menu->item_photo);
                @endphp
                <div class="col-lg-5 border-radius-5 mt-5">
                    <img src="{{ 'storage/'.$pic }}" class="img-fluid" style="border-radius: 
                        10px;">
                    <br>
                    <strong class="mx-auto fs-5 text">{{ $menu->item_name }}</strong><br>
                    <span class="text-danger fs-6 text">#{{ number_format($menu->item_price) }}
                    </span>
                    <a href="menu/{{ $menu->slug }}">
                        <button style="background-color: #f0735d; color:white;" class="float-end btn btn-sm pull-end">Order now!</button>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <img src="{{ asset('storage/staticfiles/jollofrice.png') }}" class="img-fluid" height="500" style="margin-top:100px">
        </div>
        <div class="col">
            <h1 style="font-family: 'Playfair Display', serif; padding-top: 200px; font-size: 70px">We really can't do without food!</h1>
            <p>
                We know you can't too. So, just place the order, and we'll come running to you with just what you want.
                We just want you to not just get full, but satisfied. Don't miss the chance of enjoying the savoury dishes we have.
            </p>
        </div>
    </div>
</div>

@endsection