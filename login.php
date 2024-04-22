<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <style>
         body{
            background:yellow;
            font-family:sans-serif;
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
    <div class="nav">
        <ul>
            <li><a href="register.php">Register</a></li>
            <li><a href="index.php">Halaman Landing</a></li>
        </ul>
    </div>
    <h1>Halaman Login</h1>
    <form action="proses_login.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" class="btn" value="Login"></td>
            </tr>
        </table>
    </form>
</body>
</html>