<?php
session_start();

include 'connection.php' ;

function add ()
{

    global $conn;

    if (isset($_POST['username']) != '' && $_POST['email'] != '' && $_POST['firstname'] != '' && $_POST['lastname'] != '' && $_POST['password'] != '' && isset($_POST['submit'])) {


        if (isset($_POST['username'])) { $username = $_POST['username']; }
        if (isset($_POST['email'])) { $email = $_POST['email']; }
        if (isset($_POST['firstname'])) { $lastname = $_POST['firstname']; }
        if (isset($_POST['lastname'])) { $firstname = $_POST['lastname']; }
        if (isset($_POST['password'])) { $password = $_POST['password']; }


        $stmt = $conn->prepare("INSERT INTO `user` (`username`, `email`, `firstname`, `lastname`, `password`) VALUES (?, ?, ?,?,?)");
        $stmt->bind_param("sssss", $username, $email, $firstname, $lastname, $password);

        $stmt->execute();
        $stmt->close();

        header('Location: login.php');
    }

}

add();

?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="style.css" type="text/css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>

    <div class="container2">
        <h1>Inscription : </h1>
        <form action="" method="post">
            <div>
                <label for="name">Username</label><br>
                <input class="input" type="text" name="username" value="">
            </div>

            <div>
                <label for="name">E-mail</label><br>
                <input class="input" type="email" name="email" value="">
            </div>


            <div>
                <label for="Firstname">Firstname</label><br>
                <input class="input" type="text" name="firstname" value="">
            </div>
            <div>
                <label for="Lastname">Lastname</label><br>
                <input class="input" type="text" name="lastname" value="">
            </div>
            <div>
                <label for="password">Password</label><br>
                <input class="input" type="password" name="password" value="">
            </div>
            <button type="submit" name="submit">Envoyer</button>
        </form>
    </div>
    </body>
    </html>



