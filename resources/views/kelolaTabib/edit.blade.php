@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary text-center">Kelola Tabib/Edit Data</h6>
    </div>
    <form action="{{ route('kelolaTabib.update',($data->id)) }}" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf

      <form>
        <div style="margin-left: 50px; margin-right: 50px; margin-top: 50px; margin-bottom:50px;">
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Nama Tabib</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_tabib" value="{{ $data->nama_tabib }}">
            </div>
          </div>
          <div class="mb-2 row">
            <label for="datepicker" class="col-sm-2 col-form-label text-black">Tanggal Lahir</label>
            <div class="col-sm-10">
              <div class="input-group">
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $data->tanggal_lahir }}">
              </div>
            </div>
          </div>
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Jenis Kelamin</label>
            <div class="col-sm-10">
              <input type="string" class="form-control" name="jenis_kelamin" value="{{ $data->jenis_kelamin }}">
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
            <label class="col-sm-2 col-form-label text-black">Nomor Sertifikasi</label>
            <div class="col-sm-10">
              <input type="string" class="form-control" name="nomor_sertifikasi" value="{{ $data->nomor_sertifikasi }}">
            </div>
          </div>
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Keahlian</label>
            <div class="col-sm-10">
              <input type="string" class="form-control" name="keahlian" value="{{ $data->keahlian }}">
            </div>
          </div>
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Nomor HP</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="nomor_hp" value="{{ $data->nomor_hp }}">
              <input type="hidden" class="form-control" name="status" value="{{ $data->status }}">
            </div>
          </div>
          <br>
          <br>
          <a href="{{ route('kelolaTabib.index' )}}" type="submit" class="btn btn-danger" style="margin-left: 85%;">Batal</a>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
  </div>
</div>

@endsection