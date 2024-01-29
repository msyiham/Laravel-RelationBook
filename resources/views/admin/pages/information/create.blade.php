@extends('admin.layout.master')
@section('title', 'Admin| Input Sekolah')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Information</a></li>
                    <li class="breadcrumb-item"><a href="#">Create</a></li>
                </ol>
            </div>
            <h4 class="page-title">Tambah Informasi</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action={{ route('admin.information.store') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-center">
                        <div class="row mt-2 text-justify">
                            <label for="example-text-input" class="col-sm-2 col-form-label" for="name">Informasi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="text" id="summernote" placeholder="isi dengan text detail website"></textarea>
                            </div>
                            @error('text')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row text-left">
                            <label for="example-text-input" class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" placeholder="Isi Email untuk Contact" id="example-text-input" name="email">
                            </div>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row text-left mt-2">
                            <label for="example-text-input" class="col-sm-2 col-form-label" for="phone">Phone</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Isi Nomor Telepon untuk Contact" id="example-text-input" name="phone">
                            </div>
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row text-left mt-2">
                            <label for="example-text-input" class="col-sm-2 col-form-label" for="phone">File Buku</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="example-text-input" name="file">
                            </div>
                            @error('file')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" name="save" class="btn btn-outline-info waves-effect waves-light mx-auto mt-2">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!--end row-->
@endsection