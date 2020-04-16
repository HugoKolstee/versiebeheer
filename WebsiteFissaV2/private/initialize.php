<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    //Hier staan de paden naar bepaalde mappen van het project in een constante
    define("PrivatePath", dirname(__FILE__));
    define("ProjectPath", dirname(PrivatePath));
    define("PublicPath", ProjectPath . "/public");
    define("SharedPath", PrivatePath . "/shared");

    $PublicEnd = strpos($_SERVER["SCRIPT_NAME"], "/public") + 7;
    $DocRoot = substr($_SERVER["SCRIPT_NAME"], 0, $PublicEnd);
    define("WWWRoot", $DocRoot);

    require_once("functions.php");
    require_once("database.php");

    $db = connect();
?>