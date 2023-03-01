<div class="main">
			
			<div class="main-content">
				<div class="container-fluid">
					
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Selamat Datang</h3>
							<p class="panel-subtitle"> <?= date('l, d M Y'); ?></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										
										<p>
											<span class="number">Rp. <?= number_format($sum);  ?></span>
											<span class="title">Pendapatan</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										
										<p>
											<span class="number">Rp. <?= number_format($sum2);  ?></span>
											<span class="title">Pengeluaran</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										
										<p>
											<span class="number">Rp. <?= number_format($sisa) ; ?></span>
											<span class="title">Saldo Akhir</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										
										<p>
											<span class="number"><?= $this->session->userdata['username']; ?></span>
											<span class="title">User</span>
										</p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
				
					
				</div>
			</div>
			
		</div>