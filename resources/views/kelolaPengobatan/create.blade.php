@extends('layouts.app')

@section('content')


<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary text-center">Kelola Pengobatan/Tambah Data</h6>
    </div>
    <form action="{{ route('kelolaPengobatan.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div style="margin-left: 50px; margin-right: 50px; margin-top: 50px; margin-bottom:50px;">
        <div class="mb-2 row">
          <label class="col-sm-2 col-form-label text-black">Nama Pengobatan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_pengobatan">
          </div>
        </div>
        <div class="mb-2 row">
          <label class="col-sm-2 col-form-label text-black">Upload Gambar</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" name="gambar">
          </div>
        </div>
        <div class="mb-2 row">
          <label class="col-sm-2 col-form-label text-black">Penjelasan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="penjelasan">
          </div>
        </div>
        <div class="mb-2 row">
          <label class="col-sm-2 col-form-label text-black">Manfaat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="manfaat">
          </div>
        </div>
        <br>
        <br>
        <a href="{{ route('kelolaPengobatan.index') }}" type="submit" class="btn btn-danger" style="margin-left: 80%;">Batal</a>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
  </div>
</div>

@endsection