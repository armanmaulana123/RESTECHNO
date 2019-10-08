<?php $__env->startSection('judul_halaman', 'Driver'); ?>
<?php $__env->startSection('content'); ?>

<div align="center" class="mt-5">
	<h3>Daftar Chef</h3>
</div>

<table border="0" class="table table-bordered table-hover mt-3" align="center">
	<thead align="center" class="bg bg-primary text-light">
		<tr>
			<th>Nama</th>
			<th>Email</th>
			<th>No Handphone</th>
			<th>Alamat</th>
			<th>Level User</th>
			<th>Tanggal Daftar</th>
			<th>Image</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $tampil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<tr align="center">
			<td><?php echo e($t['nama']); ?></td>
			<td><?php echo e($t['email']); ?></td>
			<td><?php echo e($t['no_hp']); ?></td>
			<td><?php echo e($t['alamat']); ?></td>
			<td><?php echo e($t['nama_level']); ?></td>
			<td><?php echo e($t['tanggal_pendaftaran']); ?></td>
			<td><img src=" <?php echo e(base_url('assets/img/profile/user/') . $t['image']); ?>" alt="" style="width: 60px; border-radius: 50px;"></td>


		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


	</tbody>
</table>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_script'); ?>
<script>
	// Page Akun
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restechno\application\views/data_driver.blade.php ENDPATH**/ ?>