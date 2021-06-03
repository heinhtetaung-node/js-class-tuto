

<?php $__env->startSection('title', 'Category'); ?>

<?php $__env->startSection('content'); ?>


<div class="container cat-list mt-5 mb-5">
	<h1>New Category</h1>

	

	<div class="inner-new">
		<?php if(\Sysgem\Session::has('errors')): ?>
			<?php $__currentLoopData = \Sysgem\Session::getAndRemove('errors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<p class="text-danger"><?php echo e($value['message']); ?></p>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
		<form action="cat-add" method="post" autocomplete="off">

			<label for="name">Category Name</label>
			<input type="text" name="name" id="name" class="form-control">

			<label for="remark">Remark</label>
			<textarea class="form-control" name="remark" id="remark" rows="3"></textarea>


			<br>
			<button type="submit" class="btn btn-primary">Post</button>
		</form>
	</div>
	
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyProject5\Views/admin/cat-new.blade.php ENDPATH**/ ?>