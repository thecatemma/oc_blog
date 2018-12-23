<?php

// Controller servant pour afficher un article unique en fonction de son ID
// Indiquer article.php?id=$id sinon redirige vers l'index.php

if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
		header('Location: index.php');
else
{
	extract($_GET);
	$id = strip_tags($id);
	
	require_once('./functions.php');
	
	if(!empty($_POST))
	{
		extract($_POST);
		$errors = array();
		
		$author = strip_tags($author); //strip_tags essaie de renvoyer une chaîne avec tous les octets NULL
		$comment = strip_tags($comment);
		
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
		}
	}
	
	$article = getArticle($id);
	$comments = getComments($id);
	
	include 'header.php'; //include, tjrs avant html !
}
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title><?= $article->title ?></title>
	</head>
	
	<body>
	
	  <div class="container">
		
			<h1><?= $article->title ?></h1>
			<time><?= $article->date ?></time>
		 	
		
			<p><?= $article->content ?></p>
			<hr />

			<?php

			if(!empty($errors)):?>

				<?php foreach($errors as $erros): ?>
			<p><?= $error ?></p>
				<?php endforeach; ?>

			<?php endif; ?>
		  
		  <h2>Poster un commentaire :</h2>

			<form action="article.php?id=<?= $article->id ?>" method="post">
				<p> <label for="author" id="author">Pseudo</label> <br />
				<input type="text" name="pseudo" id="pseudo" value="<?php if(isset($author)) echo $author ?>"/> </p>
				<p> <Label for="comment" id="text_comment">Commentaire</Label> <br />
				<textarea name="comment" id="comment" cols="30" rows="5"><?php if(isset($comment)) echo $comment ?></textarea> </p>
				<button type="submit" class="btn-success">Envoyer</button>
			</form>

			<h2>Liste des Commentaires </h2>

			<?php foreach($comments as $com): ?>
				<h5><?= $com->author ?><time><?= $com->date ?></time></h5>
				<p><?= $com->comment ?></p>
			<?php endforeach; ?>
			  
		  <a href="index.php">Retour aux articles</a>
		</div>
	</body>
</html>