<?php 
session_start();
include '../admin/connection.php';

// get project
$queryGetEducation = mysqli_query($connection, "SELECT * FROM education ORDER BY id DESC");
// $resultProject = mysqli_fetch_assoc($queryGetProject);


// insert project
if(isset($_POST['add'])){
    // print_r($_POST);
    // die;
    $education = $_POST['education'];
    $description = $_POST['description'];
    $title = $_POST['title'];
    $endroll_education = $_POST['endroll_education'];
    $end_year_education = $_POST['end_year_education'];

    $insertDataEducation = mysqli_query($connection, "INSERT INTO education (education,  description, title, endroll_education, end_year_education) VALUES ('$education', '$description', '$title' '$endroll_education', '$end_year_education')");
    header('location: education.php?insert-edu-success');
    
}

// getdataid
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryGetDataId = mysqli_query($connection, "SELECT * FROM education WHERE id = '$id'");
$resultGetDataId = mysqli_fetch_assoc($queryGetDataId);

// editData
if(isset($_POST['edit'])){
    $education = $_POST['education'];
    $description = $_POST['description'];
    $title = $_POST['title'];
    $endroll_education = $_POST['endroll_education'];
    $end_year_education = $_POST['end_year_education'];

    $insertDataProject = mysqli_query($connection, "UPDATE education SET education = '$education', description = '$description', title = '$title', endroll_education = '$endroll_education', end_year_education = '$end_year_education' WHERE id = '$id'");
    header('location: education.php?success-update-edu');
}

// delete data
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $deleteEdu = mysqli_query($connection, "DELETE FROM  education WHERE id = '$id'");
    header('location:  education.php?delete-edu-success');
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
                                        <h1><?php echo isset($_GET['edit']) ? 'Edit' : 'Add' ?> Education</h1>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Education</label>
                                                        <input type="text" name="education" class="form-control"
                                                            required
                                                            value="<?php echo isset($_GET['edit']) ? $resultGetDataId['education'] : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Title</label>
                                                        <input type="text" name="title" placeholder="insert your title"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Endroll Education</label>
                                                        <input type="date" class="form-control" name="endroll_education"
                                                            value="<?php echo isset($_GET['edit']) ? $resultGetDataId['endroll_education'] : '' ?>">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">End Of Year
                                                            Education</label>
                                                        <input type="date" class="form-control"
                                                            name="end_year_education"
                                                            value="<?php echo isset($_GET['edit']) ? $resultGetDataId['end_year_education'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Description</label>
                                                    <textarea name="description" id="" class="form-control">
                                                            <?php echo isset($_GET['edit']) ? $resultGetDataId['description'] : ''?>
                                                        </textarea>
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