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
                {{-- {{ Carbon\Carbon::now()->format('Y-m-d') }} --}}
                    <div class="col-md-4">
<div class="subuh" style="height: 200%">
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
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100"></div>
                                </div>

                                @if ($subuh->created_at->format('Y-m-d') == Carbon\Carbon::now()->format('Y-m-d'))

                                <button class="btn padding-8 hvr-bounce-to-right bg-green" style="width:100%;">Terima kasih sudah melakukan sholat <i class="fa fa-arrow-circle-right"></i></button>

                                @else
                                <a href="{{ route('sholat.subuh') }}" class="btn padding-8 hvr-bounce-to-right bg-red" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>

                                @endif
                            </div><!--/widget-content-->
                        </div><!--/widget-->
                    </div><!--/widget-->

                    </div>

                    <div class="col-md-4">

                        <div class="widget dzuhur">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Dzuhur</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-settings pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Jadwal Sholat <b>{{ $schedule['dzuhur']}}</p>
                                <div class="progress progress-xs">
                                    @if ($dzuhur->rating >= 1)
                                    <div class="progress-bar bg-green-sea" role="progressbar" data-transitiongoal="100"></div>
                                    @else
                                    <div class="progress-bar bg-green-sea" role="progressbar" data-transitiongoal="20"></div>
                                    @endif
                                </div>
                                @if ($dzuhur->created_at->format('Y-m-d') == Carbon\Carbon::now()->format('Y-m-d'))
                                <button class="btn padding-8 hvr-bounce-to-right bg-green-sea" style="width:100%;">Terima kasih sudah melakukan sholat <i class="fa fa-arrow-circle-right"></i></button>

                                @else
                                <a href="{{ route('sholat.dzuhur') }}" class="btn padding-8 hvr-bounce-to-right bg-green-sea" style="width:100%;">Laksanakan<i class="fa fa-arrow-circle-right"></i></a>

                                @endif
                            </div><!--/widget-content-->
                        </div><!--/widget-->

                    </div>

                    <div class="col-md-4">

                        <div class="widget ashar">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Ashar</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-like2 pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Jadwal Sholat <b>{{ $schedule['ashar']}}</p>
                                <div class="progress progress-xs">
                                    @if ($ashar->rating >= 1)
                                    <div class="progress-bar bg-sun-flower" role="progressbar" data-transitiongoal="100"></div>

                                        @else
                                        <div class="progress-bar bg-sun-flower" role="progressbar" data-transitiongoal="10"></div>

                                        @endif
                                </div>
                                @if ($ashar->created_at->format('Y-m-d') == Carbon\Carbon::now()->format('Y-m-d'))
                                <button class="btn padding-8 hvr-bounce-to-right bg-sun-flower" style="width:100%;">Terima kasih sudah melakukan sholat <i class="fa fa-arrow-circle-right"></i></button>

                                @else
                                <a href="{{ route('sholat.ashar') }}" class="padding-8 hvr-bounce-to-right bg-sun-flower" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>

                                @endif
                            </div><!--/widget-content-->
                        </div><!--/widget-->

                    </div>


                </div><!-- .row -->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">

                        <div class="widget maghrib">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Maghrib</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-alarm pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Jadwal Sholat <b>{{ $schedule['maghrib']}}</p>
                                <div class="progress progress-xs">
                                    @if ($maghrib->rating >= 1)
                                    <div class="progress-bar bg-amethyst" role="progressbar" data-transitiongoal="100"></div>

                                    @else
                                    <div class="progress-bar bg-amethyst" role="progressbar" data-transitiongoal="10"></div>

                                    @endif
                                </div>
                                @if ($maghrib->created_at->format('Y-m-d') == Carbon\Carbon::now()->format('Y-m-d'))
                                <button class="btn padding-8 hvr-bounce-to-right bg-amethyst" style="width:100%;">Terima kasih sudah melakukan sholat <i class="fa fa-arrow-circle-right"></i></button>

                                @else
                                <a href="{{ route('sholat.maghrib') }}" class="padding-8 hvr-bounce-to-right bg-amethyst" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>

                                @endif
                            </div><!--/widget-content-->
                        </div><!--/widget-->

                    </div>

                    <div class="col-md-4">

                        <div class="widget isya">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Isya</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-settings pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Jadwal Sholat <b>{{ $schedule['isya']}}</p>
                                <div class="progress progress-xs">
                                    @if ($isya->rating >= 1)

                                    <div class="progress-bar bg-alizarin" role="progressbar" data-transitiongoal="100"></div>

                                    @else
                                    <div class="progress-bar bg-alizarin" role="progressbar" data-transitiongoal="10"></div>

                                    @endif
                                </div>
                                @if ($isya->created_at->format('Y-m-d') == Carbon\Carbon::now()->format('Y-m-d'))
                                <button class="btn padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;">Terima kasih sudah melakukan sholat <i class="fa fa-arrow-circle-right"></i></button>

                                @else
                                <a href="{{ route('sholat.isya') }}" class="padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>

                                @endif
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

                    <div class="col-md-4 ">

                        <div class="widget disable">
                            <div class="widget-content bg-white">
                                <div class="row padding-10">
                                    <div class="col-xs-8">
                                        <h3 class="font-bold font-size-30">Mengaji</h3>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><span class="pe-7s-alarm pull-right"></span></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Waktunya Mengaji</b></p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-sun-flower" role="progressbar" data-transitiongoal="10"></div>
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
                                <p class="margin-left-10 margin-right-10">Waktunya Membaca</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-midnight-blue" role="progressbar" data-transitiongoal="10"></div>
                                </div>
                                <a href="{{ route('literasi.created') }}" class="padding-8 hvr-bounce-to-right bg-midnight-blue" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>
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
                                <p class="margin-left-10 margin-right-10">Isi Kata-kata dan arti</p>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-belize-hole" role="progressbar" data-transitiongoal="10"></div>
                                </div>
                                <a href="{{ route('kosakata.created') }}" class="padding-8 hvr-bounce-to-right bg-belize-hole" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>
                             </div><!--/widget-content-->
                        </div><!--/widget-->

                    </div>


                </div><!-- .row -->





            </div><!--/all-projects-->


        </div><!--/col-md-12-->
<a href="{{ route('vidio-test') }}" class="btn btn-primary">test</a>
        <!--End Left Sidebar-->

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://malsup.github.io/jquery.blockUI.js"></script>

<script type="text/javascript">

    $(window).on('load',function(){
        var delayMs = 500; // delay in milliseconds

        setTimeout(function(){
            getRealData();

        }, delayMs);
    });

    $(document).ready(function() {
        $('div.subuh').block({
            message: '<img src="{{ asset('images/waiting.gif') }}" class="img-responsive" />',
            overlayCSS: { backgroundColor: 'rgb(121, 121, 121)' },
         });

        $('div.dzuhur').block({
            message: '<img src="{{ asset('images/waiting.gif') }}" class="img-responsive" />',
            overlayCSS: { backgroundColor: 'rgb(121, 121, 121)' },
         });

         $('div.ashar').block({
            message: '<img src="{{ asset('images/waiting.gif') }}" class="img-responsive" />',
            overlayCSS: { backgroundColor: 'rgb(121, 121, 121)' },
         });

         $('div.maghrib').block({
            message: '<img src="{{ asset('images/waiting.gif') }}" class="img-responsive" />',
            overlayCSS: { backgroundColor: 'rgb(121, 121, 121)' },
         });

         $('div.isya').block({
            message: '<img src="{{ asset('images/waiting.gif') }}" class="img-responsive" />',
            overlayCSS: { backgroundColor: 'rgb(121, 121, 121)' },
         });


    });

    $(document).ready(function(){
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
        });




function getRealData() {
    $.ajax({
        url: "{{ route('sholat.dataSholat') }}",
        type: "GET",
        dataType: 'json',
        success: function (data) {
            console.log(data.waktu_sekarang);


            if (data.waktu_sekarang >= data.subuh && data.waktu_sekarang <= '06:00') {


                }else if (data.waktu_sekarang >= data.dzuhur && data.waktu_sekarang <= '14:30') {

                    $('div.dzuhur').unblock({
                        message: '<img src="{{ asset('images/terima-kasih.gif') }}" style="width: 80%" class="img-responsive" />',
                        overlayCSS: { backgroundColor: 'rgb(121, 121, 121)' },
                    });

                }else if (data.waktu_sekarang >= data.ashar && data.waktu_sekarang <= '17:35') {

                    $('div.ashar').unblock({
                        message: '<img src="{{ asset('images/waiting.gif') }}" class="img-responsive" />',
                        overlayCSS: { backgroundColor: 'rgb(121, 121, 121)' },
                    });
                }else if (data.waktu_sekarang >= data.isya && data.waktu_sekarang <= '19:15') {


                }else if (data.waktu_sekarang >= data.nilai && data.waktu_sekarang <= '20:45') {


                }else{
                    $('div.subuh').block({
                        message: '<img src="{{ asset('images/terima-kasih.gif') }}" class="img-responsive" />',
                        overlayCSS: { backgroundColor: 'rgb(121, 121, 121)' },
                    });
                }


            // event(new Notif('Waktu Sholat Dzuhur masuk'));

        },
        error: function (data) {

        }
        });
 }
</script>
@endsection
