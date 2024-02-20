@extends('admin.layout.master')
@section('title', 'Admin| Input Indikator')
@section('content')
<style>
    .green{
        background-color: #4dd48a;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Indicator</a></li>
                </ol>
            </div>
            <h4 class="page-title">Daftar Aspek</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="mt-2 ml-auto">
                <button type="button" class="btn btn-info waves-effect waves-dark mr-2">
                    <a class="text-white" href={{route('admin.aspect.create')}}>Tambahkan Aspek <i class="fas fa-plus"></i></a>
                </button>
            </div>
            <div class="card-body">
                <div id="accordion-2" role="tablist">
                    @foreach($aspects as $index => $aspect)
                        <div class="card green shadow-none border mb-0">
                            <div class="card-header d-flex justify-content-between align-items-center" role="tab" id="heading-{{ $index }}">
                                <h5 class="mb-0 mt-0 font-weight-normal">
                                    <a data-toggle="collapse" href="#collapse-{{ $index }}" aria-expanded="true" aria-controls="collapse-{{ $index }}" class="text-white">
                                        {{ $aspect->name }}
                                    </a>
                                </h5>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Edit nama aspek">
                                        <a href={{ url('admin/aspect/edit/'.$aspect->id) }}>
                                            <i class="fas fa-edit text-white"></i>
                                        </a>
                                    </button>
                                    <button type="button" class="btn waves-effect waves-light" data-toggle="modal" data-target="#myModal{{$aspect->id}}"><i class="fas fa-trash text-danger"></i></button>
                                    <!-- sample modal content -->
                                    <div id="myModal{{$aspect->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$aspect->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="myModalLabel{{$aspect->id}}">Konfirmasi Hapus Aspek</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="mt-0">Anda yakin ingin menghapus aspek <b>{{$aspect->name}}</b></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn btn-danger waves-effect waves-light">
                                                        <a class="text-white" href={{ url('admin/aspect/destroy/'.$aspect->id) }} >
                                                            Hapus
                                                        </a>
                                                    </button>  
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                            </div>
                            <div id="collapse-{{ $index }}" style="background-color:white" class="collapse" role="tabpanel" aria-labelledby="heading-{{ $index }}" data-parent="#accordion-2">
                                <div class="card-body">
                                    <div class="mt-2 mb-3 ml-auto">
                                        <button type="button" class="btn btn-info waves-effect waves-dark mr-2">
                                            <a class="text-white" href="{{ route('admin.indicator.create', ['aspect_id' => $aspect->id]) }}">Tambahkan Indikator <i class="fas fa-plus"></i></a>
                                        </button>
                                    </div>
                                    <div class="">
                                        <table id="" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Pertanyaan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($indicators as $indicator)
                                                @if($indicator->aspect_id == $aspect->id)
                                                <tr>
                                                    <td>{{$indicator->question}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning waves-effect waves-light" title="Edit indikator">
                                                            <a class="text-white" href={{ url('admin/indicator/edit/'.$indicator->id) }}>
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </button>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#myModal{{$indicator->id}}"><i class="fas fa-trash text-white"></i></button>
                                                        <!-- sample modal content -->
                                                        <div id="myModal{{$indicator->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$indicator->id}}" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title mt-0" id="myModalLabel{{$indicator->id}}">Konfirmasi Hapus Indikator</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="mt-0">Anda yakin ingin menghapus indikator <b>{{$indicator->question}}</b></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                                                                        <button type="button" class="btn btn-danger waves-effect waves-light">
                                                                            <a class="text-white" href={{ url('admin/indicator/destroy/'.$indicator->id) }} >
                                                                                Hapus
                                                                            </a>
                                                                        </button>  
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->                               
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->

@endsection