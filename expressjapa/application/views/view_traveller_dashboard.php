<div class="dashboard-area bg-area pt_50 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<div class="col-md-3 col-sm-12 wow fadeIn" data-wow-delay="0.1s">
				<div class="option-board mt_30">
					<ul>
						<?php $this->view('view_traveller_sidebar'); ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 wow fadeIn" data-wow-delay="0.2s">
				<div class="detail-dashboard mt_30">
					<h1>Hi, <?php echo $this->session->userdata('traveller_name'); ?></h1>
					<h3>Welcome to your dashboard.</h3>
				</div>
			</div>
		</div>
	</div>
</div>