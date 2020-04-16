
<?php
require("../private/initialize.php");
include("header.php");
$_SESSION["kijken"] = "werkt dit?";
//print_r($_SESSION["kijken"]);
//Dit is ook nog iet voor het inlog formulier
if($_SERVER["REQUEST_METHOD"] == "POST") {
    inloggen($db, $_POST["email"], $_POST["wachtwoord"]);
}
//    echo $_SESSION['login_user'];
?>
<link rel="stylesheet" href="styleSheets/main.css">
<link rel="stylesheet" href="styleSheets/inlog.css">

<div id="bg-img">


    <form action="#" method="post" class="container">
        <h1>Login</h1>

            <label for="email"><b>Email</b></label>
            <input type="email" name="email" placeholder="Enter Email" class="invoer" required>

            <label for="wachtwoord"><b>Password</b></label>
            <input type="password" name="wachtwoord" placeholder="Enter Password" class="invoer" required>

            <input type="submit" value="Inloggen" name="Inloggen" class="btn">

        <p>Nog geen account <a href="regristreren.php">Registreren</a></p>
    </form>


</div>
<?php

?>