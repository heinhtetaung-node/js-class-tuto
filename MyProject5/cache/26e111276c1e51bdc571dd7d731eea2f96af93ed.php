

<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5 mb-5">
	<div class="col-md-8 offset-md-2 table-bordered loginContainer p-5">

		<?php if(\Sysgem\Session::has('error_message')): ?>
			<?php echo e(\Sysgem\Session::flash('error_message')); ?>

		<?php endif; ?>

		<?php if(\Sysgem\Session::has('email_exist')): ?>
			<?php echo e(\Sysgem\Session::flash('email_exist')); ?>

		<?php endif; ?>

		<?php 
			$oldValues = [];
		?>


		<?php if(\Sysgem\Session::has('errors')): ?>
			<?php $__currentLoopData = \Sysgem\Session::getAndRemove('errors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<p class="text-danger"><?php echo e($value['message']); ?></p>

				<?php
					$oldValues[$value['key']] = $value['value'];
				?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>


		<h2 class="english1 text-center mb-3">Register User</h2>

		<form class="form" action="registerInsert" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" value="<?php echo e(isset($oldValues['username'])? $oldValues['username'] : ''); ?>" class="form-control rounded-0" name="username" id="username">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" value="<?php echo e(isset($oldValues['email'])? $oldValues['email'] : ''); ?>" class="form-control rounded-0" name="email" id="email">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" value="<?php echo e(isset($oldValues['password'])? $oldValues['password'] : ''); ?>" class="form-control rounded-0" name="password" id="password">
			</div>

			<div class="form-group">
				<label for="confirm_password">Confirm Password</label>
				<input type="password" value="<?php echo e(isset($oldValues['confirm_password'])? $oldValues['confirm_password'] : ''); ?>" class="form-control rounded-0" name="confirm_password" id="confirm_password">
			</div>
			
			<p></p>

			<div class="row no-gutters justify-content-end">
				<button class="btn btn-info">Register</button>
			</div>
		</form>
	</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\MyProject5\Views/admin/register.blade.php ENDPATH**/ ?>