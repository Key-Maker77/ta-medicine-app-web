@extends('layouts.login.app')
@section('content')
<div style="margin-left: 5px; margin-top: 10px">
    <center><img src="{{ URL::asset('images/SBS.png'); }}" width="250" height="250" alt="" /></center>
    <h1 style="margin-top: -30px; color: white;" class="text-center"><b>Selamat datang,</b></h1>
    <h4 style="color: white;" class="text-center">Masuk untuk melanjutkan</h4>
</div>
<div class="container">
    <br />
    <br />
    <div class="col-md-4 col-md-offset-4">
        @if(session('error'))
        <div class="alert alert-danger">
            <b>Opps!</b> {{session('error')}}
        </div>
        @endif
        <form action="{{ route('actionlogin') }}" method="post">
            @csrf
            <div class="form-group">
                <label style="color: white">Email</label>
                <input style="border-radius: 25px" type="text" name="email" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <label style="color: white">Password</label>
                <input style="border-radius: 25px" type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
            <div class="form-group mb-3" style="display: flex; justify-content: space-between;">
                <div class="checkbox">
                    <label style="color: white;"><input type="checkbox" name="remember"> Remember Me</label>
                </div>
            </div>

    </div>
    <center><button style="background-color: #27ECF3; color: white; border-radius: 25px; width: 25%" type="submit" class="btn btn-block">Masuk</button></center>
    <br>
    <br>
    <p style="color: white;" class="text-center">Belum Punya Akun? <a style="color: #393B39" href="/registeruser">Daftar</a></p>
    </form>
</div>
</div>
@endsection
