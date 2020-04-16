<link rel="stylesheet" href="../style.css">
<?php
require "map.Header.php";
require 'databaseConnectie.php';

$aantalTickets = $_POST['aantalTickets'];
$soort = $_POST['soortTickets'];
$email = $_SESSION['email'];

$prijs = 0;
if($soort == "basic")
{
    $prijs = 40;
} elseif ($soort == "premium")
{
    $prijs = 60;
}elseif ($soort == "vip")
{
    $prijs = 100;
}
$totPrijs = $prijs * $aantalTickets;
?>
<main id="home">
    <aside id="HomeMenulinks">
        <div id="image1"></div>
    </aside>
    <div id="h2Content">
        <form action="Create.php" method="post" id="btnBevestigen">
            uw email: <input type="text" name="email" contenteditable="false" value="<?php echo $_SESSION['email']; ?>"><br>
            aantal Tickets<input type="text" name="aantalTickets" contenteditable="false" value="<?php echo $aantalTickets ?>"><br>
            Soort Tickets<input type="text" name="soortTickets" contenteditable="false" value="<?php echo $soort ?>"><br>
            Prijs Per kaartje <input type="text" name="Prijs" contenteditable="false" value="<?php echo $prijs ?>"><br>
            totaal Prijs = <?php echo $totPrijs ?> <br>
            <input type="submit"/>
        </form>
        <form action="../Home.php">
            <input type="submit" value="terug naar bestellingen"/>
        </form>
    </div>
    <aside id="HomeMenuRechts">
        <h2>Let op <br> U kunt uw gegevens hier NIET bewerken</h2>
        <ul>
            <li>basic </li> <h4> hier staat tekst over wat je allemaal met een basic kaartje kunt. de prijs is 40,-</h4>
            <hr>
            <li>premium </li> <h4> hier staat tekst over wat je allemaal met een premium kaartje kunt.de prijs is 60,-</h4>
            <hr>
            <li>vip </li> <h4> hier staat tekst over wat je allemaal met een vip kaartje kunt.de prijs is 100,-</h4>
        </ul>
    </aside>
</main>

<?php

require "../footer.php";

?>