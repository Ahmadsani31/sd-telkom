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

    #results { display:inline-block; margin:10px; padding:10px; border:1px solid; background:oldlace; }
    .center {
            margin: 0 auto;
            position: relative;
            top: 50%;
            padding-left: 25%;
            padding-right: 25%;

        }
</style>

    <!--======== Page Title and Breadcrumbs Start ========-->
    <div class="top-page-header">

        <div class="page-title">
            <h2>Sudah Belajar Bahasa Apa Hari Ini?</h2>
            <small>{{ Auth::user()->name }}</small>
        </div>




    </div>
    <!--======== Page Title and Breadcrumbs End ========-->

    <!--======== Form Elements Content Start End ========-->

    <div class="row">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-12">

                    <div class="c_panel">
                        <div class="c_title">
                            <h2>Form Literasi</h2>
                            <div class="clearfix"></div>
                        </div><!--/.c_title-->
                        <div class="c_content">
                            <form action="{{ route('kosakata.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal" id="modalRating1" data-easein="bounceInDown" data-easeout="bounceOutDown" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog modal-full">
                                      <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="rating">
                                                            <input type="radio" name="star" class="nana" id="star1" data-id="3" value="3">
                                                                <label for="star1">
                                                                    <img src="{{ asset('rating-emoji/senang.gif') }}" class="img-responsive">
                                                                    <h4 class="text-emoji">Senang</h4>
                                                                </label>
                                                            <input type="radio" name="star" class="nana" id="star2" data-id="2" value="2" checked>
                                                                <label for="star2">
                                                                    <img src="{{ asset('rating-emoji/marah.gif') }}" class="img-responsive">
                                                                    <h4 class="text-emoji">Marah</h4>
                                                                </label>
                                                            <input type="radio" name="star" class="nana" id="star3" data-id="1" value="1">
                                                                <label for="star3">
                                                                    <img src="{{ asset('rating-emoji/sedih.gif') }}" class="img-responsive">
                                                                    <h4 class="text-emoji">Sedih</h4>
                                                                </label>
                                                                <h3 class="text">What Are You Feeling Kids</h3>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                <div class="row">
                                    <div class="col-sm-6 has-success">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-sm-4">Kata-Kata</label>
                                            <div class="col-sm-8">
                                                <input class=" form-control input-lg" name="bahasa" id="bahasa" type="text" required placeholder="Bahasa"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 has-success">
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
                            <h2>Kata Kata Yang Sudah Tersimpan</h2>

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


                        </div><!--/.c_content-->

                    </div><!--/.c_panels-->


                </div><!--/col-md-12-->

            </div><!--/row-->
        </div><!--/col-md-6-->

    </div><!--/row-->

    <!--======== Form Elements Content Start End ========-->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/webcamjs/webcam.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/webcamjs/webcam.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function(){
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
        });


        $(window).on('load',function(){
        var delayMs = 500; // delay in milliseconds

        setTimeout(function(){
        $('#modalRating1').modal('show');

        }, delayMs);
    });

    $('body').on('click', '.nana', function () {
        setTimeout(function(){
            $('#modalRating1').modal('hide');
        }, 1000);
        var rat = $(this).data("id");
        console.log(rat)
        $('#rating').val(rat);

    });
    </script>


@endsection
