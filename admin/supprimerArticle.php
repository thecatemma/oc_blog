<?php

require_once('./functions.php');

$id=$_GET['id']; // on recupere dans l'URL le parametre ID

//createArticle('Mon Petit Poney', 'Que j\'aime beaucoup');
deleteArticle($id);
echo('article '.$id.' supprimé')

?>
