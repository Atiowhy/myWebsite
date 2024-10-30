<?php 
session_start();
include '../admin/connection.php';
include '../controller/action-project.php';

// geteducation
$queryGetEdu = mysqli_query($connection, "SELECT * FROM  education ORDER BY id DESC");


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
                                        <h1>EDUCATION</h1>
                                    </div>
                                    <div class="card-body">
                                        <div class="btn-add d-flex justify-content-end">
                                            <a href="add-education.php" class="btn btn-info shadow mb-3 ">Add
                                                Education</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped shadow">
                                                <thead class="bg-warning">
                                                    <tr>
                                                        <th class="text-white">No</th>
                                                        <th class="text-white">Education</th>
                                                        <th class="text-white">Description</th>
                                                        <th class="text-white">Enroll Education</th>
                                                        <th class="text-white">End Of Year Education</th>
                                                        <th class="text-white">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    while($resultEdu = mysqli_fetch_assoc($queryGetEdu)) :
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $resultEdu['education'] ?></td>
                                                        <td><?php echo $resultEdu['description'] ?></td>
                                                        <td><?php echo $resultEdu['endroll_education'] ?></td>
                                                        <td><?php echo $resultEdu['end_year_education'] ?></td>
                                                        <td>
                                                            <a href="add-education.php?edit=<?php echo $resultEdu['id'] ?>"
                                                                class=" btn btn-warning mb-2">Edit</a>
                                                            <a href="add-education.php?delete=<?php echo $resultEdu['id'] ?>"
                                                                class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
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