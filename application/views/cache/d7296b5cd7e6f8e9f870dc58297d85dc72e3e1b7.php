<?php $__env->startSection('judul_halaman', 'Data Pesanan'); ?>
<?php $__env->startSection('judul', 'Pesanan Yang Sedang Dibuat'); ?>
<?php $__env->startSection('content'); ?>

<div class="card o-hidden border-0 shadow-lg" style="margin-top: 50px; margin-left: 10px; width: 1060px;">
	<div class="card-body p-4">
		<!-- Nested Row within Card Body -->
		<div class="row">
			<div class=" d-none d-lg-block"></div>
			<div class="col-lg-12">
				<div class="p-4 mb-4">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4"><?php echo $__env->yieldContent('judul'); ?></h1>
					</div>

					<table class="table table-stripped" align="center" style="width:">
						<thead align="center" style="background : linear-gradient(120deg, #3498db, #8e44ad)"
							class="text-light">
							<tr>
								<th>No.</th>
								<th>ID Pemesan</th>
								<th>Kode Transaksi</th>
								<th>Total Bayar</th>
								<th>Nama Penerima</th>
								<th style="width: 150px;">Status</th>
								<th>Metode Pembayaran</th>
								<th style="width: 150px;">Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$i = 1
							?>
							<?php $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr align="center">
								<td><?php echo e($i++); ?></td>
								<td><?php echo e($p['id_pemesan']); ?></td>
								<td><?php echo e($p['kode_transaksi']); ?></td>
								<td><?php echo e($p['total_bayar']); ?></td>
								<td><?php echo e($p['nama_penerima']); ?></td>
								<td class="text-light">
									<?php
									if($p['status'] == 'belum dibayar'){
									echo '<div class="bg-danger">'.$p['status'].'</div>';
									}elseif($p['status'] == 'selesai'){
									echo '<div class="bg-success">'.$p['status'].'</div>';
									}else {
									echo '<div class="bg-warning">'.$p['status'].'</div>';
									}
									?>
								</td>
								<td>
									<?php echo e($p['nama_metode']); ?>

								</td>
								<td>
									<div>
										<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Detail"
											onclick="detail_pesanan('<?php echo e($p['kode_transaksi']); ?>')"><i
												class="fas fa-info-circle"></i>&nbspDetail</a>
                                        <a href="<?php echo e(base_url('akun/lihat_pesanan_chef/') . $p['kode_transaksi']); ?>" class="btn btn-sm btn-success"><i class="fas fa-file"></i>&nbspLihat Pesanan</a>
									</div>
								</td>

							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Data Pesanan -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background : linear-gradient(120deg, #3498db, #8e44ad)">
				<h5 class="modal-title text-light" id="exampleModalCenterTitle">Detail Pesanan</h5>
				<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form">
					<div class="ml-3 mt-2 row">
						<div class="col-md-4 ml-5 row">
							<label for="id_pemesan" style="margin-top:5px;">ID Pemesan : </label>
							<input type="text" name="id_pemesan" class="form-control form-control-user ml-4"
								style="width: 50px;" value="" readonly>
						</div>
						<div class="col-md-6 row">
							<div class="col-6">
								<label for="kode_transaksi" style="margin-top: 5px;">Kode Transaksi : </label>
							</div>
							<div class="col-6">
								<input type="text" name="kode_transaksi" style="width:200px; margin-left:-40px;"
									class="form-control form-control-user" value="" readonly>
							</div>
						</div>
					</div>
					<hr>
					<div class="ml-3 row">
						<div class="col-md-4 ml-5 mt-4">
							<label for="nama_penerima" style="margin-top: 5px;">Nama Penerima :</label>
						</div>
						<div class="col-4 mt-4" style="margin-left:-100px;">
							<input type="text" name="nama_penerima" class="form-control form-control-user"
								style="width:250px;" value="" readonly>
						</div>
					</div>
					<div class="ml-3 row">
						<div class="col-md-4 ml-5 mt-4">
							<label for="email_penerima" style="margin-top: 5px;">Email Penerima :</label>
						</div>
						<div class="col-4 mt-4" style="margin-left:-100px;">
							<input type="text" name="email_penerima" class="form-control form-control-user"
								style="width:250px;" value="" readonly>
						</div>
					</div>
					<div class="ml-3 row">
						<div class="col-md-4 ml-5 mt-4">
							<label for="no_hp" style="margin-top: 5px;">No. Hp :</label>
						</div>
						<div class="col-4 mt-4" style="margin-left:-170px;">
							<input type="text" name="no_hp" class="form-control form-control-user" style="width:150px;"
								value="" readonly>
						</div>
						<div class="col-md-4 mt-4" style="margin-left:-40px;">
							<label for="alamat" style="margin-top: 5px;">Alamat :</label>
						</div>
						<div class="col-4 mt-4" style="margin-left:-170px;">
							<input type="text" name="alamat_penerima" class="form-control form-control-user"
								style="width:150px;" value="" readonly>

						</div>
					</div>
					<hr>
					<div class="ml-3 row">
						<div class="col-md-4 ml-5 mt-4">
							<label for="total_bayar" style="margin-top: 5px;">Total Bayar :</label>
						</div>
						<div class="col-4 mt-4" style="margin-left:-140px;">
							<input type="text" name="total_bayar" class="form-control form-control-user"
								style="width:150px;" value="Rp." readonly>
						</div>
						<div class="col-md-4 mt-4">
							<label for="status" style="margin-top: 5px; margin-left:-70px;">Status :</label>
						</div>
						<div class="col-4 mt-4" style="margin-left:-240px;">
							<input type="text" name="status" class="form-control form-control-user" style="width:150px;"
								value="" readonly>
						</div>
					</div>
					<div class="ml-5 row">
						<div class="col-md-4 mt-4" style="margin-left:100px;">
							<label for="tgl_pesan" style="margin-top: 5px;">Tanggal Pemesanan :</label>
						</div>
						<div class="col-4 mt-4" style="margin-left:-80px;">
							<input type="text" name="tgl_pesan" class="form-control form-control-user"
								style="width:250px;" value="" readonly>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
<script>
	function detail_pesanan(id) {
		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form').modal('show'); // show bootstrap modal when complete loaded

		//Ajax Load data from ajax
		$.ajax({
			url: "<?php echo site_url('akun/tampil_data_pesanan/')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {

				$('[name="id_pemesan"]').val(data.id_pemesan);
				$('[name="kode_transaksi"]').val(data.kode_transaksi);
				$('[name="nama_penerima"]').val(data.nama_penerima);
				$('[name="email_penerima"]').val(data.email_penerima);
				$('[name="no_hp"]').val(data.no_hp);
				$('[name="alamat_penerima"]').val(data.alamat_penerima);
				$('[name="total_bayar"]').val(data.total_bayar);
				$('[name="status"]').val(data.status);
				$('[name="tgl_pesan"]').val(data.tanggal_pemesanan);
				$('.modal-title').text('Detail Pesanan'); // Set title to Bootstrap modal title

			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restechno\application\views/pesanan_dibuat.blade.php ENDPATH**/ ?>