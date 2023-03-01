<style type="text/css">
  .tabelpdf{
    width: 160px;
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
      <th class="tabelpdf">Kategori</th>
      <th class="tabelpdf">Jenis Transaksi</th>
      <th class="tabelpdf">Pendapatan</th>
      <th class="tabelpdf">Pengeluaran</th>
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
      <td><?php echo $pdf['kategori']  ?></td>
      <td><?php echo $pdf['jenis_transaksi'] ?></td>
      <td> <?php echo $pdf['pendapatan']; ?></td>
      <td> <?php echo $pdf['pengeluaran']; ?></td>
    </tr>
    <?php endforeach; ?>
    
      </tbody>
      <tr>
        <td colspan="5"><b>Total Pendapatan</b></td>
        <td colspan="2"><b>Rp. <?php echo number_format($sum); ?></b></td>
      </tr>
      <tr>
        <td colspan="6"><b>Total Pengeluaran</b></td>
        <td colspan="1"><b>Rp. <?php echo number_format($sum2); ?></b></td>
      </tr>
      <tr>
        <td colspan="3"><b>Total Saldo</b></td>
        <td colspan="4"><b>Rp. <?php echo number_format($saldo); ?></b></td>
      </tr>
    
    
    </table>

