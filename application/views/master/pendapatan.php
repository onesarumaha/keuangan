<div class="pesan-data" data-pesandata="<?= $this->session->flashdata('pesan'); ?>"></div>
	<?= $this->session->flashdata('pesan'); ?>
<div class="main">

	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Transaksi Pendapatan</h3>
				</div>
				<div class="panel-body">

					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					  [+] Tambah Pendapatan
					</button>
				<form class="navbar-form navbar-right col-6" action="" method="post">
					<div class="input-group">
						 <input type="text" class="form-control" name="cari" placeholder="Pencarian ...">
						<span class="input-group-btn"><button type="submit" class="btn btn-primary">Cari</button></span>
					</div>
				</form>
					<table class="table table-hover">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Tanggal</th>
								<th class="text-center">Keterangan</th>
								<th class="text-center">Jenis Pendapatan</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<?php 
							
							foreach($pendapatan as $row) : 
						?>
						<tbody>
							<tr>
								<td class="text-center"><?= ++$start; ?></td>
								<td class="text-center"><?= date('j F Y', strtotime($row['tgl'])); ?></td>
								<td class="text-center"><?= $row['keterangan']; ?></td>
								<td class="text-center"><?= $row['kategori']; ?></td>
								<td class="text-center"> Rp. <?= number_format( $row['pendapatan']); ?></td>
								
								<td class="text-center">
									<a class="tombol-hapus" href="<?= base_url('Transaksi/del_pendapatan/') ?><?= $row['id_transaksi'] ?>"><button class="btn btn-danger "><i class="fa fa-trash-o"></i></button></a> |
									<a href="<?= base_url('Transaksi/edit_pendapatan/') ?><?= $row['id_transaksi'] ?>"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
								</td>

							</tr>
							
						</tbody>
					<?php endforeach; ?>

					<tr>
						<td colspan="4"><b>Total Pendapatan</b></td>
						<td class="text-center">
							<span class="btn-sm btn-primary">Rp. <?= number_format($sum,2,".",","); ?></span>		
						</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="3"></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					</table>
					<?php echo $this->pagination->create_links(); ?>

					 <?php if(empty($pendapatan) ) : ?>
			            <div class="alert alert-danger" role="alert">
			              Data Tidak Ada !
			            </div>
			          <?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Pendapatan</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="<?= base_url('Transaksi/add_pendapatan') ?>" method="post">
      		<div class="panel-body">
      			<label>Tanggal Pendapatan</label>
				<input type="date" class="form-control" name="tgl">
				<?php echo form_error('tgl','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label>Keterangan</label>
				<textarea class="form-control" placeholder="Keterangan" rows="4" name="keterangan"></textarea>
				<?php echo form_error('keterangan','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label>Jumlah</label>
				<div class="input-group">
					<span class="input-group-addon">Rp.</span>
					<input class="form-control" type="number" placeholder="Jumlah" name="jumlah">
				</div>
				<?php echo form_error('jumlah','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label>Jenis Pendapatan</label>
				<select class="form-control" name="jenis_pendapatan">
					<optgroup label="Jenis Pendapatan">Jenis Pendapatan</option>
						<option value="Penjualan Barang">Penjualan Barang</option>
						<option value="Pendapatan Usaha">Pendapatan Usaha</option>
						<option value="Lain-lain">Lain-lain</option>
					</optgroup>
				</select>
				<?php echo form_error('jenis_pendapatan','<small class="text-danger pl-3">','</small>'); ?>
				
				 <div class="modal-footer">
				 	<button type="submit" class="btn btn-primary">Simpan</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			     </div>
			</div>
      	</form>
      </div>
     
    </div>
  </div>
</div>