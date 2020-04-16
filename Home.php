<?php
require "Header.php";
require "Map/databaseConnectie.php";


?>

<main id="home">
    <aside id="HomeMenulinks">
        <div id="image1"></div>
    </aside>

    <div id="h2Content">
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


        echo '        <h2 id="h2Home">Koop hier uw tickets. </h2> <br>
        <form action="Map/bevestingingspagina.php" method="post">
            aantal tickets  <input type="number" name="aantalTickets" required /> <br>
            soort ticket:

            basic           <input type="radio"  name="soortTickets" value="basic" />
            premium         <input type="radio"  name="soortTickets" value="premium"/>
            vip             <input type="radio"  name="soortTickets" value="vip"/> <br>

            <input type="submit" value="verzenden" id="Home" />
        </form>';


        } else {
        echo '<h3 id="h3Home">Log eerst in om kaartjes te kopen <br> Als u nog geen account heeft kunt u een nieuw account maken</h3>';
        }
        ?>

    </div>

    <aside id="HomeMenuRechts">
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

require "footer.php";


?>
