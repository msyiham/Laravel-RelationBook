@extends('admin.layout.master')
@section('title', 'Dashboard Admin')
@section('content')
<style>
    .card.green {
        background: linear-gradient(150deg, #55f086, #00E2A3 100%);
        margin: 5pt;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Tambahkan properti box-shadow di sini */
    }
</style>
<div class="row text-center">
    <div class="col-lg-12 col-sm-12">
        <div class="card green">
            <div class="mt-2 ml-2 text-white">
                <h3>RELATION</h3>
                <h6><i>Report Book and Evaluation of Child Development</i></h6>
            </div>
            <div class="card-body text-justify">
                @foreach ($information as $key => $item)
                @if($key == 2)
                <div class="text" style="font-size: 12pt">
                    {!!$item->text!!}
                </div>
                <div class="contact">
                    Adapun buku petunjuk penggunaan website dengan link download <button class="btn-info" style="border-radius: 5pt"><a href="{{ URL::to('/') }}/laravel2/storage/app/public/{{$item->file}}" class="text-white">disini</a></button><br><br>
                    <b style="font-size: 13pt">Contact Us</b><br>
                    <b>Email:</b> <a href="mailto:{{$item->email}}">{{$item->email}}</a><br>
                    <b>Phone:</b> <a href="https://wa.me/{{$item->phone}}">{{$item->phone}}</a><br>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div><!--end row-->
<div class="row mt-5">
    <div class="col-md-6">
        <div class="card card-body text-white card-info">
            <h3 class="card-title font-20 mt-0">Total User Terdaftar: {{$totalUsers-1}}</h3>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-sm-6 col-xs-6">
                <div class="card card-body text-white card-warning">
                    <h3 class="card-title font-20 mt-0">Guru: {{$teachersCount}}</h3>
                </div>
            </div>
            <div class="col-sm-6 col-xs-6">
                <div class="card card-body text-white card-danger">
                    <h3 class="card-title font-20 mt-0">Siswa: {{$studentsCount}}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-body text-white card-primary">
            <h3 class="card-title font-20 mt-0">Total Sekolah: {{$schoolsCount}}</h3>
            <a href={{route('admin.school.index')}} class="btn btn-info waves-effect waves-light">Lihat</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-body text-white card-primary">
            <h3 class="card-title font-20 mt-0">Total Kelas: {{$classroomsCount}}</h3>
            <a href={{route('admin.class-room.index')}} class="btn btn-info waves-effect waves-light">Lihat</a>
        </div>
    </div>
</div>
@endsection