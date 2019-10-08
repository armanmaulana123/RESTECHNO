<?php $__env->startSection('judul', 'Data Pesanan'); ?>
<?php $__env->startSection('judul_halaman', 'Menu Yang Di Pesan'); ?>
<?php $__env->startSection('content'); ?>


<div class="card o-hidden border-0 shadow-lg" style="margin-top: 50px; margin-left: 220px; width: 650px;">
	<div class="card-body p-4">
		<!-- Nested Row within Card Body -->
		<div class="row">
			<div class=" d-none d-lg-block"></div>
			<div class="col-lg-12">
				<div class="p-4 mb-4">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4"><?php echo $__env->yieldContent('judul'); ?></h1>
					</div>
					<hr />
                    <form action="<?php echo e(base_url('akun/buat_menu')); ?>" method="POST">
                        <input type="hidden" name="kode_transaksi" value="<?php echo e($pesanan['kode_transaksi']); ?>">
                        <div class="row mt-3">
                            <div style="margin-left: 30px;">
                                <label for="id_pesanan">ID Pesanan : <?php echo e($pesanan['id_keranjang']); ?></label>
                            </div>
                            <div style="margin-left: 110px;">
                                <label for="kode_transaksi">Kode Transaksi : <?php echo e($pesanan['kode_transaksi']); ?></label>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-5">
                                <img src="<?php echo e(base_url('assets/img/daftar_menu/'). $pesanan['image_menu']); ?>"
                                    class="img-thumbnail" style="width: 200px;">
                            </div>
                            <div class="col-4 mt-1">
                                <label>Nama Menu : </label>
                                <br />
                                <label>Jumlah Yang Dipesan : </label>
                                <br />
                                <label>Harga Menu : </label>
                                <br />
                                <label>Kategori Menu : </label>
                            </div>
                            <div class="col-1 mt-1">
                                <label>&nbsp<?php echo e($pesanan['nama_menu']); ?></label>
                                <br />
                                <label>&nbsp<?php echo e($pesanan['qty']); ?></label>
                                <br />
                                <label>Rp.&nbsp<?php echo e($pesanan['sub_total']); ?></label>
                                <br />
                                <label>&nbsp<?php echo e($pesanan['kategori_menu']); ?></label>
                            </div>
                        </div>
                        <hr />
                        <div>
                            <a href="<?php echo e(base_url('akun/data_pesanan_user')); ?>" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restechno\application\views/pesanan.blade.php ENDPATH**/ ?>