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
    <!-- The above tags *must* come first in tRhe head, any other head content must come *after* these tags-->
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
        <div class="back-button"><a href="blog-grid.php"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0">Blog Details</h6>
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
    <div class="blog-details-post-thumbnail" style="background-image: url('img/bg-img/6.jpg')">
        <div class="container">
            <div class="post-bookmark-wrap">
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
            </div>
        </div>
    </div>
    <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
            <div class="container">
                <h5 class="post-title">Bridal shopping is the latest trends of this month.</h5><a
                    class="post-catagory mb-3 d-block" href="#">Shopping</a>

                <div class="post-meta-data d-flex align-items-center justify-content-between"><a
                        class="d-flex align-items-center" href="#"><img src="img/bg-img/9.jpg"
                                                                        alt="">Sarah<span>Follow</span></a><span><i
                            class="lni lni-timer"></i>4 min read</span></div>
            </div>
        </div>
        <div class="post-content bg-white py-3 mb-3">
            <div class="container">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta delectus distinctio officiis!
                    Quisquam blanditiis voluptatibus, quod doloribus modi, impedit in dolores voluptates, aliquam
                    facilis architecto eligendi laudantium eos!</p>
                <h6>The top shopping deals is the year 2020.</h6>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum necessitatibus dicta adipisci tempora
                    beatae impedit similique qui sit, ea possimus eos odit, voluptatum totam voluptates iure quo?</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis cupiditate quis molestias molestiae
                    minus vel, ipsam corporis aut error libero tenetur facere assumenda soluta esse? Perferendis,
                    eum!</p><a class="mb-3 d-block h6" href="#">How to easily buy a product?</a>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto quasi quas eligendi adipisci quaerat
                    totam. Veritatis ratione a numquam molestias, sit at molestiae excepturi totam dolore, hic fugiat.
                    Incidunt modi odit iure ipsam amet illo placeat laboriosam.</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro, consectetur cum ea aut dolores
                    officia magni laudantium, sed hic ad nulla laborum quam minima voluptatum, labore ipsam.</p>
            </div>
        </div>
        <!-- All Comments-->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3">
            <div class="container">
                <h6>Comments (3)</h6>

                <div class="rating-review-content">
                    <ul class="pl-0">
                        <li class="single-user-review d-flex">
                            <div class="user-thumbnail mt-0"><img src="img/bg-img/7.jpg" alt=""></div>
                            <div class="rating-comment">
                                <p class="comment mb-0">Very good product. It's just amazing!</p><span
                                    class="name-date">Designing World 12 Dec 2020</span>
                            </div>
                        </li>
                        <li class="single-user-review d-flex">
                            <div class="user-thumbnail mt-0"><img src="img/bg-img/8.jpg" alt=""></div>
                            <div class="rating-comment">
                                <p class="comment mb-0">WOW excellent product. Love it.</p><span class="name-date">Designing World 8 Dec 2020</span>
                            </div>
                        </li>
                        <li class="single-user-review d-flex">
                            <div class="user-thumbnail mt-0"><img src="img/bg-img/9.jpg" alt=""></div>
                            <div class="rating-comment">
                                <p class="comment mb-0">What a nice product it is. I am looking it's.</p><span
                                    class="name-date">Designing World 28 Nov 2020</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Comment Form-->
        <div class="ratings-submit-form bg-white py-3">
            <div class="container">
                <h6>Submit A Comment</h6>

                <form action="#" method="">
                    <div class="mb-3">
                        <textarea class="form-control" id="comments" name="comment" cols="30" rows="10"
                                  placeholder="Write your comment..."></textarea>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">Post Comment</button>
                </form>
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