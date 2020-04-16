<?php
require 'beheerHeader.php';
?>
<main id="main">

    <?php
    $query = "select  *  FROM Klant where rol = 'admin'";
    $resultaat = mysqli_query($conn , $query);
    $conn->query($query );?>

    <table align="center" border="1px">
        <tr>
            <th colspan="8"><h2>Bestellingen</h2></th>
        </tr>
        <tr>
            <th>klantid</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th>telefoonnummer</th>
            <th>adres</th>
            <th>wachtwoord</th>
            <th>rol</th>

        </tr>




        <?php
        while($aantal = mysqli_fetch_assoc($resultaat))

        {?>
            <tr>
                <td> <?php echo $aantal['KlantID']?></td>
                <td> <?php echo $aantal['Voornaam']?></td>
                <td> <?php echo $aantal['Achternaam']?></td>
                <td> <?php echo $aantal['Email']?></td>
                <td> <?php echo $aantal['telefoonnummer']?></td>
                <td> <?php echo $aantal['adres']?></td>
                <td> <?php echo $aantal['Wachtwoord']?></td>
                <td> <?php echo $aantal['rol']?></td>
            </tr>

            <?php
        }
        ?>
    </table>

<table align="center" border="1px">
 <tr>
     <th><label>admin Toevoegen</label></th>
 </tr>
    <form action="BeheerMap/AdminToevoegen.php" method="post">

<tr>
    <td>Email:<input type="email"  name="Email" method="post"></td>
</tr>

<tr>
    <td><button>Toevoegen</button></td>
</tr>
    </form>
</table>


<table align="center" border="1px">
    <tr>
        <th><label>admin Verwijderen</label></th>
    </tr>
    <form action="BeheerMap/AdminVerwijderen.php" method="post">

        <tr>
            <td>Email:<input type="email"  name="Email" method="post"></td>
        </tr>

        <tr>
            <td><button>Verwijderen</button></td>
        </tr>
    </form>
</table>
</main>


<?php

require 'beheerFooter.php';
    ?>



