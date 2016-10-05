<?php

if(!isset($_SESSION['id']) || empty($_SESSION['id']))
{
    header('Location: accueil.php');
}
require_once('../include/header.php');
 
echo'
    <html>
        <head>
            <Title>Profil</Title>
        </head>
        <body>
            <h1>Bienvenue sur votre profil</h1>
            <a href="ceationSujet.php">Créer un nouveau sujet</a><br />
            <a href="modificationSujet.php">Modifier un sujet</a><br />
            <a href="ceationCommentaire.php">Créer un nouveau commentaire</a><br />
            <a href="modificationCommentaire.php">Modifier un commantaire</a><br />
        ';
?>






<?php
require_once('../include/footer.php');
?>
