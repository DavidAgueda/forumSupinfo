<?php
$log = 'root';
$pass = '';

try {
    $bd = new PDO('mysql:host=localhost;dbname=forum', $log, $pass);
    $bd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bd->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    print "Erreur! :" . $e->getMessage() . "<br/>";
    die();
}

if(isset($_POST['connexion'])){
    if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
        $req = $bdd->prepare("SELECT id, username, password FROM utilisateur WHERE id = :id AND username = :username AND password = :password;");
        $req->bindParam(':id', $_COOKIE['id']);
        $req->bindParam(':username', $_COOKIE['username']);
        $req->bindParam(':password', $_COOKIE['password']);
        $req->execute();
        $result = $req->fetch();
        $req->closeCursor();
        if($result[0]==1){
            session_start();
            $_SESSION['userid'] = $id;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['loginok'] = TRUE;
        }else{
            if(!empty($_POST['username']) AND !empty($_POST['password'])){
                sleep(1);
                $username = $_POST['username'];
                $password = $_POST['password'];

                $req = $bdd->prepare("SELECT COUNT(*)FROM utilisateur WHERE username = :username AND password = :password;");
                $req->bindParam(':username', $username);
                $req->bindParam(':password', $password);
                $req -> execute();
                $resultat = $req->fetch();
                $req->closeCursor();

                if($resultat[0] == 1){
                    session_start();
                    $reponse = $bdd->prepare("SELECT id,username,password FROM utilisateur WHERE username = :username AND password = :password");
                    $reponse->bindParam(':username', $username);
                    $reponse->bindParam(':password', $password);
                    $reponse -> execute();
                    $donnees = $reponse->fetch();
                    $reponse->closeCursor();

                    $id = $donnees['id'];
                    $pseudo = $donnees['username'];

                    $_SESSION['userid'] = $id;
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['loginok'] = TRUE;
                    
                    
                    if (isset($_POST['remember'])) {
                        setcookie('id');
                        setcookie('username');
                        setcookie('password');
                        setcookie('id', $_POST['id'], time() + 60 * 60 * 24 * 30);
                        setcookie('pseudo', $_POST['pseudo'], time() + 60 * 60 * 24 * 30);
                        setcookie('mdp', $_POST['password'], time() + 60 * 60 * 24 * 30);
                        die(header ('location: ./connexion.php'));
                    }else{
                        if(!empty($_POST['connexion'])){
                            echo "<script>alert(\"Identifiant et/ou Mot de passe incorrect\")</script>"; 
                        }	
                    }
                }
            }
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
