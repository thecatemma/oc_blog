<?php

// LIBRAIRIE DE FONCTIONS

// FONCTION QUI CREE UN ARTICLE
function createArticle($title, $content) //variables en php qui doivent être passées à la fonction pour être injectées dans le sql
{
	require('./connect.php');
	//echo('INSERT INTO `articles` (`id`, `title`, `content`, `date`) VALUES (NULL, "'.$title.'", "'.$content.'", "2018-12-29 00:00:00");');
	//Echo sert à afficher dans le navigateur ce qui est suivi de echo
	
	$req = $bdd->prepare('INSERT INTO `articles` (`id`, `title`, `content`, `date`) VALUES (NULL, "'.$title.'", "'.$content.'", "2018-12-29 00:00:00");');
	
	//'.$valeur.' WHERE `articles`.`id` = ?') 
	
//code SQL qui sert à créer un article, à dynamiser
	$req->execute();
	$req->closeCursor();
}


// FONCTION QUI RECUPERE TOUS LES ARTICLES
function getArticles()
{
	require('./connect.php');
	$req = $bdd->prepare('SELECT id, title FROM articles ORDER BY id DESC');
	$req->execute();
	$data = $req->fetchAll(PDO::FETCH_OBJ);  //fetch en anglais signifie « va chercher »
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

// FONCTION QUI MET A JOUR UN ARTICLE, CAD
// UPDATE `articles` SET `content` = 'lorem ipsum dolor sit amet miou' WHERE `articles`.`id` = 4;

function updateArticle($id,$valeur)
{
	require('./connect.php');
	//$req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
	$req = $bdd->prepare('UPDATE `articles` SET `content` = '.$valeur.' WHERE `articles`.`id` = ?');
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


function deleteArticle($id)
{
	require('./connect.php');
	$req = $bdd->prepare('DELETE FROM `articles` WHERE `articles`.`id` = '.$id.' ');
	$req->execute();
	$req->closeCursor();
}

