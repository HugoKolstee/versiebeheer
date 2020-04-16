<?php
    require_once("../private/initialize.php");
    session_start();
        ?>
    <link rel="stylesheet" href="../../stemApplicatie/public/stylesheets/main.css">
    <style>
        body{
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
        }
        input{
            width: 280;
            height: 35;

            padding: 10px;
            border: solid black 1px;
            border-radius: 15px;

            box-shadow: 10px 10px 5px grey;
        }
        td {
            display: flex;
            justify-content: center;
        }
        #inloggen{
            background-color: #3B62B2;
        }
        #inloggen:hover{
            font-size: 110%;
            background-color: #B9D800;
            padding-top: 7px;
        }
        h2{
            margin-top: 10px;
        }
        #copyright{
            padding-top: 25px;
            color: grey;
        }
        .text{
            width: 280px;
        }
    </style>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $myusername = mysqli_real_escape_string($db,$_POST["Email"]);
        $mypassword = mysqli_real_escape_string($db,$_POST["PassWord"]);

        $sql = "SELECT * FROM beheerders WHERE email = '$myusername' and wachtwoord = '$mypassword'";
        $inlogGegevensOphalen = mysqli_query($db,$sql);
        $inlogGegevens = mysqli_fetch_assoc($inlogGegevensOphalen);

        $tellRijen = mysqli_num_rows($inlogGegevensOphalen);
    if($tellRijen == 1) {
    $_SESSION['login_user'] = $myusername;
        echo $_SESSION['login_user'];
        header("location: beheerIndex.php");
    }else {
    echo "Je wachtwoord is fout";
    }
    mysqli_free_result($inlogGegevensOphalen);
    }
    ?>
<!--  Hier staat het inlog formulier  -->
    <form action="" method="post">
        <table>
            <tr><td id="logo"><img src="../public/images/KDPZwart.png"></td></tr>
            <tr><th><h2>Sign in please</h2></th></tr>
            <tr><td><input type="email" name="Email" placeholder="Email" autocomplete="off" class="text" required></td></tr>
            <tr><td><input type="password" name="PassWord" placeholder="Password" autocomplete="off" required></td></tr>
            <tr><td><input type="submit" value="inloggen" name="inloggen" id="inloggen"> </td></tr>
            <tr><td id="copyright">&copy; Copyright Hugo Kolstee <?php echo date("Y");?></td></tr>
        </table>
    </form>

