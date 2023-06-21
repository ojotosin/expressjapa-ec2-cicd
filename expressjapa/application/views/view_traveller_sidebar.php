<?php
$class_name = '';
$segment_2 = 0;
$segment_3 = 0;
$class_name = $this->router->fetch_class();
$segment_2 = $this->uri->segment('2');
$segment_3 = $this->uri->segment('3');
?>

<li class="<?php if($class_name == 'traveller' && $segment_2 == 'dashboard') {echo 'active';} ?>">
	<a href="<?php echo base_url(); ?>traveller/dashboard"><span><i class="fa fa-home"></i></span>Dashboard</a>
</li>

<li class="<?php if($class_name == 'traveller' && $segment_2 == 'payment_history') {echo 'active';} ?>">
	<a href="<?php echo base_url(); ?>traveller/payment_history"><span><i class="fa fa-bars"></i></span>Payment History</a>
</li>

<li class="<?php if($class_name == 'traveller' && $segment_2 == 'profile_update') {echo 'active';} ?>">
	<a href="<?php echo base_url(); ?>traveller/profile_update"><span><i class="fa fa-user"></i></span>Update Profile</a>
</li>

<li>
	<a href="<?php echo base_url(); ?>traveller/logout"><span><i class="fa fa-sign-in"></i></span>Logout</a>
</li>