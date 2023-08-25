@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Tabib Aktif</h6>
      <a class="btn btn-primary" style="float: right;" href="{{route('kelolaTabib.create')}}"><i class="fa-solid fa-file-circle-plus"></i>&nbsp; Tambah Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">Id Tabib</th>
            <th scope="col">Nama Tabib</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nomor Sertifikasi</th>
            <th scope="col">Keahlian</th>
            <th scope="col">Nomor HP</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($data))
        @foreach($data as $data)
        <tr>
            <td scope="row">{{ $data->id }}</td>
            <td>{{ $data->nama_tabib }}</td>
            <td>{{ $data->tanggal_lahir }}</td>
            <td>{{ $data->jenis_kelamin }}</td>
            <td>
                <img style="width: 100px; height: 100px;" src="{{ url('images/' . $data->gambar) }}" />
            </td>
            <td>{{ $data->nomor_sertifikasi }}</td>
            <td>{{ $data->keahlian }}</td>
            <td>{{ $data->nomor_hp }}</td>
            <td>
                @if ($data->status == 0)
                Aktif
                @elseif ($data->status == 1)
                Non Aktif
                @endif
            </td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('kelolaTabib.edit', $data->id) }}" class="btn btn-warning">
                        <i class="fas fa-pen"></i>
                    </a>
                    &nbsp;
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal_{{ $data->id }}">
                        <span class="badge rounded-pill text-bg-danger">
                            <i class="fas fa-trash fa-solid"></i>
                        </span>
                    </button>
                    &nbsp;
                    <a class="btn btn-secondary" href="{{ route('tabibnonaktif', $data->id) }}">
                        <i class="fas fa-xmark"></i>
                    </a>

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
                                    <form action="{{ route('kelolaTabib.destroy', $data->id) }}" method="POST" id="deleteForm">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
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
