<?php
include 'admin/connection.php';
// select user
$queryGetUser = mysqli_query($connection, "SELECT * FROM user ORDER BY id DESC");
$resultUser = mysqli_fetch_assoc($queryGetUser);

$description = $resultUser['description'];
$paragraphs =  explode("\n", $description);

// ambil satu paragrap
$firstParagraph = isset($paragraphs[0]) ? $paragraphs[0] : '';
$secondParagraph = isset($paragraphs[1]) ? $paragraphs[1] : '';

// query project
$queryGetProject = mysqli_query($connection, "SELECT * FROM project_fe ORDER BY id DESC");

// count project
$countProject = mysqli_query($connection, "SELECT COUNT(*) AS  total FROM project_fe");
if($countProject){

    $dataCount = mysqli_fetch_assoc($countProject);
    $totalCountProject = $dataCount['total'];
}

// count education
$countEducation = mysqli_query($connection, "SELECT COUNT(*) AS  total FROM education");
if($countEducation){

    $dataCount = mysqli_fetch_assoc($countEducation);
    $totalCountEducation = $dataCount['total'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Elen - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- css -->
    <?php include 'inc/head-front.php' ?>
</head>

<body>

    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <!-- sidebar -->
        <?php include 'inc/sidebar-front.php' ?>
        <div id="colorlib-main">
            <div class="hero-wrap js-fullheight p-5" style="background-image: url(assets/front/images/bg_1.jpg);"
                data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="js-fullheight d-flex justify-content-center align-items-center">
                    <div class="col-md-8 text text-center">
                        <div class="img" style="background-image: url(admin/upload/<?php echo $resultUser['foto'] ?>);">
                        </div>
                        <div class="desc">
                            <h2 class="">Hello I'm</h2>
                            <h1 class="mb-2"><?php echo $resultUser['name'] ?></h1>
                            <p class="mb-4"><?php echo $firstParagraph ?></p>
                            <p><a href="#" class="btn-custom">More About Me <span
                                        class="ion-ios-arrow-forward"></span></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center mb-5 pb-2">
                        <div class="col-md-7 heading-section text-center ftco-animate">
                            <h2 class="mb-4">My Projects</h2>
                            <p>These are some projects that I have worked on</p>
                        </div>
                    </div>
                    <div class="row">
                        <?php while($resultProject = mysqli_fetch_assoc($queryGetProject)) : ?>
                        <div class="col-md-4">
                            <div class="blog-entry ftco-animate">
                                <a href="#" class="img img-2"
                                    style="background-image: url(admin/upload/<?php echo $resultProject['foto'] ?>);"></a>
                                <div class="text text-2 pt-2 mt-3">
                                    <span class="category mb-3 d-block"><a
                                            href="#"><?php echo $resultProject['technology'] ?></a></span>
                                    <h3 class="mb-4"><a href="#"><?php echo $resultProject['project_name'] ?></a></h3>
                                    <p class="mb-4"><?php echo $resultProject['description'] ?></p>
                                    <div class="author mb-4 d-flex align-items-center">
                                        <a href="#" class="img"
                                            style="background-image: url(admin/upload/<?php echo $resultUser['foto']?>);"></a>
                                        <div class="ml-3 info">
                                            <span>Written by</span>
                                            <h3><a href="#"><?php echo $resultUser['name'] ?></a>,
                                                <span><?php echo $resultProject['create_date'] ?></span>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="meta-wrap align-items-center">
                                        <div class="half order-md-last">
                                            <p class="meta">
                                                <span><i class="icon-heart"></i>3</span>
                                                <span><i class="icon-eye"></i>100</span>
                                                <span><i class="icon-comment"></i>5</span>
                                            </p>
                                        </div>
                                        <div class="half">
                                            <p><a href="#" class="btn py-2">Continue Reading <span
                                                        class="ion-ios-arrow-forward"></span></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>

                    <section class="statistic-data">
                        <h1 class="text-center">Statistic</h1>
                        <p class="text-center">My Personal Data Count</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card shadow">
                                    <div class="card-header text-center">
                                        Project
                                    </div>
                                    <div class="card-body">
                                        <p>Total Project</p>
                                        <h1><?php echo $totalCountProject ?> <span>Project</span></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow">
                                    <div class="card-header text-center">
                                        Education
                                    </div>
                                    <div class="card-body">
                                        <p>Total Education</p>
                                        <h1><?php echo $totalCountEducation ?> <span>Education</span></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow">
                                    <div class="card-header text-center">
                                        Lisence
                                    </div>
                                    <div class="card-body">
                                        <p>Total Lisence</p>
                                        <h1>
                                            2 Lisence
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
            <!-- footer -->
            <?php include 'inc/footer-front.php' ?>
        </div><!-- END COLORLIB-MAIN -->
    </div><!-- END COLORLIB-PAGE -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>

    <!-- file js -->
    <?php include 'inc/js-front.php' ?>

</body>

</html>