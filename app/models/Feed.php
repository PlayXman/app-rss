<?php

namespace Rss;

use SimpleXMLElement;

/**
 * Class Feed.
 * Creates new RSS message.
 * @package Rss
 */
class Feed {

	const VIEW_SHOW_URL = '/view/show/';

	private $title;
	private $link;
	private $description;
	private $image;
	private $pubDate;

	/**
	 * Feed constructor.
	 *
	 * @param string $title       Message title
	 * @param string $description Message text
	 */
	public function __construct( $title, $description ) {
		$this->title       = $title;
		$this->description = $description;
		$this->pubDate     = date( 'r' );
		$this->link        = '';
		$this->image       = '';
	}

	/**
	 * Link to page.
	 *
	 * @param string $url
	 */
	public function setLink( $url ) {
		$this->link = $url;
	}

	/**
	 * Set link to media file.
	 *
	 * @param string $url Link to file
	 */
	public function setImage( $url ) {
		$this->image = " <img src=\"${url}\" width=\"200\" />";
	}

	/**
	 * Posts new item into feed.
	 * @throws \Exception
	 */
	public function post() {
		$file = new File();
		$file->postNewMessage( $this->createXmlItem() );
	}

	/**
	 * Creates XML item for feed.
	 * @return SimpleXMLElement
	 */
	private function createXmlItem() {
		$timestamp = date( 'YmdHis' );

		$item = new SimpleXMLElement( '<item />', LIBXML_NOCDATA );
		$item->addChild( 'title', $this->title );
		if ( empty( $this->link ) ) {
			$linkWithTimestamp = sprintf( '%s%s?t=%s', HOME_LINK, self::VIEW_SHOW_URL, $timestamp );
			$item->addChild( 'guid', $linkWithTimestamp );
			$item->addChild( 'link', $linkWithTimestamp );
		} else {
			$item->addChild( 'guid', $this->link . $timestamp );
			$item->addChild( 'link', $this->link );
		}
		$description = $item->addChild( 'description' );
		$this->addCData( $description, html_entity_decode( $this->description ) . $this->image );
		$item->addChild( 'pubDate', $this->pubDate );

		return $item;
	}

	/**
	 * Creates CDATA section in SimpleXMLElement node.
	 *
	 * @param SimpleXMLElement $sXmlElem
	 * @param string           $cdata_text Text in CDATA tag
	 */
	private function addCData( $sXmlElem, $cdata_text ) {
		$node = dom_import_simplexml( $sXmlElem );
		$no   = $node->ownerDocument;
		$node->appendChild( $no->createCDATASection( $cdata_text ) );
	}

}
