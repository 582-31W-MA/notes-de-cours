<?php

require_once PROJECT_ROOT . "/lib/Controller.php";

/**
 * Contrôleur pour le tableau de bord.
 */
class PanelController extends Controller
{
	public function indexAction()
	{
		echo "Je suis le panel.";
	}
}
