@extends('admin.layout.master')
@section('title', 'Admin| Input Sekolah')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                </ol>
            </div>
            <h4 class="page-title">Daftar User</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <h3 class="mx-auto">GURU</h3>
            <div class="card-body table-responsive">
                <div class="">
                    <table id="" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $key => $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#myModal{{$item->id}}">Hapus Akun</button>
                                    <!-- sample modal content -->
                                    <div id="myModal{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$item->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="myModalLabel{{$item->id}}">Konfirmasi Hapus Akun</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="mt-0">Anda yakin ingin menghapus user ini <b>{{$item->email}}</b></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                                                    <form id="deleteForm{{$item->id}}" method="post" action="{{ route('profile.destroyByAdmin') }}" class="p-6">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" name="user_id" value="{{$item->id}}">
                                                        <x-danger-button id="deleteButton{{$item->id}}" class="bg-danger ms-3">
                                                            {{ __('Hapus Akun') }}
                                                        </x-danger-button>
                                                    </form>
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
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <h3 class="mx-auto">ORANG TUA</h3>
            <div class="card-body table-responsive">
                <div class="">
                    <table id="" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $key => $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#myModal{{$item->id}}">Hapus Akun</button>
                                    <!-- sample modal content -->
                                    <div id="myModal{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$item->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="myModalLabel{{$item->id}}">Konfirmasi Hapus Akun</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="mt-0">Anda yakin ingin menghapus user ini <b>{{$item->email}}</b></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                                                    <form id="deleteForm{{$item->id}}" method="post" action="{{ route('profile.destroyByAdmin') }}" class="p-6">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" name="user_id" value="{{$item->id}}">
                                                        <x-danger-button id="deleteButton{{$item->id}}" class="bg-danger ms-3">
                                                            {{ __('Hapus Akun') }}
                                                        </x-danger-button>
                                                    </form>
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