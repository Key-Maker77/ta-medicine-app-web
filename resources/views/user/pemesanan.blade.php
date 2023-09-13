<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Klinik Semua Bisa Sehat</title>
</head>
<body>
    <center><h5 style="margin-top: 50px; margin-bottom: 25px;">Pemesanan</h5></center>
    <div style="background-color: #ADD9D1; margin-right: 25px; margin-left: 25px; border-radius: 20px;" class="alert alert-light shadow" role="alert">
    <form action="{{ route('pemesananstore') }}" method="POST">
    @csrf
    <p hidden>The distance between your current location and a predefined location is:</p>
<p hidden id="distanceDisplay"></p>
    <p hidden>The calculated price based on the distance is:</p>
<p hidden id="priceDisplay"></p>
      <div class="mb-2 row">
        <label style="color: black;" class="col-sm-2 col-form-label text-black">Nama Pasien</label>
        <div class="col-sm-10">
          <input style="border-radius: 15px;" type="text" class="form-control" name="nama_pasien" value="{{ auth()->user()->name}}" readonly>
        </div>
      </div>
      <div class="mb-2 row">
    <label style="color: black;" class="col-sm-2 col-form-label text-black">Jenis Kelamin</label>
    <div class="col-sm-10">
        <select style="border-radius: 15px;" class="form-control" name="jenis_kelamin">
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
        </select>
    </div>
</div>

      <div class="mb-2 row">
        <label style="color: black;" class="col-sm-2 col-form-label text-black">No Hp</label>
        <div class="col-sm-10">
          <input style="border-radius: 15px;" type="number" class="form-control" name="no_hp">
        </div>
      </div>
      <div class="mb-2 row">
        <label  style="color: black;" for="datepicker" class="col-sm-2 col-form-label text-black">Jadwal</label>
        <div class="col-sm-10">
          <div class="input-group">
            <input style="border-radius: 15px;" type="date" name="jadwal" class="form-control">
          </div>
        </div>
      </div>
      <div class="mb-2 row">
        <label  style="color: black;" class="col-sm-2 col-form-label text-black">Jam</label>
        <div class="col-sm-10">
          <input style="border-radius: 15px;" type="text" class="form-control" name="jam">
        </div>
      </div>
      <p id="locationInfo" hidden></p>
			<p hidden>The distance between your current location and a predefined location is:</p>
			<p id="distanceDisplay" hidden></p>
      <div class="mb-2 row">
        <label  style="color: black;" class="col-sm-2 col-form-label text-black">Alamat</label>
        <div class="col-sm-10">
          <input id="locationInput" style="border-radius: 15px;" type="text" class="form-control" name="alamat" readonly>
        </div>
      </div>
      <div class="form-group">
    <label style="color: black;" for="exampleFormControlSelect1">Jenis Pengobatan</label>
    <select style="border-radius: 15px;" class="form-control" id="exampleFormControlSelect1" name="jenis_pengobatan">
      <option value="" hidden>Pilih Jenis Pengobatan</option>
      @foreach($pengobatan as $data)
                <option value="{{ $data->nama_pengobatan }}">{{ $data->nama_pengobatan }}</option>
                @endforeach
    </select>
  </div>
  <div class="form-group">
    <label style="color: black;" for="exampleFormControlSelect1">Nama Tabib</label>
    {{count($tab)}}
    <select style="border-radius: 15px;" class="form-control" id="exampleFormControlSelect1" name="nama_tabib">
      @if (count($tab) == 0 || count($tab) == null)
      <option value="" hidden>Tidak ada tabib yang tersedia</option>
      @else
      <option value="" hidden>Pilih Tabib</option>
      @endif
      @foreach($tab as $data)
                <option value="{{ $data->nama_tabib }}">{{ $data->nama_tabib }}</option>
                @endforeach
    </select>
  </div>
      <div class="mb-2 row">
        <label  style="color: black;" class="col-sm-2 col-form-label text-black">Harga</label>
        <div class="col-sm-10">
        <input id="priceInput" style="border-radius: 15px;" type="text" class="form-control" name="harga" readonly>
          <input type="hidden" class="form-control" name="status" value="0">
        </div>
      </div>
      <br>
      <br>
      <center><button style="border-radius: 20px; width: 150px;" type="submit" class="btn btn-primary">Pesan</button></center>
    </form>
</div>
<div style="background-color: #0087CC; position: fixed; bottom: 0; width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 10px; left: 0;">
    <a href="/homeuser"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-house"></i></label></a>
    <a href="/pengobatan"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-pills"></i></label></a>
    <a href="/tabib"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-user-doctor"></i></label></a>
    <a href="/pemesanan"><label style="color: #0CF25D; margin-right: 10px; font-size: 25px;"><i class="fa-regular fa-file-lines"></i></label></a>
    <a href="/historypemesanan"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-regular fa-pen-to-square"></i></label></a>
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
<script>
        $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
    <script>
function degToRad(degrees) {
  return degrees * (Math.PI / 180);
}

function calculateDistance(lat1, lon1, lat2, lon2) {
  const R = 6371; // Radius of the Earth in kilometers
  const dLat = degToRad(lat2 - lat1);
  const dLon = degToRad(lon2 - lon1);

  const a =
    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(degToRad(lat1)) * Math.cos(degToRad(lat2)) * Math.sin(dLon / 2) * Math.sin(dLon / 2);

  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  const distance = R * c; // Distance in kilometers

  return distance;
}

navigator.geolocation.getCurrentPosition(
  function (position) {
    const currentLat = position.coords.latitude;
    const currentLon = position.coords.longitude;

    const predefinedLat = -6.839173341223848; // Predefined latitude for the second location
    const predefinedLon = 107.50759073621059; // Predefined longitude for the second location

    const distance = calculateDistance(currentLat, currentLon, predefinedLat, predefinedLon);
    const distanceDisplay = document.getElementById("distanceDisplay");
    distanceDisplay.textContent = `Distance: ${distance.toFixed(2)} kilometers`;

    let price = 0;
    if (distance >= 1 && distance < 2) {
      price = 15000;
    } else if (distance >= 2 && distance < 5) {
      price = 25000;
    } else if (distance >= 5 && distance <= 20) {
      price = 100000;
    } else if (distance > 20) {
      price = 200000;
    }

    const priceInput = document.getElementById("priceInput");
    priceInput.value = `Rp${price.toLocaleString()}`;
  },
  function (error) {
    console.error("Error getting current location:", error);
  }
);
</script>
<script>
    // Fungsi ini akan dijalankan segera setelah halaman dimuat
    (function detectLocation() {
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                displayCoordinates(position.coords.latitude, position.coords.longitude);
            }, function(error) {
                document.getElementById("locationInfo").innerText = "Error occurred: " + error.message;
            });
        } else {
            document.getElementById("locationInfo").innerText = "Geolocation is not supported by this browser.";
        }
    })();

    function displayCoordinates(latitude, longitude) {
        const locationText = latitude + " , " + longitude;
        document.getElementById("locationInfo").innerText = locationText;
        document.getElementById("locationInput").value = locationText; // Mengatur value input dengan koordinat
    }
</script>
</body>
</html>
