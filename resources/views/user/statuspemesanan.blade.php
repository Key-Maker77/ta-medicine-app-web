<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Semua Bisa Sehat</title>
</head>

<body>
    <div class="container" style="margin-top: 15px; margin-left: 15px;">
        <a href="/historypemesanan"><i class="fa-solid fa-circle-arrow-left" style="font-size: 30px;"></i></a>
    </div>
    <div style="background-color: #ADD9D1; margin-right: 25px; margin-left: 25px; border-radius: 20px;">
        <div style="text-align: center; margin-top: 50px; padding-top: 50px; font-size: 75px;">
            @if ($pemesanan->status == 0)
            <lord-icon src="https://cdn.lordicon.com/qmuwmmnl.json" trigger="loop" colors="primary:#121331" state="loop" style="width:100px;height:100px">
            </lord-icon>
            @elseif ($pemesanan->status == 1)
            <lord-icon src="https://cdn.lordicon.com/yqzmiobz.json" trigger="loop" delay="500" colors="primary:#121331" state="morph-check-in" style="width:100px;height:100px">
            </lord-icon>
            @elseif ($pemesanan->status == 3)
            <lord-icon src="https://cdn.lordicon.com/yqzmiobz.json" trigger="loop" delay="500" colors="primary:#121331" state="morph-check-in" style="width:100px;height:100px">
            </lord-icon>
            @else
            <lord-icon src="https://cdn.lordicon.com/jfhbogmw.json" trigger="loop" delay="500" colors="primary:#121331" style="width:100px;height:100px">
            </lord-icon>
            @endif
        </div>
        <div style="text-align: center; margin-top: 50px;">
            <p><b>
                    @if ($pemesanan->status == 0)
                    Tunggu Sebentar Yahh
                    @elseif ($pemesanan->status == 1)
                    Yeay Pesanan Diterima
                    @elseif ($pemesanan->status == 3)
                    Terima kasih Yahh
                    @else
                    Yahh Ditolak
                    Coba lakukan pemesanan
                    kembali dengan jadwal yang berbeda
                    @endif
            </b></p>
        </div>
        <div style="text-align: center; margin-top: 40px;">
            <p><b>ID : {{ $pemesanan->id }} </b></p>
        </div>
        <div style="text-align: center; margin-top: 40px;">
            <p><b>Nama : {{ $pemesanan->nama_pasien}}</b></p>
        </div>
        <div style="text-align: center; margin-top: 100px;">
            <p><b>STATUS:</b></p>
        </div>
        @if ($pemesanan->status == 0)
        <div style="display: flex; margin-left: auto; margin-right: auto; justify-content: center; align-items: center; margin-top: 20px; border-radius: 20px; background-color: #0087CC; height: 50px; width: 200px;">
            <p><b>
                Menunggu
            </b></p>
    </div>
        @elseif ($pemesanan->status == 1)
        <div style="display: flex; margin-left: auto; margin-right: auto; justify-content: center; align-items: center; margin-top: 20px; border-radius: 20px; background-color: #6BBE49; height: 50px; width: 200px;">
            <p><b>
        Diterima
        </b></p>
    </div>
    @elseif ($pemesanan->status == 3)
        <div style="display: flex; margin-left: auto; margin-right: auto; justify-content: center; align-items: center; margin-top: 20px; border-radius: 20px; background-color: #6BBE49; height: 50px; width: 200px;">
            <p><b>
        Selesai
        </b></p>
    </div>
        @else
        <div style="display: flex; margin-left: auto; margin-right: auto; justify-content: center; align-items: center; margin-top: 20px; border-radius: 20px; background-color: #BF1F2C; height: 50px; width: 200px;">
            <p><b>
        Ditolak
        </b></p>
    </div>
        @endif
        <br>
        <br>
    </div>
    <script src="https://kit.fontawesome.com/f1ab7fcb74.js" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
</body>

</html>
