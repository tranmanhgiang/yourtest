<?php
    require_once __DIR__.'/../autoloads/autoload.php';
?>
<?php
    require __DIR__.'/../layouts/header.php';
?>
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(../public/front-end/img/bg-img/bg1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Hero Content -->
                    <?php if(isset($_SESSION['u_id'])): ?>
                        <div class="hero-content text-center">
                            <h2 style = "color: white;">Nơi ươm mầm tài năng việt!</h2>
                        </div>
                    <?php else: ?>
                        <div class="hero-content text-center">
                            <h2>Trải nghiệm cùng chúng tôi!</h2>
                            <a href="login.php" class="btn clever-btn">Bắt đầu</a>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Cool Facts Area Start ##### -->
    <section class="cool-facts-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <div class="icon">
                            <img src="../public/front-end/img/core-img/docs.png" alt="">
                        </div>
                        <h2><span class="counter">222</span></h2>
                        <h5>Tài liệu học tập</h5>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <div class="icon">
                            <img src="../public/front-end/img/core-img/star.png" alt="">
                        </div>
                        <h2><span class="counter">100</span></h2>
                        <h5>Đánh giá</h5>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="750ms">
                        <div class="icon">
                            <img src="../public/front-end/img/core-img/events.png" alt="">
                        </div>
                        <h2><span class="counter">19</span></h2>
                        <h5>Góp ý</h5>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="1000ms">
                        <div class="icon">
                            <img src="../public/front-end/img/core-img/earth.png" alt="">
                        </div>
                        <h2><span class="counter">99</span></h2>
                        <h5>Sự kiện</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Cool Facts Area End ##### -->

    <!-- ##### Popular Courses Start ##### -->
    <section class="popular-courses-area section-padding-100-0" style="background-image: url(../public/front-end/img/core-img/texture.png);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Khóa học online phổ biến</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="../public/front-end/img/bg-img/math.png" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4>Toán</h4>
                            <div class="meta d-flex align-items-center">
                                <a href="https://hocmai.vn/giao-vien/169/thay-nguyen-thanh-tung.html">GV: Trần Thanh Tùng</a>
                            </div>
                            <p>Chinh phục các câu hỏi vận dung cao, các câu hỏi khó trong đề thi THPT quốc gia môn Toán cùng thầy Nguyễn Thanh Tùng</p>
                        </div>
                        <!-- Seat Rating Fee -->
                        <div class="seat-rating-fee d-flex justify-content-between">
                            <div class="seat-rating h-100 d-flex align-items-center">
                                <div class="seat">
                                    <i class="fa fa-user" aria-hidden="true"></i> 10
                                </div>
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i> 4.5
                                </div>
                            </div>
                            <div class="course-fee h-100">
                                <a href="https://hocmai.vn/khoa-hoc-truc-tuyen/1230/dot-pha-9-mon-toan-thay-nguyen-thanh-tung.html" target="_blank">$25.86</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="../public/front-end/img/bg-img/chemistry.png" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4>Hóa học</h4>
                            <div class="meta d-flex align-items-center">
                                <a href="https://hocmai.vn/giao-vien/237/co-tran-thi-phuong-thanh.html" target="_blank">GV: Trần Thị Phương Thanh</a>
                            </div>
                            <p>Khóa học hướng dẫn học sinh thực hành một số thí nghiệm trong chương trình sách giáo khoa phổ thông.</p>
                        </div>
                        <!-- Seat Rating Fee -->
                        <div class="seat-rating-fee d-flex justify-content-between">
                            <div class="seat-rating h-100 d-flex align-items-center">
                                <div class="seat">
                                    <i class="fa fa-user" aria-hidden="true"></i> 10
                                </div>
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i> 4.5
                                </div>
                            </div>
                            <div class="course-fee h-100">
                                <a href="https://hocmai.vn/khoa-hoc-truc-tuyen/816/thi-nghiem-mo-phong-hoa-hoc-pho-thong.html" target="_blank">$34.49</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="750ms">
                        <img src="../public/front-end/img/bg-img/english.jpg" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4>Tiếng Anh</h4>
                            <div class="meta d-flex align-items-center">
                                <a href="https://hocmai.vn/giao-vien/241/co-hong-le.html" target="_blank">GV: Lê Thị Thúy Hồng</a>
                            </div>
                            <p>Khóa học cung cấp các kiến thức, kĩ năng giúp học sinh hiểu rõ các phần dễ gây nhầm lẫn trong đề thi THPT quốc gia môn Tiếng Anh.</p>
                        </div>
                        <!-- Seat Rating Fee -->
                        <div class="seat-rating-fee d-flex justify-content-between">
                            <div class="seat-rating h-100 d-flex align-items-center">
                                <div class="seat">
                                    <i class="fa fa-user" aria-hidden="true"></i> 10
                                </div>
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i> 4.5
                                </div>
                            </div>
                            <div class="course-fee h-100">
                                <a href="https://hocmai.vn/khoa-hoc-truc-tuyen/885/lap-lo-hong-tieng-anh-thi-thpt-quoc-gia.html" target = "_blank">$12.94</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Popular Courses End ##### -->

   <?php
        require_once __DIR__.'/../layouts/footer.php';
   ?>
