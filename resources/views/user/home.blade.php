<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Klinik Semua Bisa Sehat</title>
</head>
<body>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/Carousel.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/Carousel-2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/Carousel-3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container">
    <br>
    <div>
    {{ auth()->user()->name}}
    </div>

    <label style="margin-top: 50px"><b>Temui kami</b></label>
</div>
<center>
    <div class="card" style="width: 22rem; margin-left: 15px; margin-right: 40px; border-radius: 20px; overflow: hidden;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.4262776720198!2d107.5076495!3d-6.8393884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e3248478ed87%3A0xf78a564e56cf7d7f!2sKlinik%20akupunktur%20lkp%20cipta%20insani!5e0!3m2!1sid!2sid!4v1690969409128!5m2!1sid!2sid" width="350" height="250" style="border:0; border-radius: 20px 20px 0 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="card-body" style="border-radius: 0 0 20px 20px;">
            <p class="card-text"><b>Klinik Semua Bisa Sehat</b></p>
            <p class="card-text" style="text-align: justify; padding: 18px; margin-top: -30px; border-radius: 0 0 20px 20px;">Jl. Ciloa, Mekarsari, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552</p>
        </div>
    </div>
</center>
<div class="container" style="margin-top: 50px;">
    <div class="card mx-auto" style="max-width: 500px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); background-color: #9AEBA3;">
        <div class="card-body">
            <label style="font-size: 1.5em; margin-bottom: 10px;"><b>Klinik Semua Bisa Sehat</b></label>
            <p style="margin-bottom: 5px;">Jadwal Klinik:</p>
            <p style="margin-top: 5px; margin-bottom: 5px;">Senin - Jumat: 08.00 - 20.00</p>
            <p style="margin-top: 5px;">Sabtu: 09.00 - 17.00</p>
        </div>
    </div>
</div>



<div style="background-color: #0087CC; position: fixed; bottom: 0; width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 10px;">
    <a href="/homeuser"><label style="color: #0CF25D; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-house"></i></label></a>
    <a href="/pengobatan"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-pills"></i></label></a>
    <a href="/tabib"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-user-doctor"></i></label></a>
    <a href="/pemesanan"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-regular fa-file-lines"></i></label></a>
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
<div style="margin-bottom: 50px;"></div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f1ab7fcb74.js" crossorigin="anonymous"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
</body>
</html>
-
