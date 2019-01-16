<?php

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
            <td><a href="<?= 'update.php?id='.$id ?>">Editer</a></td>
            <td><a href="<?= 'delete.php?id='.$id ?>">Supprimer</a></td>
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
        <table>
            <tr>
                <td>Nom du Parcours : </td>
                <td>Difficulté : </td>
                <td>Distance : </td>
                <td>Durée : </td>
                <td>Denivelé : </td>
                <td>Editer : </td>
                <td>Supprimer : </td>

            </tr>
            <tr>
                <?php AfficherRandonnee() ?>
            </tr>
        </table>

      <br><br>

      <a href="create.php">Ajouter une nouvelle randonnée ! </a>
  </div>
  </body>
</html>











