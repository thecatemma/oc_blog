<?php
// Classe abstraite modèle qui permet la connexion à la bdd
//avec sql on configure le port dans préférences de MAMP

abstract class Modele
{
    protected $_db;

    public function __construct()
    {
        $db = new PDO('mysql:host=localhost:8889;dbname=blogoc;charset=utf8', 'root', 'root');

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $this->_db = $db;
    }
}
