@extends('layouts.app')

@section('content')
<div class="profile-page">

    <div class="row profile-cover">
        <div class="row">
            <div class="col-md-3 profile-image">
                <div class="profile-image-container">
                    <img src="{{ asset('assets/images/users/image-user.jpg') }}" alt="image"/>
                </div>
            </div>
            <div class="col-md-12 profile-info">
                <div class=" profile-info-value">
                    <h3>800</h3>
                    <p>Followers</p>
                </div>
                <div class=" profile-info-value">
                    <h3>1520</h3>
                    <p>Friends</p>
                </div>
                <div class=" profile-info-value">
                    <h3>340</h3>
                    <p>Photos</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 profile-under-cover-style">
            &nbsp;
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row margin-top-70">
        <div class="top-page-header">

            <div class="page-title">
                <h2>Nama Anak</h2>
                <small>{{ Auth::user()->name }}</small>
            </div>


        </div>
        <!--End Left Sidebar-->
        <div class="row">

            <div class="col-md-12">

                <div class="c_panel">

                    <div class="c_title">
                        <h2>Sholat</h2>

                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table font-size-18">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu</th>
                                <th>Anak</th>
                                <th>Sholat</th>
                                <th>Jadwal Sholat</th>
                                <th>Waktu Sholat</th>
                                <th>Status</th>
                                <th>Vidio</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($sholat as $lat)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ \Carbon\Carbon::parse($lat->created_at)->format('d-m-Y') }}</td>
                                        <td rowspan="2">{{ $lat->name}}</td>
                                        <td>{{ $lat->nama_sholat }}</td>
                                        <td>{{ $lat->jadwal_sholat }}</td>
                                        <td>{{ $lat->waktu_sholat }}</td>
                                        @if ($lat->status == 0)
                                        <td><span class="label label-pomegranate">Belum Komfirmasi</span></td>
                                        @else
                                        <td><span class="label label-nephritis">Sudah Komfirmasi</span></td>
                                        @endif
                                        <td><video width="320" height="240" controls>
                                            <source src="{{ route('getVideoSholat', $lat->id)  }}" type="video/mp4">
                                          Your browser does not support the video tag.
                                      </video></td>

                                        <td>
                                            <a href=""class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Komfirmasi</a>
                                        </td>
                                    </tr>
                                </tbody>

                                @endforeach


                        </table>
                        {{ $sholat->links() }}

                    </div><!--/.c_content-->

                </div><!--/.c_panels-->


            </div><!--/col-md-12-->

        </div><!--/row-->
        <div class="row">

            <div class="col-md-12">

                <div class="c_panel">

                    <div class="c_title">
                        <h2>Mengaji</h2>

                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu</th>
                                <th>Nama</th>
                                <th>Surat</th>
                                <th>Ayat</th>
                                <th>Ayat</th>
                                <th>Vidio</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($mengaji as $ngaji)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $ngaji->created_at }}</td>
                                        <td rowspan="2">{{ $lat->name}}</td>
                                        <td>{{ $ngaji->nama_surat }}</td>
                                        <td>{{ $ngaji->ayat_awal }}</td>
                                        <td>{{ $ngaji->ayat_akhir }}</td>
                                        <td>{{ $ngaji->vidio_ngaji }}</td>
                                        <td>
                                            <a href=""class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Komfirmasi</a>
                                        </td>
                                    </tr>
                                </tbody>

                                @endforeach


                        </table>
                        {{ $mengaji->links() }}

                    </div><!--/.c_content-->

                </div><!--/.c_panels-->


            </div><!--/col-md-12-->

        </div><!--/row-->
        <div class="row">

            <div class="col-md-12">

                <div class="c_panel">

                    <div class="c_title">
                        <h2>Literasi</h2>

                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu</th>
                                <th>Anak</th>
                                <th>Buku</th>
                                <th>Halaman</th>
                                <th>Paragraf</th>
                                <th>Vidio</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($literasi as $rasi)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $rasi->created_at }}</td>
                                        <td rowspan="2">{{ $rasi->name}}</td>
                                        <td>{{ $rasi->nama_buku }}</td>
                                        <td>{{ $rasi->halaman }}</td>
                                        <td>{{ $rasi->jumlah_paragraf }}</td>
                                        <td>{{ $rasi->vidio }}</td>
                                        <td>
                                            <a href=""class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Komfirmasi</a>
                                        </td>
                                    </tr>
                                </tbody>

                                @endforeach


                        </table>
                        {{ $literasi->links() }}

                    </div><!--/.c_content-->

                </div><!--/.c_panels-->


            </div><!--/col-md-12-->

        </div><!--/row-->
        <div class="row">

            <div class="col-md-12">

                <div class="c_panel">

                    <div class="c_title">
                        <h2>Kosakata</h2>

                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu</th>
                                <th>Anak</th>
                                <th>Bahasa</th>
                                <th>Arti</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($kosakata as $kata)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $kata->created_at }}</td>
                                        <td rowspan="2">{{ $kata->name}}</td>
                                        <td>{{ $kata->bahasa }}</td>
                                        <td>{{ $kata->arti }}</td>
                                        <td>
                                            <a href=""class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Komfirmasi</a>
                                        </td>
                                    </tr>
                                </tbody>

                                @endforeach


                        </table>
                        {{ $kosakata->links() }}

                    </div><!--/.c_content-->

                </div><!--/.c_panels-->


            </div><!--/col-md-12-->

        </div><!--/row-->

    </div>

</div>

@endsection
