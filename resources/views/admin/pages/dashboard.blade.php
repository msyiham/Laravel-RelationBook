@extends('admin.layout.master')
@section('title', 'Dashboard Admin')
@section('content')

<div class="row mt-5">
    <div class="col-md-6">
        <div class="card card-body text-white card-info">
            <h3 class="card-title font-20 mt-0">Total User Terdaftar: {{$totalUsers-1}}</h3>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-sm-6 col-xs-6">
                <div class="card card-body text-white card-warning">
                    <h3 class="card-title font-20 mt-0">Guru: {{$teachersCount}}</h3>
                </div>
            </div>
            <div class="col-sm-6 col-xs-6">
                <div class="card card-body text-white card-danger">
                    <h3 class="card-title font-20 mt-0">Siswa: {{$studentsCount}}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-body text-white card-primary">
            <h3 class="card-title font-20 mt-0">Total Sekolah: {{$schoolsCount}}</h3>
            <a href={{route('admin.school.index')}} class="btn btn-info waves-effect waves-light">Lihat</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-body text-white card-primary">
            <h3 class="card-title font-20 mt-0">Total Kelas: {{$classroomsCount}}</h3>
            <a href={{route('admin.class-room.index')}} class="btn btn-info waves-effect waves-light">Lihat</a>
        </div>
    </div>
</div>
@endsection