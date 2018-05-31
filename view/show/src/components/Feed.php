<?php

namespace Rss\Show;

use Exception;
use SimpleXMLElement;

/**
 * Class Feed
 *
 * Handles work with feed file.
 *
 * @package Rss\Show
 */
class Feed {

	const FEED_FOLDER = "../../../../feed";
	const FEED_FILE   = "feed.xml";

	private $fileContent;

	/**
	 * Feed constructor.
	 * @throws Exception
	 */
	public function __construct() {
		$this->getFileContent();
	}

	/**
	 * Gets item from feed by guid element
	 *
	 * @param string $guidTimestamp Timestamp from guid element
	 *
	 * @return string[]
	 * @throws Exception
	 */
	public function getItem( $guidTimestamp ) {
		$result = [
			'title'       => '',
			'description' => '',
			'pubDate'     => ''
		];
		$isSet  = false;

		foreach ( $this->fileContent->item as $item ) {
			if ( preg_match( "/${guidTimestamp}$/", $item->guid ) ) {
				$isSet                 = true;
				$result['title']       = $item->title;
				$result['description'] = $item->description;
				$result['pubDate']     = date( 'H:i:s j.n.Y', strtotime( $item->pubDate ) );
				break;
			}
		}

		if ( ! $isSet ) {
			throw new Exception( "This message is probably too old and server doesn't know it." );
		}

		return $result;
	}

	/**
	 * Gets feed content.
	 *
	 * @throws Exception
	 */
	private function getFileContent() {
		$pathToFile = $this->getFilePath();

		if ( is_readable( $pathToFile ) && ( $content = file_get_contents( $pathToFile ) ) !== false ) {
			$xml = new SimpleXMLElement( $content );

			if ( isset( $xml->channel->item ) && $xml->channel->item->count() > 0 ) {
				$this->fileContent = $xml->channel;
			} else {
				throw new Exception( "Sorry, but all old messages are deleted." );
			}
		} else {
			throw new Exception( "All old messages are deleted. That's probably because of new features in the app." );
		}
	}

	/**
	 * Returns path to feed file.
	 * @return string
	 */
	private function getFilePath() {
		return __DIR__ . '/' . self::FEED_FOLDER . '/' . self::FEED_FILE;
	}

}