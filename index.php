<?php
// Affiche la page d'accueil du blog qui liste le titre et lien cliquable des différents articles

error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('./functions.php');
$articles = getArticles();

include 'header.php';
?>
		
		<div class="container">
			
			<?php foreach($articles as $article): ?>
			<?php /*  print_r($article); */ ?>
				<h2><?= $article->title ?></h2>
				<a id="buttoninfo" href="article.php?id=<?= $article->id ?>" class="btn btn-primary"> Lire l'article</a>
				<br/><br/>_______ <br/>
			<?php endforeach; ?>
		</div>


	</body>

</html>