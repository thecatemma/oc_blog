<?php
// Controleur qui gère les actions relatives aux commentaires
class ControleurCommentaire {
    private $_commentaire;

    public function __construct() {
        $this->_commentaire = new CommentaireManager;
    }

    // Ajoute un nouveau commentaire en bdd à partir d'un objet commentaire créé avec les entrées du formulaire.
    // Si le formulaire est vide, on lance une exception. Relative à l'auteur pour le champs auteur et au contenu pour le contenu.
    // En sortie on ajoute à la bdd commentaire le nouveau commentaire puis on réaffiche le détail de l'article commenté.
    public function commenter() {
        if (!empty($_POST['auteur']))
        {
            if (!empty($_POST['contenu']))
            {
                $auteur = htmlspecialchars($_POST['auteur']);
                $contenu = htmlspecialchars($_POST['contenu']);
                $donnees = array(
                    "auteur" => $auteur,
                    "contenu" => $contenu,
                    "id_article" => $_POST['id_article'],
                    "is_signal" => 0
                );
                $nouveaucommentaire = new Commentaire($donnees);
                $this->_commentaire->add($nouveaucommentaire);
                header('Location: ../index.php?action=article&id='.$_POST['id_article']);
            }
            else
                throw new Exception("Commentaire non valide");
        }
        else
            throw new Exception("Auteur non valide");
    }

    // Signale un commentaire en bdd à partir de l'update d'un objet commentaire créé avec l'id comm et l'id article reçu en $_GET.
    // Deux exceptions. Si l'id est nul et si les id article et commentaire ne correspondent pas l'un à l'autre.
    public function signal(){
        if ((isset($_GET['id_commentaire'])) AND (isset($_GET['id_article'])))
        {
            $idArticle = intval($_GET['id_article']);
            $idCommentaire = intval($_GET['id_commentaire']);
            if (($idArticle != 0) AND ($idCommentaire != 0))
            {
                $donnees = array(
                    "id" => $idCommentaire,
                    "is_signal" => 1
                );
                $commentaire_a_signal = new Commentaire($donnees);
                $this->_commentaire->updatesignal($commentaire_a_signal);
                header('Location: ../index.php?action=article&id='.$idArticle);
            }
            else
                throw new Exception("Id nul");
        }
        else
            throw new Exception("Id non valide");
    }

    // Supprime un commentaire en bdd à partir d'un objet commentaire créé avec l'id commentaire reçu en $_GET
    // On revient sur la vue admin après la suppression.
    // 4 exceptions possibles. Commentaire qui n'est pas à supprimer, commentaire non signalé, commentaire inexistant, id non défini
    public function deletecom() {
        if (isset($_GET['id']))
        {
            $idCommentaire = intval($_GET['id']);
            $auteur = $_GET['auteur'];
            $commentaireasupprimer = $this->_commentaire->get($idCommentaire);
            if (!(is_null($commentaireasupprimer)))
            {
                if ($commentaireasupprimer->is_signal())
                {
                    if ($auteur == $commentaireasupprimer->auteur())
                    {
                        $this->_commentaire->delete($commentaireasupprimer);
                        $view = new ControleurAdmin;
                        $view->admin();
                    }
                    else
                        throw new Exception("Ce commentaire n'est pas à supprimer");
                }
                else
                    throw new Exception("Ce commentaire n'est pas signalé");
            }
            else
                throw new Exception("Ce commentaire n'existe pas");
        }
        else
            throw new Exception("Identifiant de commentaire non défini");
    }


    // Modération positive d'un commentaire signalé. Le booléen is_signal est mis à jour de 1 (true) à 0 (false) en bdd.
    // 4 exceptions. Le commentaire n'est pas à modérer, non signalé, n'existe pas ou l'id de billet n'est pas défini.
    public function okcom() {
        if (isset($_GET['id']))
        {
            $idCommentaire = intval($_GET['id']);
            $auteur = $_GET['auteur'];
            $commentaireamoder = $this->_commentaire->get($idCommentaire);
            if (!(is_null($commentaireamoder)))
                if ($commentaireamoder->is_signal())
                {
                    if ($auteur == $commentaireamoder->auteur())
                    {
                        $commentaireamoder->setIs_signal(0);
                        $this->_commentaire->updatesignal($commentaireamoder);
                        $view = new ControleurAdmin;
                        $view->admin();
                    }
                    else
                        throw new Exception("Ce commentaire n'est pas à modérer");
                }
                else
                    throw new Exception("Ce commentaire n'est pas signalé");
            else
                throw new Exception("Ce commentaire n'existe pas");
        }
        else
            throw new Exception("Identifiant de billet non défini");
    }
}