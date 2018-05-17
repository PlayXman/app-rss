<?php

namespace Rss;

use DOMDocument;
use Exception;
use SimpleXMLElement;

/**
 * Class File.
 * Builds new feed file.
 * @package Rss
 */
class File {

	const FEED_FOLDER = "../../feed";
	const FEED_FILE = "feed.xml";
	const FEED_TEMPLATE = "../templates/feed.xml";
	const MAX_FEED_NUMBER = 10;

	/** @var SimpleXMLElement[] */
	private $fileItems = [];

	/** @var SimpleXMLElement */
	private $fileTemplate;

	/**
	 * File constructor.
	 * @throws Exception
	 */
	public function __construct() {
		$this->setFileContent();
		$this->setFileTemplate();
	}

	/**
	 * Adds new message to feed.
	 *
	 * @param SimpleXMLElement $itemXml
	 *
	 * @throws Exception
	 */
	public function postNewMessage( SimpleXMLElement $itemXml ) {
		$xml  = new SimpleXMLElement( $this->fileTemplate );
		$root = dom_import_simplexml( $xml->channel );

		//new one
		$item = dom_import_simplexml( $itemXml );
		$item = $root->ownerDocument->importNode( $item, true );
		$root->appendChild( $item );

		//old ones
		foreach ( $this->fileItems as $val ) {
			$item = dom_import_simplexml( $val );
			$item = $root->ownerDocument->importNode( $item, true );
			$root->appendChild( $item );
		}

		//format xml
		$dom                     = new DOMDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput       = true;
		$dom->loadXML( $root->ownerDocument->saveXML() );

		$this->createNewFile( $dom->saveXML() );
	}

	/**
	 * Returns path to feed file.
	 * @return string
	 */
	private function getFilePath() {
		return __DIR__ . '/' . self::FEED_FOLDER . '/' . self::FEED_FILE;
	}

	/**
	 * Gets actual feed content.
	 */
	private function setFileContent() {
		$pathToFile = $this->getFilePath();

		if ( is_readable( $pathToFile ) && ( $content = file_get_contents( $pathToFile ) ) !== false ) {
			$xml   = new SimpleXMLElement( $content );
			$items = [];
			$i     = 1;
			foreach ( $xml->channel->item as $item ) {
				$items[] = $item;
				if ( ++ $i > self::MAX_FEED_NUMBER - 1 ) {
					break;
				}
			}
			$this->fileItems = $items;
		}
	}

	/**
	 * Gets feed template.
	 * @throws Exception
	 */
	private function setFileTemplate() {
		$template = file_get_contents( __DIR__ . '/' . self::FEED_TEMPLATE );
		if ( $template !== false ) {
			$this->fileTemplate = $template;
		} else {
			throw new Exception( 'Unable to read feed template!' );
		}
	}

	/**
	 * Creates new feed file from template.
	 *
	 * @param string $content
	 *
	 * @return string File content
	 * @throws Exception
	 */
	private function createNewFile( $content ) {
		if ( $file = fopen( $this->getFilePath(), 'w' ) ) {
			fwrite( $file, $content );
			fclose( $file );
		} else {
			throw new Exception( 'Unable to create new feed file!' );
		}

		return $content;
	}

}
