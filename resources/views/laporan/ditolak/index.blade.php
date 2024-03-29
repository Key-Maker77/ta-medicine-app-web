@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Pemesanan Ditolak</h6>
      <a class="btn btn-primary" target="_blank" style="float: right;" href="/cetakditolak"><i class="fa-solid fa-print"></i>&nbsp;&nbsp;Cetak Laporan</a>
    </div>
    <div class="card-header py-3">
      <form method="GET" action="{{ route('filterByMonthDitolak') }}">
        @csrf
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="bulan">Pilih Bulan:</label>
              <select class="form-control" id="bulan" name="bulan">
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tahun">Pilih Tahun:</label>
              <select class="form-control" id="tahun" name="tahun">
                @php
                  $currentYear = date('Y');
                  for ($year = $currentYear; $year >= 2020; $year--) {
                    echo "<option value='$year'>$year</option>";
                  }
                @endphp
              </select>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary float-right">Filter</button>
        <a href="{{ route('vPesananDitolak') }}" class="btn btn-secondary float-right mr-2">Tampilkan Semua</a>
      </form>
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
            @if(!empty($ditolak))
            @foreach ($ditolak as $data)
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
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal_{{ $data->id }}">
                  <span class="badge rounded-pill text-bg-danger">
                    <i class="fas fa-trash fa-solid"></i>
                  </span>
                </button>

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
                        <form action="{{ route('posts.destroy', $data->id) }}" method="POST" id="deleteForm">
                          {{ method_field('DELETE') }}
                          @csrf
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
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