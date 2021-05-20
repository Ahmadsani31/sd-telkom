<div class="c_content">
    <form class="form-horizontal" id="formMengaji1" name="formMengaji1">
        <input type="hidden" name="sholat" value="subuh">
        <input type="hidden" name="waktu_sholat" value="{{ $schedule['subuh']}}">
        <div class="modal" id="modalRating1" data-easein="bounceInDown" data-easeout="bounceOutDown" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="rating">
                                    <input type="radio" name="star" id="star1" data-id="star_id" value="5">
                                        <label for="star1">
                                            <img src="{{ asset('rating-emoji/sangat-senang.png') }}" width="100px">
                                            <h4 class="text-emoji">Very Happy</h4>
                                        </label>
                                    <input type="radio" name="star" id="star2" data-id="star_id" value="4">
                                        <label for="star2">
                                            <img src="{{ asset('rating-emoji/senang.png') }}" width="100px">
                                            <h4 class="text-emoji">Happy</h4>
                                        </label>
                                    <input type="radio" name="star" id="star3" data-id="star_id" value="3">
                                        <label for="star3">
                                            <img src="{{ asset('rating-emoji/polos.png') }}" width="100px">
                                            <h4 class="text-emoji">Nothing</h4>
                                        </label>
                                    <input type="radio" name="star" id="star4" data-id="star_id" value="2">
                                        <label for="star4">
                                            <img src="{{ asset('rating-emoji/sedih.png') }}" width="100px">
                                            <h4 class="text-emoji">Sad</h4>
                                        </label>
                                    <input type="radio" name="star" id="star5" data-id="star_id" value="1" checked>
                                        <label for="star5">
                                            <img src="{{ asset('rating-emoji/sangat-sedih.png') }}" width="100px">
                                            <h4 class="text-emoji">Very Sad</h4>
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

        <div class="form-group">
            <div class="col-sm-12" >
                <div class="hover-ideas" id="exampleImage1">

                    <div class="d-flex justify-content-center" style="padding-left: 20%">
                        <a href="javascript:void(0);" id="takeImage1" title="Image 1">
                                <img class="" width="70%" src="{{ asset('assets/images/users/img5-md.jpg') }}" alt="image"/>
                        </a>
                    </div>
                </div>
                <div class="center">
                <div id="my_photo_booth1" class="main-section" style="display: none">
                        <div id="my_camera1"></div>
                        <div id="pre_take_buttons1">
                            <!-- This button is shown before the user takes a snapshot -->
                            <div class="pager wizard text-center">
                                <button type="button" id="preview_snapshot1" class="btn btn-primary text-center">Take Snapshot</button>
                            </div>
                        </div>
                        <div id="post_take_buttons1" style="display:none">
                            <!-- These buttons are shown after a snapshot is taken -->
                            <div class="pager wizard">
                                <button type="button" id="cancel_preview1" class="btn btn-default">Take Another</button>
                                <button type="button" id="save_photo1" class="btn btn-success">Save Image</button>
                            </div>
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                </div>
            </div>
                <div class="text-center">
                    <div id="results1"  style="display:none"></div>
                </div>
            </div>
        </div>

        <div class="form-group" id="btn_save" style="display: none">
            <div class="text-center">
                <button type="button" id="btnSaveMengaji1" class="btn btn-success btn-raised">Upload Image</button>
            </div>
        </div>

    </form>

</div><!--/.c_content-->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/webcamjs/webcam.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/webcamjs/webcam.min.js') }}"></script>

<script>
$(document).ready(function(){
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
});


$('#takeImage1').click(function () {
	$('#takeShot1').val("Capture Image");
	$('#my_photo_booth1').show();
	$('#exampleImage1').hide();
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
	Webcam.attach('#my_camera1');
	var shutter = new Audio();
	shutter.autoplay = false;
	shutter.src = "{{ asset('sound/shutter.mp3') }}" || "{{ asset('sound/shutter.ogg') }}";
	$('#preview_snapshot1').click(function () {
		try {
			shutter.currentTime = 0;
		} catch (e) {;
		} // fails in IE
		shutter.play();
		// freeze camera so user can preview current frame
		Webcam.freeze();
		// swap button sets
		document.getElementById('pre_take_buttons1').style.display = 'none';
		document.getElementById('post_take_buttons1').style.display = '';
	});
	$('#cancel_preview1').click(function () {
		// cancel preview freeze and return to live camera view
		Webcam.unfreeze();
		// swap buttons back to first set
		document.getElementById('pre_take_buttons1').style.display = '';
		document.getElementById('post_take_buttons1').style.display = 'none';
	});
	$('#save_photo1').click(function () {
		$('#modalRating1').modal('show');
		// actually snap photo (from preview freeze) and display it
		Webcam.snap(function (data_uri) {
			// display results in page
			console.log(data_uri);
			$(".image-tag").val(data_uri);
			document.getElementById('results1').innerHTML = '<img class="img-responsive" src="' + data_uri + '"/><br/></br>';
			// shut down camera, stop capturing
			Webcam.reset();
			// show results, hide photo booth
			document.getElementById('results1').style.display = '';
			document.getElementById('my_photo_booth1').style.display = 'none';
		});
	});
});

    $('#btnSaveMengaji1').click(function (e) {
        e.preventDefault();

        $.ajax({
            data: $('#formMengaji1').serialize(),
            url: "{{ route('sholat.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                console.log(data.id);

                window.location.reload();
            },
            error: function (data) {

            }
            });
    });


    $('body').on('click', '#star1', function () {
        $('#modalRating1').modal('hide');
        $('#btn_save').show();
    });
    $('body').on('click', '#star2', function () {
        $('#modalRating1').modal('hide');
        $('#btn_save').show();
    });
    $('body').on('click', '#star3', function () {
        $('#modalRating1').modal('hide');
        $('#btn_save').show();
    });
    $('body').on('click', '#star4', function () {
        $('#modalRating1').modal('hide');
        $('#btn_save').show();
    });
    $('body').on('click', '#star5', function () {
        $('#modalRating1').modal('hide');
        $('#btn_save').show();
    });


</script>
