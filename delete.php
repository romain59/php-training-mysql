<?php
session_start();

if (!$_SESSION['login']) {
    header('Location: read.php');
}

include 'connection.php' ;

if (!empty($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $requete = 'delete from hiking where `id` = '. $id;
    $resultat = $conn->query($requete);
    echo $conn->error;
    header('Location: read.php');
}
