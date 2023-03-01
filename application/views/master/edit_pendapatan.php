<div class="main">

	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Pendapatan</h3>
				</div>
				<form method="post" action="<?= base_url('Transaksi/proses_edit/') ?><?= $pendapatan['id_transaksi'] ?>" >
					<div class="panel-body">
						<input type="hidden" name="id_transaksi" value="<?= $pendapatan['id_transaksi']; ?>">
						<label>Tanggal</label>
						<input type="date" class="form-control" name="tgl" value="<?= $pendapatan['tgl'] ?>">
						<?php echo form_error('tgl','<small class="text-danger pl-3">','</small>'); ?>
						<br>
						<label>Keterangan</label>
						<textarea class="form-control" name="keterangan" placeholder="Keterangan" rows="4"><?= $pendapatan['keterangan'] ?></textarea>
						<?php echo form_error('keterangan','<small class="text-danger pl-3">','</small>'); ?>
						<br>
						<label>Jumlah</label>
						<div class="input-group">
							<span class="input-group-addon">Rp.</span>
							<input class="form-control" type="text" placeholder="Jumlah" name="jumlah" value="<?= $pendapatan['pendapatan'] ?>">
						</div>
						<?php echo form_error('jumlah','<small class="text-danger pl-3">','</small>'); ?>
						<br>
						<label>Jenis Pendapatan</label>
						<input class="form-control" type="text" name="jenis_pendapatan" value="<?= $pendapatan['kategori'] ?>">
						<?php echo form_error('jenis_pendapatan','<small class="text-danger pl-3">','</small>'); ?>
							
						<br>		
						 <button type="submit" class="btn btn-warning">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>