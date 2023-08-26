<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Semua Bisa Sehat</title>
    <style>
        .rounded-box {
            padding: 10px 15px;
            border: 1px solid #27a8e0; /* blue border */
            border-radius: 15px;
            text-align: justify;
            display: inline-block;
            background-color: #e1f5fe; /* light blue background */
            color: #333; /* darker text color for better contrast */
        }
    </style>
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
        <p class="rounded-box">{{ $pengobatan->penjelasan }}</p>
    </div>
    <br>
    <div class="container" style="margin-top: 30px; margin-left: 15px; margin-right: 15px;">
        <label><b>Manfaat</b></label>
        <p class="rounded-box">{{ $pengobatan->manfaat }}</p>
    </div>
    <script src="https://kit.fontawesome.com/f1ab7fcb74.js" crossorigin="anonymous"></script>
</body>

</html>
