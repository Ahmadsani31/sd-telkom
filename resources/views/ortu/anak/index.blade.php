@extends('layouts.app')

@section('content')
        <!--======== Page Title and Breadcrumbs Start ========-->
        <div class="top-page-header">

            <div class="page-title">
                <h2>Data Belajar Bahasa Harian</h2>
                <small>{{ Auth::user()->name }}</small>
            </div>


        </div>
        <!--======== Page Title and Breadcrumbs End ========-->

        <!--======== Table Content Start ========-->
        <div class="row">

            <div class="col-md-12">

                <div class="c_panel">

                    <div class="c_title">
                        <h2>Sholat</h2>
                        <ul class="nav navbar-right panel_options">
                            <li>
                                <a href="" class="btn btn-sm btn-green-sea">Input Data</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu</th>
                                <th>Anak</th>
                                <th>Sholat</th>
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
                                        <td>{{ $lat->created_at->format('D, d M y') }}</td>
                                        <td rowspan="2">{{ $lat->user_id}}</td>
                                        <td>{{ $lat->sholat }}</td>
                                        <td>{{ $lat->waktu_sholat }}</td>
                                        <td>
                                            <a href=""class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                        <ul class="nav navbar-right panel_options">
                            <li>
                                <a href="" class="btn btn-sm btn-green-sea">Input Data</a>
                            </li>
                        </ul>
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
                                @foreach ($literasi as $lat)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $lat->created_at->format('D, d M y') }}</td>
                                        <td rowspan="2">{{ $lat->user_id}}</td>
                                        <td>{{ $lat->sholat }}</td>
                                        <td>{{ $lat->waktu_sholat }}</td>
                                        <td>
                                            <a href=""class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                        <h2>Kosakata</h2>
                        <ul class="nav navbar-right panel_options">
                            <li>
                                <a href="" class="btn btn-sm btn-green-sea">Input Data</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Sholat</th>
                                <th>Waktu</th>

                                <th>Tanggal</th>
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
                                        <td>{{ $lat->created_at->format('D, d M y') }}</td>
                                        <td rowspan="2">{{ $lat->user_id}}</td>
                                        <td>{{ $lat->sholat }}</td>
                                        <td>{{ $lat->waktu_sholat }}</td>
                                        <td>
                                            <a href=""class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                        <h2>mengaji</h2>
                        <ul class="nav navbar-right panel_options">
                            <li>
                                <a href="" class="btn btn-sm btn-green-sea">Input Data</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Sholat</th>
                                <th>Waktu</th>

                                <th>Tanggal</th>
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
                                        <td>{{ $lat->created_at->format('D, d M y') }}</td>
                                        <td rowspan="2">{{ $lat->user_id}}</td>
                                        <td>{{ $lat->sholat }}</td>
                                        <td>{{ $lat->waktu_sholat }}</td>
                                        <td>
                                            <a href=""class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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


@endsection
