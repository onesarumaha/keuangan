<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?= base_url('Auth'); ?>"><img src="<?= base_url() ?>/assets/img/logo-dash.jpg" alt="Rajawali Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url() ?>/assets/img/avatar.png" class="img-circle" alt="Avatar"> <span><?= $this->session->userdata('username')?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
				
								<li><a href="<?= base_url('/') ?>Auth/profile/"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
							
								<li><a href="#logout" data-toggle="modal" data-target="#staticBackdrop"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
								
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->


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
        <button type="submit" class="btn btn-primary">Logout</button>
      </div>
        </form>
    </div>
  </div>
</div>