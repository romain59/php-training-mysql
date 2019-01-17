<?php
session_start();

include 'connection.php' ;


function AfficherRandonnee (){

    global $conn;

    $afficher = "SELECT * FROM hiking";
    $resulat = $conn->query($afficher);


    while ( $donnee = $resulat -> fetch_assoc() ){

        $id = $donnee['id'];

        ?>
        <tr>
            <td><?= $donnee['name']?></td>
            <td><?= $donnee['difficulty']?></td>
            <td><?= $donnee['distance']?></td>
            <td><?= $donnee['duration']?></td>
            <td><?= $donnee['height_difference']?></td>
            <?php if (isset($_SESSION['login'])) { ?>
            <td><a href="<?= 'update.php?id='.$id ?>">Editer</a></td>
            <td><a href="<?= 'delete.php?id='.$id ?>">Supprimer</a></td>
            <?php } ?>
        </tr>
        <?php
    }}



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="style.css"  type="text/css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
  <div class="container">
    <h1>Liste des randonnées</h1>

      <a  class="button" href="login.php">connexion</a><br><br>
      <a class="button" href="logout.php">deconnexion</a><br><br>

        <table>
            <tr>
                <td>Nom du Parcours : </td>
                <td>Difficulté : </td>
                <td>Distance : </td>
                <td>Durée : </td>
                <td>Denivelé : </td>

                <?php if (isset($_SESSION['login'])) { ?>
                    <td>Editer : </td>
                    <td>Supprimer : </td>
                <?php } ?>
            </tr>
            <tr>
                <?php AfficherRandonnee() ?>
            </tr>
        </table>

      <br><br>


      <?php if (isset($_SESSION['login'])) { ?>
          <a href="create.php">Ajouter une nouvelle randonnée ! </a>
      <?php } ?>
  </div>
  </body>
</html>











