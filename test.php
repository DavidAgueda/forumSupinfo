<?php

$user = 'root';
$pass = '';

// select
try {
    $bd = new PDO('mysql:host=localhost;dbname=forum', $user, $pass);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

foreach ($bd->query('SELECT * FROM commentaire') as $row) {
    print_r($row);
}


$bd = null;

// insert 
try {
    $bd = new PDO('mysql:host=localhost;dbname=forum', $user, $pass);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

$prep = $bd->prepare('INSERT INTO utilisateur(title, link) VALUES(:title, :link)');
$prep->execute();


$bd = null;
