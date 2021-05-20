<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up SD-TELKOM</title>
    <link href="{{ asset('assets/css/global-plugins.css') }}" rel="stylesheet">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('style/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('style/css/style.css') }}">
</head>
<style>
    .select {
  width: 100%;
  display: block;
  border: none;
  border-bottom: 1px solid #999;
  padding: 6px 30px;
  font-family: Poppins;
  box-sizing: border-box;
        background-color: #fff;
}

</style>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">
                            @csrf
                            @if(session('errors'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>Something it's wrong!</strong> You should check in on some of those fields below.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                              </div>
                            @endif
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-nature-people"></i></label>
                                <select name="level" class="select" >
                                  <option selected disabled>--Chose one--</option>
                                  <option value="siswa">Siswa</option>
                                  <option value="guru">Guru</option>
                                  <option value="ortu">Orang Tua Murid</option>
                                </select>
                            </div>
                            <div id="siswa" style="display: none">
                                <hr>
                                <div class="form-group">
                                    <span style="font-weight: 700">Data Tambahan</span>
                                </div>
                                <div class="form-group">
                                    <label ><i class="zmdi zmdi-shield-security"></i></label>
                                    <input type="text" @error('siswa_nisn') is-invalid @enderror" name="siswa_nisn" value="{{ old('siswa_nisn') }}" autocomplete="nisn" placeholder="Your NISN"/>
                                </div>
                                <div class="form-group">
                                    <label><i class="zmdi zmdi-phone"></i></label>
                                    <input type="number" @error('siswa_telpon') is-invalid @enderror" name="siswa_telpon" autocomplete="siswa_telpon" placeholder="No Telpon"/>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label ><i class="zmdi zmdi-info"></i></label>
                                        <input type="text" @error('lokal') is-invalid @enderror" name="lokal" value="{{ old('lokal') }}" autocomplete="lokal" placeholder="Lokal"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label ><i class="zmdi zmdi-info"></i></label>
                                        <input type="text" @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}" autocomplete="kelas" placeholder="Kelas"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-male-female"></i></label>
                                <select name="gender" class="select" >
                                  <option selected disabled>--Jenis Kelamin--</option>
                                  <option value="L">Laki-laki</option>
                                  <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label ><i class="zmdi zmdi-shield-security"></i></label>
                                <input type="text" @error('siswa_alamat') is-invalid @enderror" name="siswa_alamat" autocomplete="siswa_alamat" placeholder="Alamat"/>

                            </div>
                            </div>
                            <div id="ortu" style="display: none">
                                <hr>
                                <div class="form-group">
                                    <span style="font-weight: 700">Data Tambahan</span>
                                </div>
                                <div class="form-group">
                                    <label for="pass"><i class="zmdi zmdi-male-female"></i></label>
                                    <select name="siswa_id" class="select" >
                                      <option selected disabled>--Nama Anak--</option>
                                      @foreach ($data as $key => $item)
                                      <option value="{{ $key }}">{{ $item }}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pass"><i class="zmdi zmdi-phone"></i></label>
                                    <input type="number" @error('ortu_telpon') is-invalid @enderror" name="ortu_telpon" autocomplete="ortu_telpon" placeholder="No Telpon"/>
                                </div>
                            </div>
                            <div id="guru" style="display: none">
                                <hr>
                                <div class="form-group">
                                    <span style="font-weight: 700">Data Tambahan</span>
                                </div>
                                <div class="form-group">
                                    <label ><i class="zmdi zmdi-shield-security"></i></label>
                                    <input type="text" @error('guru_nisn') is-invalid @enderror" name="guru_nisn" value="{{ old('guru_nisn') }}" autocomplete="nisn" placeholder="Your NISN"/>
                                </div>
                                <div class="form-group">
                                    <label ><i class="zmdi zmdi-shield-security"></i></label>
                                    <input type="text" @error('guru_alamat') is-invalid @enderror" name="guru_alamat" autocomplete="guru_alamat" placeholder="Alamat"/>

                                </div>

                                <div class="form-group">
                                    <label><i class="zmdi zmdi-phone"></i></label>
                                    <input type="number" @error('guru_telpon') is-invalid @enderror" name="guru_telpon" autocomplete="guru_telpon" placeholder="No Telpon"/>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term" style="font-weight: 400">
                                    <span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                            <button type="button" class="btn btn-green btn-raised rippler rippler-default" data-toggle="modal" data-target="#anim1">LUNCH BOUNCE IN/OUT MODAL</button>


                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('style/images/signup-image.jpg') }}" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!--****** Start Bounce In/Out Modal ******-->

    <!-- JS -->
    <script src="{{ asset('assets/js/global-plugins.js') }}"></script>

    <script src="{{ asset('assets/js/theme.js') }}" type="text/javascript" ></script>

    <script src="{{ asset('style/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('style/js/main.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            new WOW().init();


            App.initModal();

        });

        $( ".target" ).change(function() {
  alert( "Handler for .change() called." );
});

$(document).ready(function(){

$('select[name="level"]').on('change', function(){
    var level = $(this).val();
console.log(level)
    if (level == 'guru') {
        $('#guru').show();
		$('#ortu').hide();
		$('#siswa').hide();
    } else if (level == 'ortu') {
		$('#ortu').show();
		$('#siswa').hide();
        $('#guru').hide();

    }else if (level == 'siswa') {
		$('#siswa').show();
		$('#ortu').hide();
        $('#guru').hide();
    }



});

});

$('#takeImage2').click(function () {
    $('#anim1').modal('show');

});

    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
