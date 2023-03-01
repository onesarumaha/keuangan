<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
          <div class="card card-secondary">
            <div class="card-header">
            </div><br>
            <form action="<?php echo base_url() ?>laporan/periode_keuangan" method="post" target="_blank">
              <div class="card-body">

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Awal</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control" id="tgl_1" name="tgl_1">
                      <?php echo form_error('tgl_1','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control" id="tgl_2" name="tgl_2">
                      <?php echo form_error('tgl_2','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-danger" name="btnCetak" target="_blank">Filter</button>
                <a href="<?php echo base_url() ?>laporan/full_laporan"  class="btn btn-primary" target="_blank">Cetak</a>
              </div>
            </form>
          </div>
          <hr>
          <br>
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Jenis Transaksi</th>
                <th class="text-center">Pendapatan</th>
                <th class="text-center">Pengeluaran</th>
              </tr>
            </thead>
            <?php 
            $no = 1;
            foreach($lap_pendapatan as $lap) : ?>
            <tbody>
              <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $lap['tgl'];?></td>
                <td class="text-center"><?= $lap['keterangan']; ?></td>
                <td class="text-center"><?= $lap['kategori']; ?></td>
                <td class="text-center"><?= $lap['jenis_transaksi']; ?></td>
                <td class="text-center"><?= $lap['pendapatan']; ?></td>
                <td class="text-center"><?= $lap['pengeluaran']; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          <tr>
          <th colspan="5"><b>Total </b></th>
          <td align="center"><b>Rp. <?= number_format($sum);  ?></b></td>
           <td align="center"><b>Rp. <?= number_format($sum2);  ?></b></td>
        </tr>
          </table>
        </div>
      </div>

    </div>
  </div>
  
</div>
