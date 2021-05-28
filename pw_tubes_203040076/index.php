<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';
$motor = query("SELECT * FROM motor");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
  $motor = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Motor</title>
</head>

<body style="background-color:#c9c0bb">


  <a href="logout.php">LOGOUT</a>
  <h3> Daftar Motor Vespa </h3>
  
  <a href="tambah.php">Tambah Data motor</a>
  <br><br>

  <form action="" method="POST">
    <input  style="background-color:#e3dac9 " type="text" name="keyword" size="40" placeholder="masukkan keyword pencarian.." autocomplete="off" autofocus class="keyword">
    <button type="submit" name="cari" class="tombol-cari">Cari!</button>
  </form>
  <br>

  <div class="container">
    <table border="10" cellpadding="0" cellspacing="0" style="background-color: #5f9ea0">
      <tr>
        <th style="background-color: #353839">Nama</th>
        <th style="background-color: #353839">Gambar</th>
        <th style="background-color: #353839">Jenis</th>
        <th style="background-color: #353839">Tahun</th>
      </tr>

      <?php if (empty($motor)) : ?>
        <tr>
          <td colspan="4">
            <p style="color: red; font-style: italic;">data motor tidak ditemukan!</p>
          </td>
        </tr>
      <?php endif; ?>

      <?php $i = 1;
      foreach ($motor as $mtr) : ?>
        <tr>
        <td ><?= $i++; ?></td>
          <td ><img src="img/<?= $mtr['Gambar']; ?>" width="100"></td>
          <td ><?= $mtr['Nama']; ?></td>
          <td ><?= $mtr['Jenis']; ?></td>
          <td ><?= $mtr['Tahun']; ?></td> 
          <td>
            <a  style="background: #5f9ea0"href="detail.php?id=<?= $mtr['id']; ?>">lihat detail</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <script src="js/script.js"></script>

</body>

</html>