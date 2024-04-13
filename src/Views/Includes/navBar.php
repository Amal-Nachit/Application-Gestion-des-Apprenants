<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-0 m-0 border-0 bd-example m-0 border-0">
	<nav class="navbar bg-body-tertiary mb-3">
		<div class="container-fluid">
			<h3>SIMPLON</h3>
			<?php
			use src\Controllers\UserController;

			$UserController = new UserController();

			if (isset($_SESSION['connecté'])) { ?>
				<a href="<?= HOME_URL ?>deconnexion" class="btn btn-outline-success" type="submit">Déconnexion</a>
			</div>
		</nav>
	<?php } ?>
	</div>
	</div>
	</nav>
</body>