<?php

// Contrôleur d'entrée (front controller). 
//
// Le code suivant est exécuté en premier lors de chaque requête au
// serveur. Il instancie un nouveau routeur, et y ajoute les routes
// voulues. La méthode `dispatch()` permet d'associer une route
// spécifique au présent chemin, et d'exécuter l'action appropiée.

require_once __DIR__ . "/../config.php";

require_once PROJECT_ROOT . "/lib/Router.php";
require_once PROJECT_ROOT . "/app/models/Recipe.php";

$router = new Router();

// Ajoute les routes statiques pour la page d'accueil, la page du tableau de bord (bord), et la page vers laquelle les utilisateur·rices sont redigiré·es lors de l'ajout d'une recette (voir la vue `/panel`).
$router->addRoute("/", ["controller" => "Page", "action" => "homeIndex"]);
$router->addRoute("/panel", ["controller" => "Panel", "action" => "index"]);
$router->addRoute("/panel/create", ["controller" => "Panel", "action" => "createRecipe"]);

$recipes = RecipeModel::getAllRecipes();

foreach ($recipes as $recipe) {
	$recipe_page_path = "/" . $recipe->slug;
	$router->addRoute($recipe_page_path, [
		"controller" => "Page",
		"action" => "index"
	]);
}

$router->dispatch();
