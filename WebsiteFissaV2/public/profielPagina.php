<?php
    require("../private/initialize.php");
    include("header.php");
    session_start();
    if(!isset($_SESSION['login_user'])){
    header("location: index.php");
}
    //Hier haal je de gegevens uit de database
    $sql = "SELECT * FROM klanten ";

    $sql .= "WHERE Email ='" . $_SESSION['login_user'] . "';";

    $klantGegevensOphalen = mysqli_query($db, $sql);
    $klantGegevens = mysqli_fetch_assoc($klantGegevensOphalen);

    $_SESSION["KlantId"]= $klantGegevens["KlantId"];
?>
<table id="gegevens" border="1px">
    <link href="styleSheets/main.css" rel="stylesheet">
    <?php
    //Hier l
    if(isset($klantGegevens)) {
        foreach ($klantGegevens as $id => $value) {
            echo "<tr>
    
        <td>$id</td>
        <td>$value</td>   
              </tr>";
        }
    }
    ?>
    <tr><td colspan="2"><a>Klant gegevens aanpassen</a></td></tr>
</table>
    <?php
    $sql = "SELECT KlantId FROM klanten ";
    $sql .= "WHERE Email ='" . $_SESSION['login_user'] . "'";
    $klantIdOphalen = mysqli_query($db, $sql);

    $klantId = mysqli_fetch_assoc($klantIdOphalen);

    $sql = "SELECT * FROM bestellingen ";
    $sql .= "WHERE KlantId ='" . $klantId["KlantId"] . "'";
    $klantBestellingOphalen = mysqli_query($db, $sql);

    $bestelling = "Bestelling 1";
    while($klantBestellingen = mysqli_fetch_assoc($klantBestellingOphalen)):?>
        <table border="1px">
            <tr>
                <td colspan="2"><?php echo $bestelling;?></td>
            </tr>
            <tr>
                <td>Basic</td>
                <td><?php echo $klantBestellingen["AantalBasic"];?></td>
            </tr>
            <tr>
                <td>Premium</td>
                <td><?php echo $klantBestellingen["AantalPremium"];?></td>
            </tr>
            <tr>
                <td>VIP</td>
                <td><?php echo $klantBestellingen["AantalVip"];?></td>
            </tr>
        </table>
    <?php $bestelling++;?>
    <?php endwhile;?>
<?php

    mysqli_free_result($klantGegevensOphalen);
?>