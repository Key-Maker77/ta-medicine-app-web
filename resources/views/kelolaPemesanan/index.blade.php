@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Pemesanan</h6>
    </div>
    <div class="card-header py-3">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id Pasien</th>
              <th>Nama Pasien</th>
              <th>Jenis Kelamin</th>
              <th>No HP</th>
              <th>Jadwal</th>
              <th>Jam</th>
              <th>Alamat</th>
              <th>Jenis Pengobatan</th>
              <th>Nama Tabib</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @if(!empty($data))
            @foreach ($data as $data)
            <tr>
              <td>{{ $data->id }}</td>
              <td>{{ $data->nama_pasien }}</td>
              <td>{{ $data->jenis_kelamin }}</td>
              <td>{{ $data->no_hp }}</td>
              <td>{{ $data->jadwal }}</td>
              <td>{{ $data->jam }}</td>
              <td style="vertical-align: middle; text-align: center;">
                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($data->alamat) }}" target="_blank">Cek Lokasi</a>
              </td>
              <td>{{ $data->jenis_pengobatan }}</td>
              <td>{{ $data->nama_tabib }}</td>
              <td>{{ $data->harga }}</td>
              <td>
                @if ($data->status == 0)
                Menunggu
                @elseif ($data->status == 1)
                Diterima
                @else
                Ditolak
                @endif
              </td>
              <td>
                <div class="d-flex">
                  @if ($data->status == 0)
                  <a class="btn btn-success" href="{{ route('pesananditerima', $data->id) }}"><i class="fa-solid fa-check"></i></a>
                  &nbsp;
                  <a class="btn btn-danger" href="{{ route('pesananditolak', $data->id) }}"><i class="fas fa-xmark"></i></a>
                  @endif
                </div>

                <!-- Modal -->
                <div class="modal" id="confirmationModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah Anda yakin ingin <span id="actionText"></span> pesanan ini?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <a id="confirmButton" class="btn btn-primary">Konfirmasi</a>
                      </div>
                    </div>
                  </div>
                </div>
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
