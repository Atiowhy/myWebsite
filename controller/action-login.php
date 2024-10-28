<?php
session_start();
include '../admin/connection.php';

// login
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    // query login
    $queryLogin = mysqli_query($connection, "SELECT * FROM user WHERE email = '$email'");

    // validasi jika datanya ada
    if(mysqli_num_rows($queryLogin) > 0){
        $dataUserLogin = mysqli_fetch_assoc($queryLogin);
        if($dataUserLogin['password'] == $password){
            $_SESSION['name'] = $dataUserLogin['name'];
            $_SESSION['email'] = $dataUserLogin['email'];
            $_SESSION['id'] = $dataUserLogin['id'];
            header('location: ../admin/index.php?success=login-success');
        } else {
            header('location: ../admin/login.php?failed-pass=password-doesnt-match');
        }
    } else {
        header('location: ../admin/login.php?failed-email=email-doesnt-match');
    }
}
?>