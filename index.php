<?php
include("header.php");
    if(isset($_POST['addtocart'])){
        if(isset($_SESSION['login'])){
            if(isset($_SESSION['cart'])){
                $myitem =array_column($_SESSION['cart'],'name');
                if(in_array($_POST['name'],$myitem)){
                    echo "<script>alert('Item Already Added')</script>";
                }
                else{
                    $count = count($_SESSION['cart']);

                    $_SESSION['cart'][$count] = array(
                        'image' => $_POST['image'],
                        'name' => $_POST['name'],
                        'price' => $_POST['price'],
                        'quantity' => 1
                    ); 
                    echo "<script>
                            window.location.href='index.php';</script>";
                }
            }
            else{
                $session_cart = array(
                    'image' => $_POST['image'],
                    'name' => $_POST['name'],
                    'price' => $_POST['price'],
                    'quantity' => 1
                );
                $_SESSION['cart'][0] = $session_cart;
                echo "<script>
                        window.location.href = 'index.php';</script>";
            }
        }
        else{
            echo "<script>
            alert('You have to login to add item to your cart');
            window.location.href='login.php';
        </script>";
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
</head>
<body>
    <h2><i>Online Shopping Day</i></h2>
    <a href="#"><img src="./assets/images/banner.png" alt="" ></a>
    <h2><i>Special Promotion</i></h2>
    <a href="#"><img src="./assets/images/banner2.png" alt="" ></a>
    <h2><i><ion-icon name="logo-apple"></ion-icon> iPhone</i></h2> 
    <div class="container ">
        <div class="row ">
            <?php
            require("config/config.php");
            $sql = "SELECT * FROM products WHERE details = 'iphone' LIMIT 4";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)){
            ?>
        
                <div class="col-lg-3 mx-0 my-3" >
                <form  method="POST" action="index.php" >
                    <div class="card" style="width: 19.5rem;height:390px">
                    <img src="./assets/images/<?= $row['image'] ?>" style="width:200px;height:200px" class="card-img-top h-100" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name'] ?></h5>
                        <p class="card-text">$<?= $row['price'] ?></p>
                        <input type="hidden" name="image" value="<?= $row['image'] ?>" id="">
                        <input type="hidden" name="name" value="<?= $row['name'] ?>" id="">
                        <input type="hidden" name="price" value="<?= $row['price'] ?>" id="">
                        <button type="submit" class="btn btn-info" name="addtocart" value="<?= $row['id'] ?>">Add to cart</button>
                    </div>
                    </div>
                </form>
                </div>
            <?php }?>
        </div>
    </div>
    <h2><i> Samsung</i></h2> 
    <div class="container ">
        <div class="row ">
            <?php
            require("config/config.php");
            $sql = "SELECT * FROM products WHERE details = 'samsung' LIMIT 4";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)){
            ?>
        
                <div class="col-lg-3 mx-0 my-3" >
                <form method="POST" action="index.php">
                    <div class="card" style="width: 19.5rem;height:390px">
                    <img src="./assets/images/<?= $row['image'] ?>" style="width:200px;height:200px" class="card-img-top h-100" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name'] ?></h5>
                        <p class="card-text">$<?= number_format($row['price'])?></p>
                        <input type="hidden" name="image" value="<?= $row['image'] ?>" id="">
                        <input type="hidden" name="name" value="<?= $row['name'] ?>" id="">
                        <input type="hidden" name="price" value="<?= $row['price'] ?>" id="">
                        <button type="submit" class="btn btn-info" name="addtocart" value="<?= $row['id'] ?>">Add to cart</button>
                    </div>
                    </div>
                </form>
                </div>
            <?php }?>
        </div>
    </div>
    <h2><i><ion-icon name="laptop-outline"></ion-icon> Macbook</i></h2> 
    <div class="container ">
        <div class="row ">
            <?php
            require("config/config.php");
            $sql = "SELECT * FROM products WHERE details = 'macbook' LIMIT 4";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)){
            ?>
        
                <div class="col-lg-3 mx-0 my-3" >
                <form  method="POST" action="index.php">
                    <div class="card" style="width: 19.5rem;height:390px">
                    <img src="./assets/images/<?= $row['image'] ?>" style="width:200px;height:200px" class="card-img-top h-100" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name'] ?></h5>
                        <p class="card-text">$<?= $row['price'] ?></p>
                        <input type="hidden" name="image" value="<?= $row['image'] ?>" id="">
                        <input type="hidden" name="name" value="<?= $row['name'] ?>" id="">
                        <input type="hidden" name="price" value="<?= $row['price'] ?>" id="">
                        <button type="submit" class="btn btn-info" name="addtocart" value="<?= $row['id'] ?>">Add to cart</button>
                    </div>
                    </div>
                </form>
                </div>
            <?php }?>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>