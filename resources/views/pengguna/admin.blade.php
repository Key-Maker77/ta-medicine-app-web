@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Admin</h6>
      <a class="btn btn-primary" style="float: right;" href="{{ route('pengguna.create') }}">Tambah Data</a>
    </div>
    <div class="card-header py-3">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id Admin</th>
              <th>Nama Admin</th>
              <th>Email</th>
              <th>Role</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if(!empty($admin))
            @foreach ($admin as $data)
            <tr>
              <td>{{ $data->id }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->email }}</td>
              <td>{{ $data->role }}</td>
              <td> 
              <form action="{{ route('destroyadmin', $data->id) }}" method="POST">
                 @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Hapus</button> 
              </form>
              </td>
            </tr>
            @endforeach
            </td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection