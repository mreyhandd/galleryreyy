<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Foto</title>
</head>
<body>
    <style>
        body{
            background:yellow;
            font-family:sans-serif;
            margin:0;
        }

        a{
            text-decoration:none;
            color:black;
        }
        li{
           list-style:none; 
        }
        h1{
            text-align:center;
        }
        .nav{
            padding:5px;
            background:black;
            margin-bottom:20px;
        }
        .nav ul{
            text-align:center;
        }
        .nav ul li{
            font-size:20px;
            display:inline;
            margin-right:50px;
        }
        .nav ul li a{
            color:white;
        }
        .nav ul li a:hover{
            color:black;
            background:yellow;
            padding:15px;
            transform:rotate(10deg);
            transition: 0.3s ease-in-out;
        }
        table{
            display:flex;
            justify-content:center;
            margin:10px;
            margin-right:300px;
            margin-left:300px;
        }
        .td{
            padding:100px;
        }
        .btn{
            margin-top:10px;
            padding:8px;
            border:none;
            cursor:pointer;
            width:100px;
        }
        .btn:hover{
            background:blue;
            color:white;
            transform:rotate(4deg);
            transition: 0.5s ease-in-out;
        }
    </style>

    
    <h1>Halaman Edit Foto</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    <div class="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
     </div>

    <form action="update_foto.php" method="post" enctype="multipart/form-data">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                    <?php
                        $userid=$_SESSION['userid'];
                        $sql2=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data2=mysqli_fetch_array($sql2)){
                    ?>
                            <option value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn" value="Ubah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>

    
</body>
</html>