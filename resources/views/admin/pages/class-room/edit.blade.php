@extends('admin.layout.master')
@section('title', 'Admin| Edit Kelas')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">ClassRoom</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                </ol>
            </div>
            <h4 class="page-title">Edit Kelas</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action={{ url('admin/class-room/update/'.$classRoom->id) }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label" for="name">Nama Guru</label>
                        <div class="col-sm-10 mb-3">
                            <input class="form-control" type="text" placeholder="Isi Nama Guru" id="example-text-input" name="name" value="{{ $classRoom->name }}">
                        </div>
                        @error('name')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror
                        <label class="col-sm-2 col-form-label">Pilih Sekolah</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="school_id">
                                @foreach($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" name="save" class="btn btn-outline-info waves-effect waves-light mx-auto mt-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!--end row-->
@endsection