@extends('user.layout.master')
@section('title', 'Dashboard Teacher')
@section('role', 'Guru')
@section('page title', 'Dashboard')
@section('content')
<style>
    .card.green {
        background: linear-gradient(150deg, #55f086, #00E2A3 100%);
        margin: 5pt;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Tambahkan properti box-shadow di sini */
    }
    .card.blue {
        background-color: #CCE1F0;
    }
    .card.green2 {
        background-color: #D7F2C7;
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
                @if($key == 0)
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
<div class="row mt-2">
    <div class="col-lg-6 col-sm-12">
        <div class="card blue">
            <div class="card-body text-center">
                <h6>Evaluasi Aspek Perkembangan Siswa</h6>
                <button type="button" class="btn btn-info waves-effect waves-light">
                    <a href={{route('connectPoint.listName')}} class="text-white">
                        Evaluasi <i class="fas fa-edit"></i>
                    </a>
                </button>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body">   
                <h6>Rekap Evaluasi Aspek Perkembangan Siswa</h6>    
                <div class="card-body table-responsive">
                    <div class="">
                        <table id="datatable2" class="table">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Siswa</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning waves-effect waves-light">
                                        <a class="text-white" href={{ url('teacher/date/'.$item->id) }}>
                                            <i class="fas fa-eye"></i>
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
    </div>
</div><!--end row-->
@endsection