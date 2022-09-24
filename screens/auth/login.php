<?php
include "../../shared/header.php";
include "../../shared/nav.php";
include "../../general/env.php";
include "../../general/function.php";

if (isset($_POST['login'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loginQuery = "SELECT * FROM `admin` WHERE `email` = '$email' and `password` = '$password' ";
    $successLogin = mysqli_query($connection, $loginQuery);
    $numberOfRowsAdmin = mysqli_num_rows($successLogin);
    if (!empty($numberOfRowsAdmin)) {
        $_SESSION['emailAdmin'] = "$email";
        print_r($_SESSION);
        echo "true admin";
        go("/index.php");
    }
    else {
        $loginQuery = "SELECT * FROM `lawyers` WHERE `email` = '$email' and `password` = '$password' ";
        $successLogin = mysqli_query($connection, $loginQuery);
        $numberOfRowslawyers = mysqli_num_rows($successLogin);
        if (!empty($numberOfRowslawyers)) {
            $_SESSION['emailLawyer'] = "$email";
            print_r($_SESSION);
            echo "true lawyer";
        go("/index.php");
        }else {
            echo " <div class='alert alert-danger col-4 mx-auto'>
        Not Register
    </div>";
        }
    }
}
?>

<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="password" class="form-control" id="exampleInputEmail1" name="password">
    </div>
    <button type="submit" class="btn btn-light" name="login">Login</button>
</form>

<?php include "../../shared/footer.php" ?>