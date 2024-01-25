<?php
session_start();
    require "koneksi.php";

    // cek cookie
    if ( isset($_COOKIE["login"]) ) {
        $id = $_COOKIE['id'];
        $username = $_COOKIE['user'];

        $result = mysqli_query($kon, "SELECT username FROM tb_user WHERE id = $id ");
        $row = mysqli_fetch_assoc($result);

        if ( $username === hash('sha256', $row['username']) ) {
            $_SESSION['login'] = true;
        }

    }

    // cek session
    if ( isset($_SESSION["login"]) ) {
        header("location: index.php");
        exit;
    }




    if ( isset($_POST["login"]) ) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($kon, "SELECT * FROM tb_user WHERE username = '$username' ");
        
        // cek apakah username ada atau tidak
        if ( mysqli_num_rows($result) === 1 ) {

            // lalu kemudian cek password
            $row = mysqli_fetch_assoc($result);
            if ( password_verify($password, $row["password"]) ) {

                // set cookie (remember me)
                if ( isset($_POST["remember"]) ) {
                    setcookie('id', $row['id']);
                    setcookie('user', hash('sha256', $row['username']));
                }

                // set session
                $_SESSION["login"] = true;
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
        a {
            text-decoration: none;
            color: black;
        }
        p {
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>

<h1>Halaman Login</h1>
<?php if ( isset($error) ) { ?>
    <p>...</p>
<?php } ?>
    
<form action="" method="post">
    <ul>
        <li>
            <label for="username">Username: </label><br>
            <input type="text" name="username" id="username" autocomplete="off">
        </li>
        <li>
            <label for="password">Password: </label><br>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
        </li>
        <li>
            <button type="button" class="register"><a href="registrasi.php">register</a></button>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>
</form>

<script>
    let p = document.querySelector("p");
    p.textContent = "username / password anda salah"

    setTimeout(() => {
        p.textContent = "";
    }, 4000);

</script>

</body>
</html>