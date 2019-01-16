<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option  value="très facile">Très facile</option>
				<option  value="facile">Facile</option>
				<option  value="moyen">Moyen</option>
				<option  value="difficile">Difficile</option>
				<option  value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="submit">Envoyer</button>
	</form>
</body>
</html>

<?php

include 'connection.php' ;

function add ()
{
    $_POST['submit']=0;

    global $conn;

    if (isset($_POST['name']) != '' && $_POST['difficulty'] != '' && $_POST['distance'] != '' && $_POST['duration'] != '' && $_POST['height_difference'] != '' && isset($_POST['submit'])) {


        $name = $_POST['name'];

        $difficulty = $_POST['difficulty'];

        $distance = $_POST['distance'];

        $duration = $_POST['duration'];

        $height_difference = $_POST['height_difference'];

        $stmt = $conn->prepare("INSERT INTO hiking (`name`, `difficulty`, `distance`, `duration`, `height_difference`) VALUES (?, ?, ?,?,?)");
        $stmt->bind_param("ssiii", $name, $difficulty, $distance, $duration, $height_difference);

        $stmt->execute();
        $stmt->close();

        header('Location: read.php');
    }

    //echo "<script>alert(\"La randonnée a été ajoutée avec succès !\")</script>";



}

add();
