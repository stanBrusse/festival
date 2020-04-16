<link rel="stylesheet" href="../style.css">

<?php
require "map.Header.php";
require 'databaseConnectie.php';

?>


<main id="profiel">


    <aside id="profielMenuLinks">
        <div id="image1"></div>
    </aside>

    <div id="profielContent">
        <h2 id="h2Home">uw gegevens</h2>
        <div id="content">
            <?php

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


            $querygegevens = " select * FROM klant WHERE Email='" . $_SESSION['email'] . "'";
            $selecteren = mysqli_query($conn, $querygegevens);


            $conn->query($querygegevens);
            while ($subject = mysqli_fetch_assoc($selecteren)) {
                ?>
                uw Naam: <?php echo $subject["Voornaam"], " ", $subject["Achternaam"] ?> <br>
                emailadres <?php echo $subject["Email"] ?><br>
                telefoonnummer <?php echo $subject["telefoonnummer"] ?><br>
                adresgegevens <?php echo $subject["adres"] ?><br>
                wachtwoord <?php echo $subject["Wachtwoord"] ?><br>


            <?php
                $vnaam= $subject["Voornaam"];
                $anaam= $subject["Achternaam"];
                $email= $subject["Email"];
                $tel  = $subject["telefoonnummer"];
                $Adres= $subject["adres"];
                $ww   = $subject["Wachtwoord"];

                $conn->close();
                echo $_SESSION['KlantID'];

            } } ?>
            <h2 id="h2Home">aanpassen naar: </h2>

            <form action="update.php" method="post">
                voornaam:       <input type="text" name="voornaam" value="<?php echo $vnaam ?>" required /> <br>
                achternaam:     <input type="text" name="achternaam" value="<?php echo $anaam ?>" required /> <br>
                email:          <input type="email" name="email" value="<?php echo $email ?>" required /> <br>
                telefoonnummer: <input type="number" name="telefoonnummer" value="<?php echo $tel ?>" required /> <br>
                adresgegevens:  <input type="text" name="adres" value="<?php echo $Adres ?>" required /> <br>
                wachtwoord:      <input type="text" name="wachtwoord" value="<?php echo $ww ?>" required /> <br>

                <input type="submit" value="wijzigen" />
            </form>
            </form>


        </div>
    </div>
    <aside id="registrerenMenuRechts">
        <ul>
            <li>basic</li>
            <h4> hier staat tekst over wat je allemaal met een basic kaartje kunt.</h4>
            <hr>
            <li>premium</li>
            <h4> hier staat tekst over wat je allemaal met een premium kaartje kunt.</h4>
            <hr>
            <li>vip</li>
            <h4> hier staat tekst over wat je allemaal met een vip kaartje kunt.</h4>
        </ul>
    </aside>


</main>


<?php

require "../footer.php";
?>
