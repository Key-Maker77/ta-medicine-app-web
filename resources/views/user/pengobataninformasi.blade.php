<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Semua Bisa Sehat</title>
</head>
<body>
    <a href="/pengobatan" class="container" style="margin-top: 15px; margin-left: 15px;">
    <i class="fa-solid fa-circle-arrow-left" style="font-size: 30px; margin-top: 15px;"></i>
    </a>
    <br>
    <div class="container" style="margin-top: 15px; margin-left: 15px;">
    <img class="card-img-top" src="{{ url('images/'.$pengobatan->gambar) }}" alt="Card image cap" style="width: 300px; height: 200px; padding-top: 10px; padding-bottom: 10px; margin-left: 25px; border-radius: 55px;">
    </div>
    <br>
    <div class="container" style="margin-top: 30px; margin-left: 15px; margin-right: 15px;">
    <label><b>Penjelasan</b></label>
    <p style="text-align: justify;">{{ $pengobatan->penjelasan }}</p>
    </div>
    <br>
    <div class="container" style="margin-top: 30px; margin-left: 15px; margin-right: 15px;">
    <label><b>Manfaat</b></label>
    <p style="text-align: justify;">{{ $pengobatan->manfaat }}</p>
    </div>
    <script src="https://kit.fontawesome.com/f1ab7fcb74.js" crossorigin="anonymous"></script>
</body>
</html>
