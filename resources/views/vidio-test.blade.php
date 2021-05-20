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
                            <form class="form-horizontal" id="formKosakata" name="formKosakata" enctype="multipart/form-data">


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

    let recordingTimeMS = 10000; //video limit 5 sec
    var localstream;

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

                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                formData.append('video', recordedBlob);


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

                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                formData.append('video', recordedBlob);


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
