@extends('user.layout.master')
@section('title', 'Dashboard | RELATION')
@section('content')
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h3>Haloo Selamat Datang di RELATION <i>(Report Book and Evaluation of Child Development)</i></h3>
                        <h5>Silahkan Login</h5>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb --> 
    
            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h3 class="card-title font-20 mt-0">Masuk sebagai Admin</h3>
                            <p class="card-text">Silahkan klik tombol masuk.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary">Masuk <i class="fas fa-sign-in-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h3 class="card-title font-20 mt-0">Masuk sebagai Guru</h3>
                            <p class="card-text">Silahkan klik tombol masuk.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary">Masuk <i class="fas fa-sign-in-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h3 class="card-title font-20 mt-0">Masuk sebagai Orang Tua</h3>
                            <p class="card-text">Silahkan klik tombol masuk.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary">Masuk <i class="fas fa-sign-in-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card text-dark">
                        <div class="card-body">
                            <h3 class="card-title font-20 mt-0">Tidak punya akun?</h3>
                            <p class="card-text">Silahkan daftar pada link dibawah</p>
                            <a href="{{ route('register') }}" class="btn btn-primary">Daftar <i class="fab fa-wpforms"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
@endsection