<div class="comments-section">
    <!-- Affichage des commentaires existants, s'ils existent -->
    <?php if (!empty($data["article"]["Comments"])): ?>
        <h2>Commentaires</h2>
        <?php foreach ($data["article"]["Comments"] as $comment): ?>
            <?php if ($data['view'] == 'page' && $comment["valid"] == 1 || $data['view'] == 'builder'): ?>
                <div class="comment">
                    <div class="comment-avatar">
                        <!-- Avatar du commentateur -->
                        <img src="https://media.istockphoto.com/id/1175286242/vector/screaming-mans-face-in-profile-head-of-a-guy-in-stress-on-the-side-aggression-and-irritation.jpg?s=612x612&w=0&k=20&c=xH3SNF8hMM3oxi8B6S4yVBa2djOT0BZVjV9s1KZm56g=" alt="Avatar">
                    </div>
                    <div class="comment-content">
                        <div class="comment-author"><?= htmlspecialchars($comment["User"]->getLogin()) ?></div>
                        <p><?= htmlspecialchars($comment["content"]) ?></p>
                        <div class="comment-info">
                            <span class="comment-hits">22 HITS</span>
                            <?php 
                                $commentInstance = new \App\Models\Comment();
                                $numResponses = $commentInstance->countResponses($comment["id"]);
                            ?>
                            <span class="comment-num-comments"><?= $numResponses ?> COMMENTS</span>
                        </div>
                        <?php if ($data['view'] == 'builder'): ?>
                            <div class="form-group">
                                <form class="form-delete" action="/dashboard/comments/delete" method="POST">
                                    <input type="hidden" name="id_comment" value="<?= $comment['id']; ?>">
                                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                </form>
                                <?php if ($comment["valid"] != 1): ?>
                                    <form class="form-validate" action="/dashboard/comments/validate" method="POST">
                                        <input type="hidden" name="id_comment" value="<?= $comment['id']; ?>">
                                        <button class="btn btn-success btn-sm" type="submit">Valider</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <!-- Réponses au commentaire principal, si elles existent -->
                        <?php if (!empty($comment["Responses"])): ?>
                            <div class="sub-comments">
                                <?php foreach ($comment["Responses"] as $response): ?>
                                    <?php if ($data['view'] == 'page' && $response["valid"] == 1 || $data['view'] == 'builder'): ?>
                                        <div class="comment">
                                            <div class="comment-avatar">
                                                <img src="https://us.123rf.com/450wm/fayethequeen/fayethequeen2306/fayethequeen230600067/210514302-femme-noire-ic%C3%B4ne-moderne-avatar-femme-africaine-design-abstrait-contemporain-affiche-murale-art.jpg?ver=6" alt="Avatar">
                                            </div>
                                            <div class="comment-content">
                                                <div class="comment-author"><?= htmlspecialchars($response["User"]->getLogin()) ?></div>
                                                <p><?= htmlspecialchars($response["content"]) ?></p>
                                                <?php if ($data['view'] == 'builder'): ?>
                                                    <div class="form-group">
                                                        <form class="form-delete" action="/dashboard/comments/delete" method="POST">
                                                            <input type="hidden" name="id_comment" value="<?= $response['id']; ?>">
                                                            <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                                        </form>
                                                        <?php if ($response["valid"] != 1): ?>
                                                            <form class="form-validate" action="/dashboard/comments/validate" method="POST">
                                                                <input type="hidden" name="id_comment" value="<?= $response['id']; ?>">
                                                                <button class="btn btn-success btn-sm" type="submit">Valider</button>
                                                            </form>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <!-- Formulaire pour répondre à un commentaire ou boutons pour supprimer et valider le commentaire -->
                        <?php if ($data['view'] == 'page' && isset($_SESSION['id'])): ?>
                            <form action="/dashboard/comments/create" method="POST">
                                <div class="new-comment">
                                    <div class="new-comment-avatar">
                                        <img src="https://media.istockphoto.com/id/1175286242/vector/screaming-mans-face-in-profile-head-of-a-guy-in-stress-on-the-side-aggression-and-irritation.jpg?s=612x612&w=0&k=20&c=xH3SNF8hMM3oxi8B6S4yVBa2djOT0BZVjV9s1KZm56g=" alt="Your Avatar">
                                    </div>
                                    <div class="new-comment-input-group">
                                        <input type="text" name="comment_content" placeholder="Répondre à ce commentaire...">
                                        <input type="hidden" name="id_article" value="<?= $data['article']['id']; ?>">
                                        <input type="hidden" name="id_comment_response" value="<?= $comment['id']; ?>">
                                        <button type="submit">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                            
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <h2>Commentaires vide</h2>
    <?php endif; ?>

    <!-- Formulaire pour ajouter un nouveau commentaire -->
    <?php if ($data['view'] == 'page' && isset($_SESSION['id'])): ?>
        <form action="/dashboard/comments/create" method="POST">
            <div class="new-comment">
                <div class="new-comment-avatar">
                    <img src="https://media.istockphoto.com/id/1175286242/vector/screaming-mans-face-in-profile-head-of-a-guy-in-stress-on-the-side-aggression-and-irritation.jpg?s=612x612&w=0&k=20&c=xH3SNF8hMM3oxi8B6S4yVBa2djOT0BZVjV9s1KZm56g=" alt="Your Avatar">
                </div>
                <div class="new-comment-input-group">
                    <input type="text" name="comment_content" placeholder="Laisser un commentaire...">
                    <input type="hidden" name="id_article" value="<?= $data['article']['id']; ?>">
                    <button type="submit">Envoyer</button>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>