@extends('user.layout.master')
@section('role', 'Guru')
@section('page title', 'Detail Nilai')
@section('title', 'detail point')
@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5>Nama Siswa: {{ $user->name }}</h5>
                <p>Evaluasi pada {{ \Carbon\Carbon::parse($connectPoint->date)->translatedFormat('l, d-M-Y') }}</p>
            </div>
        </div>
    </div>

</div>
@foreach ($aspects as $index => $aspect)
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="header-title">{{$aspect->name}}</h5>
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col-8">Indikator</th>
                            <th scope="col">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $colors = ['table-primary', '','table-secondary', '', 'table-success',];
                                $indicatorCounter = 0; // Counter for indicators
                            @endphp
                            @foreach ($points as $key => $point)
                            @if ($point->indicator->aspect_id == $aspect->id)
                                <tr>
                                    <th scope="row">{{ $indicatorCounter + 1 }}</th>
                                    <td class="">{{ $point->indicator->question }}</td>
                                    <td class="">
                                        @if ($point->status === 1)
                                            <b style="font-weight: bold;">Iya</b>
                                        @else
                                            <b style="font-weight: bold;">Tidak</b>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $indicatorCounter++;
                                @endphp
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @foreach ($evaluation as $item)
    @if ($item->aspect_id == $aspect->id)
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Dokumentasi</h4>
                <div class="">
                    <img src="/laravel2/storage/app/public/photo/{{$item->photo}}" class="img-fluid" alt="Responsive image" width="300dvh">
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach


</div><!--end row-->
@endforeach

<div class="col-lg-12 col-sm-12">
    <div class="card">
        <div class="card-body">
            <h5 class="header-title">Komentar dan Tanggapan</h5>
            @foreach ($comment as $item)
                @if ($item->role == 2)
                    <div class="card col-lg-6 col-sm-10 bg-success">
                        <p style="font-size: 13pt">{{$item->comment}}</p>
                        @if ($item->status == 0)
                            <p class="text-white ml-auto">Belum dibaca</p>
                        @elseif ($item->status == 1)
                            <p class="text-white ml-auto">Sudah dibaca</p>
                        @endif
                    </div>
                @elseif ($item->role == 3)
                <div class="card col-lg-6 col-sm-10 bg-info ml-3">
                    <p style="font-size: 13pt">{{$item->comment}}</p>
                    @if ($item->status == 0)
                    <a href={{ route('comment.tandai-dibaca.guru', ['commentId' => $item->id]) }} class="text-white ml-auto">Tandai sudah dbaca</a>
                    @endif
                </div>
                @endif
            @endforeach            
        </div>
    </div>
</div>
@endsection