<div class="container-fluid navContainer">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a href="<?php echo e($baseur); ?>/admin/index">
				<img src="<?php echo URL_ROOT . 'public/asset/img/message.png' ?>" width="35" height="35" alt="">
			</a>

			<!-- <form class="form-inline my-2 my-lg-0 indexForm" action="nav-form" method="post">
				<input class="form-control mr-sm-2" name="search_name" type="search" placeholder="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
			</form>
 -->			

			<div class="ml-auto">
				<ul class="navbar-nav">

					<li class="nav-item active">
						<a class="nav-link" href="#">
							<?php if(\Sysgem\Auth::check()): ?>
								<?php echo e(\Sysgem\Session::get("user_name")); ?>

							<?php endif; ?>
						</a>
					</li>	

					<li class="nav-item">
						<a class="nav-link" href="<?php echo e($baseur); ?>/admin/cat-list">Category</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo e($baseur); ?>/admin/products-new">Product New</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo e($baseur); ?>/admin/orderTable">Order</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link"  role="button" data-toggle="dropdown">
							<i class="fas fa-chevron-circle-down"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							
							<?php if(\Sysgem\Auth::check()): ?>
								<a class="dropdown-item" href="<?php echo e($baseur); ?>/admin/logout">Logout</a>
							<?php else: ?>
								<a class="dropdown-item" href="<?php echo e($baseur); ?>/admin/register">Register</a>
								<a class="dropdown-item" href="<?php echo e($baseur); ?>/admin/login">Login</a>
							<?php endif; ?>

							
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div><?php /**PATH C:\xampp\htdocs\MyProject5\Views/layout/nav.blade.php ENDPATH**/ ?>