<?php
//require("../private/initialize.php");
//include(SharedPath . "/header.php");
session_start();
?>
<link rel="stylesheet" href="stylesheets/main.css">





<!--De main Div hieronder is het tickets bestellen formulier-->
<main>
    <form action="bevestiging.php" method="get" class="form">
        <table>
            <tr><th colspan="2">Tickets Bestellen</th></tr>
            <tr><td>Naam</td><td><input type="text" name="Naam" required></td></tr>
            <tr><td>Email</td><td><input type="email" name="Email" required></td></tr>
            <tr><td>Aantal</td><td><input type="number" name="Aantal" required></td></tr>
            <tr><td>Type Tickets</td>
                <td>
                    <select name="typeTickets">
                        <option value="Basic">Basic</option>
                        <option value="Premium">Premium</option>
                        <option value="VIP">VIP</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2"><input type="submit" value="Bestellen" name="Bestellen"></td></tr>
        </table>
    </form>
</main>
<?php
include(SharedPath . "/footer.php");
?>