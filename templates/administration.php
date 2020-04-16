<?php $this->title = 'Administration'; ?>

<h1>Mon blog</h1>
<p>En construction</p>
<a href="../public/index.php">Retour à l'accueil</a>
<?= $this->session->show('add_post'); ?>
<?= $this->session->show('edit_post'); ?>
<?= $this->session->show('delete_post'); ?>
<?= $this->session->show('delete_user'); ?>
<?= $this->session->show('delete_comment');?>
<?= $this->session->show('validate_comment'); ?>
<?= $this->session->show('invalidate_comment'); ?>

<h2>Articles</h2>
<a href="../public/index.php?route=addPost">Nouvel article</a>
<table class="table">
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Châpo</td>
        <td>Contenu</td>
        <td>Auteur</td>
        <td>Date</td>
        <td>Commentaires</td>
        <td>Actions</td>
        
    </tr>
    <?php
    foreach ($posts as $post)
    { 
        ?>
        <tr>
            <td><?= htmlspecialchars($post->getId());?></td>
            <td><a href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->getId());?>"><?= htmlspecialchars($post->getTitle());?></a></td>
            <td> <?= htmlspecialchars($post->getHeading()); ?></td>
            <td><?= substr(htmlspecialchars($post->getContent()), 0, 80);?></td>
            <td><?= htmlspecialchars($post->getUserObj()->getPseudo());?> (<?=htmlspecialchars($post->getUserObj()->getRole())?>)</td>
            <td>Créé le : <?= htmlspecialchars($post->getCreatedAt());?></td>
            <td><a href="../public/index.php?route=postComments&postId=<?= htmlspecialchars($post->getId());?>">Voir les commentaires</a></td>
            <td>
                <a href="../public/index.php?route=editPost&postId=<?= $post->getId(); ?>">Modifier</a>
                <a href="../public/index.php?route=deletePost&postId=<?= $post->getId(); ?>" onclick="return confirm('êtes-vous sûr de vouloir supprimer définitivement l\'article ?')">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table><br><br>

<h2>Utilisateurs</h2><br>
<table class="table">
    <tr>
        <td>Id</td>
        <td>Pseudo</td>
        <td>Date</td>
        <td>Rôle</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($users as $user)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($user->getId());?></td>
            <td><?= htmlspecialchars($user->getPseudo());?></td>
            <td>Créé le : <?= htmlspecialchars($user->getCreatedAt());?></td>
            <td><?= htmlspecialchars($user->getRole());?></td>
            <td>
                <?php
                if($user->getRole() != 'admin') {
                ?>
                <a href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>" onclick="return confirm('êtes-vous sûr de vouloir supprimer définitivement l\'utilisateur ?')">Supprimer</a>
                <?php }
                else {
                    ?>
                Suppression impossible
                <?php
                }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table><br><br>

<h2>Commentaires</h2><br>
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Pseudo</td>
            <td>Article</td>
            <td>Message</td>
            <td>Date</td>
            <td>Validation</td>
            <td>Suppression</td>
        </tr>
        <?php
        foreach ($comments as $comment)
        {
            ?> 
            <tr>
                <td><?= htmlspecialchars($comment->getId());?></td>
                <td><?= htmlspecialchars($comment->getPseudo());?></td>
                <td><?= htmlspecialchars($comment->getPostObj()->getTitle());?></td> <!--Appel à la méthode "getPostObj" du modèle "Comment" qui retourne un objet Post -->
                <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
                <td>Créé le : <?= htmlspecialchars($comment->getCreatedAt());?></td>
                <td>
                <?php
                if ($comment->getValidate() === '0') 
                { ?>
                    <a href="../public/index.php?route=validateComment&commentId=<?= $comment->getId(); ?>">Valider le commentaire</a></td>
                    <?php
                } else 
                {
                    echo ('Commentaire validé');
                ?>
                    <a href="../public/index.php?route=invalidateComment&commentId=<?= $comment->getId(); ?>">Invalider le commentaire</a></td>
                <?php
                }
                ?>
                <td><a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>" class="text-danger" onclick=" return confirm('êtes-vous sûr de vouloir supprimer définitivement le commentaire')">Supprimer le commentaire</a></td>
                
            </tr>
            <?php
        }
        ?>
    </table>