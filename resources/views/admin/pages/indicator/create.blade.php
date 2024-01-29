@extends('admin.layout.master')
@section('title', 'Admin| Input Indikator')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Indikator</a></li>
                    <li class="breadcrumb-item"><a href="#">Create</a></li>
                </ol>
            </div>
            <h4 class="page-title">Tambah Indikator</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action={{ route('admin.indicator.store') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label" for="name">Pertanyaan Indikator</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Isi Pertanyaan" id="example-text-input" name="question">
                        </div>
                        @error('question')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" name="save" class="btn btn-outline-info waves-effect waves-light mx-auto mt-2">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!--end row-->
@endsection