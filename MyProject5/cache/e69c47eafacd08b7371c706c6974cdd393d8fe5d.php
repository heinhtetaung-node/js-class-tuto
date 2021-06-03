

<?php $__env->startSection('title', 'Order Detail'); ?>

<?php $__env->startSection('content'); ?>


<div class="container cat-list mt-5 mb-5">
	<h1>Hello World. Change the world</h1>

	<div class="inner-list productDetail">
		<p>Name: <?php echo e($row->name); ?></p>
		<i>Total: $<?php echo e($row->total); ?></i>
		<p>Order Date: <?php echo e($row->order_date); ?></p>

		<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p>Product Name: <?php echo e($pro->title); ?></p>
			<i>Unit Price: $<?php echo e($pro->price); ?></i>
			<p>Quantity: <?php echo e($pro->qty); ?></p>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyProject5\Views/admin/orderDetail.blade.php ENDPATH**/ ?>