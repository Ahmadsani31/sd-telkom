@extends('layouts.app')

@section('content')
        <!--======== Page Title and Breadcrumbs Start ========-->
        <div class="top-page-header">

            <div class="page-title">
                <h2>Data Literasi</h2>
                <small>{{ Auth::user()->name }}</small>
            </div>


        </div>
        <!--======== Page Title and Breadcrumbs End ========-->

        <!--======== Table Content Start ========-->
        <div class="row">

            <div class="col-md-12">

                <div class="c_panel">

                    <div class="c_title">
                        <h2>Literasi</h2>
                        <ul class="nav navbar-right panel_options">
                            <li>
                                <a href="{{ route('ortu.home') }}" class="btn btn-sm btn-green-sea">Kembali</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table font-size-16">
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
                                            <td rowspan="2">{{ $rasi->user->name}}</td>
                                            <td>{{ $rasi->nama_buku }}</td>
                                            <td>{{ $rasi->halaman }}</td>
                                            <td>{{ $rasi->jumlah_paragraf }}</td>
                                            @if ($rasi->status == 0)
                                            <td><span class="label label-pomegranate">Belum Komfirmasi</span></td>
                                            @else
                                            <td><span class="label label-nephritis">Sudah Komfirmasi</span></td>
                                            @endif
                                            <td><video width="320" height="240" controls>
                                                <source src="{{ route('getVideoLiterasi', $rasi->id)  }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                                </video>
                                            </td>
                                            <td>
                                                <a href=""class="btn btn-success btn-sm"><i class="fa fa-check"></i> Komfirmasi</a>
                                            </td>
                                        </tr>
                                </tbody>

                                @endforeach
                                @if ($literasi->count() == 0)
                                <tr>
                                    <td colspan="5"> <span class="label label-info">Anak Belum ada Literasi hari ini</span> </td>
                                </tr>
                                @endif

                        </table>

                    </div><!--/.c_content-->

                </div><!--/.c_panels-->


            </div><!--/col-md-12-->

        </div><!--/row-->



@endsection
