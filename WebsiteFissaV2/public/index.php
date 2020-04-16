<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
    require("../private/initialize.php");
    include("header.php");

    $sql = "SELECT * FROM `tickets` WHERE 1";
    $kaartenOphalen = mysqli_query($db, $sql);

    $sql = "SELECT `Basic`, `Premium`, `VIP` FROM `winkelwagen`";
    $winkelWagenOphalen = mysqli_query($db, $sql);
    $winkelWagen = mysqli_fetch_assoc($winkelWagenOphalen);




        if(isset($_GET["Kaart1"])){
            $_SESSION["basic"] = $_GET["Kaart1"];
//            echo "werkt dit";
        }
        else{
            $_SESSION["basic"] = $_SESSION["basic"];
//            echo "Dit werkt niet";
        }

        if(isset($_GET["Kaart2"])){
            $_SESSION["premium"] = $_GET["Kaart2"];
        }
        else{
            $_SESSION["premium"] = $_SESSION["premium"];
        }
        if(isset($_GET["Kaart3"])){
            $_SESSION["VIP"] = $_GET["Kaart3"];
        }
        else{
            $_SESSION["VIP"] = $_SESSION["VIP"];
        }
//        $sql = "UPDATE winkelwagen SET Basic=" . $basic ." , Premium= " . $premium . " , VIP= ". $VIP . ";";

//    $toevoegenKarretje = mysqli_query($db, $sql);



?>
<link rel="stylesheet" href="styleSheets/main.css">
<!-- Slideshow container -->
<div class="slideshow-container" style="">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img class="sliderFoto1" src="images/sliderPlaceholder1.png" style="width:100%" height="450px" width="auto">
        <div class="text">Caption Text</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img class="sliderFoto2" src="images/sliderPlaceholder2.png" style="width:100%" height="450px" width="auto">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img class="sliderFoto3" src="images/sliderPlaceholder3.png" style="width:100%" height="450px" width="auto">
        <div class="text">Caption Three</div>
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- The dots/circles -->
<div style="text-align:center; background-color: darkslategrey" class="bubberBar" >
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>


<!--Dit zijn de cards waar je de 3 verchillende tickets kan selecteren-->

    <ul>
        <?php
        $NaamKaart = "Kaart1";
        while($kaarten = mysqli_fetch_assoc($kaartenOphalen)):?>
        <form method="get" action="#">
            <li>
            <div class="card">
                <img src="images/ticketFoto1.jpg" alt="Kaartje" style="width:100%">
                <h1><?=$kaarten["Naam"];?></h1>
                <p class="price">€<?=$kaarten["Prijs"];?>,- </p>
                <p class="aantalKaarten"><?=$kaarten["Omschrijving"];?><input type="number" class="Aantalkaarten" name="<?php echo $NaamKaart;?>" placeholder="Aantal tickets"></p>
                <p class="staatInputIn"><button type="submit" name="toevoegenKarretje" class="toevoegenKarretje">Toevoegn</button></p>
            </div>
        </li>
        </form>
        <?php $NaamKaart++; ?>
        <?php endwhile;?>
    </ul>
</form>
<?php
    $sql= "SELECT * FROM informatie";
    $informatieOphalen = mysqli_query($db ,$sql);
    $informatie = mysqli_fetch_assoc($informatieOphalen);
    $indexInformatie = $informatie["IndexTekst"];
    ?>
    <article> <?php
    echo "<p class='indexInformatie'>" . $indexInformatie . "</p>";
    ?>
    </article>


<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 1500); // Change image every 2 seconds
    }

</script>

<?php
    include("footer.php");
?>