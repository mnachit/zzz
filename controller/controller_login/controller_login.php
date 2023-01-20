<?php

    require_once(__DIR__ . "./../../modal/modal_login/modal_login.php");

    session_start();

    $testDataUser = new testUser();
    
    if (isset($_POST['login']))
    {
        $email = $_POST['logemail'];
        $password = $_POST['logpass'];

        $sql = $testDataUser->checkuser($email,$password);
        if ($sql->rowCount() > 0)
        {
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            if ($row['code_vere'] == '1')
            {
                // echo "<script>alert('Data oui');</script>";
                $_SESSION['first'] = $row['first'];
                $_SESSION['last']  = $row['last'];
                $_SESSION['username']  = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['date'] = $row['datebirth'];
                $_SESSION['num_tele'] = $row['num_tele'];

                header('location: ./../../view/index.php');
            }
            else
            {
                echo "<script>alert('Data no');</script>";
            }
        }
        else
        {
            echo "<script>alert('Data null');</script>";
        }
    }

    if (isset($_POST['task-save-btn']))
    {
        $date = $_POST['date_art'];
        $title  = $_POST['title_art'];
        $name_artist = $_POST['name of the artist'];
        $album = $_POST['album_art'];
        // $status = $_POST[''];
        $word = $_POST['words_art'];

        $sql = $testDataUser->addmusic($album,$title,$word,$date);
        if ($sql->rowCount() > 0)
        {
            $row = $sql->fetch(PDO::FETCH_ASSOC);
        }
    }
?>