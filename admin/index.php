<?php
// Affiche la page d'accueil du blog qui liste le titre et lien cliquable des différents articles
error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('./functions.php');
$articles = getArticles();


require_once('./functions.php');

if($_GET['method'] == 'delete'){
	// FONCTION POUR SUPPRIMER LES ARTICLES
	
	$id=$_GET['id']; // on recupere dans l'URL le parametre ID

	//createArticle('Mon Petit Poney', 'Que j\'aime beaucoup');
	deleteArticle($id);
	echo('article '.$id.' supprimé');

}


?>

<!DOCTYPE html>
<html>

	
<body>
	<header>
	</header>
		<div class="container">
			<h1>Espace d'administration</h1>
			<hr/>
			<a href="./formulaireAjout.php">Créer un nouvelle article</a>
			<br/><hr/><br/>
			<p><b>Liste des articles éxistants : </b></p>
			<?php foreach($articles as $article): ?>
			<?php /*  print_r($article); */ ?>
				<p><?= $article->title ?>
					<a href="updateArticle.php?id=<?= $article->id ?>" class="btn btn-primary"> Editer l'article</a>
					<a href="index.php?method=delete&id=<?= $article->id ?>" class="btn btn-primary"> Supprimer l'article</a>
<!-- le lien redirige vers le fichier "supprimerArticle.php" avec l'identifiant de l'article à supprimer passé en paramètre -->
				</p>

			<?php endforeach; ?>
		</div>
</body>
</html>