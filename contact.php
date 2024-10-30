<?php
include 'admin/connection.php';

// get data
$queryGetDataContact = mysqli_query($connection, "SELECT * FROM user ORDER BY ID DESC");
$resultDataContact = mysqli_fetch_assoc($queryGetDataContact);
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
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <?php include 'inc/sidebar-front.php' ?>
        <div id="colorlib-main">
            <section class="ftco-section contact-section">
                <div class="container">
                    <div class="row d-flex mb-5 contact-info">
                        <div class="col-md-12 mb-4">
                            <h2 class="h4 font-weight-bold">Contact Information</h2>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-3">
                            <p><span>Address:</span><?php echo $resultDataContact['address'] ?></p>
                        </div>
                        <div class="col-md-3">
                            <p><span>Phone:</span> <a
                                    href="tel://1234567920"><?php echo $resultDataContact['phone'] ?></a></p>
                        </div>
                        <div class="col-md-3">
                            <p><span>Email:</span> <a
                                    href="mailto:info@yoursite.com"><?php echo $resultDataContact['email'] ?></a></p>
                        </div>
                        <div class="col-md-3">
                            <p><span>Website</span> <a href="#">myPorto.com</a></p>
                        </div>
                    </div>
                    <div class="row block-9">
                        <div class="col-md-6 order-md-last pr-md-5">
                            <form action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <textarea name="" id="" cols="30" rows="7" class="form-control"
                                        placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                                </div>
                            </form>

                        </div>

                        <div class="col-md-6">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </section>

            <?php include 'inc/footer-front.php' ?>
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