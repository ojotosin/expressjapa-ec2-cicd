<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    
    <?php    
    $class_name = '';
    $segment_2 = 0;
    $segment_3 = 0;
    $class_name = $this->router->fetch_class();
    $segment_2 = $this->uri->segment('2');
    $segment_3 = $this->uri->segment('3');

    if($class_name == 'home')
    {
        echo '<meta name="description" content="'.$page['md_home'].'">';
        echo '<meta name="keywords" content="'.$page['mk_home'].'">';
        echo '<title>'.$page['mt_home'].'</title>';
    }
    if($class_name == 'about')
    {
        echo '<meta name="description" content="'.$page['md_about'].'">';
        echo '<meta name="keywords" content="'.$page['mk_about'].'">';
        echo '<title>'.$page['mt_about'].'</title>';
    }
    if($class_name == 'faq')
    {
        echo '<meta name="description" content="'.$page['md_faq'].'">';
        echo '<meta name="keywords" content="'.$page['mk_faq'].'">';
        echo '<title>'.$page['mt_faq'].'</title>';
    }
    if($class_name == 'team')
    {
        echo '<meta name="description" content="'.$page['md_team'].'">';
        echo '<meta name="keywords" content="'.$page['mk_team'].'">';
        echo '<title>'.$page['mt_team'].'</title>';
    }
    if($class_name == 'team_member')
    {
        $single_team_member = $this->Model_team_member->team_member_detail($segment_2);
        echo '<meta name="description" content="'.$single_team_member['meta_description'].'">';
        echo '<meta name="keywords" content="'.$single_team_member['meta_keyword'].'">';
        echo '<title>'.$single_team_member['meta_title'].'</title>';
    }
    if($class_name == 'portfolio')
    {
        echo '<meta name="description" content="'.$page['md_portfolio'].'">';
        echo '<meta name="keywords" content="'.$page['mk_portfolio'].'">';
        echo '<title>'.$page['mt_portfolio'].'</title>';
    }
    if($class_name == 'testimonial')
    {
        echo '<meta name="description" content="'.$page['md_testimonial'].'">';
        echo '<meta name="keywords" content="'.$page['mk_testimonial'].'">';
        echo '<title>'.$page['mt_testimonial'].'</title>';
    }
    if($class_name == 'contact')
    {
        echo '<meta name="description" content="'.$page['md_contact'].'">';
        echo '<meta name="keywords" content="'.$page['mk_contact'].'">';
        echo '<title>'.$page['mt_contact'].'</title>';
    }
    if($class_name == 'search')
    {
        echo '<meta name="description" content="'.$page['md_search'].'">';
        echo '<meta name="keywords" content="'.$page['mk_search'].'">';
        echo '<title>'.$page['mt_search'].'</title>';
    }
    if($class_name == 'term')
    {
        echo '<meta name="description" content="'.$page['md_term'].'">';
        echo '<meta name="keywords" content="'.$page['mk_term'].'">';
        echo '<title>'.$page['mt_term'].'</title>';
    }
    if($class_name == 'privacy')
    {
        echo '<meta name="description" content="'.$page['md_privacy'].'">';
        echo '<meta name="keywords" content="'.$page['mk_privacy'].'">';
        echo '<title>'.$page['mt_privacy'].'</title>';
    }
    if($class_name == 'service')
    {
        if($segment_3 == 0) {
            echo '<meta name="description" content="'.$page['md_service'].'">';
            echo '<meta name="keywords" content="'.$page['mk_service'].'">';
            echo '<title>'.$page['mt_service'].'</title>';  
        } else {
            $single_service = $this->Model_service->service_detail($segment_3);
            echo '<meta name="description" content="'.$single_service['meta_description'].'">';
            echo '<meta name="keywords" content="'.$single_service['meta_keyword'].'">';
            echo '<title>'.$single_service['meta_title'].'</title>';
        }       
    }
    if($class_name == 'destination')
    {
        if($segment_3 == 0) {
            echo '<meta name="description" content="'.$page['md_destination'].'">';
            echo '<meta name="keywords" content="'.$page['mk_destination'].'">';
            echo '<title>'.$page['mt_destination'].'</title>';  
        } else {
            $single_destination = $this->Model_destination->destination_detail($segment_3);
            echo '<meta name="description" content="'.$single_destination['meta_description'].'">';
            echo '<meta name="keywords" content="'.$single_destination['meta_keyword'].'">';
            echo '<title>'.$single_destination['meta_title'].'</title>';
        }       
    }

    if($class_name == 'package')
    {
        $single_package = $this->Model_package->package_detail($segment_2);
        echo '<meta name="description" content="'.$single_package['meta_description'].'">';
        echo '<meta name="keywords" content="'.$single_package['meta_keyword'].'">';
        echo '<title>'.$single_package['meta_title'].'</title>';
    }
    if($class_name == 'payment') {
        if($segment_2 == '') {
            echo '<title>Payment</title>';
        }
        if($segment_2 == 'success') {
            echo '<title>Payment Success</title>';
        }
    }
    if($class_name == 'news')
    {
        if($segment_3 == 0) {
            echo '<meta name="description" content="'.$page['md_news'].'">';
            echo '<meta name="keywords" content="'.$page['mk_news'].'">';
            echo '<title>'.$page['mt_news'].'</title>';
        } else {
            $news_single_item = $this->Model_news->news_detail($segment_3);
            echo '<meta name="description" content="'.$news_single_item['meta_description'].'">';
            echo '<meta name="keywords" content="'.$news_single_item['meta_keyword'].'">';
            echo '<title>'.$news_single_item['meta_title'].'</title>';
            $og_id = $news_single_item['news_id'];
            $og_photo = $news_single_item['photo'];
            $og_title = $news_single_item['news_title'];
            $og_description = $news_single_item['news_content_short'];
            echo '<meta property="og:title" content="'.$og_title.'">';
            echo '<meta property="og:type" content="website">';
            echo '<meta property="og:url" content="'.base_url().'news/view/'.$og_id.'">';
            echo '<meta property="og:description" content="'.$og_description.'">';
            echo '<meta property="og:image" content="'.base_url().'public/uploads/'.$og_photo.'">';
        }
    }
    if($class_name == 'traveller') {
        if($segment_2 == 'registration') {
            echo '<title>Registration</title>';       
        }
        if($segment_2 == 'forget_password') {
            echo '<title>Forget Password</title>';       
        }
        if($segment_2 == 'reset_password') {
            echo '<title>Reset Password</title>';       
        }
        if($segment_2 == 'login') {
            echo '<title>Login</title>';       
        }
        if($segment_2 == 'dashboard') {
            echo '<title>Dashboard</title>';       
        }
        if($segment_2 == 'payment_history') {
            echo '<title>Payment History</title>';       
        }
        if($segment_2 == 'profile_update') {
            echo '<title>Update Profile</title>';       
        }
        if($segment_2 == 'registration_verify') {
            echo '<title>Verify Registration</title>';       
        }
    }
    ?>

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/uploads/<?php echo $setting['favicon']; ?>">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/superfish.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/slicknav.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/spacing.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/chosen.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/datatable.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/toastr.min.css">


    <!-- All JS Files -->
    <script src="<?php echo base_url(); ?>public/js/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/chosen.jquery.js"></script>
    <script src="<?php echo base_url(); ?>public/js/docsupport/init.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/easing.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/superfish.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/viewportchecker.js"></script>
    <script src="<?php echo base_url(); ?>public/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/toastr.min.js"></script>
    <script src="https://js.stripe.com/v2/"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    
</head>

<body>
    
    <?php echo $comment['code_body']; ?>

    <?php if($setting['preloader'] == 'Show'): ?>
    <div id="preloader">
        <div id="status" style="background-image: url(<?php echo base_url(); ?>public/img/preloader.gif)"></div>
    </div>
    <?php endif; ?>

    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-8">
                    <div class="top-header-left">
                        <p><i class="fa fa-phone"></i><?php echo $setting['top_bar_phone']; ?></p>
                        <p><i class="fa fa-envelope-o"></i><?php echo $setting['top_bar_email']; ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-4">
                    <div class="top-header-right">
                        <?php if($this->session->userdata('traveller_id')): ?>
                            <a href="<?php echo base_url(); ?>traveller/dashboard"><i class="fa fa-tachometer"></i>Dashboard</a>
                            <a href="<?php echo base_url(); ?>traveller/logout"><i class="fa fa-sign-in"></i>Logout</a>
                        <?php else: ?>
                            <a href="<?php echo base_url(); ?>traveller/registration"><i class="fa fa-user-plus"></i>Register</a>
                            <a href="<?php echo base_url(); ?>traveller/login"><i class="fa fa-user-circle"></i>Login</a>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="logo">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>public/uploads/<?php echo $setting['logo']; ?>" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="nav-wrapper main-menu">
                        <nav>
                            <ul class="sf-menu" id="menu">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a href="<?php echo base_url(); ?>destination">Visas</a></li>
                                <li><a href="<?php echo base_url(); ?>news">News</a></li>
                                <li><a href="<?php echo base_url(); ?>about">About Us</a></li>
                                <li><a href="<?php echo base_url(); ?>faq">FAQ</a></li>
                                <li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>