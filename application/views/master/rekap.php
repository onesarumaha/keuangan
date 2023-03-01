<div class="main">

	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Transaksi</h3>
				</div>

				<div class="panel-body">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					  [+] Tambah Transaksi
					</button>
					<table class="table table-hover">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Tanggal Transaksi</th>
								<th class="text-center">Keterangan</th>
								<th class="text-center">Pendapatan</th>
								<th class="text-center">Pengeluaran</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<?php 
						$no = 1;
						foreach($rekap as $item) : ?>
						<tbody>
							<tr>
								<td class="text-center"><?= $no++; ?></td>
								<td class="text-center"><?= $item['pengeluaran'];?></td>
								<td class="text-center"><?= $item['keterangan']; ?></td>
								<td class="text-center"><?= $item['jumlah']; ?></td>
								<td class="text-center"><?= $item['pendapatan']; ?></td>
						
								<td class="text-center">
									<a href=""><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a> |
									<a href=""><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
								</td>
							</tr>
							
						</tbody>
					<?php endforeach; ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>