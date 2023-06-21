<?php if($setting['newsletter_status'] == 'Show'): ?>

<div class="newsletter-area pt_120 pb_120" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['newsletter_photo']; ?>)" id="newsletter">
<div class="newsletter-bg"></div>
    <div class="container wow fadeIn">
    <div class="row">
            <div class="col-md-12">
                <div class="main-headline white">
                    <div class="headline">
                        <h2><?php echo $setting['newsletter_title']; ?></h2>
                    </div>
                    <p>
                        <?php echo nl2br($setting['newsletter_text']); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_30 wow fadeIn" data-wow-delay="0.2s">
                <div class="newsletter-message">
                </div>
                <?php echo form_open(base_url().'newsletter/send',array('class' => '')); ?>
                    <div class="newsletter-submit">
                        <input type="text" placeholder="Enter Your Email" name="email_subscribe">
                        <input type="submit" value="Submit" name="form_subscribe">
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="footer-area pt_50 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-3 col-sm-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="footer-item mt_30">
                    <h3>Most Popular Visas </h3>
                    <ul>
                        <?php
                        $i=0;
                        foreach ($packages as $package) {
                            $today_time = strtotime(date('Y-m-d'));
                            $start_date_time = strtotime($package['p_start_date']);
                            if($today_time >= $start_date_time) {continue;}
                            $i++;
                            if($i>$setting['total_upcoming_tour_footer']) {break;}
                            ?>
                            <li><a href="<?php echo base_url(); ?>package/<?php echo $package['p_id']; ?>"><?php echo $package['p_name']; ?></a></li>
                            <?php
                            
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="footer-item mt_30">
                    <h3>Hotest Visas</h3>
                    <ul>
                        <?php
                        $i=0;               
                        foreach ($featured_packages as $featured_package) {
                            $i++;
                            if($i>$setting['total_featured_tour_footer']) {break;}
                            ?>
                            <li><a href="<?php echo base_url(); ?>package/<?php echo $featured_package['p_id']; ?>"><?php echo $featured_package['p_name']; ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                <div class="footer-item mt_30">
                    <h3>Recent News</h3>
                    <ul>
                        <?php
                        $i=0;               
                        foreach ($all_news as $news) {
                            $i++;
                            if($i>$setting['total_recent_news_footer']) {break;}
                            ?>
                            <li><a href="<?php echo base_url(); ?>news/view/<?php echo $news['news_id']; ?>"><?php echo $news['news_title']; ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="footer-item mt_30">
                    <h3>Address</h3>
                    <div class="footer-address-item">
                        <div class="icon"><i class="fa fa-map-marker"></i></div>
                        <div class="text"><span><?php echo nl2br($setting['footer_address']); ?></span></div>
                    </div>
                    <div class="footer-address-item">
                        <div class="icon"><i class="fa fa-phone"></i></div>
                        <div class="text"><span><?php echo nl2br($setting['footer_phone']); ?></span></div>
                    </div>
                    <div class="footer-address-item">
                        <div class="icon"><i class="fa fa-envelope-o"></i></div>
                        <div class="text"><span><?php echo nl2br($setting['footer_email']); ?></span></div>
                    </div>
                    <ul class="footer-social">
                        <?php
                        foreach ($social as $row)
                        {
                            if($row['social_url']!='')
                            {
                                echo '<li><a href="'.$row['social_url'].'"><i class="'.$row['social_icon'].'"></i></a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-6">
                <div class="copy-text">
                    <p><?php echo $setting['footer_copyright']; ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-bottom-menu">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>term">Terms and Conditions</a></li>
                        <li><a href="<?php echo base_url(); ?>privacy">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="scroll-top">
    <i class="fa fa-angle-up"></i>
</div>


<script src="<?php echo base_url(); ?>public/js/custom.js"></script>


<?php
$class_name = '';
$segment_2 = 0;
$segment_3 = 0;
$class_name = $this->router->fetch_class();
$segment_2 = $this->uri->segment('2');
$segment_3 = $this->uri->segment('3');
?>
<?php if($class_name == 'package'): ?>

<?php
$p_price = $this->Model_package->get_package_price_from_id($segment_2);
?>
<script>
    $(document).ready(function() {
        $('#numberPerson').on('change',function() {
            var selectVal = $('#numberPerson').val();
            var selectPrice = <?php echo $p_price['p_price_single']; ?>;
            var totalPrice = selectVal * selectPrice;
             $('#totalPrice').text(totalPrice);
        });
    });
</script>
<?php endif; ?>

<script>
    $(document).on('submit', '#stripe_form', function () {
        $('#submit-button').prop("disabled", true);
        $("#msg-container").hide();
        Stripe.card.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
            // name: $('.card-holder-name').val()
        }, stripeResponseHandler);
        return false;
    });
    Stripe.setPublishableKey('<?php echo $setting['stripe_public_key']; ?>');
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('#submit-button').prop("disabled", false);
            $("#msg-container").html('<div style="color: red;border: 1px solid;margin: 10px 0px;padding: 5px;"><strong>Error:</strong> ' + response.error.message + '</div>');
            $("#msg-container").show();
        } else {
            var form$ = $("#stripe_form");
            var token = response['id'];
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            form$.get(0).submit();
        }
    }
</script>

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

<?php
if($this->session->flashdata('success')):
    echo '
    <script>
    toastr.success(\''.$this->session->flashdata('success').'\');
    </script>
    ';
endif;
if($this->session->flashdata('error')):
    echo '
    <script>
    toastr.error(\''.$this->session->flashdata('error').'\');
    </script>
    ';
endif;
?>

</body>

</html>
