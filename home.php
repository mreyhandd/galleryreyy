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
    <title>Halaman Home</title>
</head>
<body>
<style>
         body{
            background:yellow;
            font-family:garamond;
            margin:0;
        }
        li{
            list-style:none;
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
            text-decoration:none;
        }
        .nav ul li a:hover{
            color:black;
            background:yellow;
            padding:15px;
            transform:rotate(10deg);
            transition: 0.3s ease-in-out;
        }
        h1{
            text-align:center;
        }
    </style>
    <h1>Halaman Home</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    <div class="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
 </div>
</body>
</html>