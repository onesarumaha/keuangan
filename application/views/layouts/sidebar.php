<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li><a href="<?= base_url('Auth') ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

				<?php if($this->session->userdata('level') == 'Bagian Keuangan'):  ?>
				
				<li><a href="<?= base_url('Karyawan/data_karyawan'); ?>"><i class="fa fa-list-ul"></i> <span>Data Karyawan</span></a></li>
				
				<li>
					<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-list-alt"></i> <span>Data Transaksi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPages" class="collapse ">
						<ul class="nav">
							<li><a href="<?= base_url('Transaksi/pendapatan') ?>">Pendapatan</a></li>
							<li><a href="<?= base_url('Transaksi/pengeluaran') ?>">Pengeluaran</a></li>
							
						</ul>
					</div>
				</li>

				<li>
					<a href="#subPage" data-toggle="collapse" class="collapsed"><i class="fa fa-check"></i><span>Verifikasi Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPage" class="collapse ">
						<ul class="nav">
							<li><a href="<?= base_url('Karyawan/varifikasi_pendapatan') ?>"> Verifikasi Pendapatan</a></li>
							<li><a href="<?= base_url('Karyawan/varifikasi_pengeluaran') ?>">Verifikasi Pengeluaran</a></li>
							
						</ul>
					</div>
				</li>

				<li>
					<a href="#subPage1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPage1" class="collapse ">
						<ul class="nav">
							<li><a href="<?= base_url('Laporan/laporan_keuangan') ?>">Laporan Keuangan</a></li>
							
						</ul>
					</div>
				</li>
				<?php endif; ?>
			</ul>

			<ul class="nav">
				<?php if($this->session->userdata('level') == 'Manejer'): ?>

				<li><a href="<?= base_url('Karyawan/data_karyawan'); ?>"><i class="fa fa-list-ul"></i> <span>Data Karyawan</span></a></li>

				<li>
					<a href="#subPage1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPage1" class="collapse ">
						<ul class="nav">
							<li><a href="<?= base_url('Laporan/laporan_keuangan') ?>">Laporan Keuangan</a></li>
							
						</ul>
					</div>
				</li>
				<?php endif; ?>

				<?php if($this->session->userdata('level') == 'Karyawan'): ?>

				<li>
					<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-list-alt"></i> <span>Input Transaksi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
					<div id="subPages" class="collapse ">
						<ul class="nav">
							<li><a href="<?= base_url('Karyawan/pendapatan') ?>">Pendapatan</a></li>
							<li><a href="<?= base_url('Karyawan/pengeluaran') ?>">Pengeluaran</a></li>
							
						</ul>
					</div>
				</li>

				<?php endif; ?>
				
				<li><a href="#logout" data-toggle="modal" data-target="#staticBackdrop"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
			</ul>
		</nav>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Keluar dari Sistem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Welcome/logout') ?>" method="post">
        	Yakin ingin Keluar ?

      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Log Out</button>
	      </div>
        </form>
    </div>
  </div>
</div>