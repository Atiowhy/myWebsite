<?php 
include '../admin/connection.php';

// get User
$queryGetUser = mysqli_query($connection, "SELECT * FROM user");

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

// edit profile

?>