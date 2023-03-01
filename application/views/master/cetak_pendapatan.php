<?php
    $dt1 = $_POST["tgl_1"];
    $dt2 = $_POST["tgl_2"];
?>

<?php
$koneksi = new mysqli ("localhost","root","","keuangan");
  $sql = $koneksi->query("SELECT SUM(pendapatan) AS tot_pendapatan FROM data_transaksi WHERE jenis_transaksi='Pendapatan' AND tgl BETWEEN '$dt1' AND '$dt2'");
  while ($data= $sql->fetch_assoc()) {
    $pendapatan=$data['tot_pendapatan'];
  }
  $koneksi = new mysqli ("localhost","root","","keuangan");
  $sql = $koneksi->query("SELECT SUM(pengeluaran) AS tot_pengeluaran FROM data_transaksi WHERE jenis_transaksi='Pengeluaran' AND tgl BETWEEN '$dt1' AND '$dt2'");
  while ($data= $sql->fetch_assoc()) {
    $pengeluaran=$data['tot_pengeluaran'];
  }

  $saldo= $pendapatan-$pengeluaran;
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Periode Laporan Keuangan</title>
</head>
<body>
  <img src="<?= base_url('assets/img/logo-pt.jpg'); ?>">
<center>
<h2>Periode Laporan Keuangan</h2>
<h3>PT. Rajawali Penta Grafika Jakarta</h3>
<p>Periode : <?php $a=$dt1; echo date("d-M-Y", strtotime($a))?> s/d <?php $b=$dt2; echo date("d-M-Y", strtotime($b))?>
<p>________________________________________________________________________</p>

  <table border="1" cellspacing="0">
    <thead>
      <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Jenis Transaksi</th>
            <th>Pendapatan</th>
            <th>Pengeluaran</th>
      </tr>
    </thead>
    <tbody>
        <?php

        if(isset($_POST["btnCetak"])){
           
            $sql_tampil = "SELECT * FROM data_transaksi where tgl BETWEEN '$dt1' AND '$dt2' ORDER BY tgl ASC";
            }
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
         <tr>
            <td><?php echo $no; ?></td>
            <td><?php  $tgl = $data['tgl']; echo date('d M Y', strtotime($tgl))?></td> 
            <td><?php echo $data['keterangan']; ?></td>
            <td><?php echo $data['kategori']; ?></td>
            <td align="center"><?php echo $data['jenis_transaksi']; ?></td>
            <td> <?= $data['pendapatan']; ?></td>
            <td> <?= $data['pengeluaran']; ?></td>
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>
    <tr>
       <td colspan="5">Total Pendapatan</td>
        <td colspan="3">Rp. <?php echo number_format($pendapatan) ; ?></td>
        
    </tr>
    <tr>
        
        <td colspan="6">Total Pengeluaran</td>
        <td colspan="3">Rp. <?php echo number_format($pengeluaran) ; ?></td>
    </tr>

    <tr>
        <td colspan="3">Saldo Akhir</td>
        <td colspan="5">Rp. <?php echo number_format($saldo) ; ?></td>
    </tr>

  </table>
</center>

<script>
    window.print();
</script>
</body>
</html>