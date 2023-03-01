<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<?= $this->session->flashdata('flash'); ?>
<div class="main">

			<div class="main-content">
				<div class="container-fluid">
					<div class="panel">						
							<div class="panel-heading">
									<h3 class="panel-title">Data Profile</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Username</th>
												<th>Tanggal Lahir</th>
												<th>Jenis Kelamin</th>
												<th>Level</th>
											</tr>
										</thead>
										<?php $no = 1; ?>
										<tbody>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $query['nama'] ?></td>
												<td><?= $query['username'] ?></td>
												<td><?= date('d F Y', strtotime($query['tgl_lahir'])); ?></td>
												<td><?= $query['jk'] ?></td>
												<td><?= $query['level'] ?></td>
											</tr>
											
										</tbody>
									</table>
									<div class="text-left"><a href="<?= base_url('Auth/edit/') ?><?= $query['id'] ?>" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit Profile</a></div>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<form action="<?= base_url('Auth/proses_edit/') ?><?= $query['id'] ?>" method="post">
       		<div class="panel-body">
				<input type="hidden" class="form-control" name="id" value="<?= $query['id'] ?>">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama" value="<?= $query['nama']; ?>">
				<?php echo form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label>Username</label>
				<input type="text" class="form-control" name="username" value="<?= $query['username']; ?>" placeholder="text field">
				<?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label for="jk" class="control-label">Jenis Kelamin</label>
				<div class="form-group">
					<select class="form-control" name="jk">
						<option name="jk">Jenis Kelamin</option>
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select>
					<?php echo form_error('jk','<small class="text-danger pl-3">','</small>'); ?>
				</div>
				<label for="ttl" class="control-label">Tanggal lahir</label>
				<div class="form-group">
					<input type="date" name="ttl" value="<?= $query['tgl_lahir']; ?>" class="form-control" id="ttl" placeholder="Tanggal Lahir">
					<?php echo form_error('ttl','<small class="text-danger pl-3">','</small>'); ?>
				</div>
				<label>Password</label>
				<input type="password" class="form-control" name="password">
				<?php echo form_error('password','<small class="text-danger pl-3">','</small>'); ?>
				<br>
				<label>Ulang Password</label>
				<input type="password" class="form-control" name="password2">
				<br>	
				 <div class="modal-footer">
			        <button type="submit" class="btn btn-warning">Edit</button>
			      </div>		
	      	</div>
	     
	      </div>
       	</form>
    </div>
  </div>
</div>