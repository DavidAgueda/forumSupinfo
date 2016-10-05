<?php

 include_once('../include/fonctions.php');
 $db = new App\fonctions();
 
 if (isset($_POST['inscription'])) {
     try {
         $db->inscription($_POST['username'], $_POST['password']);
         header('Location: connexion.php');
     } catch (Exception $ex) {
         echo 'Inscription échouée';
     }
 }
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="UTF-8">
         <title>Forum | Inscription</title>
     </head>
     <body>
         <!--Creation du formulaire-->
         <form action="inscription.php" method="POST">
             <label for="username">Username : </label>
             <input name="username" type="text" required/><br/><br/>
             <label for="password">Password : </label>
             <input name="password" type="password" required/><br/><br/>
             <input type="Submit" name="inscription" value="Inscription"/>
         </form>
     </body>
 </html> 