<?php  

require '../functions.php';

$motor = cari($_GET['keyword']);

?>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Gambar</th>
      <th>Jenis</th>
      <th>Tahun</th>
    </tr>

    <?php if (empty($motor)) : ?>
      <tr>
        <td colspan="4">
          <p style="color: red; font-style: italic;">data Vespa tidak ditemukan!</p>
        </td>
      </tr>
    <?php endif; ?>

    <?php $i = 1;
    foreach ($motor as $mtr) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><png src="png/<?= $mtr['Gambar']; ?>" width="60"></td>
        <td><?= $mtr['Nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $mtr['id']; ?>">lihat detail</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>