<div class="container-fluid navContainer">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand" href="{{ $baseur }}">Home</a>
			
			<div class="ml-auto">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="{{ $baseur }}/checkout" class="nav-link" style="cursor: pointer">
							Cart
							<span class="badge badge-danger badge-pill" style="position: relative; top: -10px; left: -5px;">
								@if(\Sysgem\Session::has('cart'))
									<?php echo count(\Sysgem\Session::get('cart')); ?>
								@else
									0
								@endif
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>