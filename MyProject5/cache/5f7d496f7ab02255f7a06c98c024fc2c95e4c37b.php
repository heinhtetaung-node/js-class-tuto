

<?php $__env->startSection('title', 'Order Table'); ?>

<?php $__env->startSection('content'); ?>


<div class="container mt-5">
	<table class="table">
		<thead class="thead-dark">
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Address</th>
		    </tr>
		</thead>

		<tbody class="bg-white">
			<?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <tr>
			      <td><a href="<?php echo e($baseur); ?>/admin/orderDetail?id=<?php echo $row->id ?>"><?php echo e($row->name); ?></a></td>
			      <td><?php echo e($row->email); ?></td>
			      <td><?php echo e($row->phone); ?></td>
			      <td><?php echo e($row->address); ?></td>
			    </tr>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyProject5\Views/admin/order.blade.php ENDPATH**/ ?>