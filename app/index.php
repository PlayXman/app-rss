<?php
//todo get url params
//todo get old rss file
//todo add new item
//todo creates rss file

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/src/File.php';
require_once __DIR__ . '/src/Feed.php';

try {
	$feed = new \Rss\Feed('aaa', 'Ooh, cloudy horror!');
	$feed->setLink('http://aaa.cz');
	$feed->post();
} catch (Exception $e) {
	echo $e;
}
