@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Pemesanan Diterima</h6>
      <form method="GET" action="{{ route('cetakPdf') }}" target="_blank">
        @csrf
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="bulan">Pilih Bulan:</label>
              <select class="form-control" id="bulan" name="bulan">
                <option value=""></option>
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
        <button class="btn btn-primary float-right" id="filterButton">Filter</button>
        <button id="cetakPdfButton" class="btn btn-primary float-right">Cetak PDF</button>
        <!-- <a  href="/cetakPdf" id="cetakPdfButton" class="btn btn-primary float-right">Cetak PDF</a> -->
        <a href="{{ route('vPesananDiterima') }}" class="btn btn-secondary float-right mr-2">Tampilkan Semua</a>
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
            </tr>
          </thead>
          <tbody>
            @if(!empty($diterima))
            @foreach ($diterima as $data)
            <tr class="isi">
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
                @elseif ($data->status == 3)
                Selesai
                @else
                Ditolak
                @endif
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

<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script>
  document.getElementById('filterButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the form from submitting

    // Get selected values for month and year
    const selectedMonth = document.getElementById('bulan').value;
    const selectedYear = document.getElementById('tahun').value;

    // Construct the URL with the selected values
    const filterUrl = `{{ route('fecth') }}?bulan=${selectedMonth}&tahun=${selectedYear}`;

    // Redirect to the filtered URL
    window.location.href = filterUrl;
  });
</script>
@endsection