<?php
// Controleur qui gère la connexion au back office
class ControleurConnexion {

    // Fonction qui renvoi la vue admin si ce dernier est loggé sinon renvoi la vue du formulaire de connexion.
    public function connexion() {
        $_SESSION['nom'] = 'admin';
        $_SESSION['is_admin'] = '1';

        if (isset($_SESSION['nom']) AND isset($_SESSION['is_admin']))
        {
            echo('connection espace sécurisé');
            $view = new ControleurAdmin;
            $view->admin();
        }
        else
        {
            echo('connection KO');
            $view = new view("Connexion");
            $view->generer($test);
        }
    }
}