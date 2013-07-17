<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="/">Karasu</a>
			<div class="nav-collapse collapse navbar-responsive-collapse">
			<ul class="nav">
				<li>
					<a href="#">Nodes</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Add <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php foreach ($types as $type): ?>
							<li><a href="#"><?php echo $type; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</li>
			</ul>
			</div>
		</div>
	</div>
</div>