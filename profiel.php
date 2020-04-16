<?php
require "Header.php";
require 'Map/databaseConnectie.php';

?>

    <main id="profiel">


        <aside id="profielMenuLinks">
            <div id="image1"></div>
        </aside>

        <div id="profielContent">
            <h2 id="h2Home">uw gegevens</h2>
    <div id="content">



<?php

if (isset($_SESSION['loggedin']) && $_SESSION ['loggedin'] == true) {


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


        <form action="Map/profielaanpassen.map.php" method="post">
            <button>aanpassen</button>
        </form>
        <hr> <br>

    <?php }
    $querydatum = "select  *  FROM bestellingen WHERE KlantID  = '" . $_SESSION['KlantID'] . "'";
    $result_set_datum = mysqli_query($conn, $querydatum);
    $conn->query($querydatum );

    $aantal = 1;
    while ($subject1 = mysqli_fetch_assoc($result_set_datum)) {
    if ($subject1["TicketID"] == 1)
    {
        $soort = "basic";
    }
    if ($subject1["TicketID"] == 2)
    {
        $soort = "premium";
    }
    if ($subject1["TicketID"] == 3)
    {
        $soort = "vip";
    }

        ?>
        <h3>bestelling nummer <?php echo $aantal ?></h3><br>
        soort <input contenteditable="false" value="<?php echo $soort?>"><br>
        aantal<input contenteditable="false" value="<?php echo $subject1["aantal"]?>"><br>
        datum <input contenteditable="false" value="<?php echo $subject1["Datum"]?>">



    <?php
    $aantal++;
    }

// 4. vrijlaten terugegeven data
    mysqli_free_result($result_set_datum);


// 5. sluit database connectie
    mysqli_close($connection);
}
else {
    echo '<h3 id="h3Home">Log in om uw profiel in te zien of te weizigen <br> Als u nog geen account heeft kunt u een nieuw account maken</h3>';
}
?>
    </div>
        </div>
        <aside id="registrerenMenuRechts">
            <ul>
                <li>basic </li> <h4> hier staat tekst over wat je allemaal met een basic kaartje kunt.</h4>
                <hr>
                <li>premium </li> <h4> hier staat tekst over wat je allemaal met een premium kaartje kunt.</h4>
                <hr>
                <li>vip </li> <h4> hier staat tekst over wat je allemaal met een vip kaartje kunt.</h4>
            </ul>
        </aside>


    </main>

<?php
$conn->close();


require "footer.php";
?>