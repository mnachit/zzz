<?php

    require_once(__DIR__ . "./../../modal/modal_index/modal_index.php");


    $insertDataUser = new addsong();
    
    if (isset($_POST['saveuser']))
    {
        $first = $_POST['firstuser']; 
        $last = $_POST['lastuser'];

        $sql = $insertDataUser->addartist($first,$last);

        header('location: ../../view/login.php');
    }

    if (isset($_POST['edittask']))
    {
        $date = $_POST['editdate_art'];
        $title  = $_POST['edittitle_art'];
        $artist_id = $_POST['editname_art'];
        $album_id = $_POST['editalbum_art'];
        $word = $_POST['editwords_art'];
        $id = $_POST['idd3'];

        $sql = $insertDataUser->update($id,$album_id,$artist_id,$title,$word,$date);

        header('location: ../../view/index.php');
    }

    if(isset($_POST['deletapdate']))
    {
        $id = $_POST['idd3'];
        $insertDataUser->updatdelet($id);
    }

    if (isset($_POST['savesong']))
    {
        $date = $_POST['date_art'];
        $title  = $_POST['title_art'];
        $artist_id = $_POST['name_art'];
        $album_id = $_POST['album_art'];
        // $status = $_POST[''];
        $word = $_POST['words_art'];

        $sql = $insertDataUser->addmusic($album_id,$artist_id,$title,$word,$date);

        if ($sql)
        {
            echo "<script>alert('Data oui');</script>";
            
            header('location: ../../view/index.php');
        }
        else
        {
            echo "<script>alert('Data no');</script>";
        }
        // if ($sql->rowCount() > 0)
        // {
        //     while($row = $sql->fetch(PDO::FETCH_ASSOC))
        //     {
        //         echo '
                // <tr>
                //     <td>1</td>
                //     <td>'.$row['release_date'].'</td>
                //     <td>'.$row['title'].'</td>
                //     <td>'.$row['date'].'</td>
                //     <td>'.$row['album_id'].'</td>
                //     <td>'.$row['date'].'</td>
                //     <td>
                //     <!-- <i class="bi bi-trash3-fill">d</i>
                //     <i class="bi bi-pencil-fill"></i> -->
                //     <button type="button" class="btn btn-danger btn-rounded">Delet</button>
                //     <button type="button" class="btn btn-warning btn-rounded">edit</button>
                //     <button type="button" class="btn btn-success btn-rounded">show</button>
                //     </td>
                // </tr>
        //         ';
        //     }
        // }
    }
?>