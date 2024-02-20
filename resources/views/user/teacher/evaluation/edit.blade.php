@extends('user.layout.master')
@section('title', 'Input Evaluasi')
@section('role', 'Guru')
@section('page title', 'Edit Evaluasi')
@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5>Nama: {{$user->name}}</h5>
                <form action={{ route('evaluations.update', $evaluation->id) }} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group text-center">
                        <input class="form-control" type="hidden" value={{$user->id}} name="user_id">
                        <div class="row">
                            <label for="example-text-input" class="col-sm-2 col-form-label" for="date">Tanggal</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" id="example-text-input" name="date" value={{$evaluation->date}}>
                            </div>
                            @error('date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mt-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label" for="name">Gambar</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="photo" value="{{ old('photo') }}">
                            </div>
                            @error('photo')
                            <div class="text-danger text-center">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mt-3 text-justify">
                            <label for="example-text-input" class="col-sm-2 col-form-label" for="name">Narasi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="narasi" id="summernote">{!!$evaluation->narasi!!}</textarea>
                            </div>
                            @error('narasi')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mt-3 text-justify">
                            <label for="example-text-input" class="col-sm-2 col-form-label" for="name">Capaian</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="capaian" id="summernote2">{!!$evaluation->capaian!!}</textarea>
                            </div>                            
                            @error('capaian')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" name="save" class="btn btn-outline-info waves-effect waves-light mx-auto mt-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!--end row-->
@endsection