<?php
require("../private/initialize.php");
    session_start();
    if (!isset($_SESSION['login_user'])){
        header("location: inloggen.php");
    }
include("Header.php");

    print_r($_GET);

    if($_GET["Basic"] == 0){
        $basic = 0;

    }else{
        $basic = $_GET["Aantal"];
    }
    if($_GET["Premium"] == 0){
        $premium = 0;
    }else {
        $premium = $_GET["Aantal"];
    }
    if($_GET["VIP"] == 0){
    $VIP = 0;
    }else {
    $VIP= $_GET["Aantal"];
}

if ($_GET["typeTickets"] == "Basic"){
    $basic = $_GET["Aantal"];
}else{
    $basic = 0;
}



if (isset($_POST["Afronden"])){
    $sql = "INSERT INTO bestellingen ";
    $sql .= "(BestellingId, KlantId, AantalBasic, AantalPremium, AantalVip) ";
    $sql .= "VALUES (";
    $sql .= "'" . rand() . "',";
    $sql .= "'" . $_SESSION["KlantId"] . "',";
    $sql .= "'" . $basic . "',";
    $sql .= "'" . $premium . "',";
    $sql .= "'" . $VIP . "')";
    $gegevensInDb = mysqli_query($db, $sql);
    echo "Error: " . $sql . "<br>" . $db->error;

    header("location: index.php");
}
?>
    <!--  Hier staat een overzicht van de bestelling  -->

    <table>
        <tr>
           <td>Naam</td>
            <td><?php echo $_GET["Naam"];?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $_GET["Email"];?></td>
        </tr>
        <tr>
            <td>Aantal</td>
            <td><?php echo $_GET["Aantal"];?></td>
        </tr>
        <tr>
            <td>Soort</td>
            <td><?php echo $_GET["typeTickets"];?></td>
        </tr>
        <tr>
            <td>Prijs</td>
            <td><?php echo $_GET["Aantal"] * $ticketPrijs; ?></td>
        </tr>
        <form method="post" action="">
        <tr>
            <td><input type="submit" value="Afronden" name="Afronden"></td>
        </tr>
    </table>
    <input type="hidden" name="Naam" value=" <?php echo $_POST["Naam"]; ?>">
</form>
<?php


//include(SharedPath . "/footer.php");
?>
