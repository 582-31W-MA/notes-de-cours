<?php

/**
 * Une route, soit une page du site Web.
 */
class Route
{
	public $path, $params;

	function __construct($path, $params)
	{
		$this->path = $path;
		$this->params = $params;
	}
}
