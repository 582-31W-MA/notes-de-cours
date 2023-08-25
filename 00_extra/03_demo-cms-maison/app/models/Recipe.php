<?php

/**
 * Recette
 * 
 */
class RecipeModel
{
	public $name, $slug;

	/**
	 * Constructeur de la classe
	 * 
	 * @param string $name Nom de la recette.
	 */
	function __construct($name)
	{
		$this->name = $name;

		// Génère le slug de la recette à partir de son nom.
		$lowercase_name = strtolower($name);
		$this->slug = urlencode($lowercase_name);
	}

	/**
	 * Requiert et retourne toutes les recettes du jeu de données.
	 *
	 * @return array Tableau contenant les recettes sous forme
	 * d'objet. 
	 */
	static function getAllRecipes()
	{
		// Requiert le contenu du fichier JSON `/db/recipes.json`. Le
		// contenu texte est ensuite décodé et traduit en code PHP.
		$db = file_get_contents(PROJECT_ROOT . "/db/recipes.json");
		$recipes = json_decode($db);

		return $recipes;
	}

	/**
	 * Ajoute une recette au jeu de données.
	 * 
	 * @return object La nouvelle recette.
	 */
	static function addRecipe($recipe_name)
	{
		// Instancie un objet Recette, et requiert toutes les recettes
		// du présent jeu de données.
		$recipe = new RecipeModel($recipe_name);
		$recipes = RecipeModel::getAllRecipes();

		// Ajoute la nouvelle recette au tableau contenant toutes les
		// recettes.
		array_push($recipes, $recipe);

		// Traduit le tableau PHP en JSON et écrase le contenu du
		// fichier JSON avec le nouveau jeu de données.
		$encoded_recipes = json_encode($recipes);
		file_put_contents(PROJECT_ROOT . "/db/recipes.json", $encoded_recipes);

		return $recipe;
	}
}
