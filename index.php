<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
</head>
<body>
    <style>
         /* td{
        text-align:right;
    } */
        body{
            background:yellow;
            font-family:indigo;
            color:black;
            margin:0;
        }

        a{
            text-decoration:none;
            color:black;
        }
        a:hover{
            color:red;
            transition: 0.3s
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
    <h1 class="heading">Halaman Landing</h1>
    <?php
        session_start();
        if(!isset($_SESSION['userid'])){
    ?>
    <div class="nav">
        <ul>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
    <?php
        }else{
    ?>   
        <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        <div class="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="album.php">Album</a></li>
                <li><a href="foto.php">Foto</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    <?php
        }
    ?>
    

    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
            <th>Jumlah Like</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskripsifoto']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                </td>
                <td><?=$data['namalengkap']?></td>
                <td>
                    <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <!-- <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                    <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a> -->
                    <a href="like.php?fotoid=<?=$data['fotoid']?>">Like</a>
                    <a href="komentar.php?fotoid=<?=$data['fotoid']?>">Komentar</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    
</body>
</html>