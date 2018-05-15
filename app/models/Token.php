<?php

namespace Rss;

use Exception;

/**
 * Class Token.
 * Handles request validation and "login".
 * @package Rss
 */
class Token {

	/**
	 * Validates provided token against correct token.
	 *
	 * @param string $token
	 *
	 * @throws Exception
	 */
	public static function validate( $token ) {
		if(strtolower($token) !== self::createToken()) {
			throw new Exception('Wrong authentication token!');
		}
	}

	/**
	 * Creates correct token.
	 *
	 * @return string
	 */
	private static function createToken() {
		return strtolower(sha1(APP_LOGIN_SEED . date('YmdH')));
	}

}
