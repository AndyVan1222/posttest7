<?php
    require "connection.php";

    if(isset($_POST["regist"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

        if($password === $cpassword)
        {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $result = mysqli_query($conn, "SELECT username FROM account WHERE username = '$username'");

            if(mysqli_fetch_assoc($result))
            {
                echo 
                "<script>
                    alert('username telah digunakan!');
                    document.location.href = 'register.php';
                </script>";
            }
            else
            {
                $sql = "INSERT INTO account VALUES('', '$username', '$password')";
                $result = mysqli_query($conn, $sql);

                if(mysqli_affected_rows($conn) > 0)
                {
                    echo 
                    "<script>
                        alert('Registrasi berhasil');
                        document.location.href='login.php';
                    </script>";
                }

                else
                {
                    echo
                    "<script>
                        alert('Registrasi Gagal!');
                        document.location.href = 'register.php';
                    </script>";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/bf9497bfb3.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalArt</title>

    <style>
        body
        {
            background-image: url("image/bck.jpg");
        }


        .judul
        {
            font-size: 40px;
        }

        h3
        {
            font-family: monospace;
            font-size: 50px;
            color: crimson;
            text-align: center;
        }

        a
        {
            color: crimson;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <h3>DigitalArt</h3>
    <div class="login-box">
        <form action="" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="username" required>
            <p>password</p>
            <input type="password" name="password" placeholder="password" required>
            <p>Confirm Password</p>
            <input type="password" name="cpassword" placeholder="confirm password" required> <br> <br>
            <button name="regist" class="login-btn">Sign Up</button>
           
        </form>
    </div>
    
</body>
</html>