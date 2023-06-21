<div class="banner-slider high-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $destination['d_banner_photo']; ?>)">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1><?php echo $destination['d_name']; ?></h1>
        </div>
    </div>
</div>

<div class="country-package pt_80 pb_80">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                <div class="country-text">
                    <h2><?php echo $destination['d_heading']; ?></h2>
                    <p>
                        <?php echo nl2br($destination['d_short_description']); ?>
                    </p>
                    <div class="country-social mt_30" style="text-align: center;">
                        <h3>Social Share</h3>
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="portfolio-page pt_40 pb_80 bg-area">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2><?php echo $destination['d_package_heading']; ?></h2>
                    </div>
                    <p><?php echo $destination['d_package_subheading']; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            
            <?php
            if($packages_by_d_id_total):
            foreach ($packages_by_d_id as $row) {
                $temp_arr = explode('.',$row['p_featured_photo']);
                $temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
                ?>
                <div class="col-md-4 col-xs-6 clear-three wow fadeIn">
                    <div class="portfolio-item mt_30">
                        <div class="portfolio-bg"></div>
                        <img src="<?php echo base_url(); ?>public/uploads/<?php echo $temp_final; ?>" alt="">
                        <div class="portfolio-text">
                            <a href="<?php echo base_url(); ?>public/uploads/<?php echo $row['p_featured_photo']; ?>" class="magnific"><i class="fa fa-search-plus"></i></a>
                        </div>
                    </div>
                    <div class="photo-title">
                        <a href="<?php echo base_url(); ?>package/<?php echo $row['p_id']; ?>">
                            <?php echo $row['p_name']; ?><br>
                            <span style="font-size: 22px;">$<?php echo $row['p_price_single']; ?> / person</span>
                            <?php if( strtotime($row['p_last_booking_date']) < strtotime(date('Y-m-d')) ): ?>
                            <br><span style="color:#e05d5d;">(Booking Date Over)</span>
                            <?php else: ?>
                            <br><span style="color:#77d477;">(Available for Booking)</span>
                        	<?php endif; ?>
                        </a>
                    </div>
                </div>
                <?php
            }
            else:
                echo '<div style="text-align:center;color:red;font-size:20px;">No package is found.</div>';
            endif;
            ?>
        </div>
    </div>
</div>

<div class="package-tabarea pt_80 pb_80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-headline">
                    <div class="headline">
                        <h2><?php echo $destination['d_detail_heading']; ?></h2>
                    </div>
                    <p><?php echo $destination['d_detail_subheading']; ?></p>
                </div>
            </div>
        </div>
        <div class="row package-tab mt_30">
            <div class="col-md-3 col-sm-4 mt_30 lg_pl_0">
                <div class="package-tab-menu">
                    <ul>
                        <li class="active"><a href="#tb1" data-toggle="tab" aria-expanded="true">Introduction</a></li>
                        <li><a href="#tb2" data-toggle="tab" aria-expanded="true">Experience</a></li>
                        <li><a href="#tb3" data-toggle="tab" aria-expanded="true">Weather</a></li>
                        <li><a href="#tb4" data-toggle="tab" aria-expanded="true">Hotel</a></li>
                        <li><a href="#tb5" data-toggle="tab" aria-expanded="true">Transportation</a></li>
                        <li><a href="#tb6" data-toggle="tab" aria-expanded="true">Culture</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 tab-content package-content mt_30">
                <div class="tab-pane fade in active" id="tb1">
                    <?php echo nl2br($destination['d_introduction']); ?>
                </div>
                <div class="tab-pane fade in" id="tb2">
                   <?php echo nl2br($destination['d_experience']); ?>
                </div>
                <div class="tab-pane fade in" id="tb3">
                    <?php echo nl2br($destination['d_weather']); ?>
                </div>
                <div class="tab-pane fade in" id="tb4">
                    <?php echo nl2br($destination['d_hotel']); ?>
                </div>
                <div class="tab-pane fade in" id="tb5">
                    <?php echo nl2br($destination['d_transportation']); ?>
                </div>
                <div class="tab-pane fade in" id="tb6">
                    <?php echo nl2br($destination['d_culture']); ?>
                </div>
            </div>
        </div>
    </div>
</div>