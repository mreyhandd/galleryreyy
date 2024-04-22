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
    <title>Halaman Album</title>
</head>
<body>
    <style>
        body{
            background:yellow;
            font-family:Garamond;
            margin:0;
        }

        a{
            text-decoration:none;
            color:black;
        }
        li{
           list-style:none; 
        }
        .heading{
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
            margin-right:395px;
            margin-left:395px;
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
    <h1 class="heading">Halaman Album</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <div class="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <form action="tambah_album.php" method="post">
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn"value="Tambah"></td>
            </tr>
        </table>
    </form>

    <table border="1" cellpadding=5 cellspacing=0 class="table-bottom">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal dibuat</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from album where userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['albumid']?></td>
                    <td><?=$data['namaalbum']?></td>
                    <td><?=$data['deskripsi']?></td>
                    <td><?=$data['tanggaldibuat']?></td>
                    <td>
                        <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
                        <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>