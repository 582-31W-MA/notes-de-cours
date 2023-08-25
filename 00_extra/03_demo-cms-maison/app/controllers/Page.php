<?php

require_once PROJECT_ROOT . "/lib/View.php";
require_once PROJECT_ROOT . "/lib/Controller.php";
require_once PROJECT_ROOT . "/app/models/Recipe.php";

/**
 * Contrôleur pour toutes les pages « normales », c'est-à-dire toutes
 * les pages sauf celles du tableau de bord.
 */
class PageController extends Controller
{
	/**
	 * Action pour les pages ingrédients.
	 */
	public function indexAction()
	{
		// Stocke les différentes informations liées au URI.
		$path = $this->route_params["path"];
		$path_segments = explode("/", $path);
		$slug = end($path_segments);

		// Requiert la recette de la présente route et affiche la vue.
		// À faire...
	}

	/**
	 * Action pour la page d'accueil.
	 */
	public function homeIndexAction()
	{
		// Requiert toutes les recettes.
		$recipes = RecipeModel::getAllRecipes();

		// Affiche la vue `home` et passe à celle-ci la variable
		// `$recipes` afin qu'elle puisse être utilisée dans la vue.
		View::render("home", ["recipes" => $recipes]);
	}
}
