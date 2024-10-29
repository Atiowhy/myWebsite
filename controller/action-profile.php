<?php
include '../admin/connection.php';

// get data by id
// if(isset($_GET['edit'])){
//     $id = $_GET['edit'];

//     $getDataId = mysqli_query($connection, "SELECT * FROM user WHERE id = '$id'");
//     $getDataUserId = mysqli_fetch_assoc($getDataId);
// }

// getAllData
$getAllData = mysqli_query($connection, "SELECT * FROM user");
$dataUser = mysqli_fetch_assoc($getAllData);

$id = isset($_GET['id']) ? $_GET['id'] : '';

// update data
// if(!$dataUser){
//     header('location: ../admin/profile.php?not-found');
// } else {
    $idEdit = isset($_GET['edit']) ? $_GET['edit'] : '';
    if(isset($_POST['save']) && isset($_GET['edit'])){
        $idedit = $_GET['edit'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $organization = $_POST['organization'];
        $address = $_POST['address'];
        $description = $_POST['description'];
        

        // logic update poto
        $targetDir = '../admin/upload/';
        $fileName = basename($_FILES['foto']['name']);
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

        $date = date("d");
        $sec = date("s");

        $newFileName = pathinfo($fileName, PATHINFO_FILENAME) . "-" . $date . "-" . $sec . "-" . str_pad($id, 5, '0', STR_PAD_LEFT) . "-" . $fileExt;
        $fileDestination = $targetDir . $newFileName;

        if(!empty($fileName)){
            if(pathinfo($fileDestination, PATHINFO_EXTENSION) === 'png' || pathinfo($fileDestination, PATHINFO_EXTENSION) === 'jpg' || pathinfo($fileDestination, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($fileDestination, PATHINFO_EXTENSION) === 'wibp' || pathinfo($fileDestination, PATHINFO_EXTENSION) === 'jfif'){
                // hapus file foto lama jika ada
                if(!empty($getDataUserId['foto']) && file_exists($targetDir . $getDataUserId['foto'])){
                    unlink($targetDir . $getDataUserId['foto']);
                }

                if(move_uploaded_file($_FILES['foto']['tmp_name'], $fileDestination)){
                    $updateProfile = mysqli_query($connection, "UPDATE user SET name = '$name', email = '$email', last_name = '$last_name', phone = '$phone', organization = '$organization', address = '$address', description = '$description', foto = '$newFileName' WHERE id = '$idedit'");
                   
                    header('location:  ../admin/profile.php?success-edit');
                } else {
                    header('location:  ../admin/profile.php?error-edit');
                }
            } else {
                header('location:   ../admin/profile.php?error-format');

            }
        } else {
            // tanpa foto
            $updateProfile = mysqli_query($connection, "UPDATE user SET name = '$name', email = '$email', last_name = '$last_name', phone = '$phone', organization = '$organization', address = '$address', description = '$description' WHERE id = '$idedit'");
            // echo $updateProfile;
        }
    }
// }
?>