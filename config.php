<?php
// permet la connection à la base de données
//Php établit une connexion avec MySQL
//Utiliser l'extension PDO: outil qui permet d'accéder à n'importe quel type de bdd
//Sur MAMP, se trouve dans : /Applications/MAMP/conf/PHP5XXX/php.ini
//Dans php.ini, recherchez la ligne qui contientpdo_mysql -> extension=php_pdo_mysql.dll
//PDO est une extension orientée objet
//$bdd: objet qui représente la connexion à la base de données.
//Lorsque site sera en ligne, nom d'hôte différent ainsi qu'un login et mot de passe comme ceci : $bdd = new PDO('mysql:host=sql.hebergeur.com;dbname=mabase;charset=utf8', 'emma.husson', 's3cr3t');


$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>

