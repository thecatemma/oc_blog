<?php
// permet la connection à la base de données

$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>