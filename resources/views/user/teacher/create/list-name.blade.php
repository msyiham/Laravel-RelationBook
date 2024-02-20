@extends('user.layout.master')
@section('role', 'Guru')
@section('page title', 'List Nama')
@section('title', 'List Nama')
@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h5>Daftar Nama Siswa</h5>
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
                        @foreach($students as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <button type="button" class="btn btn-warning waves-effect waves-light">
                                    <a class="text-white" href={{ url('teacher/input-point/'.$item->id) }} >
                                        Evaluasi
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