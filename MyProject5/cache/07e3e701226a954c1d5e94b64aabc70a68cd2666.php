

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>


<div class="container">
	<table class="table table-bordered table-secondary tableCss">
		<thead>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Price</th>
				<th>Catgeory</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="table-light text-muted">
					<td class="text-center">
						<img src="<?php echo URL_ROOT . 'public/asset/uploads/' . $products->file; ?>" style='max-width:150px; max-height: 200px;' alt="">
					</td>
					<td><a href="<?php echo e($baseur); ?>/admin/cat-detail?id=<?php echo $products->id ?>"><?php echo e($products->title); ?></a></td>
					<td>$ <i><?php echo e($products->price); ?></i></td>
					<td><?php echo e($products->name); ?></td>
					<td class="productIcon">
						<a href="<?php echo e($baseur); ?>/admin/pro-edit?id=<?php echo $products->id ?>"><i class="fa fa-edit text-warning"></i></a>
						<a href="<?php echo e($baseur); ?>/admin/pro-del?id=<?php echo $products->id ?>"><i class="fa fa-trash text-danger"></i></a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


		</tbody>
	</table>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyProject5\Views/admin/index.blade.php ENDPATH**/ ?>