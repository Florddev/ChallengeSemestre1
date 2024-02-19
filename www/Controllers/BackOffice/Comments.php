<?php

namespace App\Controllers\BackOffice;

use App\Core\View;
use App\Models\Comment;
use App\Models\User;

class Comments
{
    public function createComment($data) {
        $userId = 1;
        // $userId = $_SESSION['user_id'] ?? null;

        // if ($userId === null) {
        //     // Stockez le message d'erreur dans la session
        //     $_SESSION['error_message'] = "Vous devez être connecté pour poster un commentaire.";

        //      // Redirection vers la page de connexion
        //     header('Location: /login');
        //     exit;
        // }

        $comment = new Comment();
        $comment->setIdArticle($_REQUEST["id_article"]);
        $comment->setIdUser($userId);
        $comment->setContent($_REQUEST["comment_content"]);
        if (isset($_REQUEST["id_comment_response"])) {
            $comment->setIdCommentResponse($_REQUEST["id_comment_response"]);
        }
        $comment->setValid("false");
        $comment->save();
    }

    public function validateComment($commentId) {
        // Cette fonction devrait être accessible uniquement par les administrateurs
        $comment = Comment::populate($commentId);
        $comment->setValid(true);
        $comment->save();

        // Rediriger ou renvoyer une réponse
    }

    public function updateComment($commentId, $newData) {
        // Assurez-vous que l'utilisateur est l'auteur du commentaire ou un administrateur
        $comment = Comment::populate($commentId);
        $comment->setContent($newData["content"]);
        $comment->save();

        // Rediriger ou renvoyer une réponse
    }

    public function deleteComment($commentId) {
        // Assurez-vous que l'utilisateur est l'auteur du commentaire ou un administrateur
        $comment = Comment::populate($commentId);
        $comment->delete();

        // Rediriger ou renvoyer une réponse
    }
}
