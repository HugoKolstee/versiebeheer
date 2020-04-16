<?php
session_start();
    require_once("initialize.php");
    include("beheerHeader.php");
    $rollen = array("Beheerder","Admin");
    print_r($_POST);
//Deze if statement zorgt ervoor dat er een nieuw account wordt aangemaakt
    if(isset($_POST["Aanmaken"])) {
        $sql = "SELECT Rol FROM beheerders WHERE Email = " . "'" . $_SESSION['login_user'] . "';";
        $adminControleren = mysqli_query($db, $sql);
        $admin = mysqli_fetch_assoc($adminControleren);
        if ($admin["Rol"] == "Admin") {

            if ($_POST["wachtwoord"] === $_POST["herhaalWachtwoord"]) {
                $sql = "INSERT INTO beheerders ";
                $sql .= "(BeheerderId, Voornaam, Achternaam, Email, Wachtwoord, TelefoonNummer,Rol) ";
                $sql .= "VALUES (";
                $sql .= "'" . rand() . "',";
                $sql .= "'" . $_POST["voornaam"] . "',";
                $sql .= "'" . $_POST["achternaam"] . "',";
                $sql .= "'" . $_POST["email"] . "',";
                $sql .= "'" . $_POST["wachtwoord"] . "',";
                $sql .= "'" . $_POST["telefoonNummer"] . "',";
                $sql .= "'" . $_POST["rol"] . "')";

                $gegvensInTabel = mysqli_query($db, $sql);
                echo "mysqli_error($sql)" . "<br>";


                //Deze if statement laat de foutmelding zien
                if ($db->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header("location: Inloggen.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $db->error;
                }
            } else {
                echo "Je wachtwoorden zijn niet gelijk";
            }
        }
    }
?>
<form method="post" action="#">
    <table>
        <tr><th colspan="2">Regristreren</th></tr>
        <tr><td>Voornaam:</td><td><input type="text" name="voornaam" required></td></tr>
        <tr><td>Achternaam:</td><td><input type="text" name="achternaam" required></td></tr>
        <tr><td>Wachtwoord:</td><td><input type="password" name="wachtwoord" required></td></tr>
        <tr><td>Herhaal Wachtwoord:</td><td><input type="password" name="herhaalWachtwoord" required></td></tr>
        <tr><td>E-mail Adress:</td><td><input type="email" name="email" required></td></tr>
        <tr><td>TelefoonNummer</td><td><input type="tel" name="telefoonNummer" required></td></tr>
        <tr><td>Rol</td>
            <td><select name="rol">
                    <?php
                    foreach ($rollen as $waarde){
                        echo "<option value=".$waarde.">".$waarde."</option>";
                    }
                    ?>
                </select></td></tr>
        <tr><td><input type="submit" value="Aanmaken" name="Aanmaken"></td></tr>
    </table>
</form>
