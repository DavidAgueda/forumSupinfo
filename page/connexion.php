<?php

$log = 'root';
$pass = '';7



try {
    $bd = new PDO('mysql:host=localhost;dbname=forum', $log, $pass);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bd->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    print "Erreur! :" . $e->getMessage() . "<br/>";
    die();
}

if (isset($_POST['connexion'])) {

    if (isset($_POST['identifiant']) && isset($_POST['password'])) {
        $req = $bd->prepare("SELECT * FROM utilisateur WHERE username = :username AND password = :password;");
        $req->bindParam(':username', $_POST['identifiant']);
        $req->bindParam(':password', $_POST['password']);
        $req->execute();
        
        $result = $req->fetch();

        $req->closeCursor();
        if ($result != false) {
 
            session_start();
            $_SESSION['userid'] = $result['id'];
            $_SESSION['username'] = $_POST['identifiant'];
            $_SESSION['loginok'] = TRUE;

            if (isset($_POST['remember'])) {
                setcookie("ticket", $result['id'], time() + (3600 * 12) * 60);
            }
            header('Location:accueil.php');
        } else {

            echo 'Raté!!';
        }
    }
}

echo '
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
    <body>
        <form method="post" action="connexion.php" role="form">
            <div>
                <h1>Connexion</h1>
            </div>
            <div>
                <label for="identifiant" >Identifiant :</label>
                <div>
                    <input name="identifiant"/>
                </div>
            </div>
            <div>
                <label for="password">Mot de passe :</label>
                <div>
                    <input type="password" name="password"/>
                </div>
            </div>
            <div>
                <div>
                    <div>
                        <label>
                            <input type="checkbox"  name="remember" /> Se rappeler de moi
                        </label>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <button type="submit" value="connexion" name="connexion">Se connecter</button>
                </div>
            </div>
        </form>
    </body>
</html>
';
?>
