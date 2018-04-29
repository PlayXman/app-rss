<?php
//todo get url params
//todo get old rss file
//todo add new item
//todo creates rss file

require_once __DIR__ . '/src/File.php';
require_once __DIR__ . '/src/Feed.php';

try {
	$aaa = new \Rss\File();
} catch (Exception $e) {
	echo $e;
}
