<?php
require_once __DIR__ . '/Feed.php';
require_once __DIR__ . '/Param.php';

try {
	$feed = new \Rss\Show\Feed();
	$item = $feed->getItem( \Rss\Show\Param::getTimestamp() );

	// Success message
	?>
	<h1 class="mdc-typography--headline3 text__color--purple"><?php echo $item['title']; ?></h1>
	<h6 class="mdc-typography--subtitle2 text__color--grey"><?php echo $item['pubDate']; ?></h6>

	<p class="mdc-typography--body1"><?php echo $item['description']; ?></p>
	<?php
} catch ( Exception $e ) {

	// Error message
	?>
	<p class="mdc-typography--body1"><?php echo $e->getMessage(); ?></p>
	<?php
}
?>