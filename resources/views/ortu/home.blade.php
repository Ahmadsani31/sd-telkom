@extends('layouts.app')

@section('content')
<div class="profile-page">

    <div class="row profile-cover">
        <div class="row">
            <div class="col-md-3 profile-image">
                <div class="profile-image-container">
                    <img src="{{ asset('assets/images/users/image-user.jpg') }}" alt="image"/>
                </div>
            </div>
            <div class="col-md-12 profile-info" style="padding-bottom: 10px">
                <div class=" profile-info-value ">
                   <span class="label label-wet-asphalt font-size-24"> {{ Auth::user()->name }}</span>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 profile-under-cover-style">
            &nbsp;
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row margin-top-20">
        <div class="top-page-header">

            <div class="page-title">
                <h3>Nama Anak</h3>
                <span class="label label-wet-asphalt">{{ $siswa->name }}</span>
            </div>


        </div>
        <!--End Left Sidebar-->
        <div class="row">
            <!--Left Sidebar-->

            <div class="col-md-12 padding-top-20">


                <div class="page-ecommerce">
                    <div class="row" style="height: 30%">

                        <div class="col-md-3 ">

                            <div class="widget disable">
                                <div class="widget-content bg-white">
                                    <div class="row padding-10">
                                        <div class="col-xs-8">
                                            <h3 class="font-bold font-size-30">Sholat</h3>
                                        </div>
                                        <div class="col-xs-4">
                                            <p class="font-size-38"><img src="{{ asset('images/sholat.png') }}" alt="sholat"  class="img-responsive"></p>
                                        </div>
                                    </div>
                                    <p class="margin-left-10 margin-right-10 font-size-18 padding-bottom-10"><span class="label label-wet-asphalt">{{ $siswa->name }}</span></p>
                                        <a href="{{ route('ortu-anak.sholat') }}" id="" class="btn padding-8 hvr-bounce-to-right bg-sun-flower" style="width:100%;">Lihat <i class="fa fa-arrow-circle-right"></i></a>

                               </div><!--/widget-content-->
                            </div><!--/widget-->

                        </div>

                        <div class="col-md-3">

                            <div class="widget">
                                <div class="widget-content bg-white">
                                    <div class="row padding-10">
                                        <div class="col-xs-8">
                                            <h3 class="font-bold font-size-30">Mengaji</h3>
                                        </div>
                                        <div class="col-xs-4">
                                            <p class="font-size-38"><img src="{{ asset('images/mengaji.png') }}" alt="sholat"  class="img-responsive"></p>
                                        </div>
                                    </div>
                                    <p class="margin-left-10 margin-right-10 font-size-18 padding-bottom-10"><span class="label label-wet-asphalt">{{ $siswa->name }}</span></p>

                                    <a href="{{ route('ortu-anak.mengaji') }}" class="btn padding-8 hvr-bounce-to-right bg-green-sea" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>
                                </div><!--/widget-content-->
                            </div><!--/widget-->

                        </div>

                        <div class="col-md-3">

                            <div class="widget">
                                <div class="widget-content bg-white">
                                    <div class="row padding-10">
                                        <div class="col-xs-8">
                                            <h3 class="font-bold font-size-30">Literasi</h3>
                                        </div>
                                        <div class="col-xs-4">
                                            <p class="font-size-38"><img src="{{ asset('images/literasi.png') }}" alt="sholat"  class="img-responsive"></p>
                                        </div>
                                    </div>
                                    <p class="margin-left-10 margin-right-10 font-size-18 padding-bottom-10"><span class="label label-wet-asphalt">{{ $siswa->name }}</span></p>

                                    <a href="{{ route('ortu-anak.literasi') }}" class="btn padding-8 hvr-bounce-to-right bg-amethyst" style="width:100%;">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                                 </div><!--/widget-content-->
                            </div><!--/widget-->

                        </div>
                        <div class="col-md-3">

                            <div class="widget">
                                <div class="widget-content bg-white">
                                    <div class="row padding-10">
                                        <div class="col-xs-8">
                                            <h3 class="font-bold font-size-30">Kosa Kata</h3>
                                        </div>
                                        <div class="col-xs-4">
                                            <p class="font-size-38"><img src="{{ asset('images/kosakata.png') }}" alt="sholat"  class="img-responsive"></p>
                                        </div>
                                    </div>
                                    <p class="margin-left-10 margin-right-10 font-size-18 padding-bottom-10"><span class="label label-wet-asphalt">{{ $siswa->name }}</span></p>

                                    <a href="{{ route('ortu-anak.kosakata') }}" class="btn  padding-8 hvr-bounce-to-right bg-carrot" style="width:100%;">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                                 </div><!--/widget-content-->
                            </div><!--/widget-->

                        </div>

                    </div><!-- .row -->





                </div><!--/all-projects-->


            </div><!--/col-md-12-->
    {{-- <a href="{{ route('vidio-test') }}" class="btn btn-primary">test</a> --}}
            <!--End Left Sidebar-->

        </div>


    </div>

</div>

@endsection
