<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/src/components/env/Env.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Rss</title>

	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<link rel="icon" href="../favicon-32x32.png" type="image/png" sizes="32x32">
	<meta name="theme-color" content="#ffffff">

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo \Rss\Env::getDomain(); ?>dist/css/style.css" rel="stylesheet">
</head>
<body class="mdc-typography" data-seed="<?php echo APP_LOGIN_SEED; ?>">
	<div class="container">
		<h1 class="mdc-typography--headline3">Rss</h1>

		<?php
		require __DIR__ . '/src/components/form/index.php';
		?>
	</div>

	<?php
	require __DIR__ . '/src/components/message/index.php';
	?>

	<endora>Be great. Admirals meet on flight at atlantis tower!</endora>

	<script src="<?php echo \Rss\Env::getDomain(); ?>dist/js/script.js"></script>
</body>
</html>
