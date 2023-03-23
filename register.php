<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php
require_once('config/config.php');

if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        echo "<script>
        alert('Account already exists');
     </script>";
    } else {
        mysqli_query($conn, "INSERT INTO `user_info`(`id`, `name`, `email`, `password`) VALUES ('NULL','$name','$email','$password')") or die('query failed');
        echo "<script>
                alert('Sign up successfully');
                window.location.href = 'login.php';
            </script>";
    }
}
?>
<section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="POST">
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="person-circle-outline"></ion-icon>
                        <input type="text" name="username" id="" required>
                        <label for="">Full name</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" id="" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="" required>
                        <label for="">Password</label>
                    </div>
                        <button type ="submit" name="signup">Sign up</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>