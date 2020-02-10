<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../public/img/core-img/favicon.ico">
    <title>YourTests - Create &amp; Do Your Test|Home</title>
    <link rel="stylesheet" href="../public/css/log_reg.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/profile.css">
    <link rel="stylesheet" href="../public/css/do-test.css">
    <link rel="stylesheet" href="../public/css/addTest.css">
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
                <a href="#"><span>Email:</span> info@clever.com</a>
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
                    <a class="nav-brand" href="index.php"><img src="../public/img/core-img/logo.png" alt=""></a>

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
                                <li><a href="dotest.php">Thi thử</a></li>
                                <li><a href="addTest.php">Tạo bài thi</a></li>
                                <div class="btn-group">
                                        <li data-toggle="dropdown"><a href="">Thêm câu hỏi</a></li>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="True-False.php">Chọn đúng/sai</a>
                                            <a class="dropdown-item" href="SingleChoice.php">Chọn một đáp án</a>
                                            <a class="dropdown-item" href="MultipleChoice.php">Chọn nhiều đáp án</a>
                                        </div>
                                    </div>
                                <li><a href="instructors.html">Xếp hạng thành tích</a></li>
                            </ul>

                            <!-- Search Button -->
                            <div class="search-area">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Tìm kiếm">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                                <?php if(isset($_SESSION['u_id'])): ?>
                                    
                                    <div class="btn-group">
                                        <span class="dropdown-toggle" data-toggle="dropdown">Xin chào <?php echo $_SESSION['u_firstName']; ?></span>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="profile.php">Thông tin</a>
                                            <a class="dropdown-item" href="logout.php">Log out</a>
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
