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
                                <a href="{{ route('kosakata.created') }}" class="btn btn-sm btn-green-sea">Input Data</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Bahasa</th>
                                <th>kosakata</th>
                                <th>Jumlah</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                                @php
                                    $no=1;
                                @endphp

                            @foreach ($data as $da)
                            @php
                                $nilai = explode(",",$da->kosakata);
                                $ni = count($nilai);
                            @endphp
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td><img src="{{ asset('images/kosakata/'.$da->image) }}" alt="" width="100px"> </td>
                                    <td>{{ $da->bahasa}}</td>
                                    <td>{{ $da->kosakata}}</td>
                                    <td>{{ $ni }}</td>
                                    <td>{{ $da->created_at->format('D, d M y') }}</td>
                                    <td>
                                        <a href="{{ route('kosakata.destroy',$da->id) }}"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
