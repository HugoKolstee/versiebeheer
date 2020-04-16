<?php
    require_once("initialize.php");
    include("beheerHeader.php");
$sql = "SELECT * FROM klanten ";
$klantenOphalen = mysqli_query($db, $sql);


while($klanten = mysqli_fetch_assoc($klantenOphalen)):?>

    <table border="1px">
        <tr>
            <td>KlantId</td>
            <td><?php echo $klanten["KlantId"];?></td>
        </tr>
        <tr>
            <td>Voornaam</td>
            <td><?php echo $klanten["Voornaam"];?></td>
        </tr>
        <tr>
            <td>Achternaam</td>
            <td><?php echo $klanten["Achternaam"];?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $klanten["Email"];?></td>
        </tr>
        <tr>
            <td>Wachtwoord</td>
            <td><?php echo $klanten["Wachtwoord"];?></td>
        </tr>
    </table>
<br>
<?php endwhile;?>