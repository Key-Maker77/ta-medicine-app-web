@extends('layouts.app')

@section('content')


<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary text-center">Kelola Tabib/Tambah Data</h6>
    </div>
    <div class="container alert alert-light shadow" role="alert">
      <form action="{{ route('kelolaPemesanan.store') }}" method="post">
        @csrf
        <div style="margin-left: 50px; margin-right: 50px; margin-top: 50px; margin-bottom:50px;">
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Nama Pasien</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_pasien">
            </div>
          </div>
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Jenis Kelamin</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="jenis_kelamin">
            </div>
          </div>
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">No HP</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="no_hp">
            </div>
          </div>
          <div class="mb-2 row">
            <label for="datepicker" class="col-sm-2 col-form-label text-black">Jadwal</label>
            <div class="col-sm-10">
              <div class="input-group">
                <input type="date" name="jadwal" class="form-control">
              </div>
            </div>
          </div>
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Jam</label>
            <div class="col-sm-10">
              <input type="string" class="form-control" name="jam">
            </div>
          </div>
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="alamat">
            </div>
          </div>
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Jenis Pengobatan</label>
            <div class="col-sm-10">
              <select class="form-select" name="jenis_pengobatan">
                <option value="" hidden="">Pilih Jenis Pengobatan</option>
                @foreach($pengobatan as $data)
                <option value="{{ $data->nama_pengobatan }}">{{ $data->nama_pengobatan }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Nama Tabib</label>
            <div class="col-sm-10">
              <select class="form-select" name="nama_tabib">
                <option value="" hidden="">Pilih Tabib</option>
                @foreach($tab as $data)
                <option value="{{ $data->nama_tabib }}">{{ $data->nama_tabib }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="mb-2 row">
            <label class="col-sm-2 col-form-label text-black">Harga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="harga">
              <input type="hidden" class="form-control" name="status" value="0">
            </div>
          </div>
          <br>
          <br>
          <a href="{{ route('kelolaPemesanan.index') }}" type="submit" class="btn btn-danger" style="margin-left: 80%;">Batal</a>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>

  @endsection