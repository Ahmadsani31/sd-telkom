@extends('layouts.app')

@section('content')
        <!--======== Page Title and Breadcrumbs Start ========-->
        <div class="top-page-header">

            <div class="page-title">
                <h2>Data Ngaji Harian</h2>
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
                                <a href="{{ route('mengaji.created') }}" class="btn btn-sm btn-green-sea">Input Data</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div><!--/.c_title-->

                    <div class="c_content">

                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Image</th>
                                <th>Surat</th>
                                <th>Ayat Awal</th>
                                <th>Ayat Akhir</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($ngaji as $data)


                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->created_at->format('D, d M y') }}</td>
                                        <td><img src="{{ asset('images/mengaji/'.$data->image) }}" alt="" width="100px"> </td>
                                        <td>{{ $data->nama_surat }}</td>
                                        <td>Ayat [{{ $data->ayat_awal }}]</td>
                                        <td>Ayat [{{ $data->ayat_akhir }}]</td>
                                        <td>
                                            <a href="{{ route('mengaji.destroy',$data->id) }}"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
