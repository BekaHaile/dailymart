<?php
confirm_logged_in();
?>
<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Daily Mart</title>
    <meta name="keywords" content="HTML5 Admin Template"/>
    <meta name="description" content="Daily Mart">
    <meta name="author" content="melfantech.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../account/images/logo.png" type="image/x-icon"/>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
          rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="vendor/animate/animate.css">

    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css"/>
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css"/>

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="vendor/pnotify/pnotify.custom.css"/>

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css"/>
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css"/>
    <link rel="stylesheet" href="vendor/bootstrap-multiselect/bootstrap-multiselect.css"/>
    <link rel="stylesheet" href="vendor/morris/morris.css"/>

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="vendor/chartist/chartist.min.css"/>

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="vendor/select2/css/select2.css"/>
    <link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css"/>
    <link rel="stylesheet" href="vendor/datatables/media/css/dataTables.bootstrap4.css"/>

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap-tagsinput/bootstrap-tagsinput.css"/>
    <link rel="stylesheet" href="vendor/bootstrap-timepicker/css/bootstrap-timepicker.css"/>
    <link rel="stylesheet" href="vendor/dropzone/basic.css"/>
    <link rel="stylesheet" href="vendor/dropzone/dropzone.css"/>
    <link rel="stylesheet" href="vendor/bootstrap-markdown/css/bootstrap-markdown.min.css"/>
    <link rel="stylesheet" href="vendor/summernote/summernote-bs4.css"/>
    <link rel="stylesheet" href="vendor/codemirror/lib/codemirror.html"/>
    <link rel="stylesheet" href="vendor/codemirror/theme/monokai.html"/>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css"/>

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="master/style-switcher/style.switcher.localstorage.js"></script>

</head>
<body>
<section class="body">

<!-- start: header -->
<header class="header row" style="background: #586166;border: none">

    <div class="logo-container col-lg-3">
        <a href="../index.php" class="logo" style="margin-top: 0;height: 100%"> <img
                src="../account/images/logo.png"
                style="height: 100%"
                alt="Admin"/>
        </a>

        <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
             data-fire-event="sidebar-left-opened"><i class="fa fa-bars" aria-label="Toggle sidebar"></i></div>
    </div>

    <div class="col-lg-6">

    </div>
    <!-- start: search & user box -->
    <div class="header-right col-lg-3">

        <div id="userbox" class="userbox float-right border"
             style="margin-right: 15%;padding: 8px;border: 1px solid gray !important;">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="img/%21logged-user.jpg" alt="Joseph Doe" class="rounded-circle"
                         data-lock-picture="img/%21logged-user.jpg"/>
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                    <span class="name"
                          style="color: #f4873d;font-weight: bolder"><?php echo $_SESSION["username"]; ?></span>
                    <span class="role" style="color: #f4873d"><?php echo $_SESSION["role"]; ?></span>
                </div>

                <i class="fa custom-caret" style="color: #f4873d"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled mb-2">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i>
                            My Profile</a>
                    </li>

                    <li>
                        <a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i>
                            Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>
<!-- end: header -->

<div class="inner-wrapper">
    <!-- start: sidebar -->
    <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header">
            <div class="sidebar-title" style="color: #f4873d;font-weight: bold">
                Navigation
            </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
                 data-fire-event="sidebar-left-toggle">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <div class="nano">
            <div class="nano-content">
                <nav id="menu" class="nav-main" role="navigation">

                    <ul class="nav nav-main">
                        <?php if (trim($_SESSION["role"]) !== "salessupervisor") { ?>
                            <li>
                                <a class="nav-link" href="index.php">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        <?php } ?>
                        <!--City-->
                        <li class="nav-parent <?php echo ($k == 1) ? "nav-expanded" : ""; ?>">
                            <a class="nav-link" href="#">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                <span>Configuration</span>
                            </a>
                            <ul class="nav nav-children">
                                <?php if (trim($_SESSION["role"]) !== "salessupervisor") { ?>
                                    <li>
                                        <a class="nav-link fa fa-link" href="categories.php">
                                            <span style="padding-left: 10px">Category 1</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="nav-link fa fa-link" href="productGroup.php">
                                            <span style="padding-left: 10px">Category 2</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link fa fa-link" href="brand.php">
                                            <span style="padding-left: 10px">Category 3</span>
                                        </a>
                                    </li>
								<?php } ?>
								
                                    <li>
                                        <a class="nav-link fa fa-link" href="item.php">
                                            <span style="padding-left: 10px">Item</span>
                                        </a>
                                    </li>
									
								<?php if (trim($_SESSION["role"]) !== "salessupervisor") { ?>
                                    <li>
                                        <a class="nav-link fa fa-link" href="price.php">
                                            <span style="padding-left: 10px">Price</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="nav-link fa fa-link" href="discount.php">
                                            <span style="padding-left: 10px">Discount</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a class="nav-link fa fa-link" href="order.php">
                                        <span style="padding-left: 10px">Delivered Orders</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link fa fa-link" href="order.php">
                                        <span style="padding-left: 10px">Pending Orders</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link fa fa-link" href="order.php">
                                        <span style="padding-left: 10px">Shorter Orders</span>
                                    </a>
                                </li>
                                <?php if (trim($_SESSION["role"]) != "salessupervisor") { ?>
                                    <li>
                                        <a class="nav-link fa fa-link" href="topItem.php">
                                            <span style="padding-left: 10px">Top Product</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link fa fa-link" href="landMarkPrice.php">
                                            <span style="padding-left: 10px">Land Mark Price</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link fa fa-link" href="faq.php">
                                            <span style="padding-left: 10px">FAQ</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php if (trim($_SESSION["role"]) !== "salessupervisor") { ?>
                            <!--report-->
                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    <span>Report</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link fa fa-link" href="#">
                                            <span style="padding-left: 10px">Sales</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!--Slider-->
                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    <span>Slider</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link fa fa-link" href="slider.php">
                                            <span style="padding-left: 10px">Sliders</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <!--Users-->
                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    <span>User</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link fa fa-link" href="users.php">
                                            <span style="padding-left: 10px">Users</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        <?php } ?>
                        <li>
                            <a class="nav-link" href="logout.php">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                    <br>
                    <br>
                    <br>
                    <br>
                </nav>

            </div>

            <script>
                // Maintain Scroll Position
                if (typeof localStorage !== 'undefined') {
                    if (localStorage.getItem('sidebar-left-position') !== null) {
                        var initialPosition = localStorage.getItem('sidebar-left-position'),
                            sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                        sidebarLeft.scrollTop = initialPosition;
                    }
                }
            </script>


        </div>

    </aside>
    <!-- end: sidebar -->