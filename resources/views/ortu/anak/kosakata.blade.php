@extends('layouts.app')

@section('content')
        <!--======== Page Title and Breadcrumbs Start ========-->
        <div class="top-page-header">

            <div class="page-title">
                <h2>Data Kosa Kata</h2>
                <small>{{ Auth::user()->name }}</small>
            </div>


        </div>
        <!--======== Page Title and Breadcrumbs End ========-->

        <!--======== Table Content Start ========-->
        <div class="row">

            <div class="col-md-12">

                <div class="c_panel">

                    <div class="c_title">
                        <h2>Kosa Kata</h2>
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
                                                <a href=""class="btn btn-success btn-sm"><i class="fa fa-check"></i> Komfirmasi</a>
                                            </td>
                                        </tr>
                                </tbody>

                                @endforeach
                                @if ($kosakata->count() == 0)
                                <tr>
                                    <td colspan="5"> <span class="label label-info">Anak Belum ada Kosakata hari ini</span> </td>
                                </tr>
                                @endif

                        </table>

                    </div><!--/.c_content-->

                </div><!--/.c_panels-->


            </div><!--/col-md-12-->

        </div><!--/row-->



@endsection
