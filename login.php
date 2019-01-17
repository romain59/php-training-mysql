<?php
session_start();

include 'connection.php' ;

    if (isset($_POST['login'])) { $user = $_POST['login'];}
    if (isset($_POST['pwd'])) { $pass = sha1($_POST['pwd']);}

    if(isset($user))
    {
        $sql = "SELECT * FROM `user` WHERE username =? AND password=? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $user, $pass);

        $result = $stmt->execute();

        $donneeF = $stmt->get_result();
        $donnee = $donneeF->fetch_assoc();

        $stmt->close();

        $login = $donnee['username'];
        $pwd = $donnee['password'];

        if (isset($login)) {

            $_SESSION['login'] = $login;


            header ('location: read.php');
        } else {

            echo '<body onLoad="alert(\'Membre non reconnu...\')">';

        }
    }

?>

<!DOCTYPE html>
<html>
  <head class="header">
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <div class="container2">
        <img src="image/admin.png" alt="admin" width="150" height="100">
        <hr class="separator">

        <form action="" method="post">
          <div><br>
            <label for="username">Identifiant : </label><br>
            <input class="input" type="text" name="login" placeholder="Username">
          </div>
          <div>
            <label for="password">Mot de passe : </label><br>
            <input class="input" type="password" name="pwd" placeholder="********">
          </div>
          <div>
            <button type="submit" name="connexion">Se connecter</button>

          </div>
        </form>

        <a href="inscription.php"><button>Inscription</button></a>

        <hr class="separator2">

    </div>

  </body>
</html>