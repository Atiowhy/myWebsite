<?php 
include '../admin/connection.php';

// register
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    // validasi input
    if(!$name || !$email || !$password){
        echo 'please fill all the fields';
    }

    $queryInsert = mysqli_query($connection, "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')");
    // validasi data
    if($queryInsert){
        header('location: ../admin/login.php?success=register-success');
    } else {
        header('location: ../admin/register.php?failed=register-failed ');
    }

}

?>