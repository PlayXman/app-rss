<?php
require_once __DIR__ . '/src/components/Env.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Show | Rss</title>

	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<link rel="icon" href="../favicon-32x32.png" type="image/png" sizes="32x32">
	<meta name="theme-color" content="#807ca5">

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<link href="<?php echo \Rss\Show\Env::getDomain(); ?>dist/css/style.css" rel="stylesheet">
</head>
<body class="mdc-typography">
	<div class="container">
		<div>
			<?php
			require __DIR__ . '/src/components/render.php';
			?>
		</div>
	</div>

	<endora>Be great. Admirals meet on flight at atlantis tower!</endora>
</body>
</html>
