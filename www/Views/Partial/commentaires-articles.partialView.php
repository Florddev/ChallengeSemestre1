<!-- <pre><?= print_r($data) ?></pre> -->

<!--

Les données récupéré proviennent de la fonction setDataToArticle dans le controller Article qui contient les données
de l'utilisateur créateur en les récupérant via $data["Creator"], récupérer les données de la catégorie de l'article
avec $data["Category"]

Il faudrais compléter la fonction setDataToArticle dans www/Controllers/BackOffice/Articles.php concernant les commentaires
en créant le model "Comment" pour la table "comment" de la BDD

-->

<!-- <div class="comments-section">
    <h2>Commentaires</h2>  
    <div class="comment">
        <div class="comment-avatar">
            <img src="https://media.istockphoto.com/id/1175286242/vector/screaming-mans-face-in-profile-head-of-a-guy-in-stress-on-the-side-aggression-and-irritation.jpg?s=612x612&w=0&k=20&c=xH3SNF8hMM3oxi8B6S4yVBa2djOT0BZVjV9s1KZm56g=" alt="">
        </div>
        <div class="comment-content">
        <div class="comment-author">Alex Riff <span>( Musicien )</span></div>
        <p>L'article sur votre premier concert a ravivé tellement de souvenirs pour moi ! La première fois que j'ai entendu le son live de la guitare, cela a changé ma vie. Merci de partager.</p>
        <div class="comment-info">
        <span class="comment-hits">15 HITS</span>
        <span class="comment-num-comments">1 COMMENTS</span>
        </div>
        <div class="sub-comments">
        <div class="comment">
            <div class="comment-avatar">
            <img src="https://us.123rf.com/450wm/fayethequeen/fayethequeen2308/fayethequeen230800031/211794742-femme-noire-ic%C3%B4ne-moderne-avatar-femme-africaine-design-abstrait-contemporain-affiche-murale-art.jpg?ver=6" alt="User 2 Avatar">
            </div>
            <div class="comment-content">
            <div class="comment-author">Melody Sings <span>( Spectatrice )</span></div>
            <p>Je suis entièrement d'accord, Alex ! Rien ne vaut l'énergie d'un concert en direct, surtout quand c'est le premier.</p>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="comment">
    <div class="comment-avatar">
        <img src="https://fiverr-res.cloudinary.com/t_profile_original,q_auto,f_auto/attachments/profile/photo/4bd063b6067d4ddb409ac70a7314d6d1-1692216409118/154e24c5-5e3a-4ed8-85e3-4cdb7170000b.PNG" alt="User 3 Avatar">
    </div>
    <div class="comment-content">
        <div class="comment-author">Chris Beat <span>( Producteur )</span></div>
        <p>J'ai vraiment aimé lire votre expérience du premier concert. Ça m'a rappelé mon propre premier concert en tant que producteur. C'est incroyable de voir comment un seul événement peut influencer notre parcours musical.</p>
        <div class="comment-info">
        <span class="comment-hits">8 HITS</span>
        <span class="comment-num-comments">0 COMMENTS</span>
        </div>
    </div>
    </div>
    <div class="comment">
    <div class="comment-avatar">
        <img src="https://img.freepik.com/vecteurs-premium/illustration-abstraite-portrait-femme-noire-heureuse_713151-13.jpg" alt="User 4 Avatar">
    </div>
    <div class="comment-content">
        <div class="comment-author">Violet Bass <span>( Bassiste )</span></div>
        <p>L'article sur le premier concert capte parfaitement la magie de l'instant. J'ai ressenti chaque mot écrit, comme si j'étais là. Les concerts ont vraiment le pouvoir de transformer notre perception de la musique.</p>
        <div class="comment-info">
        <span class="comment-hits">22 HITS</span>
        <span class="comment-num-comments">1 COMMENTS</span>
        </div>
        <div class="sub-comments">
        <div class="comment">
            <div class="comment-avatar">
            <img src="https://us.123rf.com/450wm/fayethequeen/fayethequeen2306/fayethequeen230600067/210514302-femme-noire-ic%C3%B4ne-moderne-avatar-femme-africaine-design-abstrait-contemporain-affiche-murale-art.jpg?ver=6" alt="User 5 Avatar">
            </div>
            <div class="comment-content">
            <div class="comment-author">Harmony Keys <span>( Pianiste )</span></div>
            <p>Exactement, Violet ! La première fois que j'ai joué sur scène, je me suis senti connecté à chaque personne dans la salle. C'est une expérience inoubliable.</p>
            </div>
        </div>
        </div>
    </div>
    </div>

    <div class="new-comment">
    <div class="new-comment-avatar">
        <img src="https://media.istockphoto.com/id/1175286242/vector/screaming-mans-face-in-profile-head-of-a-guy-in-stress-on-the-side-aggression-and-irritation.jpg?s=612x612&w=0&k=20&c=xH3SNF8hMM3oxi8B6S4yVBa2djOT0BZVjV9s1KZm56g=" alt="Your Avatar">
    </div>
    <div class="new-comment-input-group">
        <input type="text" placeholder="Laisser un commentaire à votre tour...">
        <button type="submit">Envoyer</button>
    </div>
    </div>
</div> -->

<div class="comments-section">
    
    <!-- Affichage des commentaires existants, s'ils existent -->
    <?php if (!empty($article["Comments"])): ?>
        <h2>Commentaires</h2>
        <?php foreach ($article["Comments"] as $comment): ?>
            <div class="comment">
                <div class="comment-avatar">
                    <!-- Avatar du commentateur -->
                    <img src="path/to/default/avatar" alt="Avatar">
                </div>
                <div class="comment-content">
                    <div class="comment-author"><?= htmlspecialchars($comment->getUser()->getName()) ?></div>
                    <p><?= htmlspecialchars($comment->getContent()) ?></p>
                </div>
                <!-- Réponses au commentaire principal, si elles existent -->
                <?php if (!empty($comment->getResponses())): ?>
                    <?php foreach ($comment->getResponses() as $response): ?>
                        <div class="comment response">
                            <div class="comment-avatar">
                                <img src="path/to/responder/avatar" alt="Avatar">
                            </div>
                            <div class="comment-content">
                                <div class="comment-author"><?= htmlspecialchars($response->getUser()->getName()) ?></div>
                                <p><?= htmlspecialchars($response->getContent()) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h2>Commentaires vide</h2>
    <?php endif; ?>

    <!-- Formulaire pour ajouter un nouveau commentaire -->
    <form action="/dashboard/comments/create" method="POST">
        <div class="new-comment">
            <div class="new-comment-avatar">
                <img src="https://media.istockphoto.com/id/1175286242/vector/screaming-mans-face-in-profile-head-of-a-guy-in-stress-on-the-side-aggression-and-irritation.jpg?s=612x612&w=0&k=20&c=xH3SNF8hMM3oxi8B6S4yVBa2djOT0BZVjV9s1KZm56g=" alt="Your Avatar">
            </div>
            <div class="new-comment-input-group">
                <input type="text" name="comment_content" placeholder="Laisser un commentaire...">
                <input type="hidden" name="id_article" value="<?= $article['id'] ?>">
                <button type="submit">Envoyer</button>
            </div>
        </div>
    </form>
</div>