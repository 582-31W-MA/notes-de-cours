<?php

// Contrôleur d'entrée (front controller). 
//
// Le code suivant est exécuté en premier lors de chaque requête au
// serveur. Il instancie un nouveau routeur, et y ajoute les routes
// voulues. La méthode `dispatch()` permet d'associer une route
// spécifique au présent chemin, et d'exécuter l'action appropiée.

require_once __DIR__ . "/../config.php";
require_once PROJECT_ROOT . "/lib/Router.php";

$router = new Router();

$router->addRoute("/", ["controller" => "Page", "action" => "home"]);
$router->addRoute("/panel", ["controller" => "Panel", "action" => "index"]);

$router->dispatch();
