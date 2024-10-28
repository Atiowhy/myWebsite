<?php
include '../admin/connection.php';


// insert data
if(isset($_POST['submit'])){
   
    $project_name = $_POST['project_name'];
    $technology = $_POST['technology'];
    $description = $_POST['description'];
    $create_date = $_POST['create_date'];
    $finish_date = $_POST['finish_date'];

    $insertProject = mysqli_query($connection, "INSERT INTO project_fe (project_name, technology, description, create_date, finish_date) VALUES ('$project_name', '$technology', '$description', '$create_date', '$finish_date')");
    // print_r($insertProject);
    // die;

    if($insertProject){
        header('location: ../admin/fe-project.php?sucess-add=add-project-success');
    } else {
        header('location: ../admin/add-fe.php?failed-add=failed-add-project');
    }
}

// getDataProject
$queryGetProject = mysqli_query($connection, "SELECT * FROM project_fe");

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