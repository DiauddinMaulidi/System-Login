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
        button {
            background-color: orange;
        }
    </style>
</head>
<body>
    
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
            <button type="submit" name="registrasi">Registrasi</button>
        </li>
    </ul>
</form>

</body>
</html>