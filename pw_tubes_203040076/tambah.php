<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal ditambahkan!";
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Tambah Data Motor/title>
</head>
<body>
    <h3>Form Tambah Data Motor</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label>
                  Nama :
                  <input type="text" name="Nama" autofocus required>
                </label><br><br>
            </li>
            <li>
                <label>
                  Gambar :
                  <input type="text" name="Gambar" required>
                </label><br><br>
            </li>
            <li>
                <label>
                  Jenis :
                  <input type="text" name="Jenis" required>
                </label><br><br>
            </li>
            <li>
                <label>
                  Tahun :
                  <input type="text" name="Tahun" required>
                </label><br><br>
            </li>
            <li>
                <label>
                  Gambar :
                  <input type="file" name="gambar" class="gambar" onchange="previewImage()">
                </label><br><br>
                <img src="img/nofoto.jpg" width="120" style="display: block;" class="img-preview">
                <br>              
            </li>
            <li>
                <button type="submit" name="tambah">Tambah Data!</button>
            </li>
        </ul>
    </form>

    <script>
        // preview image untuk tambah dan ubah
        function previewImage() 
        {
          const gambar = document.querySelector('.gambar');
          const imgPreview = document.querySelector('.img-preview');

          const oFReader = new FileReader();
            oFReader.readAsDataURL(gambar.files[0]);

            oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
          };
        }
    </script>
</body>

</html>