@extends('error')
@section('title', 'Not Found')
@section('content')
<div class="text-center">
    <img src="{{ URL::to('/')}}/user/images/logo-login.png" alt="">
    <h1>Mohon maaf, anda tidak boleh mengakses menu ini 😉</h1>
    <h5>error 403</h5>
</div>
@endsection