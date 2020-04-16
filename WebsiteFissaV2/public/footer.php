<!--Hier onder staat de footer-->
<style>
    footer{
        height: 100px;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #f1f1f1;
        color: black;
        text-align: center;
    }
</style>

<footer>
    <p><?php echo date("Y") ." &copy; Copyright Hugo Kolstee";?></p>
</footer>

<?php
    //Hier disconnect je met de database zodat je niet voor gekke problemen komt te staan.
    disconnect($db);
?>