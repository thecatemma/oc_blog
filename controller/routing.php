<?php
// Routeur qui diriger les différentes requêtes aux controleurs correspondant.
class Routeur
{
    private $ctrlAccueil;
   

    // Routage des requêtes à partir de la variable $_GET['action']
    public function routerRequete()
    {
        try {
           
			echo('Controleur/Routeur l:63 > no action get from url -> go to index page<br/>');
			$this->ctrlAccueil = new ControleurAccueil;
			$this->ctrlAccueil->accueil();
      
          }
          catch (Exception $e) {
              $msgErreur = $e->getMessage();
              require 'view/viewErreur.php';
          }
    }

}