<?php

namespace Rss\Show;

use Exception;

/**
 * Class Param
 *
 * Gets get and post params.
 *
 * @package Rss\Show
 */
class Param {

	/**
	 * Gets timestamp from url param.
	 *
	 * @throws Exception
	 */
	public static function getTimestamp() {
		$param = filter_input( INPUT_GET, 't', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

		if ( is_null( $param ) || ! $param ) {
			throw new Exception( "Sorry doesn't know this message." );
		}

		return $param;
	}

}