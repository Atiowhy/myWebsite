<?php
session_start();
include '../admin/connection.php';
// include '../controller/action-user.php';

// get user
$queryGetUser = mysqli_query($connection, "SELECT * FROM user ");

// foto
$resultFoto = mysqli_query($connection, "SELECT * FROM user ORDER BY id DESC");
$rowFoto = mysqli_fetch_assoc($resultFoto);

// insert data
if(isset($_POST['save'])){
    // print_r($_POST);
    // die;
    $name = $_POST['name'];
    $password = sha1($_POST['password']);
        $email = $_POST['email'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $organization = $_POST['organization'];
        $address = $_POST['address'];
        $description = $_POST['description'];

        if(mysqli_num_rows($queryGetUser)){
            if(!empty($_FILES['foto']['name'])){
                $nameFile = $_FILES['foto']['name'];
                $image_size = $_FILES['foto']['size'];

                // extention file
                $ext = array('png', 'jpg',  'jpeg', 'gif', 'jfif', 'webp');
                $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

                // validasi ext jika tidak ada
                if(!in_array($extImg, $ext)){
                    echo "<script>alert('File tidak valid')</script>";
                    die;
                } else {
                    $upload = '../admin/upload/';
                    move_uploaded_file($_FILES['foto']['tmp_name'], $upload . $nameFile);
                    
                    $insertUser = mysqli_query($connection, "INSERT INTO user (name, password, email, last_name, phone,  organization, address, description, foto) VALUES ('$name', '$password', '$email', '$last_name', '$phone', '$organization', '$address',  '$description', '$nameFile')");
                    header('location: ../admin/user.php?success-insert');
                }

            } else {
                $insertUser = mysqli_query($connection, "INSERT INTO user (name, email, last_name, phone,  organization, address, description) VALUES ('$name', '$email', '$last_name', '$phone', '$organization', '$address',  '$description')");
                header('location:  ../admin/user.php?success-insert-without-photo');
            }
        } 
}

// get data edit
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = mysqli_query($connection, "SELECT * FROM user WHERE id = '$id'");
    $rowEdit = mysqli_fetch_assoc($result);
}

// edit data
if(isset($_POST['edit'])){
    $id = $_GET['edit'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $organization = $_POST['organization'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    if($_POST['password']){
        $password = sha1($_POST['password']);
    } else {
        $password = $getDataUserId['password'];
    }

    if(!empty($_FILES['foto']['name'])){
            $nameFile = $_FILES['foto']['name'];
            $image_size = $_FILES['foto']['size'];

            // ext file
            $ext = array('png', 'jpg', 'jpeg', 'jfif', 'webp');
            $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

            // jika ext tidak ada yang terdaftar
            if(!in_array($extImg, $ext)){
                echo 'ext tidak ditemukan';
                die;
        } else {
            $upload = 'upload/';
            move_uploaded_file($_FILES['foto']['tmp_name'], $upload . $nameFile);
            unlink($upload . $rowFoto['foto']);

            $updateUser = mysqli_query($connection, "UPDATE user SET name = '$name', password = '$password', email = '$email', last_name = '$last_name', phone = '$phone', organization = '$organization', address = '$address',  description = '$description', foto = '$nameFile' WHERE id = '$id'");
            header('location: user.php?success-edit-with-photo');
            }  
        } else {
            $updateUser = mysqli_query($connection, "UPDATE user SET name = '$name', password = '$password', email = '$email', last_name = '$last_name', phone = '$phone', organization = '$organization', address = '$address',  description = '$description' WHERE id = '$id'");
            header('location:  user.php?success-edit-without-photo');
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

    <title>Account settings - Account | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span>
                            Account</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0);"><i
                                                class="bx bx-user me-1"></i> Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-account-settings-notifications.html"><i
                                                class="bx bx-bell me-1"></i> Notifications</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages-account-settings-connections.html"><i
                                                class="bx bx-link-alt me-1"></i> Connections</a>
                                    </li>
                                </ul>
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">First Name</label>
                                                    <input class="form-control" type="text" id="firstName" name="name"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['name'] : '' ?>"
                                                        autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Last Name</label>
                                                    <input class="form-control" type="text" name="last_name"
                                                        id="lastName"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['last_name'] : '' ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input class="form-control" type="text" id="email" name="email"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>"
                                                        placeholder="john.doe@example.com" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="organization" class="form-label">Organization</label>
                                                    <input type="text" class="form-control" id="organization"
                                                        name="organization"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['organization'] : '' ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">ID (+62)</span>
                                                        <input type="text" name="phone"
                                                            value="<?php echo isset($_GET['edit']) ? $rowEdit['phone'] : '' ?>"
                                                            class="form-control" placeholder="202 555 0111" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['address'] : '' ?>"
                                                        placeholder="Address" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="address" class="form-label">Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['password'] : '' ?>"
                                                        placeholder="***" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="" class="form-label">Description</label>
                                                    <textarea class="form-control" name="description" cols="30"
                                                        rows="10"><?php echo isset($_GET['edit']) ? $rowEdit['description'] : '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="" class="form-label">Photo</label>
                                                    <input type="file" name="foto" class="form-control"
                                                        accept=".jpg,.png">
                                                    <img src="upload/<?php echo isset($_GET['edit']) ? $rowEdit['foto'] : '' ?>"
                                                        width="100" class="mt-3" alt="">
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2"
                                                    name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Delete Account</h5>
                                    <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                            <div class="alert alert-warning">
                                                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete
                                                    your account?</h6>
                                                <p class="mb-0">Once you delete your account, there is no going back.
                                                    Please be certain.</p>
                                            </div>
                                        </div>
                                        <form id="formAccountDeactivation" onsubmit="return false">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="accountActivation"
                                                    id="accountActivation" />
                                                <label class="form-check-label" for="accountActivation">I confirm my
                                                    account deactivation</label>
                                            </div>
                                            <button type="submit" class="btn btn-danger deactivate-account">Deactivate
                                                Account</button>
                                        </form>
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
    <?php include 'inc/js-dashboard.php' ?>
</body>

</html>