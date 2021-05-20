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
                        <h2>General Table</h2>
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
                                        <td>{{ $da->nama_buku}}</td>

                                        @foreach ($mengaji as $ngaji)
                                        <td>{{ $ngaji->nama_surat }}</td>
                                @endforeach
                                @foreach ($sholat as $lat)
                                <td>{{ $lat->sholat }}</td>
                        @endforeach
                                        <td>Paragraf [{{ $da->paragraf_awal }}]</td>
                                        <td>Paragraf [{{ $da->paragraf_akhir }}]</td>
                                        <td>{{ $da->created_at->format('D, d M y') }}</td>
                                        <td>
                                            <a href=""class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>

                                @endforeach


                        </table>


                    </div><!--/.c_content-->

                </div><!--/.c_panels-->


            </div><!--/col-md-12-->

        </div><!--/row-->

@endsection
