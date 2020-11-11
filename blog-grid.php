<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Daily Mart">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Daily Mart</title>


    <!-- Stylesheet-->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
</head>
<body>
<!-- Preloader-->
<div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
    </div>
</div>
<!-- Header Area-->
<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="home.php"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0">Blog Grid</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler">
            <span></span><span></span><span></span></div>
    </div>
</div>
<!-- Sidenav Black Overlay-->
<div class="sidenav-black-overlay"></div>

<?php
require_once("sidenav.php");
?>

<div class="page-content-wrapper">
<!-- Blog Wrapper-->
<div class="blog-wrapper py-3">
<div class="container">
    <div class="section-heading d-flex align-items-center justify-content-between">
        <h6 class="ml-1">Blog Grid</h6>
        <!-- Layout Options-->
        <div class="layout-options"><a class="active" href="blog-grid.html"><i class="lni lni-grid-alt"></i></a><a
                href="blog-list.php"><i class="lni lni-radio-button"></i></a></div>
    </div>
    <div class="row g-3">
        <!-- Single Blog Card-->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/18.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                    <div class="bg-shapes">
                        <div class="circle1"></div>
                        <div class="circle2"></div>
                        <div class="circle3"></div>
                        <div class="circle4"></div>
                    </div>
                    <!-- Post Catagory--><a class="post-catagory d-block" href="#">Review</a>
                    <!-- Post Title--><a class="post-title d-block" href="blog-details.php">The 5 best reviews
                        in Suha</a>
                    <!-- Post Meta-->
                    <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a
                            href="#"><i class="lni lni-user"></i>Yasin</a><span><i
                                class="lni lni-timer"></i>2 min</span>
                    </div>
                    <!-- Read More Button--><a class="btn btn-primary btn-sm read-more-btn"
                                               href="blog-details.php">Read More</a>
                </div>
            </div>
        </div>
        <!-- Single Blog Card-->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/19.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                    <div class="bg-shapes">
                        <div class="circle1"></div>
                        <div class="circle2"></div>
                        <div class="circle3"></div>
                        <div class="circle4"></div>
                    </div>
                    <!-- Post Catagory--><a class="post-catagory d-block" href="#">Shopping</a>
                    <!-- Post Title--><a class="post-title d-block" href="blog-details.php">The best deals of
                        this week</a>
                    <!-- Post Meta-->
                    <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a
                            href="#"><i class="lni lni-user"></i>Admin</a><span><i
                                class="lni lni-timer"></i>8 min</span>
                    </div>
                    <!-- Read More Button--><a class="btn btn-success btn-sm read-more-btn"
                                               href="blog-details.php">Read for ETB 0.7</a>
                </div>
            </div>
        </div>
        <!-- Single Blog Card-->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/20.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                    <div class="bg-shapes">
                        <div class="circle1"></div>
                        <div class="circle2"></div>
                        <div class="circle3"></div>
                        <div class="circle4"></div>
                    </div>
                    <!-- Post Catagory--><a class="post-catagory d-block" href="#">Tips</a>
                    <!-- Post Title--><a class="post-title d-block" href="blog-details.php">5 tips for buy
                        original products</a>
                    <!-- Post Meta-->
                    <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a
                            href="#"><i class="lni lni-user"></i>Niloy</a><span><i
                                class="lni lni-timer"></i>5 min</span>
                    </div>
                    <!-- Read More Button--><a class="btn btn-success btn-sm read-more-btn"
                                               href="blog-details.php">Read for ETB 0.9</a>
                </div>
            </div>
        </div>
        <!-- Single Blog Card-->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/21.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                    <div class="bg-shapes">
                        <div class="circle1"></div>
                        <div class="circle2"></div>
                        <div class="circle3"></div>
                        <div class="circle4"></div>
                    </div>
                    <!-- Post Catagory--><a class="post-catagory d-block" href="#">Offer</a>
                    <!-- Post Title--><a class="post-title d-block" href="blog-details.php">Mega Deals: Up to
                        75% discount</a>
                    <!-- Post Meta-->
                    <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a
                            href="#"><i class="lni lni-user"></i>Dolly</a><span><i
                                class="lni lni-timer"></i>1 min</span>
                    </div>
                    <!-- Read More Button--><a class="btn btn-primary btn-sm read-more-btn"
                                               href="blog-details.php">Read More</a>
                </div>
            </div>
        </div>
        <!-- Single Blog Card-->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/22.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                    <div class="bg-shapes">
                        <div class="circle1"></div>
                        <div class="circle2"></div>
                        <div class="circle3"></div>
                        <div class="circle4"></div>
                    </div>
                    <!-- Post Catagory--><a class="post-catagory d-block" href="#">Trends</a>
                    <!-- Post Title--><a class="post-title d-block" href="blog-details.php">Bridal shopping is
                        the latest trends of this month</a>
                    <!-- Post Meta-->
                    <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a
                            href="#"><i class="lni lni-user"></i>Sarah</a><span><i
                                class="lni lni-timer"></i>9 min</span>
                    </div>
                    <!-- Read More Button--><a class="btn btn-primary btn-sm read-more-btn"
                                               href="blog-details.php">Read More</a>
                </div>
            </div>
        </div>
        <!-- Single Blog Card-->
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/23.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                    <div class="bg-shapes">
                        <div class="circle1"></div>
                        <div class="circle2"></div>
                        <div class="circle3"></div>
                        <div class="circle4"></div>
                    </div>
                    <!-- Post Catagory--><a class="post-catagory d-block" href="#">News</a>
                    <!-- Post Title--><a class="post-title d-block" href="blog-details.php">How to easily buy a
                        product</a>
                    <!-- Post Meta-->
                    <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a
                            href="#"><i class="lni lni-user"></i>Suha</a><span><i class="lni lni-timer"></i>6 min</span>
                    </div>
                    <!-- Read More Button--><a class="btn btn-success btn-sm read-more-btn"
                                               href="blog-details.php">Read for ETB 0.2</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="section-heading pt-3">
        <h6 class="ml-1">Read by category</h6>
    </div>
    <div class="row g-3">
        <!-- Single Blog Catagory-->
        <div class="col-6 col-sm-4">
            <div class="card blog-catagory-card">
                <div class="card-body"><a href="#"><i class="lni lni-quotation"></i><span
                            class="d-block">Review</span></a></div>
            </div>
        </div>
        <!-- Single Blog Catagory-->
        <div class="col-6 col-sm-4">
            <div class="card blog-catagory-card">
                <div class="card-body"><a href="#"><i class="lni lni-shopping-basket"></i><span
                            class="d-block">Shopping</span></a>
                </div>
            </div>
        </div>
        <!-- Single Blog Catagory-->
        <div class="col-6 col-sm-4">
            <div class="card blog-catagory-card">
                <div class="card-body"><a href="#"><i class="lni lni-bulb"></i><span class="d-block">Tips</span></a>
                </div>
            </div>
        </div>
        <!-- Single Blog Catagory-->
        <div class="col-6 col-sm-4">
            <div class="card blog-catagory-card">
                <div class="card-body"><a href="#"><i class="lni lni-offer"></i><span
                            class="d-block">Offer</span></a></div>
            </div>
        </div>
        <!-- Single Blog Catagory-->
        <div class="col-6 col-sm-4">
            <div class="card blog-catagory-card">
                <div class="card-body"><a href="#"><i class="lni lni-bolt-alt"></i><span
                            class="d-block">Trends</span></a></div>
            </div>
        </div>
        <!-- Single Blog Catagory-->
        <div class="col-6 col-sm-4">
            <div class="card blog-catagory-card">
                <div class="card-body"><a href="#"><i class="lni lni-paperclip"></i><span
                            class="d-block">News</span></a></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Internet Connection Status-->
<div class="internet-connection-status" id="internetStatus"></div>
<!-- Footer Nav-->
<div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
            <ul class="h-100 d-flex align-items-center justify-content-between pl-0">
                <li class="active"><a href="home.php"><i class="lni lni-home"></i>Home</a></li>
				<li><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-search"></i>Search</a></li>
                <li><a href="cart.php"><i class="lni lni-shopping-basket"></i>Cart</a></li>
                <li><a href="pages.php"><i class="lni lni-heart"></i>Pages</a></li>
                <li><a href="settings.php"><i class="lni lni-cog"></i>Settings</a></li>
            </ul>
        </div>
    </div>
</div>
<?php require_once("footer.php"); ?>

<!-- All JavaScript Files-->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/default/jquery.passwordstrength.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jarallax.min.js"></script>
<script src="js/jarallax-video.min.js"></script>
<script src="js/default/dark-mode-switch.js"></script>
<script src="js/default/active.js"></script>
<script src="js/pwa.js"></script>
<script>
    function searchBtn() {

        $search = document.getElementById("search").value;

        if ($search != "")
            window.open("search.php?search=" + $search, "_self");

    }
</script>
</body>

</html>