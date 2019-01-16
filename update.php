<?php

include 'connection.php' ;

if (!empty($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $afficher = "SELECT * FROM hiking WHERE id=$id";
    $resultat = $conn -> query($afficher);
    $donnee = $resultat->fetch_assoc();
    echo $conn->error;
}


if (isset($_POST['name'])) { $name = $_POST['name']; }
if (isset($_POST['difficulty'])) { $difficulty = $_POST['difficulty']; }
if (isset($_POST['distance'])) { $distance = $_POST['distance']; }
if (isset($_POST['duration'])) { $duration = $_POST['duration']; }
if (isset($_POST['height_difference'])) { $heightDifference = $_POST['height_difference']; }
if (isset($_POST['id'])) { $id = $_POST['id']; }


if (!empty($_POST))
{
    MisAJour($name, $difficulty, $distance, $duration, $heightDifference, $id);
}


function MisAJour ($name, $difficulty, $distance, $duration, $heightDifference, $id) {

    global $conn;

    $sql = "UPDATE hiking SET `name`= '$name', difficulty = '$difficulty',distance = '$distance',duration  = '$duration',height_difference = '$heightDifference' WHERE id=$id ";
    $conn->query($sql);

    echo $conn->error;

    header('Location: read.php');

}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Update</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?= $donnee['name']?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?= $donnee['distance']?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?= $donnee['duration']?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?= $donnee['height_difference']?>">
            <input type="hidden" name="id" value="<?= $donnee['id']?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>



