@extends('layouts.app')

@section('content')

<!--======== Page Title and Breadcrumbs Start ========-->
        <div class="top-page-header" style="background-image: linear-gradient(0deg, #e5ffde 0%, #B5FFFC 100%);">

            <div class="page-title">
                <h2>Jadwal Sholat</h2>
                <small>Kerjakan lah sholat dengan tepat waktu untuk pahala yang besar.</small>
            </div>
            <div class="page-breadcrumb">
                <nav class="c_breadcrumbs">
                    <ul>
                        <li><a href="#">home</a></li>
                        <li class="active"><a href="#">Sholat Dzuhur</a></li>
                    </ul>
                </nav>
            </div>

        </div>
        <!--======== Page Title and Breadcrumbs End ========-->

        <!--======== Table Content Start ========-->
        <div class="row" >
            <div class="col-md-12">
                <div class="c_panel" style="background-image: linear-gradient(0deg, #e5ffde 0%, #B5FFFC 100%);">
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
                <div class="c_panel" style="background-image: linear-gradient(0deg, #e5ffde 0%, #B5FFFC 100%);">
                    <div class="c_title">
                        <h1><strong>Sholat Dzuhur</strong></h1>
                        <span class="text-center">please click shortcut image to take vidio</span>

                        <div class="clearfix"></div>
                    </div><!--/.c_title-->
                    <div class="c_content">
                        <form action="" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="nama_sholat" id="sholat" value="dzuhur">
                            <input type="hidden" name="star" id="star" value="">
                            <input type="hidden" name="waktu_sholat" id="waktu_sholat" value="{{ $schedule['dzuhur']}}">
                            @include('siswa.emoji')
                              <div class="form-group">
                                <div class="col-sm-12" >

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
                                            <a id="downloadButton" class="btn btn-primary" data-url="{{ route('sholat.store') }}">save</a>
                                            <a id="startButtonAgain" class="btn btn-success">Star Again</a>
                                        </div>
                                        </div>


                            </div>

                        </form>

                    </div><!--/.c_content-->
                </div><!--/.c_panel-->

            </div><!--/col-md-12-->

        </div><!--/row-->


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
        $('#star').val(rat);

    });

let exampleVidio = document.getElementById("exampleVidio");
let div_vidio = document.getElementById("div_vidio");

let preview = document.getElementById("preview");
let recording = document.getElementById("recording");
let startButton = document.getElementById("startButton");
let stopButton = document.getElementById("stopButton");
let downloadButton = document.getElementById("downloadButton");
let logElement = document.getElementById("log");
let recorded = document.getElementById("recorded");
let downloadLocalButton = document.getElementById("downloadLocalButton");

let recordingTimeMS = 2000; //video limit 5 sec
var localstream;


// nilai

var star = $('#star').val();
console.log(star)

var nama_sholat = $('#sholat').val();
var waktu_sholat = $('#waktu_sholat').val();


window.log = function (msg) {
//logElement.innerHTML += msg + "\n";
console.log(msg);
}

window.wait = function (delayInMS) {
return new Promise(resolve => setTimeout(resolve, delayInMS));
}

window.startRecording = function (stream, lengthInMS) {
    let recorder = new MediaRecorder(stream);
    let data = [];

    recorder.ondataavailable = event => data.push(event.data);
    recorder.start();
    log(recorder.state + " for " + (lengthInMS / 1000) + " seconds...");

    let stopped = new Promise((resolve, reject) => {
        recorder.onstop = resolve;
        recorder.onerror = event => reject(event.name);
    });

    let recorded = wait(lengthInMS).then(
        () => recorder.state == "recording" && recorder.stop()
    );

    return Promise.all([
        stopped,
        recorded
        ])
    .then(() => data);
}

window.stop = function (stream) {
    stream.getTracks().forEach(track => track.stop());
}


var formData = new FormData();
if (startButton) {
    startButton.addEventListener("click", function () {
    exampleVidio.style.display = "none";
    div_vidio.style.display = "block";
        startButton.innerHTML = "recording...";
        recorded.style.display = "none";
        stopButton.style.display = "inline-block";
        downloadButton.innerHTML = "rendering..";

        navigator.mediaDevices.getUserMedia({
            video: true,
            audio: true,


        }).then(stream => {
            preview.srcObject = stream;
            localstream = stream;
            //downloadButton.href = stream;
            preview.captureStream = preview.captureStream || preview.mozCaptureStream;
            return new Promise(resolve => preview.onplaying = resolve);
        }).then(() => startRecording(preview.captureStream(), recordingTimeMS))
        .then(recordedChunks => {
            let recordedBlob = new Blob(recordedChunks, {
            type: "video/webm/mp4"
            });
            recording.src = URL.createObjectURL(recordedBlob);
            var star = $('#star').val();
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            formData.append('video', recordedBlob);

            formData.append('star', star);
            formData.append('nama_sholat', nama_sholat);
            formData.append('waktu_sholat', waktu_sholat);


            // downloadLocalButton.href = recording.src;
            // downloadLocalButton.download = "RecordedVideo.webm";
            log("Successfully recorded " + recordedBlob.size + " bytes of " +
            recordedBlob.type + " media.");
            startButton.innerHTML = "Start";
            stopButton.style.display = "none";
            div_vidio.style.display = "none";
            recorded.style.display = "block";
            downloadButton.innerHTML = "Save";
            localstream.getTracks()[0].stop();
        })
        .catch(log);
    }, false);
}
if (startButtonAgain) {
    startButtonAgain.addEventListener("click", function () {
    exampleVidio.style.display = "none";
    div_vidio.style.display = "block";
    startButtonAgain.innerHTML = "recording...";
        recorded.style.display = "none";
        stopButton.style.display = "inline-block";
        downloadButton.innerHTML = "rendering..";

        navigator.mediaDevices.getUserMedia({
            video: true,
            audio: true,


        }).then(stream => {
            preview.srcObject = stream;
            localstream = stream;
            //downloadButton.href = stream;
            preview.captureStream = preview.captureStream || preview.mozCaptureStream;
            return new Promise(resolve => preview.onplaying = resolve);
        }).then(() => startRecording(preview.captureStream(), recordingTimeMS))
        .then(recordedChunks => {
            let recordedBlob = new Blob(recordedChunks, {
            type: "video/webm"
            });
            recording.src = URL.createObjectURL(recordedBlob);

            var star = $('#star').val();
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            formData.append('video', recordedBlob);

            formData.append('star', star);
            formData.append('nama_sholat', nama_sholat);
            formData.append('waktu_sholat', waktu_sholat);


            // downloadLocalButton.href = recording.src;
            // downloadLocalButton.download = "RecordedVideo.webm";
            log("Successfully recorded " + recordedBlob.size + " bytes of " +
            recordedBlob.type + " media.");
            startButtonAgain.innerHTML = "Start Again";
            stopButton.style.display = "none";
            div_vidio.style.display = "none";
            recorded.style.display = "block";
            downloadButton.innerHTML = "Save";
            localstream.getTracks()[0].stop();
        })
        .catch(log);
    }, false);
}
if (downloadButton) {
    downloadButton.addEventListener("click", function () {
        $.ajax({
        url: this.getAttribute('data-url'),
        method: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (res) {
            if(res.success){
                location.reload();
            }
            window.location.href = "{{ route('siswa.home') }}";
        }
        });
    }, false);
}
if (stopButton) {
    stopButton.addEventListener("click", function () {
        stop(preview.srcObject);
        startButton.innerHTML = "Start";
        stopButton.style.display = "none";
        recorded.style.display = "block";
        downloadButton.innerHTML = "Save";
        localstream.getTracks()[0].stop();
    }, false);
}
</script>
@endsection
