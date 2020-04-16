<?php
require "../../map/databaseConnectie.php";

$email = $_POST['Email'];

$sql = "UPDATE klant SET rol='admin' WHERE Email='".$email."'   " ;
$conn->query($sql);

$conn->close();
header("Location: ../SysteemGebruikers.php?Admin_Toegevoegd");
