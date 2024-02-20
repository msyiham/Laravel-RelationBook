@extends('admin.layout.master')
@section('title', 'Admin| Input Sekolah')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">School</a></li>
                </ol>
            </div>
            <h4 class="page-title">Daftar Sekolah</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="mt-2 ml-auto">
                <button type="button" class="btn btn-info waves-effect waves-dark mr-2">
                    <a class="text-white" href={{route('admin.school.create')}}>Tambahkan Sekolah <i class="fas fa-plus"></i></a>
                </button>
            </div>
            <div class="card-body table-responsive">
                <div class="">
                    <table id="" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Sekolah</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schools as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <button type="button" class="btn btn-warning waves-effect waves-light">
                                    <a class="text-white" href={{ url('admin/school/edit/'.$item->id) }}>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </button>
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#myModal{{$item->id}}"><i class="fas fa-trash"></i></button>
                                <!-- sample modal content -->
                                <div id="myModal{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$item->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myModalLabel{{$item->id}}">Konfirmasi Hapus Sekolah</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="mt-0">Anda yakin ingin menghapus sekolah <b>{{$item->name}}</b></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light">
                                                    <a class="text-white" href={{ url('admin/school/destroy/'.$item->id) }}>
                                                        Hapus
                                                    </a>
                                                </button>  
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->                              
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