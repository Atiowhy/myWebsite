<!-- change user -->
<?php
include '../admin/connection.php';

// get data
$queryGetAll = mysqli_query($connection, "SELECT * FROM user ORDER BY id DESC");
$rowDataAll = mysqli_fetch_assoc($queryGetAll);
// print_r($rowDataAll);
// die;

// menemukan data
$data = mysqli_num_rows($queryGetAll);

if(!$data){
    if(isset($_POST['save'])){
         $name   = $_POST['name'];
    $email   = $_POST['email'];
    $last_name  = $_POST['last_name'];
    $phone  = $_POST['phone'];
    $organization  = $_POST['organization'];
    $address  = $_POST['address'];
    $description  = $_POST['description'];

      if (empty($_FILES['image']['name'])) {
            $nameFile = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];

            // extention file
            $ext = array('png', 'jpg', 'jpeg', 'jfif', 'WebP');
            $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

            // jika ext tidak ada yg terdaftar
            if (!in_array($extImg, $ext)) {
                echo 'ext tidak ditemukan';
                die;
            } else {
                $upload = "../admin/upload/";
                // pindahkan gambar dari tmp folder ke folder yg kita buat
                move_uploaded_file($_FILES['image']['tmp_name'], $upload . $nameFile);
                // unlink() => fungsinya untuk mendelete file
                unlink($upload . $rowDataAll['image']);

                $insertData = mysqli_query($connection, "INSERT INTO user (name, email, image, last_name, phone, organization, address, description) VALUES ('$name', '$email', '$nameFile', '$last_name', '$phone', '$organization', '$address', '$description')");
                print_r($insertData);
                die;
            }
        } else {
            $insertData = mysqli_query($connection, "INSERT INTO user (name, email, last_name, phone, organization, address, description) VALUES ('$name', '$email', '$last_name', '$phone', '$organization', '$address', '$description')");
        }
    }
} else {
    echo 'data harus di update';
    die;
}

// $id = isset($_GET['id']) ? $_GET['id'] : '';
// $idedit = isset($_GET['edit']) ? $_GET['edit'] : '';

// if (isset($_POST['save'])) {
    
//     $name   = $_POST['name'];
//     $email   = $_POST['email'];
//     // $image  = $_POST['image'];
//     $last_name  = $_POST['last_name'];
//     $phone  = $_POST['phone'];
//     $organization  = $_POST['organization'];
//     $address  = $_POST['address'];
//     $description  = $_POST['description'];
   

//     // mencari data di dalam table pengaturan, jika ada datanya di update, jika kosong di insert
//     if (mysqli_num_rows($queryGetAll)) {
//         if (isset($_FILES['foto']['name'])) {
            
//             $nameFile = $_FILES['foto']['name'];
//             $image_size = $_FILES['foto']['size'];
            

//             // extention file
//             $ext = array('png', 'jpg', 'jpeg', 'jfif', 'WebP');
//             $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

//             // jika ext tidak ada yg terdaftar
            
//                 $upload = "../admin/upload/";
//                 // pindahkan gambar dari tmp folder ke folder yg kita buat
//                 move_uploaded_file($_FILES['foto']['tmp_name'], $upload . $nameFile);
//                 // unlink() => fungsinya untuk mendelete file
//                 unlink($upload . $queryGetAll['foto']);

//                 $queryUpdateuser = mysqli_query($connection, "UPDATE user SET name = '$name', email = '$email',  image = '$nameFile', last_name = '$last_name', phone = '$phone', organization = '$organization', address = '$address', description = '$description' WHERE id = '$id' ");
            
//         }
//     } else {
//         // $_FILES => ngambil nilai dari input type file
//         if (!empty($_FILES['foto']['name'])) {
//             $nameFile = $_FILES['foto']['name'];
//             $image_size = $_FILES['foto']['size'];

//             // extention file
//             $ext = array('png', 'jpg', 'jpeg', 'jfif', 'WebP');
//             $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

//             // jika ext tidak ada yg terdaftar
//             if (!in_array($extImg, $ext)) {
//                 echo 'ext tidak ditemukan';
//                 die;
//             } else {
//                 $upload = "../admin/upload/";
//                 // pindahkan gambar dari tmp folder ke folder yg kita buat
//                 move_uploaded_file($_FILES['foto']['tmp_name'], $upload . $nameFile);

//                 $queryAddUser = mysqli_query($connection, "INSERT INTO user (name, email, image, last_name, phone, organization, address, description) VALUES ('$name', '$email', '$nameFile', '$last_name', '$phone', '$organization', '$address', '$description', )");
//             }
//         } else {
//             $queryAddUser = mysqli_query($connection, "INSERT INTO user (name, email, last_name, phone, organization, address, description) VALUES ('$name', '$email', '$last_name', '$phone', '$organization', '$address', '$description', )");
//         }
//     }
//     header('location: ../admin/profile.php?success-add=add-user-success');
// }

//get edit profile
// $queryGetEdit = mysqli_query($connection, "SELECT  * FROM user WHERE id = '$idedit' ");
// $rowDetailEdit = mysqli_fetch_assoc($queryGetEdit);

 ?>