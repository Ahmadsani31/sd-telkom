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
                    <img src="{{ asset('assets/images/users/image-user.jpg') }}" alt="image "/>
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

            <div class="text-center margin-top-25">
                <h1 style="color: white" class="font-size-38"><strong>Sholat 5 Waktu</strong> </h1>

               </div>


        </div><!--/col-md-12-->

        <!--End Left Sidebar-->


    </div>
    <div class="row ">
        <!--Left Sidebar-->

        <div class="col-md-12 padding-top-20" style="background: linear-gradient(180deg, rgba(27, 199, 196,1) 0%, rgba(125,96,61,1) 50%, rgb(84, 168, 45) 100%);">

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
                                        <small><u>{{ $schedule['subuh']}}</u></small>
                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><img src="{{ asset('images/sholat.png') }}" alt="sholat"  class="img-responsive"></p>

                                    </div>
                                </div>

                                <p class="margin-left-10 margin-right-10">Batas Jadwal Sholat <b style="color: red">Subuh</b> <b>07:00</b></p>


                                @if (!$subuh)
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-red" role="progressbar" data-transitiongoal="20"></div>
                                </div>
                                <a href="{{ route('sholat.subuh') }}" class="btn padding-8 hvr-bounce-to-right bg-red" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>

                                @else
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-alizarin" role="progressbar" data-transitiongoal="100"></div>
                                </div>
                                @php
                                            $time = $subuh->jadwal_sholat;
                                            $time_a = strtotime("+20 minutes", strtotime($time));
                                            $time_b = strtotime("+20 minutes", $time_a);

                                @endphp
                                @if ($subuh->waktu_sholat >= $time && $subuh->waktu_sholat <= date('H:i',$time_a))
                                <button class="btn padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;" disabled>Terima kasih nilai A<i class="fa fa-arrow-circle-right"></i></button>

                                @elseif ($subuh->waktu_sholat >= date('H:i',$time_a) && $subuh->waktu_sholat <= date('H:i',$time_b))
                                <button class="btn padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;" disabled>Terima kasih nilai B adasdsasda <i class="fa fa-arrow-circle-right"></i></button>

                                @else
                                <button class="btn padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;" disabled>Terima kasih nilai C<i class="fa fa-arrow-circle-right"></i></button>

                                @endif


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
                                        <small><u>{{ $schedule['dzuhur']}}</u></small>

                                    </div>
                                    <div class="col-xs-4">
                                        <p class="font-size-38"><img src="{{ asset('images/sholat.png') }}" alt="sholat"  class="img-responsive"></p>

                                    </div>
                                </div>

                                <p class="margin-left-10 margin-right-10">Batas Jadwal Sholat <b style="color: rgb(13, 111, 13)">Dzuhur</b> <b>15:00</b></p>

                                    @if (!$dzuhur)
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-green-sea" role="progressbar" data-transitiongoal="20"></div>
                                    </div>
                                    <a href="{{ route('sholat.dzuhur') }}" class="btn padding-8 hvr-bounce-to-right bg-green-sea" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>

                                    @else
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-green-sea" role="progressbar" data-transitiongoal="100"></div>
                                    </div>
                                    @php
                                                $time = $dzuhur->jadwal_sholat;
                                                $time_a = strtotime("+20 minutes", strtotime($time));
                                                $time_b = strtotime("+20 minutes", $time_a);

                                    @endphp
                                    @if ($dzuhur->waktu_sholat >= $time && $dzuhur->waktu_sholat <= date('H:i',$time_a))
                                    <button class="btn padding-8 hvr-bounce-to-right bg-green-sea" style="width:100%;" disabled>Terima kasih nilai A <i class="fa fa-arrow-circle-right"></i></button>

                                    @elseif ($dzuhur->waktu_sholat >= date('H:i',$time_a) && $dzuhur->waktu_sholat <= date('H:i',$time_b))
                                    <button class="btn padding-8 hvr-bounce-to-right bg-green-sea" style="width:100%;" disabled>Terima kasih nilai B <i class="fa fa-arrow-circle-right"></i></button>

                                    @else
                                    <button class="btn padding-8 hvr-bounce-to-right bg-green-sea" style="width:100%;" disabled>Terima kasih nilai C <i class="fa fa-arrow-circle-right"></i></button>

                                    @endif
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
                                        <p class="font-size-38"><img src="{{ asset('images/sholat.png') }}" alt="sholat"  class="img-responsive"></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Batas Jadwal Sholat <b style="color: rgb(247, 231, 14)">Ashar</b> <b>17:00</b></p>

                                    @if (!$ashar)
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-sun-flower" role="progressbar" data-transitiongoal="20"></div>
                                    </div>
                                    <a href="{{ route('sholat.ashar') }}" class="btn padding-8 hvr-bounce-to-right bg-sun-flower" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>

                                    @else
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-sun-flower" role="progressbar" data-transitiongoal="100"></div>
                                    </div>
                                    @php
                                    $time = $ashar->jadwal_sholat;
                                    $time_a = strtotime("+20 minutes", strtotime($time));
                                    $time_b = strtotime("+20 minutes", $time_a);

                        @endphp
                        @if ($ashar->waktu_sholat >= $time && $ashar->waktu_sholat <= date('H:i',$time_a))
                        <button disabled class="btn padding-8 hvr-bounce-to-right bg-sun-flower" style="width:100%;">Terima kasih Nilai A <i class="fa fa-arrow-circle-right"></i></button>

                        @elseif ($ashar->waktu_sholat >= date('H:i',$time_a) && $ashar->waktu_sholat <= date('H:i',$time_b))
                        <button disabled class="btn padding-8 hvr-bounce-to-right bg-sun-flower" style="width:100%;">Terima kasih nilai B <i class="fa fa-arrow-circle-right"></i></button>

                        @else
                        <button disabled class="btn padding-8 hvr-bounce-to-right bg-sun-flower" style="width:100%;">Terima kasih nilai C <i class="fa fa-arrow-circle-right"></i></button>

                        @endif
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
                                        <p class="font-size-38"><img src="{{ asset('images/sholat.png') }}" alt="sholat"  class="img-responsive"></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Batas Jadwal Sholat <b style="color:purple">Maghrib</b> <b>19:15</b></p>


                                            @if (!$maghrib)
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-amethyst" role="progressbar" data-transitiongoal="20"></div>
                                            </div>
                                            <a href="{{ route('sholat.maghrib') }}" class="btn padding-8 hvr-bounce-to-right bg-amethyst" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>

                                            @else
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-amethyst" role="progressbar" data-transitiongoal="100"></div>
                                            </div>
                                            @php
                                            $time = $maghrib->jadwal_sholat;
                                            $time_a = strtotime("+20 minutes", strtotime($time));
                                            $time_b = strtotime("+20 minutes", $time_a);

                                @endphp
                                @if ($maghrib->waktu_sholat >= $time && $maghrib->waktu_sholat <= date('H:i',$time_a))
                                <button disabled class="btn padding-8 hvr-bounce-to-right bg-amethyst" style="width:100%;">Terima kasih nilai A <i class="fa fa-arrow-circle-right"></i></button>

                                @elseif ($maghrib->waktu_sholat >= date('H:i',$time_a) && $maghrib->waktu_sholat <= date('H:i',$time_b))
                                <button disabled class="btn padding-8 hvr-bounce-to-right bg-amethyst" style="width:100%;">Terima kasih nilai B <i class="fa fa-arrow-circle-right"></i></button>

                                @else
                                <button disabled class="btn padding-8 hvr-bounce-to-right bg-amethyst" style="width:100%;">Terima kasih nilai C <i class="fa fa-arrow-circle-right"></i></button>

                                @endif
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
                                        <p class="font-size-38"><img src="{{ asset('images/sholat.png') }}" alt="sholat"  class="img-responsive"></p>
                                    </div>
                                </div>
                                <p class="margin-left-10 margin-right-10">Batas Jadwal Sholat <b style="color:red">Isya</b> <b>20:45</b></p>

                                    @if (!$isya)
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-alizarin" role="progressbar" data-transitiongoal="20"></div>
                                    </div>
                                    <a href="{{ route('sholat.isya') }}" class="btn padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;">Laksanakan <i class="fa fa-arrow-circle-right"></i></a>


                                    @else
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-alizarin" role="progressbar" data-transitiongoal="100"></div>
                                    </div>
                                    @php
                                    $time = $isya->jadwal_sholat;
                                    $time_a = strtotime("+20 minutes", strtotime($time));
                                    $time_b = strtotime("+20 minutes", $time_a);

                        @endphp
                        @if ($isya->waktu_sholat >= $time && $isya->waktu_sholat <= date('H:i',$time_a))
                        <button disabled class="btn padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;">Terima kasih nilai A <i class="fa fa-arrow-circle-right"></i></button>

                        @elseif ($isya->waktu_sholat >= date('H:i',$time_a) && $isya->waktu_sholat <= date('H:i',$time_b))
                        <button disabled class="btn padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;">Terima kasih nilai B <i class="fa fa-arrow-circle-right"></i></button>

                        @else
                        <button disabled class="btn padding-8 hvr-bounce-to-right bg-alizarin" style="width:100%;">Terima kasih nilai C <i class="fa fa-arrow-circle-right"></i></button>

                        @endif

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

        <div class="col-md-12" style="background:rgb(36, 155, 141);">

           <div class="text-center margin-top-25">
            <h1 style="color: white" class="font-size-38"><strong>Kegiatan setelah Sholat</strong> </h1>

           </div>


        </div><!--/col-md-12-->

        <!--End Left Sidebar-->


    </div>
    <div class="row">
        <!--Left Sidebar-->

        <div class="col-md-12 padding-top-20" style="background:linear-gradient(180deg, rgba(36,155,141,1) 50%, rgba(0,139,180,1) 100%);">


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
                                        <p class="font-size-38"><img src="{{ asset('images/mengaji.png') }}" alt="sholat"  class="img-responsive"></p>
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
                                        <p class="font-size-38"><img src="{{ asset('images/literasi.png') }}" alt="sholat"  class="img-responsive"></p>
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
                                        <p class="font-size-38"><img src="{{ asset('images/kosakata.png') }}" alt="sholat"  class="img-responsive"></p>
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
{{-- <a href="{{ route('vidio-test') }}" class="btn btn-primary">test</a> --}}
        <!--End Left Sidebar-->

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://malsup.github.io/jquery.blockUI.js"></script>

<script type="text/javascript">

    $(window).on('load',function(){
        getRealData();
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
            console.log(data.isya);


            if (data.waktu_sekarang >= data.subuh && data.waktu_sekarang <= '06:00') {
                $('div.subuh').unblock();

                }else{
                    $('div.subuh').block({
                        message: '<img src="{{ asset('images/waiting.gif') }}" class="img-responsive" />',
                        css: { border: 'none',
                                                    padding: '15px',
                                                    backgroundColor: '#000',
                                                    '-webkit-border-radius': '10px',
                                                    '-moz-border-radius': '10px',
                                                    opacity: .5,
                                                    color: '#fff'
                                                   }
                    });
                }

            if (data.waktu_sekarang >= data.dzuhur && data.waktu_sekarang <= '14:30') {

                    $('div.dzuhur').unblock();
                }else {
                    $('div.dzuhur').block({
                        message: '<img src="{{ asset('images/waiting.gif') }}" class="img-responsive" />',
                        css: { border: 'none',
                                                    padding: '15px',
                                                    backgroundColor: '#000',
                                                    '-webkit-border-radius': '10px',
                                                    '-moz-border-radius': '10px',
                                                    opacity: .5,
                                                    color: '#fff'
                                                   }
                    });
                }

            if (data.waktu_sekarang >= data.ashar && data.waktu_sekarang <= '17:35') {

                    $('div.ashar').unblock();
                }else {
                    $('div.ashar').block({
                        message: '<img src="{{ asset('images/waiting.gif') }}" class="img-responsive" />',
                        css: { border: 'none',
                                                    padding: '15px',
                                                    backgroundColor: '#000',
                                                    '-webkit-border-radius': '10px',
                                                    '-moz-border-radius': '10px',
                                                    opacity: .5,
                                                    color: '#fff'
                                                   }
                    });
                }

            if (data.waktu_sekarang >= data.maghrib && data.waktu_sekarang <= '19:15') {
                    $('div.maghrib').unblock();

                }else {
                    $('div.maghrib').block({ message: '<img src="{{ asset('images/waiting.gif') }}" class="img-responsive" />',
                                             css: { border: 'none',
                                                    padding: '15px',
                                                    backgroundColor: '#000',
                                                    '-webkit-border-radius': '10px',
                                                    '-moz-border-radius': '10px',
                                                    opacity: .5,
                                                    color: '#fff'
                                                   }
                                                   });
            }

            if (data.waktu_sekarang >= data.isya && data.waktu_sekarang <= '21:00') {
                    $('div.isya').unblock();

                 }else{
                    $('div.isya').block({
                        message: '<img src="{{ asset('images/waiting.gif') }}" class="img-responsive" />',
                        css: { border: 'none',
                                                    padding: '15px',
                                                    backgroundColor: '#000',
                                                    '-webkit-border-radius': '10px',
                                                    '-moz-border-radius': '10px',
                                                    opacity: .5,
                                                    color: '#fff'
                                                   }
                    });
                 }

        },
        error: function (data) {

        }
        });
 }
</script>
@endsection
