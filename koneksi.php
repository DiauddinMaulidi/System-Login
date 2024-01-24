<?php
    $kon = mysqli_connect("localhost", "root", "", "mahasiswa");

    function registrasi($data) {
        global $kon;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($kon, $data["password"]);
        $password2 = mysqli_real_escape_string($kon, $data["password2"]);

        // cek apakah username sudah ada atau belum (username tidak boleh sama);
        $result = mysqli_query($kon, "SELECT username FROM tb_user WHERE username = '$username' ");
        if ( mysqli_fetch_assoc($result) ) {
            echo "<script>
                alert('username sudah ada!!!');
            </script>";
            return false;
        }

        // cek apakah password sama dengan konfirmasi password
        if ( $password !== $password2 ) {
            echo "<script>
                alert('password anda berbeda!!!');
            </script>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($kon, "INSERT INTO tb_user VALUES ('', '$username', '$password') ");
        return mysqli_affected_rows($kon);

    }

?>