<?php

namespace Rss;
use SimpleXMLElement;

/**
 * Class Feed.
 * Creates new RSS message.
 * @package Rss
 */
class Feed {

	private static $mediaTypes = [
		'jpg' => 'image/jpeg',
		'png' => 'image/png',
		'gif' => 'image/gif',
		'avi' => 'video/avi',
		'mp4' => 'video/mp4'
	];

	private $title;
	private $link = DEFAULT_LINK;
	private $desctiption;
	private $enclosure;
	private $pubdate;

	/**
	 * Feed constructor.
	 *
	 * @param string $title Message title
	 * @param string $description Message text
	 */
	public function __construct($title, $description) {
		$this->title = $title;
		$this->desctiption = $description;
		$this->pubdate = date('r');
	}

	/**
	 * Link to page.
	 * @param string $url
	 */
	public function setLink($url) {
		$this->link = $url;
	}

	/**
	 * Set link to media file.
	 * @param string $url Link to file
	 * @param string $type Media type (jpg, png, gif, avi, mp4)
	 * @param int $size File size in bytes
	 */
	public function setEnclosure( $url, $type, $size ) {
		$this->enclosure = [
			'url' => $url,
			'type' => self::$mediaTypes[$type],
			'size' => $size
		];
	}

	/**
	 * Posts new item into feed.
	 * @throws \Exception
	 */
	public function post() {
		$file = new File();
		$file->postNewMessage($this->createXmlItem());
	}

	/**
	 * Creates XML item for feed.
	 * @return SimpleXMLElement
	 */
	private function createXmlItem() {
		$item = new SimpleXMLElement('<item />');
		$item->addChild('title', $this->title);
		$item->addChild('link', $this->link);
		$item->addChild('description', $this->desctiption);
		$item->addChild('pubdate', $this->pubdate);
		if(!is_null($this->enclosure)) {
			$img = new SimpleXMLElement('<enclosure />');
			$img->addAttribute('src', $this->enclosure['url']);
			$img->addAttribute('type', $this->enclosure['type']);
			$img->addAttribute('length', $this->enclosure['size']);
			$item->addChild( 'enclosure', $img );
		}

		return $item;
	}

}
