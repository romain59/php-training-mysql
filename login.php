<?php
session_start();

include 'connection.php' ;

    $afficher = "SELECT * FROM `user`";
    $resulat = $conn->query($afficher);


    while ( $donnee = $resulat -> fetch_assoc() ){

        $login = $donnee['username'];
        $pwd = $donnee['password'];

        if (isset($_POST['login']) && isset($_POST['pwd'])) {


            if ($login == $_POST['login'] && $pwd == $_POST['pwd']) {

                $_SESSION['login'] = $_POST['login'];
                $_SESSION['pwd'] = $_POST['pwd'];


                header ('location: read.php');
            } else {

                echo '<body onLoad="alert(\'Membre non reconnu...\')">';

            }
        }

    }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>

    <form action="" method="post">
      <div>
        <label for="username">Identifiant : </label>
        <input type="text" name="login">
      </div>
      <div>
        <label for="password">Mot de passe : </label>
        <input type="password" name="pwd">
      </div>
      <div>
        <button type="submit" name="connexion">Se connecter</button>
      </div>
    </form>


  </body>
</html>
