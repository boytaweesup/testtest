<?php
session_start();

$addproduct = "";
$addorder = "";

if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    // echo "Loginsuccess<br>";
    // echo $_SESSION['username'];
    $addproduct = "#exampleModal";
    $addorder = "#orderModal";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="LoginRegister.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <header>
        <h2 class="logo">Logo</h2>
        <nav class="navigation">
            <a href="">Home</a>
            <a href="" data-bs-toggle="modal" data-bs-target="<?= $addproduct ?>">ADD Product</a>
            <a href="" data-bs-toggle="modal" data-bs-target="<?= $addorder ?>">Order</a>
            <a href="">Contact</a>
            <?php

            if (isset($_SESSION['username']) && isset($_SESSION['email'])) { ?>
                <button class="btnLogin-popup" onclick="logout(event)">Logout <ion-icon name="log-out-outline"></ion-icon> </button>
            <?php } else { ?>
                <button class="btnLogin-popup" id="btnLogin-popup" onclick="btnLogin_popup(event)"><ion-icon name="log-in-outline"></ion-icon> Login</button>
            <?php } ?>


        </nav>
    </header>

    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close"></ion-icon></span>
        <div class="form-box login">
            <h2>Login</h2>
            <form id="login-form" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" id="" required>
                    <label for="">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" id="" required>
                    <label for="">Password</label>
                </div>
                <div class="remember-forgot">
                    <label for=""><input type="checkbox" name="" id=""> Remember me</label>
                    <a href="">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p> Don't have an account? <a href="#" class="register-link"> Register</a></p>
                </div>
            </form>
        </div>
        <div class="form-box register">
            <h2>Registration</h2>
            <form action="" id="add-member-form">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="username" id="" required>
                    <label for="">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" id="" required>
                    <label for="">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" id="" required>
                    <label for="">Password</label>
                </div>
                <div class="remember-forgot">
                    <label for=""><input type="checkbox" name="" id=""> I agree to the terms & conditions</label>

                </div>
                <button type="submit" class="btn" value="Add Member" id="add-member-btn">Register</button>
                <div class="login-register">
                    <p> Already have an account? <a href="#" class="login-link"> Login </a></p>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="add-product-form">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" name="Product_Name" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Price:</label>
                            <input type="text" name="Product_Price" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Color:</label>
                            <input type="text" name="Product_color" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Amount:</label>
                            <input type="text" name="Product_Amount" class="form-control" id="recipient-name">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add product</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="add-order-form">

                        <select class="form-select" name="Order_Product" aria-label="Default select example" id="select_order">
                            <option selected>Open this select order</option>

                        </select>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Color:</label>
                            <input type="text" name="Order_color" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Amount:</label>
                            <input type="text" name="Order_Amount" class="form-control" id="recipient-name">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Order</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>

    <script src="loginregister.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
