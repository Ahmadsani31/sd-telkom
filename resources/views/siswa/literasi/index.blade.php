@extends('layouts.app')

@section('content')
        <!--======== Page Title and Breadcrumbs Start ========-->
        <div class="top-page-header">

            <div class="page-title">
                <h2>Data Membaca Komik/Novel Harian</h2>
                <small>{{ Auth::user()->name }}</small>
            </div>


        </div>
        <!--======== Page Title and Breadcrumbs End ========-->

        <!--======== Table Content Start ========-->
        <div class="row">

            <div class="col-md-12">

                <div class="c_panel">

                    <div class="c_title">
                        <h2>General Table</h2>
                        <ul class="nav navbar-right panel_options">
                            <li>
                                <a href="{{ route('literasi.created') }}"  class="btn btn-sm btn-green-sea">Input Data</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Cover Buku</th>
                                <th>Nama Buku</th>
                                <th>Halaman</th>
                                <th>Paragraf Awal</th>
                                <th>Paragraf Akhir</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                                @php
                                    $no=1;
                                @endphp


                                @foreach ($data as $da)


                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td><img src="{{ asset('images/literasi/'.$da->cover_buku) }}" alt="" width="100px"> </td>
                                        <td>{{ $da->nama_buku}}</td>

                                        <td>{{ $da->halaman }}</td>
                                        <td>Paragraf [{{ $da->paragraf_awal }}]</td>
                                        <td>Paragraf [{{ $da->paragraf_akhir }}]</td>
                                        <td>{{ $da->created_at->format('D, d M y') }}</td>
                                        <td>
                                            <a href="{{ route('literasi.destroy',$da->id) }}"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>

                                @endforeach

                        </table>


                    </div><!--/.c_content-->

                </div><!--/.c_panels-->


            </div><!--/col-md-12-->

        </div><!--/row-->
        <script src="{{ asset('assets/js/jquery.js') }}"></script>

        <script>

        $('#coba').click(function () {

            var url = window.location.href="{{ route('literasi.index') }}"; // get the current url of page into variable
            if (url.indexOf('?') > -1) { // url has a '?'
                if(url.indexOf('reloaded') < 0){ // url does not have the text 'reloaded'
                    url = url + "&reloaded=true"; // add the word 'reloaded' to url
                    window.location = url; // "reload" the page
                }
            }

        });


        </script>
@endsection
