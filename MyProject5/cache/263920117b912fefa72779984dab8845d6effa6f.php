

<?php $__env->startSection('title', 'Detail'); ?>

<?php $__env->startSection('content'); ?>

<div class="container cat-list mt-5 mb-5">
	<h1>Product Detail</h1>

	<div class="inner-list productDetail">
		<h5><?php echo e($row->title); ?></h5>
		<i>$<?php echo e($row->price); ?></i>
		<br><br>


		<img src="<?php echo URL_ROOT . 'public/asset/uploads/' . $row->file; ?>" style='max-width:650px; max-height: 400px;' alt="">
		<br><br>
		<p><?php echo e($row->des); ?></p>

		<a href="<?php echo e($baseur); ?>" class="new">Back</a>
	</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyProject5\Views/customer/detail.blade.php ENDPATH**/ ?>