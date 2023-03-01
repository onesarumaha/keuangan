<div class="pesan-data1" data-pesandata1="<?= $this->session->flashdata('pesan'); ?>"></div>
	<?= $this->session->flashdata('pesan'); ?>
<div class="main">

	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Karyawan</h3>
				</div>
				<div class="panel-body">
				<form class="navbar-form navbar-right" action="" method="post">
					<div class="input-group">
						 <input type="text" class="form-control" name="cari5" placeholder="Pencarian ...">
						<span class="input-group-btn"><button type="submit" class="btn btn-primary">Cari</button></span>
					</div>
				</form>
					<table class="table table-hover">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Nama Lengkap</th>
								<th class="text-center">Username</th>
								<th class="text-center">Jenis Kelamin</th>
								<th class="text-center">Tanggal lahir</th>
								<th class="text-center">Level</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<?php 
						$no = 1;
						foreach ($karyawan as $kar) : ?>
						<tbody>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td class="text-center"><?= $kar['nama'] ?></td>
								<td class="text-center"><?= $kar['username'] ?></td>
								<td class="text-center"><?= $kar['jk'] ?></td>
								<td class="text-center"><?= date('d F Y', strtotime($kar['tgl_lahir'])); ?></td>
								<td class="text-center"><?= $kar['level'] ?></td>
								<td class="text-center">
									<a class="hapus-karyawan" href="<?= base_url('Karyawan/del_karyawan/') ?><?= $kar['id'] ?>"><button class="btn btn-danger "><i class="fa fa-trash-o"></i></button></a> 
								</td>

							</tr>
						<?php endforeach; ?>


						</tbody>
					</table>
					<?php if(empty($karyawan) ) : ?>
				            <div class="alert alert-danger" role="alert">
				              Data Karyawan Tidak Ada !
				            </div>
				          <?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	
</div>
