<?php
require 'beheerHeader.php';
?>
<main id="main">



<table align="center" border="1px">
    <tr>
        <th colspan="6"><h2>Bestellingen</h2></th>
    </tr>
    <tr>
        <th>bestellingid</th>
        <th>KlantNaam</th>
        <th>TicketID</th>
        <th>Aantal</th>
        <th>TotaalPrijs</th>
        <th>Datum</th>
    </tr>

<?php
$query = "select  *  FROM bestellingen";
$resultaat = mysqli_query($conn , $query);
$conn->query($query );

while($aantal = mysqli_fetch_assoc($resultaat))
{
    $aantal['aantal'];
    if ($aantal["TicketID"] == 1)
    {
        $soort = "basic";
        $prijs = 40;
    }
    if ($aantal["TicketID"] == 2)
    {
        $soort = "premium";
        $prijs = 60;
    }
    if ($aantal["TicketID"] == 3)
    {
        $soort = "Vip";
        $prijs = 100;
    }

    $totPrijs = $aantal['aantal'] * $prijs;

    $klant = "select  *  FROM klant WHERE KlantID='".$aantal['KlantID']."'";
    $result = mysqli_query($conn , $klant);
    $conn->query($query );


        ?>

    <tr>
        <td> <?php echo $aantal['BestellingID']?></td>
        <td> <?php while($row = mysqli_fetch_assoc($result))
            {
                echo $row["Voornaam"]." ". $row["Achternaam"];
            }

            ?></td>
        <td> <?php echo $soort?></td>
        <td> <?php echo $aantal['aantal'];?></td>
        <td> <?php echo $totPrijs?>,-</td>
        <td> <?php echo $aantal['Datum']?></td>
    </tr>
<?php
}
?>
</table>
</main>
<?php
require 'beheerFooter.php';
?>