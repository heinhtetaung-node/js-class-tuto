

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>



<div class="container mt-5">

	<?php if(\Sysgem\Session::has('addcart-finish')): ?>
		<?php echo e(\Sysgem\Session::flash('addcart-finish')); ?>

	<?php endif; ?>


	<div class="sidebar">
		<ul class="cats">
			<li>
				<b><a href="<?php echo e($baseur); ?>">All Categories</a></b>
			</li>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li>
					<a href="<?php echo e($baseur); ?>/products/cat?id=<?php echo $category->id ?>">
						<?php echo e($category->name); ?>

					</a>
				</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
	
	<div class="main">
		<ul class="books">
			<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li>
					<img src="<?php echo URL_ROOT . 'public/asset/uploads/' . $products->file; ?>" height='150'>
					<b>
						<a href="<?php echo e($baseur); ?>/products/detail?id=<?php echo $products->id ?>"><?php echo e($products->title); ?></a>
					</b>
					<i>$<?php echo e($products->price); ?></i>
					<a href="<?php echo e($baseur); ?>/addcart?id=<?php echo $products->id ?>" class="add-to-cart">Add to Cart</a>
				</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>	
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-php7.4\htdocs\MyProject5\Views/customer/index.blade.php ENDPATH**/ ?>