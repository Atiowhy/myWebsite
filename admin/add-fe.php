<?php 
session_start();
include '../controller/action-project.php';
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
                                        <form action="../controller/action-project.php" method="post"
                                            enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Name</label>
                                                        <input type="text" name="project_name" class="form-control"
                                                            required
                                                            value="<?php echo $dataProjectId['project_name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Technology</label>
                                                        <input type="text" name="technology" class="form-control"
                                                            required value="<?php echo $dataProjectId['technology'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Description</label>
                                                        <textarea name="description" id="" cols="30" rows="10"
                                                            class="form-control"><?php echo $dataProjectId['description'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Date Created</label>
                                                        <input type="date" name="create_date" class="form-control"
                                                            value="<?php echo $dataProjectId['create_date'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Date Finished</label>
                                                        <input type="date" name="finish_date" class="form-control"
                                                            value="<?php echo $dataProjectId['finish_date'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Image</label>
                                                        <input type="file" name="foto" id="" class="form-control">
                                                        <img src="../admin/upload/<?php echo $dataProjectId['foto']?>"
                                                            alt="" class="w-50 h-50 mt-4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-post">
                                                <button class="btn btn-success" type="submit"
                                                    name="<?php echo isset($_GET['edit']) ? $dataProjectId['id'] : '' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Add'?>
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