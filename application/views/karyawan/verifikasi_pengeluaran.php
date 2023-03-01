<div class="pengeluaran-data" data-pengeluarandata="<?= $this->session->flashdata('pesan'); ?>">
</div>
	<?= $this->session->flashdata('pesan'); ?>
<div class="main">

	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Verifikasi Pengeluaran</h3>
				</div>
				<div class="panel-body">
				<form class="navbar-form navbar-right" action="" method="post">
					<div class="input-group">
						 <input type="text" class="form-control" name="cari4" placeholder="Pencarian ...">
						<span class="input-group-btn"><button type="submit" class="btn btn-primary">Cari</button></span>
					</div>
				</form>
					<table class="table table-hover">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Bukti Transaksi</th>
								<th class="text-center">Tanggal</th>
								<th class="text-center">Keterangan</th>
								<th class="text-center">Jenis Pengeluaran</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<?php 
							
							foreach($veripeng as $row) : 
						?>
						<tbody>
							<tr>
								<td class="text-center"><?= ++$start; ?></td>
								<td class="text-center"><?= $row['nama']; ?></td>
								<td>
									<a href="<?= base_url('Karyawan/view_pengeluaran/'); ?><?= $row['id_transaksi'] ?>"><img width="50" height="50" src="<?= base_url() . '/assets/buktitransaksi/' . $row['gambar'] ?>"></a>
								</td>
								<td class="text-center"><?= date('j F Y', strtotime($row['tgl'])); ?></td>
								<td class="text-center"><?= $row['keterangan']; ?></td>
								<td class="text-center"><?= $row['kategori']; ?></td>
								<td class="text-center"> Rp. <?= number_format($row['pengeluaran']); ?></td>
								
								<td class="text-center">
									
									<a class="cek-pengeluaran" href="<?= base_url('Karyawan/ver_pengeluaran/') ?><?= $row['id_transaksi'] ?>"><button class="btn btn-success"><i class="fa fa-check-circle"></i></button></a> |
									<a class="hapus-pengeluaran" href="<?= base_url('Karyawan/hapus_pengeluaran/') ?><?= $row['id_transaksi'] ?>"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>
								</td>

							</tr>
							
						</tbody>
					<?php endforeach; ?>
					<tr>
						<td colspan="6"><b>Total </b></td>
						<td class="text-center">
							<span class="btn-sm btn-primary">Rp. <?= number_format($sum,2,".",","); ?></span>		
						</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="5"></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					</table>
					<?php echo $this->pagination->create_links(); ?>

					 <?php if(empty($veripeng) ) : ?>
		            <div class="alert alert-danger" role="alert">
		              Data Tidak Ada !
		            </div>
		          <?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	
</div>

