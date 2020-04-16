<?php
require "Header.php";
?>

<main id="registreren">

    <aside id="registrerenMenuLinks">
        <div id="image1"></div>
    </aside>

    <div id="registrerenContent">

        <h2>registreer hier</h2>

        <form action="Map/registreren.map.php" method="post">
            <label>voornaam:</label>     <input type="text" name="voornaam" placeholder="voornaam"><br>
            <label>achternaam:</label>    <input type="text" name="achternaam" placeholder="achternaam"><br>
            <label>Email-adres:</label>       <input type="text" name="email" placeholder="Voorbeeld@gmail.com"><br>
            <label>telefoonnummer</label>    <input type="number" name="telefoonnummer" placeholder="06 123 456 78"> <br>
            <label>adresgegevens</label>       <input type="text" name="adresgegevens" placeholder="Doetinchemseweg 777a"><br>
            <label>Wachtwoord:</label>         <input type="password" name="wachtwoord" placeholder="wachtwoord"><br>
            <label>Herhaal wachtwoord:</label> <input type="password" name="herhaal_wachtwoord" placeholder="herhaal wachtwoord"><br>
            <button type="submit" >registreer </button>
        </form>

            <h2>of log hier in</h2>


        <form action="Map/login.php" method="post">
            <input type="email" name="Email" placeholder="voorbeeld@gmail.com" required><br>
            <input type="password" name="Wachtwoord" placeholder="wachtwoord"   required><br>

            <button type="submit" name="inloggen">login</button><br>
             <form action="Map/loguit.php" method="post" id="login">
                <button type="submit" name="uitloggen">log uit</button>
            </form>
        </form>

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
require "footer.php";
?>


<!-- http://localhost/php/periode%203/festivalCase/regristreren.php -->
