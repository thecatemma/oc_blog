<?php
// Affiche la page d'accueil du blog qui liste le titre et lien cliquable des différents articles

error_reporting(E_ERROR | E_WARNING | E_PARSE); 
//sert à afficher les erreurs d'execution de scripts php
//3 niveaux, fatal error = ça casse tout, warning, notice

require_once('./functions.php');
$articles = getArticles();

include 'header.php';
?>
		
		<div class="container">
			
			<?php foreach($articles as $article): ?> 
				
				<!-- pour chacun des articles en base on duplique ce bloc -->
			
				<div class="bloc">
					<?php /*  print_r($article); */ ?>
					<h2><?= $article->title ?></h2>
					<img src="images/img1.jpg" id="image_bloc">
					<a id="buttoninfo" href="article.php?id=<?= $article->id ?>" class="btn btn-primary"> Lire l'article</a>
					<br/><br/>_______ <br/>
				</div>
			<?php endforeach; ?>
			
			
		</div>


	</body>

</html>