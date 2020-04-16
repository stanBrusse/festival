<link rel="stylesheet" href="../style.css">
<?php
require "map.Header.php";
require 'databaseConnectie.php';


$aantalTickets = $_POST['aantalTickets'];
$soort = $_POST['soortTickets'];
$prijs = $_POST['Prijs'];
$currentDateTime = date('Y-m-d H:i:s');


echo "Datum " .$currentDateTime;

echo "<br> aantal " . $aantalTickets = $_POST['aantalTickets'];
echo "<br> klant id " . $_SESSION['KlantID'];
echo "<br> soort" . $soort = $_POST['soortTickets'];
echo "<br> Email" .$_SESSION['email'];


$query = "select Ticketid FROM tickets WHERE TicketID='1' " ;
$selecteren = mysqli_query($conn, $query);

$conn->query($query);

while ($subject = mysqli_fetch_assoc($selecteren)) {
    $basic =  $subject["Ticketid"];
}

$query = "select Ticketid FROM tickets WHERE TicketID='2' " ;
$selecteren = mysqli_query($conn, $query);

$conn->query($query);
while ($subject = mysqli_fetch_assoc($selecteren)) {
    $premium =  $subject["Ticketid"];
}

$query = "select Ticketid FROM tickets WHERE TicketID='3' " ;
$selecteren = mysqli_query($conn, $query);

$conn->query($query);
while ($subject = mysqli_fetch_assoc($selecteren)) {
    $vip = $subject["Ticketid"]."<br>";
}

If($soort == "basic")
{
    $ticketid = $basic;
}
If($soort == "premium")
{
    $ticketid = $premium;
}
If($soort == "vip")
{
    $ticketid = $vip;
}

echo "<br> soort". $soort;

$sql = "INSERT INTO bestellingen(KlantID, TicketID ,aantal,Datum) values ('" . $_SESSION['KlantID'] . "','" . $ticketid . "','" . $aantalTickets. "','" . $currentDateTime. "')";
echo $sql;
$conn->query($sql);

$conn->close();


header("Location: ../Home.php");
