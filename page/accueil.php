<?php
include_once '../include/fonctions.php';
include_once '../include/header.php';
include_once '../include/footer.php';

$db = new App\fonctions();
$arrayData = $db->getAllSujet();
?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
        <?phprequire_once('../include/header.php');?>
        <div class="">
            <?php
            foreach ($arrayData as $sujet) {
                ?>
                <article>
                    <h2><?php echo $sujet['nom'] ?></h2>
                    <div class="user"><?php echo $db->getNameById($sujet['idUtilisateur']) ?></div>
                    <div class="date"><?php echo $sujet['creation'] ?></div>
                    <div class="coment">nombre de commentaires <span> <?php echo $sujet['nCommentaires']['count(id)'] ?></span>
                    </div>
                    <hr />

                    <?php
                    foreach ($sujet['Commentaires'] as $commentaires) {
                        ?>
                        <div class="commentaire">
                            <div class=""> Fait le : <span><?php echo $commentaires['creation'] ?></span> par <span><?php echo $db->getNameById($commentaires['idUtilisateur']) ?></span></div>
                            <div class="commentaire"><?php echo $commentaires['commentaire'] ?></div>

                        </div>
                        <?php
                    }
                    ?>

                    <button onclick="location.href = 'creationCommentaire.php?idSujet=<?php echo $sujet['id'] ?>';">Ajouter Commentaire</button>
                </article>
                <?php
            }
            ?>

        </div>
        <?phprequire_once('../include/footer.php');?>

        <script type="text/javascript">
            $('article>h2').click(function () {

            });
        </script>
    </body>
</html>