@extends('layouts.app')

@section('content')
<style type="text/css">

.card-emoji {
	display: flex;
	align-items: center;
	justify-content: center;
}

.rate {
	text-align: center;
	width: 200px;
	height: 200px;
	ouline: thin solid lightgray;
}
.emoji {
    font-size: 120px;
	height: 170px;
	line-height: 170px;
}


</style>

    <!--======== Page Title and Breadcrumbs Start ========-->
    <div class="top-page-header" style="background: linear-gradient(180deg, #00C9FF 0%, #92FE9D 100%);">

        <div class="page-title">
            <h2>Sudah Belajar Bahasa Apa Hari Ini?</h2>
            <small>Ayok semangat anak anak, bahasa apa sekarang yang tau artinya</small>
        </div>
        <div class="page-breadcrumb">
            <nav class="c_breadcrumbs">
                <ul>
                    <li><a href="#">home</a></li>
                    <li class="active"><a href="#">Kosakata</a></li>
                </ul>
            </nav>
        </div>



    </div>
    <!--======== Page Title and Breadcrumbs End ========-->

    <!--======== Form Elements Content Start End ========-->
    <div class="modal" id="alert-unique" data-easein="bounceIn" data-easeout="bounceOut" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-body">
              Maap anak anak untuk kata-kata
              @if(session('errors'))


                      @foreach ($errors->all() as $error)
                      @endforeach
                       <b>{{ $error }}</b>
                      sudah ada, mohon cari kata lain yaaa

              @endif
            </div>

          </div>
        </div>
      </div>
    <div class="row">

        <div class="col-md-12">


                    <div class="c_panel">
                        <div class="c_title">
                            <h2>{{ Auth::user()->name }}</h2>
                            <div class="clearfix"></div>
                        </div><!--/.c_title-->
                        <div class="c_content">
                            <form action="{{ route('kosakata.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('siswa.emoji')
                                <input type="hidden" name="star" id="star" value="">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-sm-4">Kata-Kata</label>
                                            <div class="col-sm-8">
                                                <input class=" form-control input-lg" name="bahasa" id="bahasa" type="text" required placeholder="Bahasa"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-sm-2">Arti Kata</label>
                                            <div class="col-sm-10">
                                                <input class=" form-control input-lg" name="arti" id="arti" type="text" required placeholder="Terjemahan"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" id="btnSaveMengaji" class="btn btn-success ladda-button" data-style="expand-left">Simpan Data</button>
                                    </div>
                                </div>
                            </form>

                        </div><!--/.c_content-->
                    </div><!--/.c_panel-->

                </div><!--/col-md-12-->

            </div><!--/row-->
            <div class="row">

                <div class="col-md-6">

                    <div class="c_panel">

                        <div class="c_title">
                            <h2><b>kumpulkan</b> <b style="color: red">10</b> kata dan arti dan dapatkan emoji menarik</h2>

                            <div class="clearfix"></div>
                        </div><!--/.c_title-->

                        <div class="c_content">

                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bahasa</th>
                                    <th>Terjemahan</th>

                                </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)

                                <tbody>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->bahasa }}</td>
                                        <td><b>{{ $item->arti }}</b></td>
                                    </tr>
                                </tbody>
                                @endforeach

                            </table>

<input type="hidden" id="nilai" value="{{ $data->count() }}">
                        </div><!--/.c_content-->

                    </div><!--/.c_panels-->


                </div><!--/col-md-12-->
                <div class="col-md-6">

                    <div class="card-emoji">
                        <div class="rate">
                            <div class="emoji"><img src="{{ asset('images/emoji/emoji1.png') }}" class="img-responsive"></div>
                        </div>
                    </div>
                </div><!--/col-md-12-->

    </div><!--/row-->

    <!--======== Form Elements Content Start End ========-->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/webcamjs/webcam.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/webcamjs/webcam.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js"></script>

    @if(session('errors'))
      <script>
        $(document).ready(function(){
            $("#alert-unique").modal('show');
        });
      </script>
    @endif


    <script>
    $(document).ready(function(){
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
        });

    $(document).ready(function() {
         if ($.cookie('modal-kosakata') == null) {
             $('#modalRating1').modal('show');
             $.cookie('modal-kosakata', '1');
         }
     });

    //     $(window).on('load',function(){
    //     var delayMs = 500; // delay in milliseconds

    //     setTimeout(function(){
    //     $('#modalRating1').modal('show');

    //     }, delayMs);
    // });

    $('body').on('click', '.nana', function () {
        setTimeout(function(){
            $('#modalRating1').modal('hide');
        }, 1000);
        var rat = $(this).data("id");
        console.log(rat)
        $('#star').val(rat);

    });

    var emojis = [, '<img src="{{ asset('images/emoji/emoji2.png') }}" class="img-responsive">',
                    '<img src="{{ asset('images/emoji/emoji3.png') }}" class="img-responsive">',
                    '<img src="{{ asset('images/emoji/emoji4.png') }}" class="img-responsive">',
                    '<img src="{{ asset('images/emoji/emoji5.png') }}" class="img-responsive">',
                    '<img src="{{ asset('images/emoji/emoji6.png') }}" class="img-responsive">',
                    '<img src="{{ asset('images/emoji/emoji7.png') }}" class="img-responsive">',
                    '<img src="{{ asset('images/emoji/emoji8.png') }}" class="img-responsive">',
                    '<img src="{{ asset('images/emoji/emoji9.png') }}" class="img-responsive">',
                    '<img src="{{ asset('images/emoji/emoji11.png') }}" class="img-responsive">',
                    '<img src="{{ asset('images/emoji/emoji10.png') }}" class="img-responsive">',
                    ];



        $(window).on('load',function(){
            var i = $('#nilai').val();
            $(".emoji").html(emojis[i]);
        });
    </script>


@endsection
