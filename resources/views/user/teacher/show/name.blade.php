@extends('user.layout.master')
@section('role', 'Guru')
@section('page title', 'List Nama')
@section('title', 'List Nama')
@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="mt-2 ml-2">
                <h5>{{ \Carbon\Carbon::parse($date)->translatedFormat('l, d-m-Y') }}</h5>
                <p>Berikut adalah nama siswa yang sudah diberi nilai pada tanggal diatas.</p>
            </div>
            <div class="card-body table-responsive">
                <div class="">
                    <table id="datatable2" class="table">
                        <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Siswa</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($connectPoints as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <button type="button" class="btn btn-info waves-effect waves-light">
                                    <a href={{ route('teacher.detailPoint', $item->id) }}>
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