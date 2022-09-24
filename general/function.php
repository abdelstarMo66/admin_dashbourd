<?php 

function go($path){
    echo "<script> window.location.replace('/project/$path') </script>";
}

function testMessage($concation, $message)
{
    if ($concation) {
        echo " <div class='alert alert-success col-4 mx-auto'>
    $message Done Successfuly
    </div>";
    } else {
        echo " <div class='alert alert-danger col-4 mx-auto'>
        $message Falied Proccess
    </div>";
    }
}

function NotAuth(){
    if(empty($_SESSION['emailAdmin']) && empty($_SESSION['emailLawyer']) ){
        go("/screens/auth/login.php");
    }
}

function adminNotAuth(){
    if(empty($_SESSION['emailAdmin'])){
        go("/screens/auth/login.php");
    }
}

function lawyerNotAuth()
{
    if (empty($_SESSION['emailLawyer'])) {
        go("/screens/auth/login.php");
    }
}
?>