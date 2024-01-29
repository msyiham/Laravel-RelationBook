@extends('admin.layout.master')
@section('title', 'Admin| Input Sekolah')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                </ol>
            </div>
            <h4 class="page-title">Daftar User</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <h3 class="mx-auto">GURU</h3>
            <div class="card-body table-responsive">
                <div class="">
                    <table id="datatable" class="table">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $key => $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>           
            </div>
        </div>
    </div>
</div><!--end row-->
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <h3 class="mx-auto">SISWA</h3>
            <div class="card-body table-responsive">
                <div class="">
                    <table id="datatable2" class="table">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $key => $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>           
            </div>
        </div>
    </div>
</div><!--end row-->
@endsection