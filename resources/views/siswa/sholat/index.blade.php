@extends('layouts.app')

@section('content')
<style type="text/css">
    .main-section{
        margin:0 auto;
        padding: 20px;
        margin-top: 15px;
        float: left;
        background-color: #fff;
        box-shadow: 0px 0px 10px #c1c1c1;
    }

    #results1 { display:inline-block; margin:10px; padding:10px; border:1px solid; background:oldlace; }
    .center {
        margin: 0 auto;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);

        }
</style>
<link rel="stylesheet" href="{{ asset('rating-emoji/main.css') }}">
<!--======== Page Title and Breadcrumbs Start ========-->
        <div class="top-page-header">

            <div class="page-title">
                <h2>Jadwal Sholat 5 Waktu</h2>
                <small>Kerjakan lah sholat dengan tepat waktu untuk pahala yang besar.</small>
            </div>


        </div>
        <!--======== Page Title and Breadcrumbs End ========-->

        <!--======== Table Content Start ========-->
        <div class="row">
            <div class="col-md-12">
                <div class="c_panel">
                    <div class="c_content">
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th scope="col">Subuh</th>
                                <th scope="col">Dhuha</th>
                                <th scope="col">Dzuhur</th>
                                <th scope="col">Ashar</th>
                                <th scope="col">Maghrib</th>
                                <th scope="col">Isya</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $schedule['subuh']}}</td>
                                <td>{{ $schedule['dhuha']}}</td>
                                <td>{{ $schedule['dzuhur']}}</td>
                                <td>{{ $schedule['ashar']}}</td>
                                <td>{{ $schedule['maghrib']}}</td>
                                <td>{{ $schedule['isya']}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!--/.c_content-->
                </div><!--/.c_panels-->
            </div><!--/col-md-12-->
            <div class="col-md-12">

                <div class="c_panel">
                    <div class="c_title">
                        <h2>Absen Sholat</h2>
                        <div class="clearfix"></div>
                    </div><!--/.c_title-->
                    <div class="c_content">

                        <!--TAB START-->
                        <div role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li id="subuh" role="presentation" class="disabled"><a href="#tab5">SUBUH</a></li>
                                <li id="dzuhur" role="presentation" class="disabled"><a href="#tab6">DZUHUR</a></li>
                                <li id="ashar" role="presentation" class="disabled"><a href="#tab7">ASHAR</a></li>
                                <li id="maghrib" role="presentation" class="disabled"><a href="#tab8">MAGHRIB</a></li>
                                <li id="isya" role="presentation" class="disabled"><a href="#tab9">ISYA</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade" id="tab5">
                                    @include('siswa.sholat.subuh')

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab6">
                                    @include('siswa.sholat.dzuhur')

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab7">
                                    @include('siswa.sholat.ashar')

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab8">
                                    @include('siswa.sholat.maghrib')

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab9">
                                    @include('siswa.sholat.isya')
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab10">
                                    <div>
                                    <span class="label label-warning font-size-12">Terima kasih Untuk Menginput Waktu sholat sudah selesai, tunggu waktu sholat yang akan datang. {{ $nilai }}</span>
                                    </div>
                                    <br>
                                    <span class="label label-warning font-size-12">Untuk Menginput Waktu sholat sudah selesai, tunggu waktu sholat yang akan datang. {{ $nilai }}</span>
                                    <br>
                                    <br>
                                    <span class="label label-warning font-size-14">Waktu Sholat Selanjutnya, Sholat <strong>{{ $nilai }}</strong> </span>
                                </div>
                            </div>

                        </div>
                        <!--TAB END-->

                    </div><!--/.c_content-->
                </div><!--/.c_panel-->

            </div><!--/col-md-12-->

        </div><!--/row-->


        <!--****** Start Bounce InDown/OutDown Modal ******-->

        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/webcamjs/webcam.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/webcamjs/webcam.min.js') }}"></script>
{{-- @if (App\Sholat::where('sholat','ashar')->exists())
    <p>ada</p>
@else
    <p>tidak ada</p>
@endif --}}

<script>
$(document).ready(function(){
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
        });


    $('document').ready(function () {
 setInterval(function () {getRealData()}, 1000);//request every x seconds

 });

function getRealData() {
    $.ajax({
        url: "{{ route('sholat.dataSholat') }}",
        type: "GET",
        dataType: 'json',
        success: function (data) {
            console.log(data.waktu_sekarang);


            if (data.waktu_sekarang >= data.subuh && data.waktu_sekarang <= '06:00') {
                    var subuh = document.getElementById("subuh");
                    subuh.classList.remove("disabled");
                    subuh.classList.add("active");


                    var tab5 = document.getElementById("tab5");
                    tab5.classList.add("active");
                    tab5.classList.add("in");
                    $('#tab10').hide();

                }else if (data.waktu_sekarang >= data.dzuhur && data.waktu_sekarang <= '15:36') {
                    var dzuhur = document.getElementById("dzuhur");
                    dzuhur.classList.remove("disabled");
                    dzuhur.classList.add("active");


                    var tab6 = document.getElementById("tab6");
                    tab6.classList.add("active");
                    tab6.classList.add("in");
                    $('#tab10').hide();
                    $('#content').show();


                }else if (data.waktu_sekarang >= data.ashar && data.waktu_sekarang <= '17:35') {
                    // window.location.reload(true);
                    var ashar = document.getElementById("ashar");
                    ashar.classList.remove("disabled");
                    ashar.classList.add("active");


                    var tab7 = document.getElementById("tab7");
                    tab7.classList.add("active");
                    tab7.classList.add("in");
                    $('#tab10').hide();

                }else if (data.waktu_sekarang >= data.isya && data.waktu_sekarang <= '19:15') {
                    var maghrib = document.getElementById("maghrib");
                    maghrib.classList.remove("disabled");
                    maghrib.classList.add("active");


                    var tab8 = document.getElementById("tab8");
                    tab8.classList.add("active");
                    tab8.classList.add("in");
                    $('#tab10').hide();

                }else if (data.waktu_sekarang >= data.nilai && data.waktu_sekarang <= '20:45') {
                    var isya = document.getElementById("isya");
                    isya.classList.remove("disabled");
                    isya.classList.add("active");


                    var tab9 = document.getElementById("tab9");
                    tab9.classList.add("active");
                    tab9.classList.add("in");
                    $('#tab10').hide();

                }else{
                    $('#tab10').show();

                    var tab10 = document.getElementById("tab10");
                    tab10.classList.add("active");
                    tab10.classList.add("in");

                    // for subuh
                    var subuh = document.getElementById("subuh");
                    subuh.classList.remove("active");
                    subuh.classList.add("disabled");
                            var tab5 = document.getElementById("tab5");
                            tab5.classList.remove("active");
                            tab5.classList.remove("in");

                    //for dzuhur
                    var dzuhur = document.getElementById("dzuhur");
                    dzuhur.classList.remove("active");
                    dzuhur.classList.add("disabled");
                            var tab5 = document.getElementById("tab6");
                            tab5.classList.remove("active");
                            tab5.classList.remove("in");
                    // for ashar
                    var ashar = document.getElementById("ashar");
                    ashar.classList.remove("active");
                    ashar.classList.add("disabled");
                            var tab7 = document.getElementById("tab7");
                            tab7.classList.remove("active");
                            tab7.classList.remove("in");
                    // for maghrib
                    var maghrib = document.getElementById("maghrib");
                    maghrib.classList.remove("active");
                    maghrib.classList.add("disabled");
                            var tab8 = document.getElementById("tab8");
                            tab8.classList.remove("active");
                            tab8.classList.remove("in");
                    // for isya
                    var isya = document.getElementById("isya");
                    isya.classList.remove("active");
                    isya.classList.add("disabled");
                            var tab9 = document.getElementById("tab9");
                            tab9.classList.remove("active");
                            tab9.classList.remove("in");
                }

                
            // event(new Notif('Waktu Sholat Dzuhur masuk'));

        },
        error: function (data) {

        }
        });
 }

</script>
@endsection
