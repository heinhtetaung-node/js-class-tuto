

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>


<div class="container mt-5">
	<div class="col-md-8 offset-md-2 table-bordered loginContainer p-5">

		<?php if(\Sysgem\Session::has('register_success')): ?>
			<?php echo e(\Sysgem\Session::flash('register_success')); ?>

		<?php endif; ?>


		<?php if(\Sysgem\Session::has('error_message')): ?>
			<?php echo e(\Sysgem\Session::flash('error_message')); ?>

		<?php endif; ?>

		<?php if(\Sysgem\Session::has('password_fail')): ?>
			<?php echo e(\Sysgem\Session::flash('password_fail')); ?>

		<?php endif; ?>


		<h2 class="english1 text-center mb-3">Login User</h2>

		<?php if(\Sysgem\Session::has('errors')): ?>
			<?php $__currentLoopData = \Sysgem\Session::getAndRemove('errors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<p class="text-danger"><?php echo e($value['message']); ?></p>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>

		
		<form class="form" action="loginMember" method="post">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control rounded-0" name="email" id="email">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control rounded-0" name="password" id="password">
			</div>
			<p></p>

			<div class="row no-gutters justify-content-end">
				<button class="btn btn-info">Login</button>
			</div>
		</form>
	</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyProject5\Views/admin/login.blade.php ENDPATH**/ ?>