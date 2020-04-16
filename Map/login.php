<?php
$_SESSION['loggedin'] = false;

if(isset($_POST['inloggen']))
{

    require 'databaseConnectie.php';

    $email = $_POST['Email'];
    $wachtwoord = $_POST['Wachtwoord'];

    if(empty($email) || empty($wachtwoord))
    {
        header("Location: ../regristreren.php?error=LegeVelden");
        $_SESSION['loggedin'] = false;
        exit();
    }
    else
    {
        $sql = "SELECT * FROM klant WHERE Email=?;";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../regristreren.php?error=sqlError1");
            exit();
            $_SESSION['loggedin'] = false;
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {
                $pwdCheck = $wachtwoord;

                if($pwdCheck !== $row['Wachtwoord'])
                {
                    header("Location: ../regristreren.php?error=foutwachtwoord");
                    $_SESSION['loggedin'] = false;
                    exit();
                }
                elseif($pwdCheck == $row['Wachtwoord'])
                {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    //Haalt KlantID op uit de database
                    $query = "select KlantID , rol FROM klant where Email= '". $_SESSION['email'] ."'  " ;
                    $selecteren = mysqli_query($conn, $query);

                    $conn->query($query);

                    while ($subject = mysqli_fetch_assoc($selecteren)) {
                        $_SESSION['KlantID'] =  $subject["KlantID"];
                        $rol = $subject["rol"];
                    }
                    $conn->close();

                        if($rol == "admin")
                        {
                            header("Location: ../Beheer/beheerMenu.php");
                            exit();
                        }
                        else
                        {
                        header("Location: ../regristreren.php?login=succesvol");
                        exit();
                        }
                }
            }
            else
            {
                header("Location: ../regristreren.php?error=geenGebruiker");
                $_SESSION['loggedin'] = false;
                exit();
            }
        }
    }
}

