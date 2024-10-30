<?php
include 'admin/connection.php';

$queryGetUser = mysqli_query($connection, "SELECT * FROM user ORDER BY id DESC");
$resultUser = mysqli_fetch_assoc($queryGetUser);

// get data education
$queryGetEducation = mysqli_query($connection, "SELECT * FROM  education ORDER BY id DESC");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Explorer - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include 'inc/head-front.php' ?>
</head>

<body>

    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <?php include 'inc/sidebar-front.php' ?>
        <!-- END COLORLIB-ASIDE -->
        <div id="colorlib-main">
            <div>

                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-md-8 text text-center">
                        <div class="img mb-4"></div>
                        <div class="desc">
                            <img src="admin/upload/<?php echo $resultUser['foto'] ?>" alt=""
                                class="w-50 rounded shadow">
                            <h2 class="subheading">Hello I'm</h2>
                            <h1 class="mb-4"><?php echo $resultUser['name'] . " " . $resultUser['last_name'] ?></h1>

                            <p class="mb-4"><?php echo $resultUser['description'] ?></p>
                            <ul class="ftco-social mt-3">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>

                        <div class="box-edu border-2 border-dark border-top">
                            <div class="row mt-2">
                                <?php while($resultEducation = mysqli_fetch_assoc($queryGetEducation)) : ?>
                                <div class="col-md-12">
                                    <h3><?php echo $resultEducation['education'] ?></h3>
                                    <div class="year d-flex justify-content-center">
                                        <p style="margin-right: 10px;">
                                            <?php echo $resultEducation['endroll_education'] ?></p>

                                        <p><?php echo $resultEducation['end_year_education'] ?></p>
                                    </div>
                                    <h5><?php echo $resultEducation['description'] ?></h5>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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