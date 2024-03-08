@extends('user.layout.master')
@section('role', 'Guru')
@section('page title', 'Input Nilai')
@section('title', 'Input Nilai')
@section('content')
<form action={{route('connectPoint.store')}} method="post"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4>Nama Siswa: {{$selectedUser->name}}</h4>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <input class="form-control" type="hidden" value={{$selectedUser->id}} name="user_id">
    @foreach ($aspects as $index => $aspect)
    <input class="form-control" type="hidden" value={{$aspect->id}} name="aspect_id[{{ $index }}]">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title">{{$aspect->name}}</h5>
                    <input type="hidden" name="user_id" value={{$selectedUser->id}}>
                    <div class="table-responsive-sm">   
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col-8">Indikator</th>
                                <th scope="col">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 0;
                                    $colors = ['table-primary', '','table-secondary', '', 'table-success',];
                                @endphp
                                @foreach ($indicators as $key => $item)
                                @if ($item->aspect_id == $aspect->id)
                                <tr>
                                    <th scope="row">{{ $counter += 1 }}</th>
                                    <td class="">{{ $item->question }}</td>
                                    <td class="">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio{{ $key }}_ya" name="questions[{{ $item->id }}]" value="1" class="custom-control-input" {{ old("questions.$item->id") == "1" ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customRadio{{ $key }}_ya">Ya</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio{{ $key }}_tidak" name="questions[{{ $item->id }}]" value="0" class="custom-control-input" {{ old("questions.$item->id") == "0" ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customRadio{{ $key }}_tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                    @error("questions.$item->id")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group text-center">
                        <div class="mt-3">
                            <label for="example-text-input" class="form-label" for="name">Dokumentasi Aspek {{$aspect->name}}</label>
                            <div class="">
                                <input class="form-control" type="file" name="photos_{{ $index }}" value="{{ old('photos.'.$index) }}" multiple>
                            </div>
                            @error('photos_'.$index)
                                <div class="text-danger text-center">{{ $message }}</div>
                            @enderror                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
    @endforeach
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title">Untuk buku penghubung pada tanggal</h5>
                    <p>Bukan tanggal memasukkan, namun untuk buku tanggal berapa ini diinputkan</p>
                    <div class="form-group">
                        <input class="form-control" type="date" name="date" id="date" value="{{ old('date') }}">
                    </div>
                    <h5 class="header-title">Komentar dan Tanggapan</h5>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" placeholder="beri komentar" name="comment">{{ old('comment') }}</textarea>
                    </div>
                    @error('comment')
                        <div class="text-danger text-center">{{ $message }}</div>
                    @enderror
                    <div class="col-auto p-0">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</form>

@endsection