<?php

    require_once(__DIR__ . "./../../config.php");

    class addsong
    {
        public $conn;

        public function __construct()
        {
            $this->conn = new database();
        }

        public function addartist($first,$last)
        {
            $code_ver = "0";
            $sql = "INSERT INTO `artist`(`id`, `first`, `last`) VALUES (NULL,'$first','$last')";
            
            $stm = $this->conn->connection()->query($sql);

            return $stm;
        }

        public function addmusic($album_id,$artist_id,$title,$word,$date)
        {
            $code_ver = "0";
            $sql = "INSERT INTO `Music`(`id`, `album_id`, `artist_id`,`title`, `words`, `release_date`) VALUES (NULL,'$album_id','$artist_id','$title','$word','$date')";
            
            $stm = $this->conn->connection()->query($sql);

            return $stm;
        }

        function update($id,$album_id,$artist_id,$title,$word,$date)
        {
            $sql = "UPDATE `Music` SET `album_id` = '$album_id', `artist_id` = '$artist_id',`title` = '$title', `words` = '$word', `release_date` = '$date' WHERE `id` = '$id'";

            $stm = $this->conn->connection()->query($sql);

            return $stm;
        }

        function updatdelet($id)
        {
            $sql = "UPDATE `Music` SET `code_vere` = 0 WHERE `id` = '$id'";

            $stm = $this->conn->connection()->query($sql);

            return $stm;
        }

        public function addmusique()
        {
            $sql2 = "SELECT album.name as name , artist.name as name1 , Music.* FROM Music JOIN album ON Music.album_id = album.id JOIN artist ON Music.artist_id = artist.id";
            $stmt2 = $this->conn->connection()->query($sql2);

            while ($row2 = $stmt2->fetch())
            {
                if ($row2['code_vere'] == 1)
                {
                    $id = $row2['id'];
                    echo '
                    <tr>

                        <td id="id12'.$id.'" data="'.$row2['id'].'">1</td>
                        <td id="date'.$id.'" data="'.$row2['release_date'].'">'.$row2['release_date'].'</td>
                        <td id="title'.$id.'" data="'.$row2['title'].'">'.$row2['title'].'</td>
                        <td id="name1'.$id.'" data="'.$row2['artist_id'].'">'.$row2['name1'].'</td>
                        <td id="name'.$id.'" data="'.$row2['album_id'].'">'.$row2['name'].'</td>
                        <td id="words'.$id.'" data="'.$row2['words'].'">
                            <button type="button" class="btn btn-success btn-rounded" href="#show" onclick="addword('.$row2['id'].')" data-bs-toggle="modal">show</button></td>
                        <td>
                        <!-- <i class="bi bi-trash3-fill">d</i>
                        <i class="bi bi-pencil-fill"></i> -->
                        <button type="button" class="btn btn-danger btn-rounded" name="deletapdate">Delet</button>
                        <button type="button" class="btn btn-warning btn-rounded" href="#modal-t" data-bs-toggle="modal" onclick="show('.$row2['id'].')">edit</button>
                        </td>
                    </tr>
                    ';
                }
            }
        }

        public function adduser()
        {
            $sql1 = "SELECT * FROM artist";
            $stmt1 = $this->conn->connection()->query($sql1);

            while ($row1 = $stmt1->fetch())
            {
                echo '
                    <option value="'.$row1['id'].'">'.$row1['name'].'</option>
                ';
            }
        }

        public function addalbum()
        {
            $sql2 = "SELECT * FROM album";
            $stmt2 = $this->conn->connection()->query($sql2);

            while ($row2 = $stmt2->fetch())
            {
                echo '
                    <option value="'.$row2['id'].'">'.$row2['name'].'</option>
                ';
            }
        }
        public function test()
        {
            echo "marhba";
        }
    }

?>