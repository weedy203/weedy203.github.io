<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Panel</title>
</head>
<body>
    <nav>
        <div class="title">
            <h1>Admin Panel</h1>
        </div>
        <div class="logout">
            <button type='submit'><a href="admin_login.php">Log out</a></button>
        </div> 
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class='table text-center table-dark'>
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Address</th>
                            <th scope="col">Pay mode</th>
                            <th scope="col">Orders</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require("../config/config.php");
                        $query = mysqli_query($conn,"SELECT * FROM order_manage");
                        while($user_fetch = mysqli_fetch_assoc($query)):
                        ?>
                        <tr>
                            <td ><?= $user_fetch['order_id'] ?></td>
                            <td><?= $user_fetch['full_name'] ?></td>
                            <td ><?= $user_fetch['tel'] ?></td>
                            <td ><?= $user_fetch['address'] ?></td>
                            <td ><?= $user_fetch['pay_mode'] ?></td>
                            <td >
                                <table class='table text-center table-dark'>
                                    <thead>
                                    <tr>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                    </tr>
                                </thead>
                               
                                    <tbody>
                                        <?php 
                                            $query1 = mysqli_query($conn,"SELECT * FROM user_order WHERE order_id = '$user_fetch[order_id]'");
                                            while($order_result = mysqli_fetch_assoc($query1)):
                                        ?>
                                        <tr>
                                            <td> <?= $order_result['item_name']?></td>
                                            <td> <?= $order_result['price']?></td>
                                            <td> <?= $order_result['quantity']?></td>
                                        </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>