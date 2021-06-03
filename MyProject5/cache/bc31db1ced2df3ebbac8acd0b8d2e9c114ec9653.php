

<?php $__env->startSection('title', 'Category Edit'); ?>

<?php $__env->startSection('content'); ?>

<div class="container cat-list mt-5 mb-5">
	<h1>Category Edit</h1>

	<div class="inner-new">


		<?php if(\Sysgem\Session::has('errors')): ?>
			<?php $__currentLoopData = \Sysgem\Session::getAndRemove('errors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<p class="text-danger"><?php echo e($value['message']); ?></p>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>


		<form method="post" enctype="multipart/form-data" action="product-add" autocomplete="off">
			<label for="title">Product Name</label>
			<input type="text" name="title" id="title" class="form-control">

			<label for="price">Price </label>
			<input type="number" name="price" id="price" class="form-control">

			<div class="form-group">
			    <label for="categories">Example select</label>
			    <select class="form-control" id="categories" name="category_id">
			    	<option value="0">-- Choose --</option>
				    	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    		<option value="<?php echo e($category['id']); ?>">
				    			<?php echo e($category['name']); ?>

				    		</option>
				    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    </select>
			 </div>

			<label for="des">Destruction</label>
			<textarea class="form-control" name="des" id="des" rows="6"></textarea>

			<div class="form-group">
			    <label for="file">Example file input</label>
			    <input type="file" class="form-control-file" id="file" name="file">
			</div>

			<div class="row no-gutters justify-content-end">
				<button type="submit" name="submit" class="btn btn-primary">Post</button>
			</div>
		</form>
	</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyProject5\Views/admin/product-new.blade.php ENDPATH**/ ?>