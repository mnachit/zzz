<?php

    require_once(__DIR__ . "./../../modal/modal_signup/modal_signup.php");


    $insertDataUser = new userlist();
    
    if (isset($_POST['save']))
    {
        $first = $_POST['inpfirst']; 
        $last = $_POST['inplast'];
        $email = $_POST['inpemail'];
        $num_tele = $_POST['phone'];
        $datebirth = $_POST['inpdate'];
        $password = $_POST['inppass'];
        $cPassword = $_POST['inpcpass'];

        $sql = $insertDataUser->adduser($first,$last,$email,$num_tele,$datebirth,$password,$cPassword);

        if ($sql)
        {
            echo "<script>alert('Data oui');</script>";
        }
        else
        {
            echo "<script>alert('Data no');</script>";
        }
        header('location: ../../view/login.php');
    }
?>