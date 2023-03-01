<style type="text/css">
  .tabelpdf{
    width: 240px;
    height: 30px;
  }
  td{
    height: 25px;
  }
</style>
<title><?php echo $title; ?></title>
  <center><div>
    <h1><?php echo $title; ?></h1>
    <label><i></i></label><br>
    <label>PT. Rajawali Penta Grafika</label><br>
    <label><?php echo date('d M Y'); ?></label>
  </div></center>
  <hr>
  <br>
  <br>

<table border="1" cellspacing="1">
  <thead>
    <tr class="tabelpdf">
      <th>No</th>
      <th class="tabelpdf">Tanggal</th>
      <th class="tabelpdf">Keterangan</th>
      <th class="tabelpdf">Jenis Pengeluaran</th>
      <th class="tabelpdf">Jumlah</th>
    </tr>
  </thead>

  <tbody>
    <?php 
    $no = 1;
    foreach($full as $pdf) : ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php  $tgl = $pdf['tgl']; echo date(" d M Y", strtotime($tgl))?></td> 
      <td><?php echo $pdf['keterangan']  ?></td>
      <td><?php echo $pdf['jenis_pengeluaran'] ?></td>
      <td>Rp. <?= number_format($pdf['jumlah']) ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
      <th colspan="4">Total Pengeluaran</th>
      <td><b>Rp. <?= number_format($sum2);  ?></b></td>
    </tr>
      </tbody>
    </table>

