<?php
$photos = array();
if($package_photos_total) {
    foreach ($package_photos as $row) {
        $photos[] = $row['p_photo'];       
    }    
}
$videos = array();
if($package_videos_total) {
    foreach ($package_videos as $row) {
        $videos[] = $row['p_video'];       
    }
}
?>

<div class="banner-slider high-banner" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $package['p_banner_photo']; ?>)">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>
                <?php echo $package['p_name']; ?><br>
                ($<?php echo $package['p_price_single']; ?> / person)
            </h1>
        </div>
    </div>
</div>

<div class="featured-detail country-detail pt_30 pb_80" style="background:#fff;">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-8 wow fadeIn" data-wow-delay="0.2s">

                <div class="fea-descrip mt_30">

                    <div class="headstyle-two">
                        <h4>Tour Dates</h4>
                    </div>
                    <div class="descrip-pre table-responsive">
                        <?php
                        $last_date_time = strtotime($package['p_last_booking_date']);
                        $now_time = strtotime(date('Y-m-d'));
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Processing Time</th>
                                <th>Complexity</th>
                                <th>Last Booking Date</th>
                            </tr>
                            <tr>
                                <td><span style="font-size:20px;"><b><?php echo $package['p_start_date']; ?></b></span></td>
                                <td><span style="font-size:20px;"><b><?php echo $package['p_end_date']; ?></b></span></td>
                                <?php if($now_time<=$last_date_time): ?>
                                    <td><span style="font-size:20px;color:green;"><b><?php echo $package['p_last_booking_date']; ?></b></span></td>
                                <?php else: ?>
                                    <td><span style="font-size:20px;color:red;"><b><?php echo $package['p_last_booking_date']; ?></b></span></td>
                                <?php endif; ?>
                            </tr>
                        </table>
                    </div>
                    <div class="headstyle-two">
                        <h4>Visa information</h4>
                    </div>
                    <div class="descrip-pre">
                        <p>
                            <?php echo $package['p_description']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.2s">
                <div class="fea-descrip mt_30">
                    <div class="headstyle-two">
                        <h4>Buy Now</h4>
                    </div>
                    <div class="row book-now">
                        <div class="col-md-12">
                            <?php echo form_open(base_url().'payment',array('class' => '')); ?>
                                <input type="hidden" name="p_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="p_price_single" value="<?php echo $package['p_price_single']; ?>">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Total Price (per person)</label>
                                            <div class="mb_5" style="font-size:32px;">
                                                $<?php echo $package['p_price_single']; ?>
                                            </div>
                                            <div class="sep mb_10"></div>
                                            <label>Number of Persons</label>
                                            <select id="numberPerson" name="number_of_person" class="custom-select select2 mb_15" style="width: auto;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                            </select>
                                            <div class="sep mb_15"></div>
                                            <label>Total Price</label>
                                            <div class="mb_15" style="font-size:32px;">
                                                $<span id="totalPrice"><?php echo $package['p_price_single']; ?></span>
                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                                
                                <?php if($now_time<=$last_date_time): ?>
                                <div class="form-group">
                                    <button class="btn btn-info btn-lg" type="submit" name="form_book">Book Your Seat</button>
                                </div>
                                <?php else: ?>
                                <div class="form-group">
                                    <button class="btn btn-dark btn-lg" type="submit" name="" disabled>Book Your Seat</button>
                                </div>
                                <span style="color:red;">Sorry! You can not book the tour now. Booking date is expired.</span>
                                <?php endif; ?>

                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="featured-detail country-detail pt_0 pb_80" style="background:#fff;">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12 wow fadeIn" data-wow-delay="0.2s">


                <div class="fea-descrip mt_30">
                    <div class="headstyle-two">
                        <h4>More Information</h4>
                    </div>
                </div>

                <!--Package-Details-Tab Start-->
                <div class="package-tab-det-menu mt_30">
                    <ul>
                        <li class="active"><a href="#tb1" data-toggle="tab" aria-expanded="true">Tour Photos</a></li>
                        <li class=""><a href="#tb2" data-toggle="tab" aria-expanded="true">Tour Videos</a></li>
                        <li class=""><a href="#tb3" data-toggle="tab" aria-expanded="true">Tour Information</a></li>

                        <?php if($package['p_itinerary']!=''): ?>
                        <li class=""><a href="#tb4" data-toggle="tab" aria-expanded="true">Itinerary</a></li>
                        <?php endif; ?>

                        <?php if($package['p_policy']!=''): ?>
                        <li class=""><a href="#tb7" data-toggle="tab" aria-expanded="true">Policy</a></li>
                        <?php endif; ?>
                        
                        <?php if($package['p_terms']!=''): ?>
                        <li class=""><a href="#tb8" data-toggle="tab" aria-expanded="true">Terms and Conditions</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="tab-content package-content package-detail-content p_30">
                    <div class="tab-pane active" id="tb1">
                        

                        <?php if($package_photos_total==0): ?>
                        <span style="color:red;">No Photo is found</span>
                        <?php else: ?>
                        
                        <div class="row">
                            
                            <?php
                            for($i=0;$i<count($photos);$i++) {

                            	$temp_arr = explode('.',$photos[$i]);
            					$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
                                ?>
                                <div class="col-md-4 col-xs-6 clear-three">
                                    <div class="portfolio-item mt_30">
                                        <div class="portfolio-bg"></div>
                                        <img src="<?php echo base_url(); ?>public/uploads/package_photos/<?php echo $temp_final; ?>" alt="">
                                        <div class="portfolio-text">
                                            <a href="<?php echo base_url(); ?>public/uploads/package_photos/<?php echo $photos[$i]; ?>" class="magnific"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <?php endif; ?>
                    </div>
                    <div class="tab-pane" id="tb2">

                        <?php if($package_videos_total==0): ?>
                        <span style="color:red;">No Video is found</span>

                        <?php else: ?>

                        <div class="row">
                            <?php
                                for($i=0;$i<count($videos);$i++) {
                                    ?>
                                    <div class="col-md-6 col-xs-6 clear-two">
                                        <div class="portfolio-item mt_30">
                                            <?php echo $videos[$i]; ?>
                                        </div>
                                    </div>                                            
                                    <?php
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane" id="tb3">
                        <div class="feat-detail-table table-responsive">
                            <table class="table table-bordered table-striped">
                                <?php if($package['p_location']!=''): ?>
                                <tr>
                                    <th style="width:200px;">Detailed Location</th>
                                    <td><?php echo nl2br($package['p_location']); ?></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>Tour Start Date</th>
                                    <td><?php echo $package['p_start_date']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tour End Date</th>
                                    <td><?php echo $package['p_end_date']; ?></td>
                                </tr>
                                <tr>
                                    <th>Last Booking Date</th>
                                    <td><?php echo $package['p_last_booking_date']; ?></td>
                                </tr>
                                <?php if($package['p_map']!=''): ?>
                                <tr>
                                    <th>Address in Map</th>
                                    <td><?php echo $package['p_map']; ?></td>
                                </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>

                    <?php if($package['p_itinerary']!=''): ?>
                    <div class="tab-pane" id="tb4">
                        <?php echo $package['p_itinerary']; ?>
                    </div>
                    <?php endif; ?>

                                           
                    <?php if($package['p_policy']!=''): ?>
                    <div class="tab-pane" id="tb7">                            
                        <?php echo $package['p_policy']; ?>
                    </div>
                    <?php endif; ?>

                    <?php if($package['p_terms']!=''): ?>
                    <div class="tab-pane" id="tb8">                            
                        <?php echo $package['p_terms']; ?>
                    </div>
                    <?php endif; ?>


                </div>

            </div>
        </div>
    </div>
</div>