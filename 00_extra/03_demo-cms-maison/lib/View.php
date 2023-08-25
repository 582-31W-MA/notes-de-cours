<?php


/**
 * Vue
 *
 * Contient seulement une fonction statique pour afficher une vue.
 */
abstract class View
{
	/**
	 * Affiche le contenu d'une vue donnée.
	 *
	 * @param string $view Nom de la vue (sans chemin ni extension).
	 * @param array $context Optionnel. Variables à rendre disponible
	 * dans la vue.
	 */
	static function render($view, $context = [])
	{
		// Extracte les éléments du tableau associatif `context` afin
		// de les rendre disponible à la vue comme variables.
		extract($context);

		// Affiche le contenu de la vue.
		require PROJECT_ROOT . "/app/views/$view/index.php";
	}
}
