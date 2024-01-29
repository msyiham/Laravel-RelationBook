@extends('error')
@section('title', 'Not Found')
@section('content')
<div class="text-center">
    <img src="{{ URL::to('/')}}/user/images/logo-login.png" alt="">
    <h1>Mohon maaf, halaman tidak ditemukan 😪</h1>
    <h5>error 404</h5>
</div>
@endsection