@extends('user.layout.master')
@section('role', 'Guru')
@section('page title', 'Rekap Evaluasi')
@section('title', 'List Nama')
@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body table-responsive">
                <div class="">
                    <table id="datatable2" class="table">
                        <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $key => $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>
                                <button type="button" class="btn btn-info waves-effect waves-light">
                                    <a href={{ url('teacher/show-evaluation/'.$item->id) }}>
                                        Lihat <i class="fas fa-eye"></i>
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