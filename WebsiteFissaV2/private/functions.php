<?php
    function inloggen($db, $email, $wachtwoord) {
        $myusername = mysqli_real_escape_string($db,$email);
        $mypassword = mysqli_real_escape_string($db, $wachtwoord);

        $sql = "SELECT * FROM klanten WHERE email = '$myusername' and wachtwoord = '$mypassword'";
        $inlogGegevensOphalen = mysqli_query($db,$sql);
        $inlogGegevens = mysqli_fetch_assoc($inlogGegevensOphalen);

        $tellRijen = mysqli_num_rows($inlogGegevensOphalen);
        if($tellRijen == 1) {
            $_SESSION['login_user'] = $myusername;
            header("location: profielPagina.php");
            echo "U bent nu ingelogd";
        }else {
            echo "Je wachtwoord is fout";
        }
        mysqli_free_result($inlogGegevensOphalen);
    }

    function registreren($db, $voornaam, $achternaam, $email, $wachtwoord){
        if ($_POST["wachtwoord"] === $_POST["herhaalWachtwoord"]) {
        $sql = "INSERT INTO klanten ";
        $sql .= "(KlantId, Voornaam, Achternaam, Email, Wachtwoord) ";
        $sql .= "VALUES (";
        $sql .= "'" . rand() . "',";
        $sql .= "'" . $voornaam . "',";
        $sql .= "'" . $achternaam . "',";
        $sql .= "'" . $email . "',";
        $sql .= "'" . $wachtwoord . "')";

        $gegvensInTabel = mysqli_query($db, $sql);
        echo "mysqli_error($sql)" . "<br>";


        //Deze if statement laat de foutmelding zien
            header("location: inloggen.php");
            echo "Uw account is aangemaakt u kunt nu inloggen";


    } else {
    echo "Je wachtwoorden zijn niet gelijk";
}
    }
?>