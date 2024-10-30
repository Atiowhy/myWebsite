<?php 
session_start();
include '../admin/connection.php';

// get project
$queryGetProject = mysqli_query($connection, "SELECT * FROM project_fe ORDER BY id DESC");
// $resultProject = mysqli_fetch_assoc($queryGetProject);

// getFoto
$queryGetPotoProjek = mysqli_query($connection, "SELECT * FROM project_fe");
$resultFoto = mysqli_fetch_assoc($queryGetPotoProjek);

// insert project
if(isset($_POST['add'])){
    // print_r($_POST);
    // die;
    $project_name = $_POST['project_name'];
    $technology = $_POST['technology'];
    $description = $_POST['description'];
    $create_date = $_POST['create_date'];
    $finish_date = $_POST['finish_date'];

    
        if(!empty($_FILES['foto']['name'])){
            $nameFile = $_FILES['foto']['name'];
            $image_size = $_FILES['foto']['size'];

            // extention file
            $ext = array('png', 'jpg', 'jpeg', 'jfif', 'webp');
            $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

            // falidasi ext
            if(!in_array($extImg, $ext)){
                echo "Invalid file type";
                die;
            } else {
                $upload = '../admin/upload/';
                move_uploaded_file($_FILES['foto']['tmp_name'], $upload . $nameFile);

                $insertDataProject = mysqli_query($connection, "INSERT INTO project_fe (project_name, technology, description, create_date, finish_date, foto) VALUES ('$project_name', '$technology', '$description', '$create_date', '$finish_date', '$nameFile')");
                // print_r($insertDataProject);
                // die;
                header('location: fe-project.php?success-insert-with-photo');
            }
        } else {
            $insertDataProject = mysqli_query($connection, "INSERT INTO project_fe (project_name, technology, description, create_date, finish_date) VALUES ('$project_name', '$technology', '$description', '$create_date', '$finish_date')");
                header('location: fe-project.php?success-insert-without-photo');
        }
    
}

// getdataid
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryGetDataId = mysqli_query($connection, "SELECT * FROM project_fe WHERE id = '$id'");
$resultGetDataId = mysqli_fetch_assoc($queryGetDataId);

// editData
if(isset($_POST['edit'])){
    $project_name = $_POST['project_name'];
    $technology = $_POST['technology'];
    $description = $_POST['description'];
    $create_date = $_POST['create_date'];
    $finish_date = $_POST['finish_date'];

    if(!empty($_FILES['foto']['name'])){
            $nameFile = $_FILES['foto']['name'];
            $image_size = $_FILES['foto']['size'];

            // extention file
            $ext = array('png', 'jpg', 'jpeg', 'jfif', 'webp');
            $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

            // falidasi ext
            if(!in_array($extImg, $ext)){
                echo "Invalid file type";
                die;
            } else {
                $upload = '../admin/upload/';
                move_uploaded_file($_FILES['foto']['tmp_name'], $upload . $nameFile);
                unlink($upload . $resultFoto['foto']);
                $insertDataProject = mysqli_query($connection, "UPDATE project_fe SET project_name = '$project_name', technology = '$technology', description = '$description', create_date = '$create_date', finish_date = '$finish_date', foto = '$nameFile' WHERE id = '$id'");
                // print_r($insertDataProject);
                // die;
                header('location: fe-project.php?success-update-with-photo');
            }
        } else {
            $insertDataProject = mysqli_query($connection, "UPDATE project_fe SET project_name = '$project_name', technology = '$technology', description = '$description', create_date = '$create_date', finish_date = '$finish_date' WHERE id = '$id'");
                header('location: fe-project.php?success-update-without-photo');
        }
}
 ?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <?php include 'inc/head-dashboard.php' ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include 'inc/sideBar.php' ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include 'inc/navbar.php' ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <!-- table user -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h1><?php echo isset($_GET['edit']) ? 'Edit' : 'Add' ?> Project</h1>
                                        <p>Frontend Developer</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Name</label>
                                                        <input type="text" name="project_name" class="form-control"
                                                            required
                                                            value="<?php echo isset($_GET['edit']) ? $resultGetDataId['project_name'] : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Technology</label>
                                                        <input type="text" name="technology" class="form-control"
                                                            required
                                                            value="<?php echo isset($_GET['edit']) ? $resultGetDataId['technology'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Description</label>
                                                        <textarea name="description" id="" cols="30" rows="10"
                                                            class="form-control"><?php echo isset($_GET['edit']) ? $resultGetDataId['description'] : '' ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Date Created</label>
                                                        <input type="date" name="create_date" class="form-control"
                                                            value="<?php echo isset($_GET['edit']) ? $resultGetDataId['create_date'] : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Date Finished</label>
                                                        <input type="date" name="finish_date" class="form-control"
                                                            value="<?php echo isset($_GET['edit']) ? $resultGetDataId['finish_date'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Image</label>
                                                        <input type="file" name="foto" id="" class="form-control">
                                                        <img src="../admin/upload/<?php echo isset($_GET['edit']) ? $resultGetDataId['foto'] : '' ?>"
                                                            alt="" class="w-50 h-50 mt-4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-post">
                                                <button class="btn btn-success" type="submit"
                                                    name="<?php echo isset($_GET['edit']) ? 'edit' : 'add' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Add'?>
                                                    Project</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <?php include 'inc/footer.php' ?>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php include 'inc/js-dashboard.php' ?>
</body>

</html>