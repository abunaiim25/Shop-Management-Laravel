@extends('layouts.admin_layout')

@section('title')
Admin - Frontend Design
@endsection

@section('admin_content')
<nav class="breadcrumb sl-breadcrumb mt-3">
    <p>Admin Panel / Frontend Design</p>
</nav>

<div class="card mx-3 p-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 ">



            <form action="{{ url('front_control_store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="display: flex; justify-content: space-between;" class="mb-2">
                    <h6 class="card-body-title mb-4"> Frontend Design</h6>
                    <button class="btn btn-info mg-r-5">Update</button>
                </div>


                {{-- LOGO --}}
                <div class="card mb-3" style="background:#fff;">
                    <div class="card-header bg-info"><strong> LOGO</strong>
                    </div>

                    <div class="row p-3">
                        <div class="col-lg-6 col-lg-6 p-3">
                            <label for="" class="text-black"><strong> Simple Logo:</strong></label>
                            <br>
                            <img style="height: 60px" src="{{ asset('img_DB/front/logo/' . $front->logo_big) }}" alt="">
                            <input style="background:#fff; color:black" class="form-control" type="file"
                                name="logo_big">
                        </div>

                        <div class="col-lg-6 col-lg-6 p-3">
                            <label for="" class="text-black"><strong> Small Logo:</strong></label>
                            <br>
                            <img style="height: 60px" src="{{ asset('img_DB/front/logo/' . $front->logo_small) }}"
                                alt="">
                            <input style="background:#fff; color:black" class="form-control" type="file"
                                name="logo_small">
                        </div>
                    </div>

                </div>


                {{-- Home Background --}}
                <div class="card mb-3" style="background:#fff;">
                    <div class="card-header bg-info"><strong>Home
                            Background</strong> </div>

                    <div class="row p-3">
                        <div class="col-lg-5 col-lg-5 ">
                            <label for="" class="text-black"><strong>Home Background Image:</strong></label>
                            <br>
                            <img style="height: 200px;" src="{{ asset('img_DB/front/home/' . $front->home_bg_img) }}"
                                alt="">
                            <input style="background:#fff; color:black" class="form-control mt-1 text-success"
                                type="file" name="home_bg_img">
                        </div>
                        <div class="col-lg-7 col-lg-7 ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="" class="text-black"><strong>Home Background
                                            Text-1:</strong></label>
                                    <input type="text" name="home_bg_txt1" class="form-control bg-white mb-3"
                                        style="color: black;" maxlength="20" value="{{$front->home_bg_txt1}}"
                                        placeholder="short text (maximum 20 letters supported)">
                                </div>

                                <div class="col-lg-12">
                                    <label for="" class="text-black"><strong>Home Background
                                            Text-2:</strong></label>
                                    <input type="text" name="home_bg_txt2" class="form-control bg-white mb-3"
                                        style="color: black;" maxlength="20" value=" {{$front->home_bg_txt2}}"
                                        placeholder="short text (maximum 20 letters supported)">
                                </div>

                                <div class="col-lg-12">
                                    <label for="" class="text-black"><strong>Home Background
                                            Text-3:</strong></label>
                                    <input type="text" name="home_bg_txt3" class="form-control bg-white mb-3"
                                        style="color: black;" maxlength="100" value=" {{$front->home_bg_txt3}}"
                                        placeholder="short text (maximum 100 letters supported)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Footer --}}
                <div class="card mb-3" style="background:#fff;">
                    <div class="card-header bg-info"><strong>Footer
                        </strong> </div>

                    <div class="row p-3">

                        <div class="col-lg-4">
                            <label for="" class="text-black"><strong>Footer Address:</strong></label>
                            <input type="text" name="footer_contact_address" class="form-control bg-white mb-3"
                                style="color: black;" placeholder="address" value="{{$front->footer_contact_address}}">
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="text-black"><strong>Footer Phone:</strong></label>
                            <input type="text" name="footer_contact_phone" class="form-control bg-white mb-3"
                                style="color: black;" placeholder="phone" value="{{$front->footer_contact_phone}}">
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="text-black"><strong>Footer Email:</strong></label>
                            <input type="text" name="footer_contact_email" class="form-control bg-white mb-3"
                                style="color: black;" placeholder="email" value="{{$front->footer_contact_email}}">
                        </div>



                        <div class="col-lg-4 col-6">
                            <label for="" class="text-black"><strong>Our Item Image-1:</strong></label>
                            <br>
                            <img style="height: 200px; width:150px;"
                                src="{{ asset('img_DB/front/footer_iteam/item1/' . $front->footer_iteam_img_1) }}"
                                alt="">
                            <input style="background:#fff; color:black" class="form-control mt-1  text-success"
                                type="file" name="footer_iteam_img_1">
                        </div>
                        <div class="col-lg-4  col-6">
                            <label for="" class="text-black"><strong>Our Item Image-2:</strong></label>
                            <br>
                            <img style="height: 200px; width:150px;"
                                src="{{ asset('img_DB/front/footer_iteam/item2/' . $front->footer_iteam_img_2) }}"
                                alt="">
                            <input style="background:#fff; color:black" class="form-control mt-1  text-success"
                                type="file" name="footer_iteam_img_2">
                        </div>
                        <div class="col-lg-4  col-6">
                            <label for="" class="text-black"><strong>Our Item Image-3:</strong></label>
                            <br>
                            <img style="height: 200px; width:150px;"
                                src="{{ asset('img_DB/front/footer_iteam/item3/' . $front->footer_iteam_img_3) }}"
                                alt="">
                            <input style="background:#fff; color:black" class="form-control mt-1  text-success"
                                type="file" name="footer_iteam_img_3">
                        </div>
                        <div class="col-lg-4  col-6">
                            <label for="" class="text-black"><strong>Our Item Image-4:</strong></label>
                            <br>
                            <img style="height: 200px; width:150px;"
                                src="{{ asset('img_DB/front/footer_iteam/item4/' . $front->footer_iteam_img_4) }}"
                                alt="">
                            <input style="background:#fff; color:black" class="form-control mt-1  text-success"
                                type="file" name="footer_iteam_img_4">
                        </div>
                        <div class="col-lg-4  col-6">
                            <label for="" class="text-black"><strong>Our Item Image-5:</strong></label>
                            <br>
                            <img style="height: 200px; width:150px;"
                                src="{{ asset('img_DB/front/footer_iteam/item5/' . $front->footer_iteam_img_5) }}"
                                alt="">
                            <input style="background:#fff; color:black" class="form-control mt-1  text-success"
                                type="file" name="footer_iteam_img_5">
                        </div>
                        <div class="col-lg-4 col-6 ">
                            <label for="" class="text-black"><strong>Our Item Image-6:</strong></label>
                            <br>
                            <img style="height: 200px; width:150px;"
                                src="{{ asset('img_DB/front/footer_iteam/item6/' . $front->footer_iteam_img_6) }}"
                                alt="">
                            <input style="background:#fff; color:black" class="form-control mt-1  text-success"
                                type="file" name="footer_iteam_img_6">
                        </div>


                        <div class="col-lg-6">
                            <label for="" class="text-black"><strong>Facebook Link:</strong></label>
                            <input type="text" name="footer_social_fb" class="form-control bg-white mb-3"
                                style="color: black;" placeholder="link" value="{{$front->footer_social_fb}}">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="text-black"><strong>Twitter Link:</strong></label>
                            <input type="text" name="footer_social_twitter" class="form-control bg-white mb-3"
                                style="color: black;" placeholder="link" value="{{$front->footer_social_twitter}}">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="text-black"><strong>LinkedIn Link:</strong></label>
                            <input type="text" name="footer_social_linkedin" class="form-control bg-white mb-3"
                                style="color: black;" placeholder="link" value="{{$front->footer_social_linkedin}}">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="text-black"><strong>Instagram Link:</strong></label>
                            <input type="text" name="footer_social_insta" class="form-control bg-white mb-3"
                                style="color: black;" placeholder="link" value="{{$front->footer_social_insta}}">
                        </div>

                        <div class="col-lg-12">
                            <label for="" class="text-black"><strong>Footer Description:</strong></label>
                            <input type="text" name="footer_text" class="form-control bg-white mb-3"
                                style="color: black;" placeholder="footer description" value="{{$front->footer_text}}">
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
@endsection