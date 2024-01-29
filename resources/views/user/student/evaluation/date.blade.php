@extends('user.layout.master')
@section('role', 'Siswa')
@section('page title', 'Evaluasi')
@section('title', 'List Tanggal')
@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body table-responsive">
                <div class="">
                    <table id="datatable2" class="table">
                        <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($evaluations as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}</td>
                            <td>
                                <img src="/storage/photos/{{$item->photo}}" alt="gambar tidak muncul" srcset="" height="100">
                            </td>
                            <td>
                                <button type="button" class="btn btn-info waves-effect waves-light">
                                    <a href={{ route('student.detailEvaluation', $item->id) }}>
                                        Detail
                                    </a>
                                </button>                             
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>           
            </div>
        </div>
    </div>
</div><!--end row-->
@endsection