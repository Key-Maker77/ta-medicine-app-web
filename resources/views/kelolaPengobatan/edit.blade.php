@extends('layouts.app')

@section('content')


<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary text-center">Kelola Daftar Pengobatan/Edit Data</h6>
    </div>
    <form action="{{ route('kelolaPengobatan.update',($data->id)) }}" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf

      <div style="margin-left: 50px; margin-right: 50px; margin-top: 50px; margin-bottom:50px;">
        <div class="mb-2 row">
          <label class="col-sm-2 col-form-label text-black">Nama Pengobatan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_pengobatan" value="{{ $data->nama_pengobatan }}">
          </div>
        </div>
        <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Upload Gambar</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="gambar">
              @if ($data->gambar)
              <img src="{{ asset('images/' . $data->gambar) }}" alt="Gambar saat ini" style="max-width: 200px; margin-top: 10px;">
              @else
              <p>Tidak ada gambar saat ini.</p>
              @endif
            </div>
          </div>
        <div class="mb-2 row">
          <label class="col-sm-2 col-form-label text-black">Penjelasan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="penjelasan" value="{{ $data->penjelasan }}">
          </div>
        </div>
        <div class="mb-2 row">
          <label class="col-sm-2 col-form-label text-black">Manfaat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="manfaat" value="{{ $data->manfaat }}">
          </div>
        </div>
        <br>
        <a href="{{ route('kelolaPengobatan.index') }}" type="submit" class="btn btn-danger" style="margin-left: 80%;">Batal</a>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
  </div>

  @endsection