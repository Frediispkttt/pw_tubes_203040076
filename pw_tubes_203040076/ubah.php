<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// jika tidak ada URL
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari URL
$id = $_GET['id'];

// query motor berdasarkan id
$mhs = query("SELECT * FROM motor WHERE id = $id");

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal diubah!";
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Ubah Data motor</title>
</head>
<body>
    <h3>Form Ubah Data motor</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
          <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
            
            <li>
                <label>
                  Nama :
                  <input type="text" name="Nama" autofocus required value="<?= $mhs['Nama']; ?>">
                </label><br><br>
            </li>
            <li>
                <label>
                  Gambar :
                  <input type="text" name="Gambar" required value="<?= $mhs['Gambar']; ?>">
                </label><br><br>
            </li>
            <li>
                <label>
                  Jenis :
                  <input type="text" name="Jenis" required value="<?= $mhs['Jenis']; ?>">
                </label><br><br>
            </li>
            <li>
                <label>
                  Tahun :
                  <input type="text" name="Tahun" required value="<?= $mhs['Tahun']; ?>">
                </label><br><br>
            </li>
            <li>
                <input type="hidden" name="gambar_lama" value="<?= $mhs['gambar']; ?>">
                <label>
                  Gambar :
                  <input type="file" name="gambar" class="gambar" onchange="previewImage()">
                </label><br><br>
                <img src="img/<?= $mhs['gambar']; ?> " width="120" style="display: block;" class="img-preview">
                <br>
            </li>
            <li>
                <button type="submit" name="ubah">Ubah Data!</button>
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