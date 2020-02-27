<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../public/front-end/img/core-img/favicon.ico">
    <title>YourTests - Create &amp; Do Your Test|Home</title>
    <link rel="stylesheet" href="../public/front-end/css/log_reg.css">
    <link rel="stylesheet" href="../public/front-end/css/style.css">
    <link rel="stylesheet" href="../public/front-end/css/profile.css">
    <link rel="stylesheet" href="../public/front-end/css/doTest.css">
    <link rel="stylesheet" href="../public/front-end/css/add-test.css">
    <link rel="stylesheet" href="../public/front-end/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/front-end/css/font-awesome.min.css">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <div class="top-header-area d-flex justify-content-between align-items-center">
            <!-- Contact Info -->
            <div class="contact-info">
                <a href="#"><span>Phone:</span> 0395578355</a>
                <a href="#"><span>Email:</span> info@yourtests.com</a>
            </div>
            <!-- Follow Us -->
            <div class="follow-us">
                <span>Follow us</span>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </div>
        <!-- Navbar Area -->
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.php"><img src="../public/front-end/img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="index.php">Trang chủ</a></li>
                                <li><a href="optionTest.php">Thi thử</a></li>
                                <li><a href="CreateTest.php">Tạo bài thi</a></li>
                                <div class="btn-group">
                                        <li data-toggle="dropdown"><a href="">Thêm câu hỏi</a></li>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="True-False.php">Chọn đúng/sai</a>
                                            <a class="dropdown-item" href="SingleChoice.php">Chọn một đáp án</a>
                                            <a class="dropdown-item" href="MultipleChoice.php">Chọn nhiều đáp án</a>
                                        </div>
                                    </div>
                                <li><a href="rank.php">Xếp hạng thành tích</a></li>
                            </ul>

                            <!-- Search Button -->
                            <div class="search-area">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Tìm kiếm">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                                <?php if(isset($_SESSION['u_id']) && isset($_SESSION['thunbar'])): ?>

                                        <div class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-2 d-none d-lg-inline text-gray-600 "><?php echo $_SESSION['u_firstName']; ?> </span>
                                            <img class="img-profile rounded-circle" src="../public/uploads/avt/<?php echo $_SESSION['thunbar'] ?>" style = "width:35px; height:35px;">
                                        </a>
                                        <!-- Dropdown - User Information -->
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="profile.php">
                                            Thông tin
                                            </a>
                                            <a class="dropdown-item" href="changePass.php">
                                            Thay đổi mật khẩu
                                            </a>
                                            <a class="dropdown-item" href="logout.php">
                                            Logout
                                            </a>
                                        </div>
                                        </div>
                                <?php else : ?>
                                    <!-- Register / Login -->
                                    <div class="register-login-area">
                                        <a href="regist.php" class="btn">Đăng ký</a>
                                        <a href="login.php" class="btn">Đăng nhập</a>
                                    </div>
                                <?php endif; ?>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
