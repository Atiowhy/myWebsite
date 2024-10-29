<?php 
include '../admin/connection.php';

// get User
$queryGetUser = mysqli_query($connection, "SELECT * FROM user ");
// $rowDataUser = mysqli_fetch_assoc($queryGetUser);

// querygetfotouser
$queryFoto = mysqli_query($connection, "SELECT * FROM user ORDER BY id DESC");
$rowFotoUser = mysqli_fetch_assoc($queryFoto);

// insert member
if(isset($_GET['member'])){
    $member = $_GET['member'];

    // ambil data dari user
    $getDataUser = mysqli_query($connection, "SELECT * FROM user WHERE id = '$member'");

    // periksa datanya
    if($getDataUser){
        while($row = mysqli_fetch_assoc($getDataUser)){
// ambil data dari setiap barisnya
$id = $row['id'];
$name = $row['name'];
$email = $row['email'];

// masukkan data ke table member
$insertMember = mysqli_query($connection, "INSERT INTO member (id_user, name, email) VALUES ('$id', '$name', '$email')");
header('location: ../admin/member.php?success=regis-member');
        }
    }
}

// get member
$queryGetMember = mysqli_query($connection, "SELECT * FROM member");

// delete member
if(isset($_GET['delete-member'])){
    $idMemberDelete = $_GET['delete-member'];

    $queryDeleteMember = mysqli_query($connection, "DELETE FROM member WHERE id = '$idMemberDelete'");
    header('location: ../admin/member.php?success-delete-member=member-deleted');
}

// delete user
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    // queryDelete
    $queryDelete = mysqli_query($connection, "DELETE FROM user WHERE id = '$id'");
    header('location: ../admin/user.php?success=delete-success');
}

// menghitung jumlah keseluruhan user
$countUser = mysqli_query($connection, "SELECT COUNT(*) AS total FROM user");

if($countUser){
    $dataCount = mysqli_fetch_assoc($countUser);
    $totalCount = $dataCount['total'];

// menghitung jumlah keseluruhan member
$countMember = mysqli_query($connection, "SELECT COUNT(*) AS total FROM member");

if($countMember)
    $dataCount = mysqli_fetch_assoc($countMember);
    $totalCountMember = $dataCount['total'];
}

// getid
$id = isset($_GET['id']) ? $_GET['id'] : '';


// insert user
if(isset($_POST['save'])){
    // print_r($_POST);
    // die;
    $name = $_POST['name'];
        $email = $_POST['email'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $organization = $_POST['organization'];
        $address = $_POST['address'];
        $description = $_POST['description'];

        if(mysqli_num_rows($queryGetUser)){
            if(!empty($_FILES['foto']['name'])){
                $nameFile = $_FILES['foto']['name'];
                $image_size = $_FILES['foto']['size'];

                // extention file
                $ext = array('png', 'jpg',  'jpeg', 'gif', 'jfif', 'webp');
                $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

                // validasi ext jika tidak ada
                if(!in_array($extImg, $ext)){
                    echo "<script>alert('File tidak valid')</script>";
                    die;
                } else {
                    $upload = '../admin/upload/';
                    move_uploaded_file($_FILES['foto']['tmp_name'], $upload . $nameFile);
                    
                    $insertUser = mysqli_query($connection, "INSERT INTO user (name, email, last_name, phone,  organization, address, description, foto) VALUES ('$name', '$email', '$last_name', '$phone', '$organization', '$address',  '$description', '$nameFile')");
                    header('location: ../admin/user.php');
                }

            } else {
                $insertUser = mysqli_query($connection, "INSERT INTO user (name, email, last_name, phone,  organization, address, description) VALUES ('$name', '$email', '$last_name', '$phone', '$organization', '$address',  '$description')");
                header('location:  ../admin/user.php');

            }
        } 
}

// get data edit
if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    $getDataId = mysqli_query($connection, "SELECT * FROM user WHERE id = '$id'");
    $getDataUserId = mysqli_fetch_assoc($getDataId);
}

if(isset($_POST['edit'])){
    // $id = $_GET['edit'];
    $name = $_POST['name'];
        $email = $_POST['email'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $organization = $_POST['organization'];
        $address = $_POST['address'];
        $description = $_POST['description'];

        if($_POST['password']){
            $password = sha1($_POST['password']);
        } else {
            $password = $getDataUserId['password'];
        }

        if(mysqli_num_rows($queryGetUser)){
            if(!empty($_FILES['foto']['name'])){
                $nameFile = $_FILES['foto']['name'];
                $image_size = $_FILES['foto']['size'];

                // extention file
                $ext = array('png', 'jpg',  'jpeg', 'gif', 'jfif', 'webp');
                $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

                // validasi ext jika tidak ada
                if(!in_array($extImg, $ext)){
                    echo "<script>alert('File tidak valid')</script>";
                    die;
                } else {
                    $upload = '../admin/upload/';
                    move_uploaded_file($_FILES['foto']['tmp_name'], $upload . $nameFile);
                    unlink($upload . $rowFotoUser['foto']);
                    
                    $insertUser = mysqli_query($connection, "UPDATE user SET name = '$name', email = '$email', last_name = '$last_name', phone = '$phone', organization = '$organization', address = '$address', description = '$description', foto = '$nameFile' WHERE id = '$id'");
                    header('location: ../admin/user.php');
                }

            } else {
                $insertUser = mysqli_query($connection, "UPDATE user SET name = '$name', email = '$email', last_name = '$last_name', phone = '$phone', organization = '$organization'. address = '$address', description = '$description'");
                header('location:  ../admin/user.php');

            }
        } 
}

?>