<div class="slider">
    <div class="slide-carousel owl-carousel">
        <?php
        foreach ($sliders as $slider) {
            ?>
            <div class="slider-item" style="background-image:url(public/uploads/<?php echo $slider['photo']; ?>);">
                <div class="slider-bg"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-12">
                            <div class="slider-table">
                                <div class="slider-text">

                                    <?php if($slider['heading']!=''): ?>
                                    <div class="text-animated">
                                        <h1><?php echo $slider['heading']; ?></h1>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if($slider['content']!=''): ?>
                                    <div class="text-animated">
                                        <p>
                                            <?php echo nl2br($slider['content']); ?>
                                        </p>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($slider['button_text']!=''): ?>
                                    <div class="text-animated">
                                        <ul>
                                            <li><a href="<?php echo $slider['button_url']; ?>"><?php echo $slider['button_text']; ?></a></li>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>


<?php if($setting['home_status_service'] == 'Show'): ?>
<div class="service-area pt_80 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2><?php echo $setting['home_title_service']; ?></h2>
                    </div>
                    <p><?php echo $setting['home_subtitle_service']; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($services as $service) {
                ?>
                <div class="col-md-4 col-xs-6 clear-three wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-item mt_30" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $service['photo']; ?>)">
                        <a href="<?php echo base_url(); ?>destination/view/<?php echo $service['id']; ?>">
                            <i class="<?php echo $service['icon']; ?>"></i>
                            <div class="ser-text">
                                <h4><?php echo $service['name']; ?></h4>
                                <p>
                                    <?php echo nl2br($service['short_description']); ?>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php endif; ?>


<?php if($setting['home_status_featured_package'] == 'Show'): ?>
<div class="featured-package bg-area pt_80 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2><?php echo $setting['home_title_featured_package']; ?></h2>
                    </div>
                    <p><?php echo $setting['home_subtitle_featured_package']; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_50">
                <div class="featured-carousel owl-carousel">

                    <?php
                    foreach ($featured_packages as $featured_package) {

                        $temp_arr = explode('.',$featured_package['p_featured_photo']);
                        $temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];

                        ?>
                        <div class="featured-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="featured-photo left">
                                <img src="<?php echo base_url(); ?>public/uploads/<?php echo $temp_final; ?>" alt="">
                                <span class="price" style="background: ##3367c1;">$<?php echo $featured_package['p_price_single']; ?> / person</span>
                            </div>
                            <div class="featured-text">
                                <h4><a href="<?php echo base_url(); ?>package/<?php echo $featured_package['p_id']; ?>"><?php echo $featured_package['p_name']; ?></a></h4>
                                <p>
                                    <?php
                                    echo $featured_package['p_description_short'];
                                    ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<?php if($setting['counter_status'] == 'Show'): ?>
<div class="counterup-area pt_70 pb_100" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['counter_photo']; ?>)">
    <div class="bg-counterup"></div>
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-3 col-xs-6 count-four wow fadeIn" data-wow-delay="0.1s">
                <div class="counter-item mt_30">
                    <div class="counter-text">
                        <h2 class="counter"><?php echo $setting['counter_1_value']; ?></h2>
                        <h4><?php echo $setting['counter_1_title']; ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6 count-four wow fadeIn" data-wow-delay="0.2s">
                <div class="counter-item mt_30">
                    <div class="counter-text">
                        <h2 class="counter"><?php echo $setting['counter_2_value']; ?></h2>
                        <h4><?php echo $setting['counter_2_title']; ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6 count-four wow fadeIn" data-wow-delay="0.3s">
                <div class="counter-item mt_30">
                    <div class="counter-text">
                        <h2 class="counter"><?php echo $setting['counter_3_value']; ?></h2>
                        <h4><?php echo $setting['counter_3_title']; ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6 count-four wow fadeIn" data-wow-delay="0.4s">
                <div class="counter-item mt_30">
                    <div class="counter-text">
                        <h2 class="counter"><?php echo $setting['counter_4_value']; ?></h2>
                        <h4><?php echo $setting['counter_4_title']; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php if($setting['home_status_destination'] == 'Show'): ?>
<div class="portfolio-page pt_80 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2><?php echo $setting['home_title_destination']; ?></h2>
                    </div>
                    <p><?php echo $setting['home_subtitle_destination']; ?></p>
                </div>
            </div>
        </div>
        <div class="row mt_10">
            <?php
            foreach ($destinations as $destination) {
                $temp_arr = explode('.',$destination['d_featured_photo']);
                $temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
                ?>
                <div class="col-md-4 col-xs-6 clear-three wow fadeIn">
                    <div class="portfolio-item mt_30">
                        <div class="portfolio-bg"></div>
                        <img src="<?php echo base_url(); ?>public/uploads/<?php echo $temp_final; ?>" alt="">
                        <div class="portfolio-text">
                            <a href="<?php echo base_url(); ?>public/uploads/<?php echo $destination['d_featured_photo']; ?>" class="magnific"><i class="fa fa-search-plus"></i></a>
                        </div>
                    </div>
                    <div class="photo-title">
                        <a href="<?php echo base_url(); ?>destination/view/<?php echo $destination['d_id']; ?>"><?php echo $destination['d_name']; ?></a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php endif; ?>



<?php if($setting['home_status_testimonial'] == 'Show'): ?>
<div class="testimonial-area pt_80 pb_80" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['home_photo_testimonial']; ?>)">
    <div class="bg-testimonial"></div>
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline white">
                    <div class="headline">
                        <h2><?php echo $setting['home_title_testimonial']; ?></h2>
                    </div>
                    <p><?php echo $setting['home_subtitle_testimonial']; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_30">
                <div class="testimonial-gallery owl-carousel wow fadeIn" data-wow-delay="0.2s">
                    <?php
                    foreach ($testimonials as $testimonial) {
                        ?>
                        <div class="testimonial-item">
                            <div class="testimonial-photo" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $testimonial['photo']; ?>)"></div>
                            <div class="testimonial-text">
                                <h2><?php echo $testimonial['name']; ?></h2>
                                <h3><?php echo $testimonial['designation']; ?></h3>
                                <div class="testimonial-pra">
                                    <p>
                                        <?php echo nl2br($testimonial['comment']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php if($setting['home_status_news'] == 'Show'): ?>
<div class="blog-area pt_80 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2><?php echo $setting['home_title_news']; ?></h2>
                    </div>
                    <p><?php echo $setting['home_subtitle_news']; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_50">
                <div class="blog-carousel owl-carousel">
                    <?php
                    foreach ($all_news as $news) {

                        $dt = explode('-',$news['news_date']);
                        ?>
                        <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
                            <a href="<?php echo base_url(); ?>news/view/<?php echo $news['news_id']; ?>">
                                <div class="blog-image">
                                    <img src="<?php echo base_url(); ?>public/uploads/<?php echo $news['photo']; ?>" alt="Blog Image">
                                    <div class="date">
                                        <h3><?php echo $dt[2]; ?></h3>
                                        <h4>
                                            <?php
                                            if($dt[1] == '01') {echo 'Jan';}
                                            if($dt[1] == '02') {echo 'Feb';}
                                            if($dt[1] == '03') {echo 'Mar';}
                                            if($dt[1] == '04') {echo 'Apr';}
                                            if($dt[1] == '05') {echo 'May';}
                                            if($dt[1] == '06') {echo 'Jun';}
                                            if($dt[1] == '07') {echo 'Jul';}
                                            if($dt[1] == '08') {echo 'Aug';}
                                            if($dt[1] == '09') {echo 'Sep';}
                                            if($dt[1] == '10') {echo 'Oct';}
                                            if($dt[1] == '11') {echo 'Nov';}
                                            if($dt[1] == '12') {echo 'Dec';}
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </a>
                            <div class="blog-text">
                                <a class="b-head" href="<?php echo base_url(); ?>news/view/<?php echo $news['news_id']; ?>"><?php echo $news['news_title']; ?></a>
                                <p>
                                    <?php echo $news['news_content_short']; ?>
                                </p>
                                <div class="button mt_15">
                                    <a href="<?php echo base_url(); ?>news/view/<?php echo $news['news_id']; ?>">Read More <i class="fa fa-chevron-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

