<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
    require("../private/initialize.php");
    include("header.php");
?>
<!--  Dit is het regristratie formulier  -->
<div id="containerRechts">
    <form method="post" action="#">
        <table>
            <tr><th colspan="2">Regristreren</th></tr>
            <tr><td>Voornaam:</td><td><input type="text" name="voornaam" required></td></tr>
            <tr><td>Achternaam:</td><td><input type="text" name="achternaam" required></td></tr>
            <tr><td>Wachtwoord:</td><td><input type="password" name="wachtwoord" required></td></tr>
            <tr><td>Herhaal Wachtwoord:</td><td><input type="password" name="herhaalWachtwoord" required></td></tr>
            <tr><td>E-mail Adress:</td><td><input type="email" name="email" required></td></tr>
            <tr><td><input type="submit" value="Regristreren" name="regristreren"></td></tr>
        </table>
    </form>
</div>
</div><link rel="stylesheet" href="styleSheets/main.css">
<?php
//Deze if statement zorgt ervoor dat er een nieuw account wordt aangemaakt
if(isset($_POST["regristreren"])) {



        registreren($db ,$_POST["voornaam"], $_POST["achternaam"], $_POST["email"], $_POST["wachtwoord"]);
}