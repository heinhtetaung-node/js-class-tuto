

<?php $__env->startSection('title', 'Category List'); ?>

<?php $__env->startSection('content'); ?>

<div class="container cat-list mt-5 mb-5">
	
	<h1>Category List</h1>

	<div class="inner-list">
		<ul>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li title="<?php echo e($category['remark']); ?>">
				[ <a href="<?php echo e($baseur); ?>/admin/cat-del?id=<?php echo $category['id'] ?>">del</a> ]
				[ <a href="<?php echo e($baseur); ?>/admin/cat-edit?id=<?php echo $category['id'] ?>">edit</a> ]
				<?php echo e($category['name']); ?>

			</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>

		<a href="<?php echo e($baseur); ?>/admin/cat-new" class="new">New Category</a>
	</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyProject5\Views/admin/cat-list.blade.php ENDPATH**/ ?>