<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_team']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $page['team_heading']; ?></h1>
		</div>
	</div>
</div>

<div class="team-area pt_50 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<?php
			foreach ($team_members as $row) {

				$temp_arr = explode('.',$row['photo']);
				$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];

				?>

				<div class="col-md-3 col-sm-4 col-xs-6 clear-four wow fadeIn" data-wow-delay="0.1s">
					<div class="team-item mt_30">
						<div class="team-photo">
							<div class="team-bg"></div>
							<img src="<?php echo base_url(); ?>public/uploads/<?php echo $temp_final; ?>" alt="Team Photo">
							<div class="team-social">
								<ul>
									<?php if($row['facebook'] != ''): ?>
										<li><a href="<?php echo $row['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<?php endif; ?>
									<?php if($row['twitter'] != ''): ?>
										<li><a href="<?php echo $row['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<?php endif; ?>
									<?php if($row['linkedin'] != ''): ?>
										<li><a href="<?php echo $row['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									<?php endif; ?>
									<?php if($row['youtube'] != ''): ?>
										<li><a href="<?php echo $row['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
									<?php endif; ?>
									<?php if($row['google_plus'] != ''): ?>
										<li><a href="<?php echo $row['google_plus']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
									<?php endif; ?>
									<?php if($row['instagram'] != ''): ?>
										<li><a href="<?php echo $row['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
									<?php endif; ?>
									<?php if($row['flickr'] != ''): ?>
										<li><a href="<?php echo $row['flickr']; ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div class="team-text">
							<a href="<?php echo base_url(); ?>team-member/<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
							<p><?php echo $row['designation']; ?></p>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>