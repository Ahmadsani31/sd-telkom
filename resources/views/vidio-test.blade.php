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
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
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


            <div class="hover-ideas">

                <h3>Hover Ideas</h3>
                <div class="row margin-bottom-15">
                    <div class="col-md-12">
                        <div class="bg-white padding-25">

                            <div class="row margin-top-25">
                                <h4 class="head-style-4 margin-left-18 font-bold">Sadie</h4>
                                <div class="col-md-4 subuh">
                                <div class="center ">
                                    <figure class="effect-sadie">
                                        <img class="img-responsive" src="{{ asset('images/sholat/sholat-ashar.gif') }}"/>
                                        <figcaption>
                                            <h2>Sholat <span>Subuh</span></h2>
                                            <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                            <a href="#">View more</a>
                                        </figcaption>
                                    </figure>
                                </div>
                                </div>

                                <div class="col-lg-4">
                                <div class="center">

                                    <figure class="effect-sadie">
                                        <img class="img-responsive" src="{{ asset('images/sholat/dp-bbm-sholat-dzuhur.gif') }}"/>
                                        <figcaption>
                                            <h2>Sholat <span>Dzuhur</span></h2>
                                            <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                            <a href="#">View more</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                                <div class="col-lg-4">
                                <div class="center">

                                    <figure class="effect-sadie">
                                        <img class="img-responsive" src="{{ asset('images/sholat/dp-bbm-sholat-ashar.gif') }}"/>
                                        <figcaption>
                                            <h2>Sholat <span>Ashar</span></h2>
                                            <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                            <a href="#">View more</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                            </div><!--row-->
                            <div class="row margin-top-50">
                                <div class="col-lg-2"></div>

                                <div class="col-lg-4">
                                <div class="center">

                                    <figure class="effect-sadie">
                                        <img class="img-responsive" src="{{ asset('images/sholat/dp-bbm-sholat-maghrib.gif') }}"/>
                                        <figcaption>
                                            <h2>Sholat <span>Maghrib</span></h2>
                                            <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                            <a href="#">View more</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                                <div class="col-lg-4">
                                <div class="center">

                                    <figure class="effect-sadie">
                                        <img class="img-responsive" src="{{ asset('images/sholat/dp-bbm-sholat-isya.gif') }}"/>
                                        <figcaption>
                                            <h2>Sholat <span>Isya</span></h2>
                                            <p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
                                            <a href="#">View more</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                                <div class="col-lg-2"></div>

                            </div><!--row-->

                        </div>
                    </div>
                </div><!--row-->

            </div>
        </div>
    </div><!--row-->
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
                            <form class="form-horizontal" id="formKosakata" name="formKosakata" enctype="multipart/form-data">

<input type="hidden" name="nama" id="namaaja" value="2">
                                <div class="form-group">
                                    <div class="col-sm-12" >

                                                <h1 class="">Preview</h1>
                                                <span class="text-center">please click shortcut image to take vidio</span>
                                                <div class="hover-ideas" id="exampleVidio">
                                                    <div class="d-flex justify-content-center" style="padding-left: 20%">
                                                        <a href="javascript:void(0);" id="startButton" title="Image 1">
                                                                <img class="" width="70%" src="{{ asset('assets/images/users/img5-md.jpg') }}" alt="image"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="div_vidio" style="display: none" class="text-center">
                                                <video id="preview" width="720" height="480" autoplay muted></video><br/><br/>
                                                <div class="btn-group">
                                                    <div id="stopButton" class="btn btn-danger"  style="display:none;"> Stop </div>
                                                </div>
                                            </div>
                                            <div id="recorded" style="display:none" class="text-center">
                                                <video id="recording" width="720" height="480" controls></video><br/><br/>
                                                <a id="downloadButton" class="btn btn-primary" data-url="{{ route('vidio-test.store') }}">save</a>
                                                <a id="startButtonAgain" class="btn btn-success">Star Again</a>
                                            </div>
                                            </div>


                                </div>

                            </form>

                        </div><!--/.c_content-->
                    </div><!--/.c_panel-->

                </div><!--/col-md-12-->

            </div><!--/row-->

        </div><!--/col-md-6-->

    </div><!--/row-->
    <div class="row">

        <div class="col-md-12">

            <div class="c_panel">

                <div class="c_content">

                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>vidio</th>

                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                            @foreach ($videos as $vid)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td><video width="320" height="240" controls>
                                        <source src="{{ route('getVideo', $vid->id)  }}" type="video/mp4">
                                      Your browser does not support the video tag.
                                  </video></td>

                                    <td>{{ $vid->created_at->format('D, d M y') }}</td>
                                    <td>
                                        <a href="{{ route('vidio-test.destroy',$vid->id) }}"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach

                    </table>
                    {{ $videos->links() }}

                </div><!--/.c_content-->

            </div><!--/.c_panels-->


        </div><!--/col-md-12-->

    </div><!--/row-->
    <!--======== Form Elements Content Start End ========-->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://malsup.github.io/jquery.blockUI.js"></script>

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
        });

        $(document).ready(function(){
            $('div.subuh').block({
                    message: '<img src="{{ asset('images/terima-kasih.gif') }}" style="width: 80%" class="img-responsive" />',
                    overlayCSS: { backgroundColor: '#00f' },
            });
        });
    </script>


@endsection
