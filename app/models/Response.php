<?php

namespace Rss;

/**
 * Class Response.
 * Builds responses for client from app.
 * @package Rss
 */
class Response {

	/**
	 * Creates success response json.
	 *
	 * @param string $text
	 *
	 * @return string
	 */
	public static function success($text) {
		return Response::getJson('success', $text);
	}

	/**
	 * Creates error response json.
	 *
	 * @param string $text
	 *
	 * @return string
	 */
	public static function error($text) {
		return Response::getJson('error', $text);
	}

	/**
	 * Creates response json.
	 *
	 * @param string $status
	 * @param string $text
	 *
	 * @return string
	 */
	private static function getJson($status, $text) {
		$json = [
			'status' => $status,
			'text' => $text
		];

		return json_encode($json);
	}

}
