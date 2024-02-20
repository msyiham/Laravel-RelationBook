@extends('user.layout.master')
@section('role', 'Guru')
@section('page title', 'List Tanggal')
@section('title', 'List Tanggal')
@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body table-responsive">
                <div class="">
                    <table id="datatable2" class="table">
                        <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Hari, Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($connectPoints as $key => $connectPoint)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($connectPoint->date)->translatedFormat('l, d-M-Y') }}</td>
                            <td>
                                <button type="button" class="btn btn-info waves-effect waves-light">
                                    <a class="text-white" href={{ route('teacher.detailPoint', $connectPoint->id) }}>
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </button>                             
                            </td>
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