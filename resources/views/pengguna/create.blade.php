@extends('layouts.app')

@section('content')


<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary text-center">Daftar Admin/Tambah Data</h6>
    </div>
    <form action="{{ route('pengguna.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div style="margin-left: 50px; margin-right: 50px; margin-top: 50px; margin-bottom:50px;">
        <div class="mb-2 row">
          <label class="col-sm-2 col-form-label text-black">Nama Admin</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name">
          </div>
        </div>
        <div class="mb-2 row">
          <label class="col-sm-2 col-form-label text-black">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email">
          </div>
        </div>
        <div class="mb-2 row">
          <label class="col-sm-2 col-form-label text-black">Password</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="password">
            <input type="hidden" class="form-control" name="role" value="admin">
          </div>
        </div>
        <br>
        <br>
        <a href="/penggunaadmin" type="submit" class="btn btn-danger" style="margin-left: 80%;">Batal</a>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
  </div>
</div>

@endsection