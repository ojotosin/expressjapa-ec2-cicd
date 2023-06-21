<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_destination']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $page['destination_heading']; ?></h1>
		</div>
	</div>
</div>

<div class="portfolio-page pt_50 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			
			<?php
			foreach ($destinations as $row) {

				$temp_arr = explode('.',$row['d_featured_photo']);
				$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];

				?>
				<div class="col-md-4 col-xs-6 clear-three wow fadeIn">
					<div class="portfolio-item mt_30">
						<div class="portfolio-bg"></div>
						<img src="<?php echo base_url(); ?>public/uploads/<?php echo $temp_final; ?>" alt="">
						<div class="portfolio-text">
							<a href="<?php echo base_url(); ?>public/uploads/<?php echo $row['d_featured_photo']; ?>" class="magnific"><i class="fa fa-search-plus"></i></a>
						</div>
					</div>
					<div class="photo-title">
						<a href="<?php echo base_url(); ?>destination/view/<?php echo $row['d_id']; ?>"><?php echo $row['d_name']; ?></a>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>