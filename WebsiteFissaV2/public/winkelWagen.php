<?php
    require_once("../private/initialize.php");
    include("header.php");
//    session_start();
    if (!isset($_SESSION['login_user'])){
        header("location: inloggen.php");
    }
//    $sql = "SELECT `Basic`, `Premium`, `VIP` FROM `winkelwagen`";
//    $winkelWagenOphalen = mysqli_query($db, $sql);
//    $winkelWagen = mysqli_fetch_assoc($winkelWagenOphalen);
//
//    echo"<table>";
//    echo "<form method='post'>";
//    foreach ($winkelWagen as $id => $value) {
//
//            echo "<tr>";
//            echo "<td>";
//            echo $id;
//            echo "</td>";
//            echo "<td>";
//            ?>
<!--                <input type="number" name="--><?php //echo $id;?><!--" value="--><?php //echo $value;?><!--">-->
<!--            --><?php
//            echo "</td>";
//            echo "</tr>";
//
//        }

    echo "Basic";
    echo $_SESSION["basic"];
    echo "Premium";
    echo $_SESSION["premium"];
    echo "VIP";
    echo $_SESSION["VIP"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "INSERT INTO bestellingen ";
    $sql .= "(BestellingId, KlantId, AantalBasic, AantalPremium, AantalVip) ";
    $sql .= "VALUES (";
    $sql .= "'" . rand() . "',";
    $sql .= "'" . $_SESSION["KlantId"] . "',";
    $sql .= "'" . $_SESSION["basic"] . "',";
    $sql .= "'" . $_SESSION["premium"] . "',";
    $sql .= "'" . $_SESSION["VIP"] . "')";
    $gegevensInDb = mysqli_query($db, $sql);
    echo "Error: " . $sql . "<br>" . $db->error;

    $sql = "UPDATE winkelwagen SET Basic= 0 , Premium=  0, VIP=0 ";
    $winkelWagenReset = mysqli_query($db, $sql);
    $_SESSION["basic"] = 0;
    $_SESSION["premium"] = 0;
    $_SESSION["VIP"] = 0;
    echo "mysqli_error($sql)" . "<br>";
    header("location: index.php");
    echo "Uw bestelling is geplaats";
}
    ?>
<form method="post">
    <table>
    <input type="submit" name="Bestellen" value="Bestellen">
        </table>
    </form>

<link rel="stylesheet" href="styleSheets/main.css">