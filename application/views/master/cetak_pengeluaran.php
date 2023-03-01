<?php
    $dt1 = $_POST["tgl_1"];
    $dt2 = $_POST["tgl_2"];
?>

<?php
$koneksi = new mysqli("localhost","root","","keuangan");
  $sql = $koneksi->query("SELECT SUM(jumlah) as tot_pengeluaran  from pengeluaran and tgl BETWEEN '$dt1' AND '$dt2'");
  while ($data= $sql) {
    $masuk = $data['tot_pengeluaran'];
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Laporan Pengeluaran</title>
</head>
<body>
  <img src="<?= base_url('assets/img/logo-pt.jpg'); ?>">
<center>
<h2>Laporan Pengeluaran</h2>
<h3>PT. Rajawali Penta Grafika Jakarta</h3>
<p>Periode : <?php $a=$dt1; echo date("d-M-Y", strtotime($a))?> s/d <?php $b=$dt2; echo date("d-M-Y", strtotime($b))?>
<p>________________________________________________________________________</p>

  <table border="1" cellspacing="0">
    <thead>
      <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Jenis Pendapatan</th>
            <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
        <?php

        if(isset($_POST["btnCetak"])){
           
            $sql_tampil = "SELECT * FROM pengeluaran where tgl BETWEEN '$dt1' AND '$dt2' order by tgl asc";
            }
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
         <tr>
            <td><?php echo $no; ?></td>
            <td><?php  $tgl = $data['tgl']; echo date('d M Y', strtotime($tgl))?></td> 
            <td><?php echo $data['keterangan']; ?></td>
            <td align="center"><?php echo $data['jenis_pengeluaran']; ?></td>
            <td>Rp. <?= number_format($data['jumlah']) ?></td>
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>
<!-- 
    <tr>
        <td colspan="3">Total Pendapatan</td>
        <td colspan="2"><?php echo $masuk; ?></td>
    </tr> -->

  </table>
</center>

<script>
    window.print();
</script>
</body>
</html>