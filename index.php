<?php
// Affiche la page d'accueil du blog qui liste le titre et lien cliquable des différents articles

error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('./functions.php');
$articles = getArticles();

include 'header.php';
?>

	
	   <div id="slide-accueil">
		<div id="cbp-fwslider" class="cbp-fwslider">
		<ul>
			<li><a href="#"><img src="images/img1.jpg" alt="img01"/></a></li>
			<li><a href="#"><img src="images/img2.jpg" alt="img02"/></a></li>
			<li><a href="#"><img src="images/img3.jpg" alt="img03"/></a></li>
		</ul>
		</div>
	   </div>
	
<!-----FIN SLIDER----->
		
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