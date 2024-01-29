@extends('user.layout.master')
@section('role', 'Guru')
@section('page title', 'Input Nilai')
@section('title', 'Input Nilai')
@section('content')
<form action={{route('connectPoint.store')}} method="post">
    @csrf
    <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="header-title">Contextual classes </h5>
                        <h2>{{$selectedUser->name}}</h2>
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
                                        $colors = ['table-primary', '','table-secondary', '', 'table-success',];
                                    @endphp
                                    @foreach ($indicators as $key => $item)
                                    <tr class="{{ $colors[$key % count($colors)] }}">
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td class="">{{ $item->question }}</td>
                                        <td class="">
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio{{ $key }}_ya" name="questions[{{ $item->id }}]" value="1" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio{{ $key }}_ya">Ya</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio{{ $key }}_tidak" name="questions[{{ $item->id }}]" value="0" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio{{ $key }}_tidak">Tidak</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
                        <h5 class="header-title">Untuk buku penghubung pada tanggal</h5>
                        <p>Bukan tanggal memasukkan, namun untuk buku tanggal berapa ini diinputkan</p>
                        <div class="form-group">
                            <input class="form-control" type="date" name="date" id="date">
                        </div>
                        <h5 class="header-title">Komentar dan Tanggapan</h5>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="beri komentar" name="comment"></textarea>
                        </div>
                        <div class="col-auto p-0">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div> 
    </div><!--end row--> 
</form>
@endsection