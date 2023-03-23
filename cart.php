<?php
session_start();
if(isset($_POST['remove'])){
    foreach($_SESSION['cart'] as $key => $item){
        if($item['name'] == $_POST['name']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
        
    }
}
if(isset($_POST['removeall'])){
    if(isset($_SESSION['cart'])){
        unset($_SESSION['cart']);
    }
}
if(isset($_POST['Mod_Quantity'])){
    foreach($_SESSION['cart'] as $key => $item){
        if($item['name'] == $_POST['name']){
            $_SESSION['cart'][$key]['quantity'] = $_POST['Mod_Quantity'];
        }
        
    }
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
            </div>
        </div>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1 style="color: #a046be" >MY CART</h1>
        </div>
        <div class="col-lg-9">
            <table class = "table">
                <thead class="text-center">
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </thead>
                <tbody class="text-center">
                    <?php
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $key => $item){ 
                            echo "  <tr>
                                        <td><img src='./assets/images/$item[image]' style='height:100px'></td>
                                        <td>$item[name]</td>
                                        <td>$$item[price]<input type='hidden' class='iprice' value='$item[price]'></td>
                                        <td>
                                            <form action ='cart.php' method='POST'>
                                                <input type='number' class='text-center iquantity' onchange='this.form.submit()' name='Mod_Quantity'  value='$item[quantity]' min='1' max='10'>
                                                <input type='hidden' name='name' value='$item[name]'>
                                            </form>
                                        </td>
                                        <td class = 'itotal'></td>
                                        <td><form action ='cart.php' method='POST'>
                                                <button type='submit' name='remove' class='btn btn-sm btn-outline-danger' >REMOVE</button>
                                                <input type='hidden' name='name' value='$item[name]'>
                                            </form></td>
                                    </tr>";
                        }
                }?>
                </tbody>
                <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style='width:50px'>
                        <form method='POST'>   
                            <input type='submit' class='btn btn-sm btn-danger' value='REMOVE ALL' name='removeall'>
                        </form>
                    </td>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-3">
            <div class='border bg-light rounded p-4'>
                <h3>Grand Total: </h3>
                <h5 class="text-right" id="gtotal"></h5>
                <br>
                <?php
                    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0):
                ?>
                <form action="purchase.php" method="POST">
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="tel" name='tel' class='form-control' required>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name='address' class='form-control' required>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="COD" name = 'paymode' checked>
                        <label class="form-check-label" for="flexCheckChecked">
                           Cash on delivery
                        </label>
                    </div>
                    <input class="btn btn-primary btn-lg" type='submit' name="purchase" value='Purchase'></input>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    var gt = 0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');

    function subTotal(){
        gt = 0;
        for(i = 0;i<iprice.length;i++){

            itotal[i].innerHTML ='$'+(iprice[i].value)*(iquantity[i].value);
            gt += (iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerHTML = '$'+gt;
    }
    subTotal();

</script>
</body>
</html>