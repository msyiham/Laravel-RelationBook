@extends('admin.layout.master')
@section('title', 'Admin| Input Indikator')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Indicator</a></li>
                </ol>
            </div>
            <h4 class="page-title">Daftar Indikator</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="mt-2 ml-auto">
                <button type="button" class="btn btn-info waves-effect waves-dark mr-2">
                    <a href={{route('admin.indicator.create')}}>Tambahkan Indikator <i class="fas fa-plus"></i></a>
                </button>
            </div>
            <div class="card-body table-responsive">
                <div class="">
                    <table id="datatable2" class="table">
                        <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Pertanyaan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($indicator as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$item->question}}</td>
                            <td>
                                <button type="button" class="btn btn-warning waves-effect waves-light">
                                    <a href={{ url('admin/indicator/edit/'.$item->id) }}>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </button>
                                <button type="button" class="btn btn-danger waves-effect waves-light">
                                    <a href={{ url('admin/indicator/destroy/'.$item->id) }}>
                                        <i class="fas fa-trash"></i>
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