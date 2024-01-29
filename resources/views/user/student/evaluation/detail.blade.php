@extends('user.layout.master')
@section('role', 'Siswa')
@section('page title', 'Detail Evaluasi')
@section('title', 'Detail Evaluasi')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Nama : {{$user->name}}</h4>
                <p class="text-muted mb-4 font-14">Tanggal : {{ \Carbon\Carbon::parse($evaluation->date)->translatedFormat('d-F-Y') }}</p>

                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">Narasi</a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">Capaian</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                        <p class="font-14 mb-0">
                            {!!$evaluation->narasi!!}
                        </p>
                    </div>
                    <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                        <p class="font-14 mb-0">
                            {!!$evaluation->capaian!!}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div><!--end col-->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Gambar</h4>
                <div class="">
                    <img src="/storage/photos/{{$evaluation->photo}}" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>
    </div><!--end col-->
    
</div><!--end row-->
<style>
    @media (max-width: 767px) {
    .photo {
        max-width: 100%;
        height: auto;
    }
}

</style>
@endsection