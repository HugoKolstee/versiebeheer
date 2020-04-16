<?php
    require_once("dbCredentials.php");

//In deze functie maak je een connectie met de database
function connect(){
    $connection = mysqli_connect(server, user, wachtWoord, DBNaam);
    if ($connection->connect_error) {
        die($connection->error);
    }
    return $connection;
}

//In deze functie verbreek je de functie met de database
function disconnect($connection){
    if(isset($connection)){
        mysqli_close($connection);
    }
}
?>