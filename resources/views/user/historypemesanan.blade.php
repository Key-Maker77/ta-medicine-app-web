<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>History Pemesanan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .rounded-card {
            border-radius: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 10px 10px lightblue;
            position: relative;
        }

        .rounded-card .btn-group {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    @foreach($data as $history)
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="rounded-card">
                <h5>Nama Pasien: <span class="text-muted">{{ $history->nama_pasien}}</span></h5>
                <h5>Tanggal: <span class="text-muted">{{ $history->jadwal}}</span></h5>
                <h5>Total: <span class="text-muted">{{ $history->harga}}</span></h5>
                <h5>Jenis Pengobatan: <span class="text-muted">{{ $history->jenis_pengobatan}}</span></h5>
                <h5>Nama Tabib: <span class="text-muted">{{ $history->nama_tabib}}</span></h5>
                <br>
                <br>
                <div class="btn-group">
                    <a href="{{ route('status.pemesanan', $history->id) }}" class="btn btn-primary">Lihat Status</a>
                    &nbsp;
                    &nbsp;
                    @if($history->status==1)
                    <a href="{{ route('selesai', $history->id) }}" class="btn btn-success">Selesai</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div style="background-color: #0087CC; position: fixed; bottom: 0; width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 10px; left: 0;">
    <a href="/homeuser"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-house"></i></label></a>
    <a href="/pengobatan"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-pills"></i></label></a>
    <a href="/tabib"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-user-doctor"></i></label></a>
    <a href="/pemesanan"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-regular fa-file-lines"></i></label></a>
    <a href="/historypemesanan"><label style="color: #0CF25D; margin-right: 10px; font-size: 25px;"><i class="fa-regular fa-pen-to-square"></i></label></a>
    <label data-toggle="modal" data-target="#exampleModalCenter" style="color: white; margin-right: 15px; font-size: 25px;"><i class="fa-solid fa-right-from-bracket"></i></label>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda Yakin Mau Keluar ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a href="/loginuser" type="button" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>
<div style="margin-bottom: 80px;"></div>
<script src="https://kit.fontawesome.com/f1ab7fcb74.js" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
