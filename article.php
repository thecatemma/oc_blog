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
		
		$author = strip_tags($author);
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
	
}
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title><?= $article->title ?></title>
	</head>
	
	<body>
	  <a href="index.php">Retour aux articles</a>
		
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

			<form action="article.php?id=<?= $article->id ?>" method="post">
				<p> <label for="author">Pseudo :</label> <br />
				<input type="text" name="author" id="auhor" value="<?php if(isset($author)) echo $author ?>"/> </p>
				<p> <Label for="comment">Commentaire :</Label> <br />
				<textarea name="comment" id="comment" cols="30" rows="5"><?php if(isset($comment)) echo $comment ?></textarea> </p>
				<button type="submit" class="btn btn-success">Envoyer</button>
			</form>

			<h2>Commentaires :</h2>

			<?php foreach($comments as $com): ?>
				<h3><?= $com->author ?></h3>
				<time><?= $com->date ?></time>
				<p><?= $com->comment ?></p>
			<?php endforeach; ?>
			
		</div>
	</body>
</html>