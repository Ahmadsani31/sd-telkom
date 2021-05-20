<div class="c_content">
    <form class="form-horizontal" id="formMengaji3" name="formMengaji3">
        <input type="hidden" name="sholat" value="ashar">
        <input type="hidden" name="waktu_sholat" value="{{ $schedule['ashar']}}">
        <div class="modal" id="modalRating3" data-easein="bounceInDown" data-easeout="bounceOutDown" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="rating">
                                    <input type="radio" name="star" id="star111" data-id="star_id" value="5">
                                        <label for="star111">
                                            <img src="{{ asset('rating-emoji/sangat-senang.png') }}" width="100px">
                                            <h4 class="text-emoji">Very Happy</h4>
                                        </label>
                                    <input type="radio" name="star" id="star222" data-id="star_id" value="4">
                                        <label for="star222">
                                            <img src="{{ asset('rating-emoji/senang.png') }}" width="100px">
                                            <h4 class="text-emoji">Happy</h4>
                                        </label>
                                    <input type="radio" name="star" id="star333" data-id="star_id" value="3">
                                        <label for="star333">
                                            <img src="{{ asset('rating-emoji/polos.png') }}" width="100px">
                                            <h4 class="text-emoji">Nothing</h4>
                                        </label>
                                    <input type="radio" name="star" id="star444" data-id="star_id" value="2">
                                        <label for="star444">
                                            <img src="{{ asset('rating-emoji/sedih.png') }}" width="100px">
                                            <h4 class="text-emoji">Sad</h4>
                                        </label>
                                    <input type="radio" name="star" id="star555" data-id="star_id" value="1" checked>
                                        <label for="star555">
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
                <div class="hover-ideas" id="exampleImage3">

                    <div class="d-flex justify-content-center" style="padding-left: 20%">
                        <a href="javascript:void(0);" id="takeImage3" title="Image 1">
                                <img class="" width="70%" src="{{ asset('assets/images/users/img5-md.jpg') }}" alt="image"/>
                        </a>
                    </div>
                </div>
                <div class="center">
                <div id="my_photo_booth3" class="main-section" style="display: none">
                        <div id="my_camera3"></div>
                        <div id="pre_take_buttons3">
                            <!-- This button is shown before the user takes a snapshot -->
                            <div class="pager wizard text-center">
                                <button type="button" id="preview_snapshot3" class="btn btn-primary text-center">Take Snapshot</button>
                            </div>
                        </div>
                        <div id="post_take_buttons3" style="display:none">
                            <!-- These buttons are shown after a snapshot is taken -->
                            <div class="pager wizard">
                                <button type="button" id="cancel_preview3" class="btn btn-default">Take Another</button>
                                <button type="button" id="save_photo3" class="btn btn-success">Save Image</button>
                            </div>
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                </div>
            </div>
                <div class="text-center">
                    <div id="results3"  style="display:none"></div>
                </div>
            </div>
        </div>

        <div class="form-group" id="btn_save3" style="display: none">
            <div class="text-center">
                <button type="button" id="btnSaveMengaji3" class="btn btn-success btn-raised">Upload Image</button>
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


//webcam2
$('#takeImage3').click(function () {
	$('#takeShot3').val("Capture Image");
	$('#my_photo_booth3').show();
	$('#exampleImage3').hide();
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
	Webcam.attach('#my_camera3');
	var shutter = new Audio();
	shutter.autoplay = false;
	shutter.src = "{{ asset('sound/shutter.mp3') }}" || "{{ asset('sound/shutter.ogg') }}";
	$('#preview_snapshot3').click(function () {
		try {
			shutter.currentTime = 0;
		} catch (e) {;
		} // fails in IE
		shutter.play();
		// freeze camera so user can preview current frame
		Webcam.freeze();
		// swap button sets
		document.getElementById('pre_take_buttons3').style.display = 'none';
		document.getElementById('post_take_buttons3').style.display = '';
	});
	$('#cancel_preview3').click(function () {
		// cancel preview freeze and return to live camera view
		Webcam.unfreeze();
		// swap buttons back to first set
		document.getElementById('pre_take_buttons3').style.display = '';
		document.getElementById('post_take_buttons3').style.display = 'none';
	});
	$('#save_photo3').click(function () {
		$('#modalRating3').modal('show');
		// actually snap photo (from preview freeze) and display it
		Webcam.snap(function (data_uri) {
			// display results in page
			console.log(data_uri);
			$(".image-tag").val(data_uri);
			document.getElementById('results3').innerHTML = '<img class="img-responsive" src="' + data_uri + '"/><br/></br>';
			// shut down camera, stop capturing
			Webcam.reset();
			// show results, hide photo booth
			document.getElementById('results3').style.display = '';
			document.getElementById('my_photo_booth3').style.display = 'none';
		});
	});
});


// $('#btnSaveMengaji').click(function () {
//     $('#modalRating').modal('show');
// });

$('#btnSaveMengaji3').click(function (e) {
    e.preventDefault();

    $.ajax({
        data: $('#formMengaji3').serialize(),
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


    $('body').on('click', '#star111', function () {
        $('#modalRating3').modal('hide');
        $('#btn_save3').show();
    });
    $('body').on('click', '#star222', function () {
        $('#modalRating3').modal('hide');
        $('#btn_save3').show();
    });
    $('body').on('click', '#star333', function () {
        $('#modalRating3').modal('hide');
        $('#btn_save3').show();
    });
    $('body').on('click', '#star444', function () {
        $('#modalRating3').modal('hide');
        $('#btn_save3').show();
    });
    $('body').on('click', '#star555', function () {
        $('#modalRating3').modal('hide');
        $('#btn_save3').show();
    });

</script>
