<div class="c_content">
    <form class="form-horizontal" id="formMengaji5" name="formMengaji5">
        <input type="hidden" name="sholat" value="isya">
        <input type="hidden" name="waktu_sholat" value="{{ $schedule['isya']}}">
        <div class="modal" id="modalRating5" data-easein="bounceInDown" data-easeout="bounceOutDown" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="rating">
                                    <input type="radio" name="star" id="star11111" data-id="star_id" value="5">
                                        <label for="star11111">
                                            <img src="{{ asset('rating-emoji/sangat-senang.png') }}" width="100px">
                                            <h4 class="text-emoji">Very Happy</h4>
                                        </label>
                                    <input type="radio" name="star" id="star22222" data-id="star_id" value="4">
                                        <label for="star22222">
                                            <img src="{{ asset('rating-emoji/senang.png') }}" width="100px">
                                            <h4 class="text-emoji">Happy</h4>
                                        </label>
                                    <input type="radio" name="star" id="star33333" data-id="star_id" value="3">
                                        <label for="star33333">
                                            <img src="{{ asset('rating-emoji/polos.png') }}" width="100px">
                                            <h4 class="text-emoji">Nothing</h4>
                                        </label>
                                    <input type="radio" name="star" id="star44444" data-id="star_id" value="2">
                                        <label for="star44444">
                                            <img src="{{ asset('rating-emoji/sedih.png') }}" width="100px">
                                            <h4 class="text-emoji">Sad</h4>
                                        </label>
                                    <input type="radio" name="star" id="star55555" data-id="star_id" value="1" checked>
                                        <label for="star55555">
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
                <div class="hover-ideas" id="exampleImage5">

                    <div class="d-flex justify-content-center" style="padding-left: 20%">
                        <a href="javascript:void(0);" id="takeImage5" title="Image 1">
                                <img class="" width="70%" src="{{ asset('assets/images/users/img5-md.jpg') }}" alt="image"/>
                        </a>
                    </div>
                </div>
                <div class="center">
                <div id="my_photo_booth5" class="main-section" style="display: none">
                        <div id="my_camera5"></div>
                        <div id="pre_take_buttons5">
                            <!-- This button is shown before the user takes a snapshot -->
                            <div class="pager wizard text-center">
                                <button type="button" id="preview_snapshot5" class="btn btn-primary text-center">Take Snapshot</button>
                            </div>
                        </div>
                        <div id="post_take_buttons5" style="display:none">
                            <!-- These buttons are shown after a snapshot is taken -->
                            <div class="pager wizard">
                                <button type="button" id="cancel_preview5" class="btn btn-default">Take Another</button>
                                <button type="button" id="save_photo5" class="btn btn-success">Save Image</button>
                            </div>
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                </div>
            </div>
                <div class="text-center">
                    <div id="results5"  style="display:none"></div>
                </div>
            </div>
        </div>

        <div class="form-group" id="btn_save5" style="display: none">
            <div class="text-center">
                <button type="button" id="btnSaveMengaji5" class="btn btn-success btn-raised">Upload Image</button>
            </div>
        </div>

    </form>

</div><!--/.c_content-->
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


//webcam2
$('#takeImage5').click(function () {
	$('#takeShot5').val("Capture Image");
	$('#my_photo_booth5').show();
	$('#exampleImage5').hide();
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
	Webcam.attach('#my_camera5');
	var shutter = new Audio();
	shutter.autoplay = false;
	shutter.src = "{{ asset('sound/shutter.mp3') }}" || "{{ asset('sound/shutter.ogg') }}";
	$('#preview_snapshot5').click(function () {
		try {
			shutter.currentTime = 0;
		} catch (e) {;
		} // fails in IE
		shutter.play();
		// freeze camera so user can preview current frame
		Webcam.freeze();
		// swap button sets
		document.getElementById('pre_take_buttons5').style.display = 'none';
		document.getElementById('post_take_buttons5').style.display = '';
	});
	$('#cancel_preview5').click(function () {
		// cancel preview freeze and return to live camera view
		Webcam.unfreeze();
		// swap buttons back to first set
		document.getElementById('pre_take_buttons5').style.display = '';
		document.getElementById('post_take_buttons5').style.display = 'none';
	});
	$('#save_photo5').click(function () {
		$('#modalRating5').modal('show');
		// actually snap photo (from preview freeze) and display it
		Webcam.snap(function (data_uri) {
			// display results in page
			console.log(data_uri);
			$(".image-tag").val(data_uri);
			document.getElementById('results5').innerHTML = '<img class="img-responsive" src="' + data_uri + '"/><br/></br>';
			// shut down camera, stop capturing
			Webcam.reset();
			// show results, hide photo booth
			document.getElementById('results5').style.display = '';
			document.getElementById('my_photo_booth5').style.display = 'none';
		});
	});
});


// $('#btnSaveMengaji').click(function () {
//     $('#modalRating').modal('show');
// });



    if ($("#formMengaji5").length > 0) {
        $("#formMengaji5").validate({
            submitHandler: function (form) {
                $.ajax({
                    data: $('#formMengaji5').serialize(),
                    url: "{{ route('sholat.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                          window.location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data.responseJSON.info);
                    }
                });
            }
        });
    }


    $('body').on('click', '#star11111', function () {
        $('#modalRating5').modal('hide');
        $('#btn_save5').show();
    });
    $('body').on('click', '#star22222', function () {
        $('#modalRating5').modal('hide');
        $('#btn_save5').show();
    });
    $('body').on('click', '#star33333', function () {
        $('#modalRating5').modal('hide');
        $('#btn_save5').show();
    });
    $('body').on('click', '#star44444', function () {
        $('#modalRating5').modal('hide');
        $('#btn_save5').show();
    });
    $('body').on('click', '#star55555', function () {
        $('#modalRating5').modal('hide');
        $('#btn_save5').show();
    });

</script>
