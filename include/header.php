<?php

include_once('../include/fonctions.php');
$db= new App\fonctions();

//session_start();
//$_SESSION['id'] = $_POST['id'];

if (isset($_SESSION['id'])){
    echo '<html>
    <head>
        
    </head>
        <h1>Menu connecter</h1>
        <a href="profil.php">Consulter mon profil</a><br />
        <a href="ceationSujet.php">Créer un nouveau sujet</a><br />
        <a href="deconnexion.php">Se deconnecter</a><br />        
    <body>';
}  else {
    echo'
        <html>
    <head>
        
    </head>
        <h1>Menu deconnecter</h1>
        <a href="connexion.php">Se connecter</a><br />
        <a href="inscription.php">Créer un nouveau compte</a><br />
    <body>
    
    ';
}
?>


    

