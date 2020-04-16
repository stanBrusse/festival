<?php
require "databaseConnectie.php";
session_start();

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$telefoonnummer = $_POST['telefoonnummer'];
$adresgegevens = $_POST['adres'];
$wachtwoord = $_POST['wachtwoord'];

echo $voornaam ."<br>";
echo $achternaam."<br>";
echo $email ."<br>";
echo $telefoonnummer."<br>";
echo $adresgegevens."<br>";
echo $wachtwoord."<br>";

$id = $_SESSION['KlantID'];




if (empty($voornaam) OR empty( $achternaam) OR empty( $email) OR empty( $adresgegevens) OR empty( $wachtwoord))
{
    header("location: ../regristreren.php?Vul Alles IN");
    exit();
}

else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    header("Location: ../regristreren.php?error=emailadres&gebruikersnaam=".$gebruikersnaam);
    exit();
}
else
{

    $sql = "UPDATE klant SET Voornaam='". $voornaam."' ,
                             Achternaam='".$achternaam."' ,
                             Email='".$email."',
                             telefoonnummer='".$telefoonnummer."',
                             adres='".$adresgegevens."',
                             Wachtwoord='".$wachtwoord."'
                             WHERE KlantID='". $_SESSION['KlantID'] ."'" ;
    echo  $sql;
    $conn->query($sql);

    $conn->close();
    header("Location: ../regristreren.php?Gegevens_Bewerkt");

}

