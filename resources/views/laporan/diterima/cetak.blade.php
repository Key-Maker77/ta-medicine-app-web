<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Data Pesanan Diterima</title>
  
  <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body>
 <center> <img src="images/Korp-Surat.png" alt="" style="width: 800px; "> </center>
  <hr>
  <div class="form-group">
    <h3 align="center" style="color: black">Laporan Pesanan Diterima</h3>
   <center> {{ $bulan }} {{ $tahun }} </center>
  </div>
  <div class="card-header py-3">

  <br>
    <div class="table-responsive">
      <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id Pasien</th>
            <th>Nama Pasien</th>
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
          <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->nama_pasien }}</td>
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

  <br>
  <br>

  <p style="margin-left: 90%;">Admin</p>
  <br><br>
  <p style="margin-left: 88%;">.................................</p>
  <script type="text/javascript">
    window.print();
  </script>

  <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>

</body>

</html>
