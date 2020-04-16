<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="uft-8">
    <meta name="description" content="This is an example of a meta description. this will often show up in seach results">
    <meta name="vieuwport" content="width=device-with, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<header>

<ul id="HeaderUL">
    <button id="buttonLI"><li><a href="Home.php">Home</a></li>       </button>
    <button id="buttonLI"><li><a href="profiel.php">profiel</a></li>  </button>
    <button id="buttonLI"><li><a href="regristreren.php">inloggen&Registreren</a></li> </button>
</ul>


<div>
<div id="HeaderLogin"


</div>



    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
        <form action="profiel.php" id="btnProfiel">
        uw profiel:  <button type="submit" name="btnProfiel">  <?php echo $_SESSION["email"];?></button>
        </form>

        <form action="Map/loguit.php" method="post" id="loguit">
            <button type="submit" name="uitloggen">log uit</button><br>
        </form>
<?php    }?>






    </div>
</header>