

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>


<?php
	$total = 0;
?>

<div class="container">
	<table class="table mt-5 table-bordered">
		<thead>
			<tr>
				<th class="text-center" scope="col">Product Image</th>
				<th class="text-center" scope="col">Product Title</th>
				<th class="text-center" scope="col">Quantity</th>
				<th class="text-center" scope="col">Unit Price</th>
				<th class="text-center" scope="col">Price</th>
				<th class="text-center" scope="col">Delete</th>
			</tr>
		</thead>

		<tbody>
			<?php $__currentLoopData = $final; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<?php $total += $fin[0]['price'] * $fin['qty'];	?>
			<tr>
				<td class="text-center"><img src="<?php echo URL_ROOT . 'public/asset/uploads/' . $fin[0]['file']; ?>" height='120'></td>
				<td class="text-center"><?php echo $fin[0]['title']; ?></td>
				<td class="text-center"><?php echo e($fin['qty']); ?></td>	
				<td class="text-center"><i>$ <?php echo $fin[0]['price']; ?></i></td>
				<td class="text-center"><i>total: $</i><?php echo $fin[0]['price'] * $fin['qty'] ?></i></td>
				<td class="text-center"><a href="<?php echo e($baseur); ?>/clear?id=<?php echo $key; ?>"><i class="fa fa-trash text-danger"></i></a></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<tr>
				<td colspan="5" align="right"><b>Total:</b></td>
				<td>$<?php echo $total; ?></td>
			</tr>

		</tbody>
	</table>

	<div class="order-form">
		<h2>Order Now</h2>

		<form action="order" method="post">
			<label for="name">Your Name</label>
			<input type="text" name="name" id="name">

			<label for="email">Email</label>
			<input type="text" name="email" id="email">

			<label for="phone">Phone</label>
			<input type="text" name="phone" id="phone">

			<label for="address">Address</label>
			<textarea name="address" id="address"></textarea>

			<br><br>
			<input type="submit" value="Submit Order">
			<a href="<?php echo e($baseur); ?>">Continue Shopping</a>
		</form>
	</div>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyProject5\Views/customer/checkout.blade.php ENDPATH**/ ?>