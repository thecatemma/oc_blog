<?php
// Controleur qui gère l'identification de l'admin
class ControleurIdentification {
    
    private $_utilisateur;
    private $_connexion;

    public function __construct() {
        $this->_utilisateur = new UtilisateurManager;
        $this->_connexion = new ControleurConnexion;
    }


    // Test les attributs de l'objet utilisateur créé à partir des données du formulaire.
    // Si les attributs sont les mêmes que les données stockées en bdd alors on stock en session le nom et le booléen is admin
    // Ces deux variables stockées en session permettront la vérification des droits admin (affichage admin, ajout article...)
    // Trois exceptions: les champs ne sont pas remplis (utilisateur, mot de passe), les données entrées ne sont pas reconnues en bdd
    public function identification() {
        if (!empty($_POST['nom']))
        {
            if (!empty($_POST['mot_de_passe']))
            {
                $user = $_POST['nom'];
                $mdp = $_POST['mot_de_passe'];
                $is_admin = 1;
                $donnees = array(
                    "nom" => $user,
                    "mot_de_passe" => $mdp,
                    "is_admin" => $is_admin
                );
                $testuser = new Utilisateur($donnees);
                $userrecu = $this->_utilisateur->get($testuser->nom());
                if (password_verify($testuser->mot_de_passe(),$userrecu->mot_de_passe()))
                {
                    $_SESSION['nom'] = $testuser->nom();
                    $_SESSION['is_admin'] = $testuser->is_admin();
                    $this->_connexion->connexion();
                }
                else
                    throw new Exception("Utilisateur et/ou mot de passe incorrect");
            }
            else
                throw new Exception("Entrez votre mot de passe");
        }
        else
            throw new Exception("Entrez votre nom d'utilisateur");
    }
}