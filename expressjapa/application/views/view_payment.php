<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_payment']; ?>)">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>Payment</h1>
        </div>
    </div>
</div>

<div class="featured-detail country-detail pt_50 pb_80">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12 wow fadeIn" data-wow-delay="0.2s">
                <div class="mt_30">

                    <div class="fea-descrip mt_30">
                        <div class="headstyle-two">
                            <h4>Your Cart</h4>
                        </div>
                        <div class="descrip-pre">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width:25%;">Name</th>
                                    <th style="width:25%;">Per Person Price (in USD)</th>
                                    <th style="width:25%;">Number of Person</th>
                                    <th style="width:25%;text-align: right;">SubTotal</th>
                                </tr>
                                <tr>
                                    <td>Number of Persons</td>
                                    <td>$<?php echo $p_price_single; ?></td>
                                    <td><?php echo $number_of_person; ?></td>
                                    <td style="text-align:right;">
                                        <?php
                                        $total_price = $p_price_single*$number_of_person;
                                        ?>
                                        $<?php echo $total_price; ?>
                                    </td>
                                </tr>                                
                                <tr>
                                    <th colspan="3" style="text-align: right;">Total:</th>
                                    <th style="text-align:right;">
                                        $<?php echo $total_price; ?>
                                    </th>
                                </tr>
                            </table>
                        </div>

                            
                        <div class="headstyle-two">
                            <h4>Make Payment</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="payment_method" class="custom-select" id="advFieldsStatus">
                                            <option value="">Select Payment Method</option>
                                            <option value="PayPal">PayPal</option>
                                            <option value="Stripe">Stripe</option>
                                            <option value="Bank Deposit">Bank Deposit</option>
                                        </select>
                                    </div>
                                    
                                    <?php echo form_open(base_url().'payment/paypal',array('id'=>'paypal_form','class' => 'paypal', 'style' => 'display:none;')); ?>

                                        <input type="hidden" name="cmd" value="_xclick" />
                                        <input type="hidden" name="no_note" value="1" />
                                        <input type="hidden" name="lc" value="UK" />
                                        <input type="hidden" name="currency_code" value="USD" />
                                        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />

                                        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                                        <input type="hidden" name="item_amount" value="<?php echo $total_price; ?>">
                                        <input type="hidden" name="total_person" value="<?php echo $number_of_person; ?>">

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success pull-left" name="form1">Pay Now</button>
                                        </div>
                                    <?php echo form_close(); ?>

                                    


                                    <?php echo form_open(base_url().'payment/stripe',array('id'=>'stripe_form','class' => '', 'style' => 'display:none;')); ?>

                                        <input type="hidden" name="payment" value="posted">

                                        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                                        <input type="hidden" name="item_amount" value="<?php echo $total_price; ?>">
                                        <input type="hidden" name="total_person" value="<?php echo $number_of_person; ?>">
                                        
                                        <div style="clear:both;margin-bottom:10px;"></div>
                                        <div class="form-group">
                                            <label>Card Number *</label>
                                            <input type="text" name="card_number" class="form-control card-number">
                                        </div>

                                        <div style="clear:both;margin-bottom:10px;"></div>
                                        <div class="form-group">
                                            <label>Card CVV *</label>
                                            <input type="text" name="card_cvv" class="form-control card-cvc">
                                        </div>

                                        <div style="clear:both;margin-bottom:10px;"></div>
                                        <div class="form-group">
                                            <label>Expiry Month *</label>
                                            <input type="text" name="card_month" class="form-control card-expiry-month">
                                        </div>

                                        <div style="clear:both;margin-bottom:10px;"></div>
                                        <div class="form-group">
                                            <label>Expiry Year *</label>
                                            <input type="text" name="card_year" class="form-control card-expiry-year">
                                        </div>

                                        
                                        <div style="clear:both;margin-bottom:10px;"></div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success pull-left" name="form2">Pay Now</button>
                                            <div id="msg-container" style="width:100%;margin-top:20px;overflow:hidden;"></div>
                                        </div>
                                    <?php echo form_close(); ?>



                                    <?php echo form_open(base_url().'payment/bank',array('id'=>'bank_form','class' => '', 'style' => 'display:none;')); ?>

                                        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                                        <input type="hidden" name="item_amount" value="<?php echo $total_price; ?>">
                                        <input type="hidden" name="total_person" value="<?php echo $number_of_person; ?>">


                                        <div style="clear:both;margin-bottom:10px;"></div>
                                        <div class="form-group">
                                            <label>Bank Details</label><br>
                                            <?php
                                            echo nl2br($setting['bank_detail']);
                                            ?>
                                        </div>
                                            
                                        <div style="clear:both;margin-bottom:10px;"></div>
                                        <div class="form-group">
                                            <label>Transaction Information <span>*</span></label>
                                            <textarea name="transaction_info" class="form-control" cols="30" rows="10" style="height:150px;"></textarea>
                                        </div>
                                        
                                        <div style="clear:both;margin-bottom:10px;"></div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success pull-left" name="form3">Pay Now</button>
                                        </div>
                                    <?php echo form_close(); ?>


                                </div>
                            </div>                            


                        </div>



                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>