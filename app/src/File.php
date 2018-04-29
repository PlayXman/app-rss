<?php

namespace Rss;

use Exception;
use SimpleXMLElement;

class File {

	const FEED_FOLDER = "../../feed";
	const FEED_FILE = "feed.xml";
	const FEED_TEMPLATE = "../templates/feed.xml";

	/** @var string */
	private $fileContent;

	/**
	 * File constructor.
	 * @throws Exception
	 */
	public function __construct() {
		$this->setFileContent();
	}

	/**
	 * todo
	 *
	 * @param $itemXml
	 *
	 * @throws Exception
	 */
	public function postNewMessage($itemXml) {
		$xml = new SimpleXMLElement($this->fileContent);
		$xml->channel->addChild('items', $itemXml);
		var_dump($xml);
		die;
		$this->createNewFile($xml->asXML());
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
	 * @throws Exception
	 */
	private function setFileContent() {
		$pathToFile = $this->getFilePath();

		if ( is_file( $pathToFile ) ) {
			$this->fileContent = file_get_contents( $pathToFile );
		} else {
			$content = file_get_contents( __DIR__ . '/' . self::FEED_TEMPLATE );
			if ( $content !== false ) {
				$this->fileContent = $this->createNewFile($content);
			} else {
				throw new Exception( 'Unable to read feed template!' );
			}
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
	private function createNewFile($content) {
		if ( $file = fopen( $this->getFilePath(), 'w' ) ) {
			fwrite( $file, $content );
			fclose( $file );
		} else {
			throw new Exception( 'Unable to create new feed file!' );
		}

		return $content;
	}

}
