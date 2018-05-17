<?php

namespace Rss;


use Exception;

/**
 * Class Params.
 * Gets and validates request params.
 * @package Rss
 */
class Params {

	/** @var array */
	private static $vars = [
		'token'       => [
			'required' => true,
			'filter'   => FILTER_SANITIZE_SPECIAL_CHARS,
			'error'    => 'Fill authentication param!'
		],
		'title'       => [
			'required' => true,
			'filter'   => FILTER_SANITIZE_SPECIAL_CHARS,
			'error'    => 'Fill required param "title"!'
		],
		'link'        => [
			'required' => false,
			'filter'   => FILTER_VALIDATE_URL,
			'error'    => 'Wrong "link" format. Must be URL!'
		],
		'description' => [
			'required' => true,
			'filter'   => FILTER_SANITIZE_SPECIAL_CHARS,
			'error'    => 'Fill required param "description"!'
		],
		'image'       => [
			'required' => false,
			'filter'   => FILTER_VALIDATE_URL,
			'error'    => 'Wrong "image" format. Must be URL!'
		]
	];

	/**
	 * Returns value of post param.
	 *
	 * @param string $name
	 *
	 * @return mixed|null Null if not set and not required
	 * @throws Exception
	 */
	public static function getVal( $name ) {
		if ( isset( self::$vars[ $name ] ) ) {
			$var   = self::$vars[ $name ];
			$param = filter_input( INPUT_POST, $name, $var['filter'] );

			if ( ! is_null( $param ) ) { //isset
				if ( $param !== false ) { //isset correctly
					return $param;
				} else {
					throw new Exception( $var['error'] );
				}
			} else if ( $var['required'] ) { //isNotSet + required
				throw new Exception( $var['error'] );
			} else { //isNotSet
				return null;
			}
		} else {
			throw new Exception( "Wrong param: ${name}" );
		}
	}

}
