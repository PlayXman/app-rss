<?php

namespace Rss;

use Exception;

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
	 * @throws Exception
	 */
	public function postNewMessage() {
		if($xml = simplexml_load_string($this->fileContent)) {

		} else {
			throw new Exception('File isn\'t xml!');
		}
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
			$this->fileContent = $this->createNewFile();
		}
	}

	/**
	 * Creates new feed file from template.
	 * @return string File content
	 * @throws Exception
	 */
	private function createNewFile() {
		if ( $file = fopen( $this->getFilePath(), 'w' ) ) {
			$content = file_get_contents( __DIR__ . '/' . self::FEED_TEMPLATE );
			if ( $content === false ) {
				throw new Exception( 'Unable to read feed template!' );
			}
			fwrite( $file, $content );
			fclose( $file );
		} else {
			throw new Exception( 'Unable to create new feed file!' );
		}

		return $content;
	}

}
