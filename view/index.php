<?php
require_once __DIR__ . '/../config.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Rss</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<link href="dist/css/style.css" rel="stylesheet">
</head>
<body class="mdc-typography" data-seed="<?php echo APP_LOGIN_SEED; ?>">
	<div class="mdc-layout-grid">
		<div class="mdc-layout-grid__inner">
			<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
				<h1 class="mdc-typography--headline3">Rss</h1>

				<?php
				require __DIR__ . '/components/form/index.php';
				?>
			</div>
		</div>
	</div>

	<endora>Be great.Admirals meet on flight at atlantis tower!</endora>

	<script src="dist/js/script.js"></script>
</body>
</html>
