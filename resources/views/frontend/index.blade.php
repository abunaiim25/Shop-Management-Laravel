@extends('layouts.frontend_layout')


@section('title')
Online Marketing - Home
@endsection

@php
$front = App\Models\FrontControl::first();
@endphp

@section('frontend_content')
<!--Background Image-->
<section id="home" style=" background-image: url({{ asset('img_DB/front/home/' . $front->home_bg_img) }});">
    <div class="container">
        <h5 style="color:white" class="w-50">{{ $front->home_bg_txt1 }}</h5>
        <h1 class="w-50"><b><span>{{ $front->home_bg_txt2 }}</span></b></h1>
        <p style="color:white" class="w-50">{{ $front->home_bg_txt3 }}</p>
    </div>
</section>


<section class=" mb-5 py-5">
    <div class="w-50 mx-auto">
        <h2 class="font-weight-bold text-center">Contact Us</h2>
        <form class="main-form" action="{{ url('contact_submit') }}" method="POST">
            @csrf

            <div class="row ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" name="name" class="form-control" placeholder="Full name" required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" name="email" class="form-control" placeholder="Email address" required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" name="phone" class="form-control" placeholder="Number" required>
                </div>

                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message..."
                        required></textarea>
                </div>

            </div>

            <button type="submit" class="btn mt-3 wow zoomIn text-white">Submit Contact</button>
        </form>
    </div>
</section>

@endsection