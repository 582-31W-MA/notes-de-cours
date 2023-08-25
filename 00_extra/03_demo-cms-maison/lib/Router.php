<?php

require PROJECT_ROOT . "/lib/Route.php";

/**
 * Routeur.
 *
 * Contient les données et la logique qui permet d'associer un chemin
 * (ex. `/panel`) à un contrôleur (ex. `Panel.php`), et d'exécuter
 * l'action (une méthode dudit contrôleur) appropriée.
 */
class Router
{
	private $routes = [];

	/**
	 * Ajoute une route au tableau des routes.
	 *
	 * @param string $path URL absolu de la route débutant avec un
	 * `\`.
	 * @param array $parameters Tableau de paramètres qui sera passé
	 * au constrôleur lors de son instanciation. Doit inclure au moins
	 * le nom d'un contrôleur (ex. « Page ») et le nom d'une action
	 * (ex. « index »).
	 */
	public function addRoute($path, $params)
	{
		$new_route = new Route($path, $params);
		array_push($this->routes, $new_route);
	}

	/**
	 * Trouve la route qui correspond au chemin donné.
	 *
	 * @param string $path Chemin à utiliser pour trouver la route
	 * correspodante.
	 */
	public function matchRoute($path)
	{
		foreach ($this->routes as $route) {
			if ($route->path == $path) {
				return $route;
			}
		}
	}

	/**
	 * Exécute une action (une méthode) selon le présent chemin.
	 */
	public function dispatch()
	{
		// Stocke les différentes informations liées au URI.
		$uri = $_SERVER['REQUEST_URI'];
		$current_path = parse_url($uri)["path"];

		// Trouve la route qui correspond au présent chemin.
		$current_route = $this->matchRoute($current_path);


		if ($current_route) {
			// Ajoute le chemin de la présente route aux paramètres de
			// la route afin que le contrôleur y aille accès.
			$current_route->params["path"] = $current_path;

			// Importe le contrôleur selon le nom du contrôleur
			// spécifié dans les paramètres de la présente route.
			require PROJECT_ROOT . "/app/controllers/" . $current_route->params["controller"] . ".php";

			// Stocke le nom du contrôleur et de l'action spécifiés
			// dans les paramètres de la présente route.
			$controller_name = $current_route->params["controller"] . "Controller";
			$action_name = $current_route->params["action"] . "Action";

			// Instancie dynamiquement le contrôleur de la présente
			// route et exécute l'action appropriée. Passe les
			// `params` au contrôleurs.
			$controller = new $controller_name($current_route->params);
			$controller->$action_name();
		} else {
			// Si aucune route ne correspond au présent chemin,
			// retourne un message d'erreur.
			echo "404";
		}
	}
}
