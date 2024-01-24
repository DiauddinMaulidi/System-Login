<?php
    require "koneksi.php";

    if ( isset($_POST["registrasi"]) ) {

        if ( registrasi($_POST) > 0 ) {
            echo "<script>
                    alert('Anda berhasil registrasi');
                 </script>";
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        li {
            margin-bottom: 10px;
        }
        label {
            display: block;
        }
        .login {
            background-color: greenyellow;
        }
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<h1>Halaman Registrasi</h1>
    
<form action="" method="post">
    <ul>
        <li>
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" autocomplete="off">
        </li>
        <li>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <label for="password2">Konfirmasi password: </label>
            <input type="password" name="password2" id="password2">
        </li>
        <li>
            <button type="submit" class="login" name="registrasi">Registrasi</button>
            <button type="button" ><a href="login.php">Login</a></button>
        </li>
    </ul>
</form>

</body>
</html>