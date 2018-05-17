<?php

namespace Rss;

use SimpleXMLElement;

/**
 * Class Feed.
 * Creates new RSS message.
 * @package Rss
 */
class Feed {

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
		$this->link        = HOME_LINK;
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
		$item = new SimpleXMLElement( '<item />', LIBXML_NOCDATA );
		$item->addChild( 'title', $this->title );
		$item->addChild( 'guid', sprintf( '%s?t=%s', $this->link, date( 'YmdHis' ) ) );
		$item->addChild( 'link', $this->link );
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
