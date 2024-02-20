@extends('admin.layout.master')
@section('title', 'Admin| Input Informations')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Information</a></li>
                </ol>
            </div>
            <h4 class="page-title">Daftar Informasi</h4>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body table-responsive">
                <div class="">
                    <table id="" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Peran</th>
                            <th>Text</th>
                            <th><i class="fas fa-phone"></i></th>
                            <th><i class="fas fa-envelope"></i></th>
                            <th>FIle</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($information as $key => $item)
                        <tr>
                            @if ($key == 0)
                                <td>Guru</td>
                            @elseif($key == 1)
                                <td>Orang Tua</td>
                            @else
                                <td>Admin</td>
                            @endif
                            
                            <td>{!!$item->text!!}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->email}}</td>
                            <td> <a href="/laravel2/storage/app/public/{{$item->file}}">File</a> </td>
                            <td>
                                <button type="button" class="btn btn-warning waves-effect waves-light">
                                    <a class="text-white" href={{ url('admin/information/edit/'.$item->id) }}>
                                        <i class="fas fa-edit"></i>
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