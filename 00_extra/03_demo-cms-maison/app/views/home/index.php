<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Les recettes de Maisonneuve</title>
</head>

<body>
	<?php foreach ($recipes as $recipe) : ?>
		<ul>
			<li><?= $recipe->name ?></li>
		</ul>
	<?php endforeach ?>
</body>

</html>