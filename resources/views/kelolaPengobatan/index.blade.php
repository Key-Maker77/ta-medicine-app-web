@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Pengobatan</h6>
      <a class="btn btn-primary" style="float: right;" href="{{route('kelolaPengobatan.create')}}"><i class="fa-solid fa-file-circle-plus"></i>&nbsp; Tambah Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">Id Pengobatan</th>
              <th scope="col">Nama Pengobatan</th>
              <th scope="col">Gambar</th>
              <th scope="col">Penjelasan</th>
              <th scope="col">Manfaat</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if(!empty($data))
            @foreach($data as $data)
            <tr>
              <td scope="row">{{ $data -> id }}</td>
              <td>{{ $data -> nama_pengobatan }}</td>
              <td>
                <img style="width: 100px; height: 100px;" src="{{ url('images/' . $data->gambar) }}" />
              </td>
              <td>{{ $data -> penjelasan }}</td>
              <td>{{ $data -> manfaat }}</td>
              <td>
                <div class="d-flex">
                  <a href="{{ route('kelolaPengobatan.edit', $data->id) }}" type="button" class="btn btn-warning">
                    <i class="fas fa-pen"></i>
                  </a>
                  &nbsp;
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal">
                    <span class="badge rounded-pill text-bg-danger">
                      <i class="fas fa-trash fa-solid"></i>
                    </span>
                  </button>
                </div>

                <!-- Modal for Confirmation -->
                <div class="modal fade" id="deleteConfirmationModal_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <form action="{{ route('kelolaPengobatan.destroy', $data->id) }}" method="POST" id="deleteForm">
                          {{ method_field('DELETE') }}
                          @csrf
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection