@extends('user.layout.master')
@section('page title', 'Penilaian')
@section('role', 'Siswa')
@section('title', 'Penilaian')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if ($connectPoint)
        <div class="card card-body">
            <h3 class="card-title font-20 mt-0">Terakhir dinilai oleh guru anda</h3>
            <p class="card-text">tanggal penilaian : {{$connectPoint->date}}</p>
            <a href={{ route('student.detail', $connectPoint->id) }} class="btn btn-success waves-effect waves-light">Lihat</a>
        </div>
        <b style="font-size: 15pt">List Bulan</b>
        <div class="row">
            @foreach ($months as $item)
            <div class="col-lg-2 col-sm-3 col-6">
                <div class="card text-white" style="background-color: #14c78b">
                    <div class="card-body">
                        <blockquote class="card-bodyquote">
                            <a href="{{ route('student.listDate', $item->month) }}">
                                <h5>{{ \Carbon\Carbon::parse($item->month)->translatedFormat('F') }}</h5>
                            </a>
                            <div class="row justify-content-end">
                                <a href="{{ route('student.listDate', $item->month) }}"><button type="button" class="btn btn-secondary waves-effect">Lihat</button>
                            </div>
                        </blockquote>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--end row-->
        @else
         <p>Belum terdapat penilaian dari guru</p>
        @endif
    </div>
</div>

@endsection