<?php
// FONCTION QUI RECUPERE TOUS LES ARTICLES
function getArticles()
{
	require('./connect.php');
	$req = $bdd->prepare('SELECT id, title FROM articles ORDER BY id DESC');
	$req->execute();
	$data = $req->fetchAll(PDO::FETCH_OBJ);
	return $data;
	$req->closeCursor();
}

// FONCTION QUI RECUPERE UN ARTICLE
function getArticle($id)
{
	require('./connect.php');
	$req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
	$req->execute(array($id));
	if($req->rowCount() == 1)
	{
		$data = $req->fetch(PDO::FETCH_OBJ);
		return $data;
	}
	else
		header('Location: index.php');
	$req->closeCursor();
}

// FONCTION QUI AJOUTE UN COMMENTAIRE EN BDD
function addComment($articleId, $author, $comment)
{
	require('./connect.php');
	$req = $bdd->prepare('INSERT INTO comments (articleId, author, comment, date) VALUES(?, ?, ?, NOW())');
	$req->execute(array($articleId, $author, $comment));
	$req->closeCursor();
}

// FONCTION QUI RECUPERE LES COMMENTAIRES D'UN ARTICLE
function getComments($id)
{
	require('./connect.php');
	$req = $bdd->prepare('SELECT * FROM comments WHERE articleId = ?');
	$req->execute(array($id));
	$data = $req->fetchAll(PDO::FETCH_OBJ);
	return $data;
	$req->closeCursor();
}