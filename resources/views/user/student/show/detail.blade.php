@extends('user.layout.master')
@section('title', 'detail point')
@section('role', 'Siswa')
@section('page title', 'Detail')
@section('content')
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <p>Tanggal: {{ $connectPoint->date }}</p>
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col-8">Indikator</th>
                            <th scope="col">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $colors = ['table-primary', '','table-secondary', '', 'table-success',];
                            @endphp
                            @foreach ($points as $key => $point)
                            <tr class="{{ $colors[$key % count($colors)] }}">
                                <th scope="row">{{ $key + 1 }}</th>
                                <td class="">{{ $indicators->where('id', $point->number)->first()->question }}</td>
                                <td class="">
                                    @if ($point->status === 1)
                                        <i style="font-size: 15pt" class="fas fa-check" ></i>
                                    @else
                                        <i style="font-size: 15pt" class="fas fa-times"></i>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="ml-2">
                <b>Keterangan</b>
                <p><i style="font-size: 10pt" class="fas fa-check" ></i> : Iya<br><i style="font-size: 10pt" class="fas fa-times" ></i> : Tidak</p>
            </div> --}}
        </div>
    </div>

    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="header-title">Komentar dan Tanggapan</h5>
                @foreach ($comment as $item)
                    @if ($item->role == 2)
                        <div class="card col-lg-6 col-sm-10 bg-success">
                            <p style="font-size: 13pt">{{$item->comment}}</p>
                            @if ($item->status == 0)
                                <a href={{ route('comment.tandai-dibaca.siswa', ['commentId' => $item->id]) }} class="text-white ml-auto">Tandai sudah dbaca</a>
                            @endif
                        </div>
                    @elseif ($item->role == 3)
                    <div class="card col-lg-6 col-sm-10 bg-info ml-3">
                        <p style="font-size: 13pt">{{$item->comment}}</p>
                        @if ($item->status == 0)
                            <p class="text-white ml-auto">Belum dibaca</p>
                        @elseif ($item->status == 1)
                            <p class="text-white ml-auto">Sudah dibaca</p>
                        @endif
                    </div>
                    @endif
                @endforeach
                <form action="{{ route('simpan.tanggapan') }}" method="post">
                    @csrf
                    <!-- Tambahkan input type hidden di sini -->
                    <input type="hidden" name="connect_id" value={{$connectPoint->id}}>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" placeholder="Beri tanggapan" name="comment"></textarea>
                    </div>
                    <div class="col-auto p-0">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>                    
            </div>
        </div>
    </div>
</div><!--end row-->
@endsection