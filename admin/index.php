<?php
// Affiche la page d'accueil du blog qui liste le titre et lien cliquable des différents articles

error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('./functions.php');
$articles = getArticles();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dernier Billet pour l'Alaska</title>
		<link rel="stylesheet" href="blog.css">
	</head>
	
<body>
	<header>
	</header>
		<div class="container">
			<h1>Mon blog</h1>
			<?php foreach($articles as $article): ?>
			<?php /*  print_r($article); */ ?>
				<h2><?= $article->title ?></h2>
				<time><?= $article->date ?></time>
				<a href="article.php?id=<?= $article->id ?>" class="btn btn-primary"> Lire la suite</a>
			<br/><hr/><br/>
			<?php endforeach; ?>
		</div>
</body>
</html>