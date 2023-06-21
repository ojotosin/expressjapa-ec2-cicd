<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_contact']; ?>)">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1><?php echo $page['contact_heading']; ?></h1>
        </div>
    </div>
</div>

<div class="contact-area bg-area pt_50 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-7 mt_30 wow fadeIn" data-wow-delay="0.1s">
                <div class="contact-form">
                    <div class="headstyle">
                        <h4>Contact Form</h4>
                    </div>
                    <?php echo form_open(base_url().'contact/send_email',array('class' => '')); ?>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name" name="name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email Address" name="email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message" name="message" style="height:195px;"></textarea>
                            </div>
                            <?php if($setting['recaptcha_status'] == 'Show'): ?>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="<?php echo $setting['recaptcha_site_key']; ?>"></div>
                            </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary" name="form_contact">Submit</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="col-md-5 mt_30 wow fadeIn" data-wow-delay="0.1s">
                <div class="headstyle">
                    <h4>Contact Information</h4>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 wow fadeIn" data-wow-delay="0.2s">
                        <div class="contact-item mb_30">
                            <div class="contact-text">
                                <h3>Address</h3>
                                <p>
                                    <?php echo nl2br($page['contact_address']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 wow fadeIn" data-wow-delay="0.3s">
                        <div class="contact-item mb_30">
                            <div class="contact-text">
                                <h3>Email</h3>
                                <p>
                                    <?php echo nl2br($page['contact_email']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 wow fadeIn" data-wow-delay="0.4s">
                        <div class="contact-item mb_30">
                            <div class="contact-text">
                                <h3>Phone</h3>
                                <p>
                                    <?php echo nl2br($page['contact_phone']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt_50 wow fadeIn">
                <div class="map-area">
                    <div class="headstyle">
                        <h4>Map Location</h4>
                    </div>
                    <?php echo $page['contact_map']; ?>
                </div>
            </div>
        </div>
    </div>
</div>