<?php
require "../../map/databaseConnectie.php";
$email = $_POST['Email'];


$query = "SELECT * From klant where Email='".$email."' ";
$selecteren = mysqli_query($conn, $query);
while ($subject = mysqli_fetch_assoc($selecteren)) {
    $klantID = $subject["KlantID"];

}
$delete = "DELETE  FROM  bestellingen where KlantID='".$klantID."' " ;
$conn->query($delete);



$sql = "DELETE  FROM  klant where Email='".$email."' " ;
$conn->query($sql);

$conn->close();


echo $sql;

//header("Location: ../SysteemGebruikers.php?Admin_verwijdered");