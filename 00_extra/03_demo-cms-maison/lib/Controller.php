<?php

/**
 * Contrôleur de base.
 *
 * Nécessaire afin que tous les contrôleurs puissent prendre comme
 * argument les paramètres de la route.
 */
abstract class Controller
{
	protected $route_params = [];

	function __construct($route_params)
	{
		$this->route_params = $route_params;
	}
}
