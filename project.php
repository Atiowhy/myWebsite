<?php
include 'admin/connection.php';

// select project
$queryProject = mysqli_query($connection, "SELECT * FROM project_fe ORDER BY id DESC");

// get data id
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryProjectId = mysqli_query($connection, "SELECT * FROM project_fe WHERE id = '$id'");
$resultProjectId = mysqli_fetch_assoc($queryProjectId);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Elen - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include 'inc/head-front.php' ?>
</head>

<body>

    <div id="colorlib-page">
        <a href="#" data-id="<?php echo $resultProjectId['id'] ?>"
            class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <?php include 'inc/sidebar-front.php' ?>
        <div id="colorlib-main">
            <section class="ftco-section-2">
                <div class="photograhy">
                    <div class="row no-gutters">
                        <?php while($resultProject = mysqli_fetch_assoc($queryProject)) :  ?>
                        <div class="col-md-3 mt-2 mb-2 shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <a href="#" class="photography-entry img d-flex justify-content-center align-items-center"
                                style="background-image: url(admin/upload/<?php echo $resultProject['foto'] ?>);">
                                <div class="overlay"></div>
                                <div class="text text-center">
                                    <h3><?php echo $resultProject['project_name'] ?></h3>
                                    <span><?php echo $resultProject['technology'] ?></span>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; ?>
                    </div>

                    <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-primary">
                        Launch demo modal
                    </button> -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="admin/upload/<?php echo isset($_GET['edit']) ? $resultProjectId['foto'] : '' ?>"
                                        alt="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="ftco-footer ftco-bg-dark ftco-section">
                <div class="container px-md-5">
                    <div class="row mb-5">
                        <div class="col-md">
                            <div class="ftco-footer-widget mb-4 ml-md-4">
                                <h2 class="ftco-heading-2">Category</h2>
                                <ul class="list-unstyled categories">
                                    <li><a href="#">Photography <span>(6)</span></a></li>
                                    <li><a href="#">Fashion <span>(8)</span></a></li>
                                    <li><a href="#">Technology <span>(2)</span></a></li>
                                    <li><a href="#">Travel <span>(2)</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="ftco-footer-widget mb-4">
                                <h2 class="ftco-heading-2">Archives</h2>
                                <ul class="list-unstyled categories">
                                    <li><a href="#">October 2018 <span>(6)</span></a></li>
                                    <li><a href="#">September 2018 <span>(6)</span></a></li>
                                    <li><a href="#">August 2018 <span>(8)</span></a></li>
                                    <li><a href="#">July 2018 <span>(2)</span></a></li>
                                    <li><a href="#">June 2018 <span>(7)</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="ftco-footer-widget mb-4">
                                <h2 class="ftco-heading-2">Have a Questions?</h2>
                                <div class="block-23 mb-3">
                                    <ul>
                                        <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St.
                                                Mountain View, San Francisco, California, USA</span></li>
                                        <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392
                                                    3929 210</span></a></li>
                                        <li><a href="#"><span class="icon icon-envelope"></span><span
                                                    class="text">info@yourdomain.com</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="icon-heart"
                                    aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div><!-- END COLORLIB-MAIN -->
    </div><!-- END COLORLIB-PAGE -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <?php include 'inc/js-front.php' ?>

</body>

</html>