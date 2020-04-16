<?php
    require_once("initialize.php");
    include("beheerHeader.php");
$sql = "SELECT * FROM bestellingen ";
    $klantBestellingOphalen = mysqli_query($db, $sql);

    $bestelling = "Bestelling 1";
    while($klantBestellingen = mysqli_fetch_assoc($klantBestellingOphalen)):?>
        <table border="1px">
            <tr>
                <td>BestellingId</td>
                <td><?php echo $klantBestellingen["BestellingId"];?></td>
            </tr>
            <tr>
                <td>KlantID</td>
                <td><?php echo $klantBestellingen["KlantId"];?></td>
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
    <br>
    <?php $bestelling++;?>
    <?php endwhile;?>