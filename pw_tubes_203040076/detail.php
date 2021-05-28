<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// ambil id dari URL
$id = $_GET['id'];

// query books berdasarkan id
$motor = query("SELECT * FROM motor WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vespa</title>
</head>

<body>

  <h3> Vespa </h3>
  <ul>
    <li><img src="img/<?= $motor['Gambar']; ?>" width="150"></li>
    <li>Nama : <?= $motor['Nama']; ?></li>
    <li>Jenis : <?= $motor['Jenis']; ?></li>
    <li>Tahun : <?= $motor['Tahun']; ?></li>
    <li><a href="ubah.php?id=<?= $motor['id']; ?>">ubah</a> | <a href="hapus.php?id=<?= $motor['id']; ?>" onclick="return confirm('apakah anda yakin?');">hapus</a></li>
    <li><a href="index.php">Kembali ke daftar Vespa</a></li>
    
  </ul>

</body>

</html