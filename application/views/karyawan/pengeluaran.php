<div class="pengeluaran-data" data-pengeluarandata="<?= $this->session->flashdata('pesan'); ?>">
</div>
<?= $this->session->flashdata('pesan'); ?>
<div class="main">

	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					
				</div>

				<div class="panel-body">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					 Input Pengeluaran
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
        <h2 class="modal-title" id="exampleModalLabel">Input Transaksi Pengeluaran</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="<?= base_url('Karyawan/input_pengeluaran') ?>" method="post" enctype="multipart/form-data">
      		<div class="panel-body">
      			<label>Nama</label>
				<input type="text" readonly="" class="form-control" name="nama" value="<?= $this->session->userdata('username')?>">
				<?php echo form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
				<br>
      			<label>Tanggal Pengeluaran</label>
				<input type="date" required="" class="form-control" name="tgl">
				<?php echo form_error('tgl','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label>Keterangan</label>
				<textarea class="form-control" required="" placeholder="Keterangan" rows="4" name="keterangan"></textarea>
				<?php echo form_error('keterangan','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label>Jumlah</label>
				<div class="input-group">
					<span class="input-group-addon">Rp.</span>
					<input class="form-control" required="" type="number" placeholder="Jumlah" name="jumlah">
				</div>
				<?php echo form_error('jumlah','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label>Jenis Pengeluaran</label>
				<select class="form-control" name="jenis_pengeluaran" required="">
					<optgroup label="Jenis Pengeluaran">Jenis Pengeluaran</option>
						<option value="Belanja Bahan-Bahan">Belanja Bahan-Bahan</option>
						<option value="Pembayaran Listrik">Pembayaran Listrik</option>
						<option value="Pembayaran Listrik">Pembayaran Pajak</option>
						<option value="Tagihan Air">Tagihan Air</option>
						<option value="Gaji Karyawan">Gaji Karyawan</option>
						<option value="Kas Bon">Kas Bon</option>
						<option value="Lain-lain">Lain-lain</option>
					</optgroup>
				</select>
				<?php echo form_error('jenis_pengeluaran','<small class="text-danger pl-3">','</small>'); ?>
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