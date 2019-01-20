<?php

// Controller servant pour afficher un article unique en fonction de son ID
// Indiquer article.php?id=$id sinon redirige vers l'index.php

if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
	echo ($_GET['id']); //header('Location: index.php');
else 
{ 
	extract($_GET);
	$id = strip_tags($id);
	
	require_once('./functions.php');
	
	if($_GET['method']=='update' && !empty($_POST)) {
		
		//print_r($_POST);
		//extract($_POST);
		//echo($_POST['content']);
		
		updateArticle($id,$_POST['content']);
		
		/*$errors = array();
		
		$author = strip_tags($author);
		$comment = strip_tags($comment);
		
		// strip_tags - Supprime les balises HTML et PHP d'une chaîne
		
		if(empty($author))
			array_push($errors, 'Entrez un pseudo');
		
		if(empty($comment))
			array_push($errors, 'Entrez un commentaire');
		
		if(count($errors) == 0)
		{
			$comment = addComment($id, $author, $comment);
			
			$success = 'Votre commentaire a été publié';
			
			unset($author);
			unset($comment);
		} */
	}
	
	$article = getArticle($id);
	$comments = getComments($id);
	
}
?>

<!DOCTYPE html>
<html>
	<head>
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>
			

		  tinymce.init({
			selector: '#mytextarea',
			plugins: "paste",
            //menubar: "edit",
            toolbar: "paste"
		  });
		  </script>	   
		<meta charset="utf-8" />
		<title><?= $article->title ?></title>
	</head>
	
	<body>
	  <a href="index.php">Retour aux articles</a>
		
	  <div class="container">
		
			
			
<!-- ajouter action au submit du formulaire pour stocker les infos en bdd -->
		  
	<form method="post" action="updateArticle.php?method=update&id=<?= $article->id ?>">
		  	<input type="text" name="title" value="<?= $article->title ?>">
		  	<time><?= $article->date ?></time>
		  
			<textarea id="mytextarea" name="content"><?= $article->content ?></textarea>
			  <input type="submit" value="Submit">	  
	</form>
		  
<!-- https://www.tiny.cloud/docs/quick-start/ -->
			<hr /> <!-- barre horizontale -->

			<?php

			if(!empty($errors)):?>

				<?php foreach($errors as $errors): ?> <!-- pour chacune des erreurs avec un s as error sans s: faire ce qui suit-->
			<p><?= $error ?></p> <!-- affiche valeur comme ouvir un chevron php echo la variable  -->
				<?php endforeach; ?>

			<?php endif; ?>

		  
		</div>
	</body>
</html>