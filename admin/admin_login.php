<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title> Admin Login</title>
</head>
<body>
    <?php
    session_start();
    require_once("../config/config.php");
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password =$_POST['password'];
        $sql = "SELECT * FROM admin_login WHERE email = '$email' AND password = '$password'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query) > 0){
            echo "<script>
                window.location.href='admin_panel.php';
            </script>";
        }
        else{
           $error[] = "Email or password is incorrect!!";
        }
    }
    ?>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="POST">
                    <h2> Admin Login</h2>
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
                    <?php
                    if(isset($error)){
                        foreach($error as $key => $loi){
                            echo "<p style='color:red;margin: 10px;padding:0 35px;>$loi</p>";
                        }
                    }
                    ?>
                      <div class="btn">
                        <button type ="submit" name="login">Log in</button>
                    </div>
                        <div class="register">
                        <p><a href="../index.php">Get to customer's site </a></p>
                    </div>
                </form>
                
                
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>