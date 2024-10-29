<?php 
session_start();
include '../controller/action-user.php';
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
                                        <h1>Data User</h1>
                                    </div>
                                    <div class="card-body">
                                        <div class="btn-cta d-flex justify-content-end mb-2">
                                            <a href="profile.php" class="btn btn-success">Add</a>
                                        </div>
                                        <table class="table table-striped shadow">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th class="text-white">No</th>
                                                    <th class="text-white">Name</th>
                                                    <th class="text-white">Email</th>
                                                    <th class="text-white">Foto</th>
                                                    <th class="text-white">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                while($dataUser = mysqli_fetch_assoc($queryGetUser)) :
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $dataUser['name'] ?></td>
                                                    <td><?php echo $dataUser['email'] ?></td>
                                                    <td><img width="100"
                                                            src="../admin/upload/<?php echo $dataUser['foto'] ?>"
                                                            alt="">
                                                    </td>
                                                    <td>
                                                        <a href="../controller/action-user.php?delete=<?php echo $dataUser['id'] ?>"
                                                            class="btn btn-danger">Delete</a>
                                                        <a href="../controller/action-user.php?member=<?php echo $dataUser['id'] ?>"
                                                            class="btn btn-info">Member</a>
                                                        <a href="../admin/profile.php?edit=<?php echo $dataUser['id'] ?>"
                                                            class="btn btn-warning">Edit</a>
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