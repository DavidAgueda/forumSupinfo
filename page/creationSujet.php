<?php
    if (isset($_POST['Creer']))
    {
        $sujet=$_POST['Objet'];
        $message=$_POST['Message'];
        creation_sujet($sujet, $message);
    }

echo'
<!DOCTYPE html>
<html>
<head>
    <title>Sujet</title>
    <meta charset="utf-8" />
</head>
<body>
    <form method ="post" action="creationSujet.php" role="form">
        <fieldset>
            <legend>Subject</legend>
            <label for="Objet"> Objet: </label>
            <input type="text" name="Objet" id="Objet" placeholder=""><br />
        </fieldset>
        <textarea name="Message" id="Message" rows="50" cols="200"></textarea>
        <button type="submit" class="btn btn-primary" name="Creer" value="Creer">Nouveau Sujet</button>
        </form>
</body>
</html>'
?>

