<div class="pesan-data" data-pesandata="<?= $this->session->flashdata('pesan'); ?>"></div>
	<?= $this->session->flashdata('pesan'); ?>
<div class="main">

	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					
				</div>

				<div class="panel-body">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					 Input Pendapatan
					</button>
					</table>
					
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
        <h2 class="modal-title" id="exampleModalLabel">Input Transaksi Pendapatan</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form enctype="multipart/form-data" action="<?= base_url('Karyawan/input_pendapatan') ?>" method="post">
      		<div class="panel-body">
      			<label>Nama</label>
				<input type="text" readonly="" class="form-control" name="nama" value="<?= $this->session->userdata('username')?>">
				<?php echo form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
				<br>
      			<label>Tanggal Pendapatan</label>
				<input type="date" class="form-control" required="" name="tgl">
				<?php echo form_error('tgl','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label>Keterangan</label>
				<textarea class="form-control" placeholder="Keterangan" required="" rows="4" name="keterangan"></textarea>
				<?php echo form_error('keterangan','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label>Jumlah</label>
				<div class="input-group">
					<span class="input-group-addon">Rp.</span>
					<input class="form-control" type="number" required="" placeholder="Jumlah" name="jumlah">
				</div>
				<?php echo form_error('jumlah','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label>Jenis Pendapatan</label>
				<select class="form-control" name="jenis_pendapatan" required="">
					<optgroup label="Jenis Pendapatan">Jenis Pendapatan</option>
						<option value="Penjualan Barang">Penjualan Barang</option>
						<option value="Pendapatan Usaha">Pendapatan Usaha</option>
						<option value="Lain-lain">Lain-lain</option>
					</optgroup>
				</select>
				<?php echo form_error('jenis_pendapatan','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<div class="form-group">
				    <label for="exampleFormControlFile1">Bukti Transaksi</label>
				    <input type="file" name="gambar" required="" class="form-control-file" id="exampleFormControlFile1">
				 </div>
				 
				  <small class="text-danger"><?php echo form_error('gambar'); ?></small>
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