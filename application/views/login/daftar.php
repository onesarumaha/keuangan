<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title><?= $title ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>/assets/img/icon-rajawali.jpg">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<p class="lead">DAFTAR KARYAWAN</p>
							</div>
							<form class="form-auth-small" action="<?= base_url('welcome/aksi_daftar') ?>" method="post">
								<?= $this->session->flashdata('pesan'); ?>
								<div class="form-group">
									<label for="username" class="control-label sr-only">Nama</label>
									<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
									<?php echo form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
								</div>
								<div class="form-group">
									<label for="jk" class="control-label sr-only">Jenis Kelamin</label>
									<select class="form-control" name="jk">
										<option name="jk">Jenis Kelamin</option>
										<option value="Pria">Pria</option>
										<option value="Wanita">Wanita</option>
									</select>
									<?php echo form_error('jk','<small class="text-danger pl-3">','</small>'); ?>
								</div>
						
								<div class="form-group">
									<label for="ttl" class="control-label sr-only">Tanggal lahir</label>
									<input type="date" name="ttl" value="TTL" class="form-control" id="ttl" placeholder="Tanggal Lahir">
									<?php echo form_error('ttl','<small class="text-danger pl-3">','</small>'); ?>
								</div>
								<div class="form-group">
									<label for="username" class="control-label sr-only">Username</label>
									<input type="username" name="username" class="form-control" id="username" placeholder="Username">
									<?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" name="password" class="form-control" id="signin-password" placeholder="Password">
									<?php echo form_error('password','<small class="text-danger pl-3">','</small>'); ?>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Konfirmasi Password</label>
									<input type="password" name="password2" class="form-control" id="signin-password" placeholder="Konfirmasi Password">
									<?php echo form_error('password2','<small class="text-danger pl-3">','</small>'); ?>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">DAFTAR</button>
							</form><br>
						</div>
						
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">SISTEM INFORMASI KEUANGAN </h1>
							<!-- <p>PT. RAJAWALI PENTA GRAFIKA JAKARTA</p> -->
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
