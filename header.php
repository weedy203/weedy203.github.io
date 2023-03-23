<?php
session_start();
if(isset($_POST['logout'])){
    header("Location:index.php");
    unset($_SESSION['login']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light" style="background:#D5C7D9;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Log in</a>
                        </li>
                </ul>
                    <div>
                    <?php 
                    $count = 0;
                    if(isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                    }
                    ?>
                        <a href="cart.php" class="btn btn-outline-success"><ion-icon name="cart-outline"></ion-icon> Cart (<?= $count ?>)</a>
                    </div> 
                    <?php 
                    if(isset($_SESSION['login'])):
                    ?>
                    <div style='margin-left:10px'>
                        <form action="" method="post">
                            <button type='submit' name='logout' class='btn btn-success'> Log out</button>
                        </form>
                    </div>
                    <?php endif ?>
            </div>
        </div>
    </nav>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>