<?php

require_once PROJECT_ROOT . "/lib/Controller.php";

/**
 * Contrôleur pour toutes les pages « normales », c'est-à-dire toutes
 * les pages sauf celles du tableau de bord.
 */
class PageController extends Controller
{
	public function homeAction()
	{
		echo "Je suis la page d'accueil.";
	}
}
