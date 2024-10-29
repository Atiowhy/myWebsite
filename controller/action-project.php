<?php
include '../admin/connection.php';

// get all data
// getDataProject
$queryGetProject = mysqli_query($connection, "SELECT * FROM project_fe");
// $rowDataProject = mysqli_fetch_assoc($queryGetProject);

$id = isset($_GET['id']) ? $_GET['id'] : '';

// getDataById
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    
    $queryGetId = mysqli_query($connection, "SELECT * FROM project_fe WHERE id = '$id'");
    $dataProjectId = mysqli_fetch_assoc($queryGetId);
}

// insert data
if(isset($_POST['add'])){
//    print_r($_POST);
//    die;
    $project_name = $_POST['project_name'];
    $technology = $_POST['technology'];
    $description = $_POST['description'];
    $create_date = $_POST['create_date'];
    $finish_date = $_POST['finish_date'];

    // mencari data di dalam table
   
        if(!empty($_FILES['foto']['name'])){
            $nameFile = $_FILES['foto']['name'];
            $image_size = $_FILES['foto']['size'];

            // ext file
            $ext = array('png', 'jpg', 'jpeg', 'jfif', 'webp');
            $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

            // jika tidak ada yg terdaftar
            if(!in_array($extImg, $ext)){
                echo 'ext tidak ditemukan';
                die;
            } else {
                $upload = '../admin/upload/';
                move_uploaded_file($_FILES['foto']['tmp_name'], $upload . $nameFile);

                // insert dengan foto
                $insertProject = mysqli_query($connection, "INSERT INTO project_fe (project_name, technology, description, create_date, finish_date, foto) VALUES ('$project_name', '$technology', '$description', '$create_date', '$finish_date', '$nameFile')");
                header('location: ../admin/fe-project.php');
            }
        } else {
            $insertProject = mysqli_query($connection, "INSERT INTO project_fe (project_name, technology, description, create_date, finish_date) VALUES ('$project_name', '$technology', '$description', '$create_date', '$finish_date')");
            header('location: ../admin/fe-project.php');
        }
}

// update data
if(isset($_GET['edit'])){
    $idEdit = $_GET['edit'];
    $project_name = $_POST['project_name'];
    $technology = $_POST['technology'];
    $description = $_POST['description'];
    $create_date = $_POST['create_date'];
    $finish_date = $_POST['finish_date'];

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
                    
                    $insertUser = mysqli_query($connection, "UPDATE project_fe SET project_name = '$project_name', technology = '$technology', description = '$description', create_date = '$create_date', finish_date = '$finish_date', foto = '$nameFile' WHERE id = '$idEdit'");
                    header('location: ../admin/project-fe.php');
                }

            } else {
                $insertUser = mysqli_query($connection, "UPDATE project_fe SET project_name = '$project_name', technology = '$technology', description = '$description', create_date = '$create_date', finish_date = '$finish_date', foto = '$nameFile' WHERE id = '$idEdit'");
                header('location:  ../admin/project-fe.php');

            }
        } 
}


// get data jumlah project
$queryGetCountProject = mysqli_query($connection, "SELECT COUNT(*) AS total FROM project_fe");
$dataCountProject = mysqli_fetch_assoc($queryGetCountProject);


// delete data project
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $deleteDataProject = mysqli_query($connection, "DELETE FROM project_fe WHERE id = '$id'");
    header('location: ../admin/fe-project.php?success-delete');
}
?>