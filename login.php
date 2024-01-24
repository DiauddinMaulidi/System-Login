<?php
    require "koneksi.php";

    if ( isset($_POST["login"]) ) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($kon, "SELECT * FROM tb_user WHERE username = '$username' ");
        
        // cek apakah username ada atau tidak
        if ( mysqli_num_rows($result) === 1 ) {

            // lalu kemudian cek password
            $row = mysqli_fetch_assoc($result);
            if ( password_verify($password, $row["password"]) ) {
                header("location: index.php");
                exit;
            }
        }

        // jika error atau gagal
        $error = true;

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        li {
            margin: 10px 0;
        }
        label {
            display: block;
        }
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<h1>Halaman Login</h1>
<?php if ( isset($error) ) { ?>
    <p style="color: red; font-style: italic;">username / password anda salah</p>
<?php } ?>
    
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
            <button type="button" class="register"><a href="registrasi.php">register</a></button>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>
</form>

</body>
</html>