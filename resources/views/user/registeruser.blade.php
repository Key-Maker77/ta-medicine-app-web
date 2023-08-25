@extends('layouts.login.app')
@section('content')
    <div style="margin-left: 5px; margin-top: 10px">
    <center><img src="{{ URL::asset('images/SBS.png'); }}" width="250" height="250" alt="" /></center>
    <h1 style="margin-top: -30px; color: white;" class="text-center"><b>Daftar</b></h1>
    </div>
    <div class="container">
                <br/>
             <br/>
        <div class="col-md-4 col-md-offset-4">
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('registeruserstore') }}" method="post">
            @csrf
            <div class="form-group">
                    <label style="color: white">Nama</label>
                    <input style="border-radius: 25px" type="text" name="nama" class="form-control" placeholder="Nama" required="">
                </div>
                <div class="form-group">
                    <label style="color: white">Email</label>
                    <input style="border-radius: 25px" type="text" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label style="color: white">Password</label>
                    <input style="border-radius: 25px" type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                </div>
                <br>
                <br>
                <center><button style="background-color: #27ECF3; color: white; border-radius: 25px; width: 25%" type="submit" class="btn btn-block">Daftar</button></center>
                <br>
                <br>
                <p style="color: white;" class="text-center">Punya Akun? <a style="color: #393B39"href="/loginuser">Masuk</a></p>
            </form>
        </div>
    </div>
@endsection
