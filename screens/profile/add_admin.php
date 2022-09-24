<?php
include "../../shared/header.php";
include "../../shared/nav.php";
include "../../general/env.php";
include "../../general/function.php";

NotAuth();
if (isset($_POST['insert'])) 
{
$name = $_POST['name'];
$age = $_POST['age'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($_FILES['image']['name'])) {
$addData = "INSERT INTO `admin` VALUES (null,'$name',$age,'$address','$phone','$email','$password','https://img.freepik.com/free-photo/bohemian-man-with-his-arms-crossed_1368-3542.jpg?w=740&t=st=1663930257~exp=1663930857~hmac=6b1d1687294be824b86d0eab91b872a3389d053bad8af5cf0b5d24e8f4e7cbe1',1)";
}
else {
    $img_name = time() . $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];
    $location = "./upload/$img_name";
    move_uploaded_file($img_temp, $location);
    $addData = "INSERT INTO `admin` VALUES (null,'$name',$age,'$address','$phone','$email','$password','/project/screens/employee/upload/$img_name',1)";
};

$successInsert = mysqli_query($connection, $addData);
testMessage($successInsert,"Inserted");
go("/screens/profile/list_admin.php");
}

?>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Age</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="age">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="address">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="phone">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="password">
</div>

<div class="form-group">
        <label for="exampleInputPassword1">Image</label>
        <input type="file" name="image">
</div>
    <button type="submit" class="btn btn-primary" name="insert">Submit</button>
</form>

<?php include "../../shared/footer.php" ?>