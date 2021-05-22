@extends('layouts.app')

@section('content')
{{-- <style>
    .disabled {
  pointer-events: none;
  cursor: default;
}
</style> --}}
<div class="profile-page">

    <div class="row profile-cover">
        <div class="row">
            <div class="col-md-3 profile-image">
                <div class="profile-image-container">
                    <img src="{{ asset('assets/images/users/image-user.jpg') }}" alt="image"/>
                </div>
            </div>
            <div class="col-md-12 profile-info">
                <div class="container profile-info-value">
                    <h3>{{ Auth::user()->name }}</h3>
                    <p>Lokal Siswa</p>
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
    <div class="row margin-top-70">
        <!--Left Sidebar-->
        
        <div class="col-md-12" style="background:rgb(27, 199, 196);">

           <div class="text-center">
            <h1><strong>Sholat lima waktu</strong> </h1>

           </div>


        </div><!--/col-md-12-->

        <!--End Left Sidebar-->

     
    </div>
    <div class="row ">
        <!--Left Sidebar-->
        
        <div class="col-md-12 padding-top-20" style="background:rgb(27, 199, 196);">

           
            <div class="page-ecommerce">

                <div class="row" style="height: 30%">

                    <div class="col-md-4">

                        <div class="widget">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Subuh</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-alarm pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Jadwal Sholat <b>{{ $schedule['subuh']}}</b></p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $nilai }}"></div>
                                </div>

                                @if ($nama == 'terlaksana')
                                <a href="#" class="padding-8 hvr-bounce-to-right bg-green" style="width:100%;">Terima kasih sudah melakukan sholat <i class="fa fa-arrow-circle-right"></i></a>
                                    
                                @else
                                <a href="{{ route('sholat.subuh') }}" class="padding-8 hvr-bounce-to-right bg-red" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>
                                    
                                @endif
                            </div><!--/widget-content--> 
                        </div><!--/widget-->

                    </div>

                    <div class="col-md-4">

                        <div class="widget">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Dzuhur</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-settings pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Members</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-green-sea" role="progressbar" data-transitiongoal="80"></div>
                                </div>
                                <a href="{{ route('sholat.dzuhur') }}" class="padding-8 hvr-bounce-to-right bg-green-sea" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
                            </div><!--/widget-content--> 
                        </div><!--/widget-->

                    </div>

                    <div class="col-md-4">

                        <div class="widget">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Ashar</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-like2 pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Revenue</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-sun-flower" role="progressbar" data-transitiongoal="90"></div>
                                </div>
                                <a href="#" class="padding-8 hvr-bounce-to-right bg-sun-flower" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
                            </div><!--/widget-content--> 
                        </div><!--/widget-->

                    </div>


                </div><!-- .row -->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">

                        <div class="widget">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Maghrib</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-alarm pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Open Orders</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-amethyst" role="progressbar" data-transitiongoal="64"></div>
                                </div>
                                <a href="#" class="padding-8 hvr-bounce-to-right bg-amethyst" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>
                            </div><!--/widget-content--> 
                        </div><!--/widget-->

                    </div>

                    <div class="col-md-4">

                        <div class="widget">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Isya</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-settings pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Members</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-alizarin" role="progressbar" data-transitiongoal="80"></div>
                                </div>
                                <a href="{{ route('vidio-test') }}" class="padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
                            </div><!--/widget-content--> 
                        </div><!--/widget-->

                    </div>


                    <div class="col-md-2"></div>


                </div><!-- .row -->


                
            </div><!--/all-projects-->


        </div><!--/col-md-12-->

        <!--End Left Sidebar-->

     
    </div>
    <div class="clearfix"></div>
    <div class="row margin-top-70">
        <!--Left Sidebar-->
        
        <div class="col-md-12" style="background:rgb(191, 236, 26);">

           <div class="text-center">
            <h1><strong>Kegiatan setelah Sholat</strong> </h1>

           </div>


        </div><!--/col-md-12-->

        <!--End Left Sidebar-->

     
    </div>
    <div class="row">
        <!--Left Sidebar-->
        
        <div class="col-md-12 padding-top-20" style="background:rgb(191, 236, 26);">

           
            <div class="page-ecommerce">

                <div class="row" style="height: 30%">

                    <div class="col-md-4 disable">

                        <div class="widget" id="data">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Mengaji</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-alarm pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Open Orders</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-sun-flower" role="progressbar" data-transitiongoal="64"></div>
                                </div>
                                <a href="{{ route('mengaji.created') }}" id="" class="disabled padding-8 hvr-bounce-to-right bg-sun-flower" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>
                            </div><!--/widget-content--> 
                        </div><!--/widget-->

                    </div>

                    <div class="col-md-4">

                        <div class="widget">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Literasi</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-settings pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Members</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-midnight-blue" role="progressbar" data-transitiongoal="80"></div>
                                </div>
                                <a href="{{ route('literasi.created') }}" class="padding-8 hvr-bounce-to-right bg-midnight-blue" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
                            </div><!--/widget-content--> 
                        </div><!--/widget-->

                    </div>

                    <div class="col-md-4">

                        <div class="widget">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Kosa Kata</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-like2 pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Revenue</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-belize-hole" role="progressbar" data-transitiongoal="90"></div>
                                </div>
                                <a href="{{ route('kosakata.created') }}" class="padding-8 hvr-bounce-to-right bg-belize-hole" style="width:100%;">Read full report <i class="fa fa-arrow-circle-right"></i></a>
                            </div><!--/widget-content--> 
                        </div><!--/widget-->

                    </div>

                </div><!-- .row -->
           


                
            </div><!--/all-projects-->


        </div><!--/col-md-12-->

        <!--End Left Sidebar-->

     
    </div>
</div>
@endsection
