<?php

namespace Rss\Show;

/**
 * Class Env
 *
 * Sets env.
 *
 * @package Rss\Show
 */
class Env {

	/** Linked statics domain for DEV env */
	const DEV_DOMAIN = 'http://localhost:8080';

	/** @var boolean */
	private static $isDev;

	/**
	 * Returns domain where statics are. It's per env
	 * @return string
	 */
	public static function getDomain() {
		self::setEnv();

		return self::$isDev ? self::DEV_DOMAIN . '/' : '';
	}

	/**
	 * Sets current env
	 */
	private static function setEnv() {
		if ( is_null( self::$isDev ) ) {
			self::$isDev = isset( $_SERVER['HTTP_HOST'] ) && ( $_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1' );
		}
	}

}