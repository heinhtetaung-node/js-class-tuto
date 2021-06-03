<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $__env->yieldContent('title'); ?></title>
  	<script src="https://kit.fontawesome.com/cb07d8fa89.js" crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="<?php echo URL_ROOT . 'public/asset/css/bootstrap.min.css' ?>">
  	<link rel="stylesheet" href="<?php echo URL_ROOT . 'public/asset/css/frontstyle.css' ?>">
</head>
<body>
	<?php echo $__env->make('layout.homenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('content'); ?>

	<script src="<?php echo URL_ROOT . 'public/asset/js/jquery.js' ?>"></script>
	<script src="<?php echo URL_ROOT . 'public/asset/js/bootstrap.bundle.min.js' ?>"></script>

	<?php echo $__env->yieldContent('script'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\MyProject5\Views/layout/home.blade.php ENDPATH**/ ?>