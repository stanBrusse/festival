<?php
require 'databaseConnectie.php';

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$telefoonnummer = $_POST['telefoonnummer'];
$adresgegevens = $_POST['adresgegevens'];
$wachtwoord = $_POST['wachtwoord'];
$herhaalwachtwoord = $_POST['herhaal_wachtwoord'];


    if (empty($voornaam) OR empty( $achternaam) OR empty( $email) OR empty( $adresgegevens) OR empty( $wachtwoord) OR empty( $herhaalwachtwoord))
        {
            header("location: ../regristreren.php?Vul Alles IN");
            exit();
        }

    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("Location: ../regristreren.php?error=emailadres&gebruikersnaam=".$gebruikersnaam);
            exit();
        }


    else if ($wachtwoord !== $herhaalwachtwoord)
        {
            header("Location: ../regristreren.php?error=wachtwoordniethetzelfde&gebruikernaam".$gebruikersnaam."&email=".$emailadres);
            exit();
        }

    else
        {

            $sql = "SELECT 	Email FROM klant WHERE Email=?";
            $stmt = mysqli_stmt_init($connection);

            if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../regristreren.php?error=sqlerror1");
                    exit();
                }
            else
                {
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if($resultCheck > 0)
                    {
                        header("Location: ../regristreren.php?error=userTaken&mail=".$emailadres);
                        exit();
                    }
                    else
                    {
                        $klant = "klant";
                        $sql = "INSERT INTO klant (Voornaam, Achternaam,  Email, telefoonnummer , adres , Wachtwoord, rol ) VALUES ('" . $voornaam . "','" . $achternaam . "', '" . $email . "','" . $telefoonnummer . "','" . $adresgegevens . "', '" . $wachtwoord . "', '".$klant."')";
                        $conn->query($sql);

                        $conn->close();

                        header("Location: ../regristreren.php?succesvol");
                        exit();
                    }
            }
    }
mysqli_stmt_close($stmt);
mysqli_stmt_close($connection);


