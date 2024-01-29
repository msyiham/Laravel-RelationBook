@extends('user.layout.master')
@section('role', 'Guru')
@section('page title', 'List Bulan')
@section('title', 'List Bulan')
@section('content')
<div class="row">
    @if(count($months) > 0)
    @foreach ($months as $item)
        <div class="col-lg-2 col-sm-3 col-6">
            <div class="card text-white" style="background-color: #14c78b">
                <div class="card-body">
                    <blockquote class="card-bodyquote">
                        <a href="{{ route('teacher.listDate', $item->month) }}">
                            <h5>{{ \Carbon\Carbon::parse($item->month)->translatedFormat('F') }}</h5>
                        </a>
                        <div class="row justify-content-end">
                            <a href="{{ route('teacher.listDate', $item->month) }}"><button type="button" class="btn btn-secondary waves-effect">Lihat</button></a>
                        </div>
                    </blockquote>
                </div>
            </div>
        </div>
    @endforeach
    @else
        <p class="header-title ml-2">Saat ini belum ada data yang tersedia.</p>
    @endif


</div><!--end row-->
@endsection