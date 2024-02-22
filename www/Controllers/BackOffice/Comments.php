<?php

namespace App\Controllers\BackOffice;

use App\Core\View;
use App\Enums\Role;
use App\Models\Comment;
use App\Models\User;
use App\Models\Article;
use App\Core\Utils;

class Comments
{
    public function createComment($data) {
        // Assurez-vous que l'utilisateur est connecté
        if (isset($_SESSION["id"])) {
            $a = Article::populate($_REQUEST["id_article"]);
            $t = Utils::url_encode($a->getTitle());
            // Créer un nouvel objet Comment à partir des données POST
            $comment = new Comment();
            $comment->setIdArticle($a->getId());
            $comment->setIdUser($_SESSION["id"]);
            $comment->setContent($_REQUEST["comment_content"]);
            if (isset($_REQUEST["id_comment_response"])) {
                $comment->setIdCommentResponse($_REQUEST["id_comment_response"]);
            }
            $comment->setValid(false);
            $comment->save();
            
            // Stocker le message dans une variable de session
            $_SESSION['SucessComment'] = 'Votre commentaire a été envoyé et est en cours de validation.';
            // Rediriger vers l'article après la soumission du commentaire
            header('Location: /article/' . $t);
            exit;
        } else {
            // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
            header('Location: /login');
            exit;
        }
    }

    public function validateComment($commentId) {
        // Cette fonction devrait être accessible uniquement par les administrateurs
        $commentId = $_POST['id_comment'];
        $comment = Comment::populate($commentId);
        $comment->setValid(true);
        $comment->save();

        $_SESSION['SucessComment'] = 'Votre validation du commentaire a été enregistrée.';
        // Rediriger vers l'article après la validation du commentaire
        header('Location: /dashboard/articles/builder/' . $comment->getIdArticle());
        exit;
    }

    public function updateComment($commentId, $newData) {
        // Assurez-vous que l'utilisateur est l'auteur du commentaire ou un administrateur
        $comment = Comment::populate($commentId);
        $comment->setContent($newData["content"]);
        $comment->save();
    }

    public function deleteComment() {
        // Récupérer l'ID du commentaire à partir des données POST
        $commentId = $_POST['id_comment'];

        // Récupérer le commentaire à partir de la base de données
        $comment = Comment::populate($commentId);
        $comment->delete(['id' => $commentId]);

        $_SESSION['DeleteComment'] = 'Votre commentaire a été supprimé.';
        // Rediriger vers l'article après la mise à jour du commentaire
        header('Location: /dashboard/articles/builder/' . $comment->getIdArticle());
        exit;
    }
}
