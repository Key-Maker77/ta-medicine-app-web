<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Klinik Semua Bisa Sehat</title>
</head>

<body>
    @foreach($data as $data)
    <center>
        <div class="card" style="width: 90%; max-width: 24rem; margin-top: 30px; background-color: #ADD9D1; border-radius: 25px;">
            <img class="card-img-top" src="{{ url('images/'.$data->gambar) }}" alt="Card image cap" style="width: 100px; height: 100px; object-fit: cover; margin: 20px auto 10px; display: block; border-radius: 50%; border: 3px solid blue;">
            <div class="card-body" style="display: flex; flex-direction: column; justify-content: space-between; height: 150px;">
                <div class="card-body" style="display: flex; flex-direction: column; justify-content: start; height: auto; padding: 10px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span>Nama</span>
                        <span>{{ $data -> nama_tabib }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span>Nomor Sertifikasi</span>
                        <span>{{ $data->nomor_sertifikasi }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>Keahlian</span>
                        <span>{{ $data->keahlian }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>No Hp</span>
                        <span>{{ $data->nomor_hp }}</span>
                    </div>
                </div>

            </div>
    </center>
    @endforeach
    <div style="background-color: #0087CC; position: fixed; bottom: 0; width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 10px; left: 0;">
        <a href="/homeuser"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-house"></i></label></a>
        <a href="/pengobatan"><label style="color: white; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-pills"></i></label></a>
        <a href="/tabib"><label style="color: #0CF25D; margin-right: 10px; font-size: 25px;"><i class="fa-solid fa-user-doctor"></i></label></a>
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
    <div style="margin-bottom: 75px;"></div>
    <script src="https://kit.fontawesome.com/f1ab7fcb74.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
</body>

</html>
