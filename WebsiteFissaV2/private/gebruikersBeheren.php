<?php
session_start();
require_once ("initialize.php");
include ("beheerHeader.php");

$sql = "SELECT * FROM  beheerders";
$gebruikersOphalen = mysqli_query($db, $sql);

    if(isset($_POST["Veranderen"])){
        $sql = "SELECT Rol FROM beheerders WHERE Email = " . "'" . $_SESSION['login_user'] . "';";
        $adminControleren = mysqli_query($db, $sql);
        $admin = mysqli_fetch_assoc($adminControleren);
        if($admin["Rol"] == "Admin"){
            $sql = "UPDATE beheerders SET BeheerderId=" . "'" .$_POST["Id"] ."'" ." , Voornaam= " ."'" . $_POST["Voornaam"] ."'" . " , Achternaam= "."'" . $_POST["Achternaam"] . "'" ." , Email= ". "'" .$_POST["Email"] ."'" . " , TelefoonNummer= ". "'" .$_POST["TelefoonNummer"] ."'" . " , Wachtwoord= " . "'" .$_POST["Wachtwoord"] . "'" ." , Rol= " ."'" . $_POST["Rol"] . "'" ;
            $gebruikerAanpassen = mysqli_query($db, $sql);

            header("location: gebruikersBeheren.php");
        }
    }
    if (isset($_POST["Verwijderen"])){
        $sql = "DELETE FROM beheerders WHERE BeheerderId = " . "'" . $_POST["Id"] . "'";
        $gebruikerVerwijderen = mysqli_query($db, $sql);
        echo "Je mag iemand verwijderen";
        header("location: gebruikersBeheren.php");
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    ?>
        <a href="gebruikerAanmaken.php">Gebruiker aanmaken</a>
    <?php
while($gebruikers = mysqli_fetch_assoc($gebruikersOphalen)):?>
    <form action="" method="post">
    <table border="1px">
        <tr>
            <td>Id</td>
            <td><input type="text" value=" <?php echo $gebruikers["BeheerderId"];?>" name="Id" required></td>
        </tr>
        <tr>
            <td>Voornaam</td>
            <td><input type="text" value="<?php echo $gebruikers["Voornaam"];?>" name="Voornaam" required></td>
        </tr>
        <tr>
            <td>Achternaam</td>
            <td><input type="text" value="<?php echo $gebruikers["Achternaam"];?>" name="Achternaam" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" value="<?php echo $gebruikers["Email"];?>" name="Email" required></td>
        </tr>
        <tr>
            <td>TelefoonNummer</td>
            <td><input type="tel" value="<?php echo $gebruikers["TelefoonNummer"];?>" name="TelefoonNummer" required></td>
        </tr>
        <tr>
            <td>Wachtwoord</td>
            <td><input type="password" value="<?php echo $gebruikers["Wachtwoord"];?>" name="Wachtwoord" required></td>
        </tr>
        <tr>
            <td>Rol</td>
            <td><input type="text" value="<?php echo $gebruikers["Rol"];?>" name="Rol" required></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="Veranderen" value="Veranderen"></td>
        </tr>

        <tr>
            <td colspan="2">

                    <input type="submit" name="Verwijderen" value="Verwijderen">
                </form>
            </td>
        </tr>
    </table>
<?php endwhile;?>
<?php

?>
