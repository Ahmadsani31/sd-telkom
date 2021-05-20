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
            <h2>Thema Form Elements</h2>
            <small>Thema form elements.</small>
        </div>
        <div class="page-breadcrumb">
            <nav class="c_breadcrumbs">
                <ul>
                    <li><a href="#">Thema</a></li>
                    <li><a href="#">Form Components</a></li>
                    <li class="active"><a href="#">Form Elements</a></li>
                </ul>
            </nav>
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
                            <h2>Basic Form</h2>
                            <div class="clearfix"></div>
                        </div><!--/.c_title-->
                        <div class="c_content">
                            <form class="form-horizontal" id="formMengaji" name="formMengaji" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Surat</label>
                                    <div class="col-sm-10">
                                        <select class="select2" id="surat" name="surat" required>
                                            <option selected>--Pilih Surat--</option>
                                            <optgroup label="Surat Alquran">
                                                @foreach ($surat as $surah)
                                                <option value="{{ $surah['nomor'] }}">{{ $surah['nama'] }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Bacaan Ayat</label>
                                                <div class="col-sm-4">
                                            <select class="select2" id="ayat1" name="ayat1" required>
                                                <option selected>--Ayat Pertama--</option>
                                                <optgroup label="Pilih Ayat">

                                                </optgroup>
                                            </select>
                                        </div>
                                        <label class="col-sm-2 control-label">Sampai Dengan</label>
                                        <div class="col-sm-4">
                                            <select class="select2" id="ayat2" name="ayat2" required>
                                                <option selected>--Ayat Akhir--</option>
                                                <optgroup label="Pilih Ayat">

                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Image</label>
                                    <div class="col-sm-10" >
                                        <div class="hover-ideas" id="exampleImage">

                                            <div class="d-flex justify-content-center" style="padding-left: 20%">
                                                <a href="javascript:void(0);" id="takeImage" title="Image 1">
                                                        <img class="" width="70%" src="{{ asset('assets/images/users/img5-md.jpg') }}" alt="image"/>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="center">
                                        <div id="my_photo_booth" class="main-section" style="display: none">
                                                <div id="my_camera"></div>
                                                <div id="pre_take_buttons">
                                                    <!-- This button is shown before the user takes a snapshot -->
                                                    <div class="pager wizard text-center">
                                                        <button type="button" id="preview_snapshot" class="btn btn-primary text-center">Take Snapshot</button>
                                                    </div>
                                                </div>
                                                <div id="post_take_buttons" style="display:none">
                                                    <!-- These buttons are shown after a snapshot is taken -->
                                                    <div class="pager wizard">
                                                        <button type="button" id="cancel_preview" class="btn btn-default">Take Another</button>
                                                        <button type="button" id="save_photo" class="btn btn-success">Save Image</button>
                                                    </div>
                                                    <input type="hidden" name="image" class="image-tag">
                                                </div>
                                        </div>
                                    </div>
                                        <div class="text-center">
                                            <div id="results"  style="display:none"></div>
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


        $('#takeImage').click(function () {
        $('#takeShot').val("Capture Image");
        $('#my_photo_booth').show();
        $('#exampleImage').hide();

		Webcam.set({
            width: 320,
            height: 240,
            dest_width: 640,
            dest_height: 480,
            image_format: 'jpeg',
            jpeg_quality: 90,
            force_flash: false,
            flip_horiz: true,
            fps: 45
		});
        Webcam.attach( '#my_camera' );

        var shutter = new Audio();
            shutter.autoplay = false;
            shutter.src = "{{ asset('sound/shutter.mp3') }}" || "{{ asset('sound/shutter.ogg') }}";

        $('#preview_snapshot').click(function () {
            try { shutter.currentTime = 0; } catch(e) {;} // fails in IE
                shutter.play();
                // freeze camera so user can preview current frame
                Webcam.freeze();

                // swap button sets
                document.getElementById('pre_take_buttons').style.display = 'none';
                document.getElementById('post_take_buttons').style.display = '';
        });

        $('#cancel_preview').click(function () {

                // cancel preview freeze and return to live camera view
                Webcam.unfreeze();

                // swap buttons back to first set
                document.getElementById('pre_take_buttons').style.display = '';
                document.getElementById('post_take_buttons').style.display = 'none';
        });

        $('#save_photo').click(function () {

                // actually snap photo (from preview freeze) and display it
                Webcam.snap( function(data_uri) {
                    // display results in page
                    console.log(data_uri);
                    $(".image-tag").val(data_uri);
                    document.getElementById('results').innerHTML =
                        '<img class="img-responsive mx-auto d-block" src="'+data_uri+'"/><br/></br>';

                    // shut down camera, stop capturing
                    Webcam.reset();

                    // show results, hide photo booth
                    document.getElementById('results').style.display = '';
                    document.getElementById('my_photo_booth').style.display = 'none';
                } );

        });
        });


    if ($("#formMengaji").length > 0) {
        $("#formMengaji").validate({
            submitHandler: function (form) {
                $.ajax({
                    data: $('#formMengaji').serialize(),
                    url: "{{ route('mengaji.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        window.location.href = "{{ route('mengaji.index') }}";
                    },
                    error: function (data) {
                        console.log('Error:', data.responseJSON.info);
                    }
                });
            }
        });
    }



            $(document).ready(function(){

            $('select[name="surat"]').on('change', function(){
                var id_surat = $(this).val();
                console.log(id_surat)
                    $.ajax({
                        url: id_surat+ '/getAyat',
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            console.log(data[0].nama)
                            $('select[name="ayat1"]').empty();
                            $('select[name="ayat2"]').empty();
                        $.each(data, function(key, value){

                            for (var i = 1; i <= data[0].ayat; i++) {
                                $("#ayat1").append( '<option value="'+i+'">Ayat ['+i+']</option>' );
                            }
                        });
                        $.each(data, function(key, value){

                            for (var i = 1; i <= data[0].ayat; i++) {
                                $("#ayat2").append( '<option value="'+i+'">Ayat ['+i+']</option>' );
                            }
                            });


                        }
                    });
            });

        });




    </script>


@endsection
