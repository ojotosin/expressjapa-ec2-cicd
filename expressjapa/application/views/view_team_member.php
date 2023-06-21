<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $member['banner']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $member['name']; ?></h1>
		</div>
	</div>
</div>

<div class="team-detail pt_50 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
				<div class="team-detail-photo mt_30">
					<img src="<?php echo base_url(); ?>public/uploads/<?php echo $member['photo']; ?>" alt="Team Photo">
					<h4><?php echo $member['name']; ?></h4>
					<span><?php echo $member['designation']; ?></span>
					<ul>
						<?php if($member['facebook'] != ''): ?>
							<li><a href="<?php echo $member['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<?php endif; ?>
						<?php if($member['twitter'] != ''): ?>
							<li><a href="<?php echo $member['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php endif; ?>
						<?php if($member['linkedin'] != ''): ?>
							<li><a href="<?php echo $member['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<?php endif; ?>
						<?php if($member['youtube'] != ''): ?>
							<li><a href="<?php echo $member['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
						<?php endif; ?>
						<?php if($member['google_plus'] != ''): ?>
							<li><a href="<?php echo $member['google_plus']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<?php endif; ?>
						<?php if($member['instagram'] != ''): ?>
							<li><a href="<?php echo $member['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<?php endif; ?>
						<?php if($member['flickr'] != ''): ?>
							<li><a href="<?php echo $member['flickr']; ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="col-md-8 wow fadeIn" data-wow-delay="0.2s">
				<div class="team-detail-text mt_30">
					<div class="headstyle">
						<h4>Details</h4>
					</div>
					<?php echo $member['detail']; ?>
					<div class="team-contact mt_30">
						<ul>
							<?php if($member['email'] != ''): ?>
								<li><i class="fa fa-envelope"></i><?php echo $member['email']; ?></li>	
							<?php endif; ?>
							<?php if($member['phone'] != ''): ?>
								<li><i class="fa fa-phone"></i><?php echo $member['phone']; ?></li>	
							<?php endif; ?>
							<?php if($member['website'] != ''): ?>
								<li><i class="fa fa-globe"></i><?php echo $member['website']; ?></li>	
							<?php endif; ?>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!--Team End-->

<!--Team-Area Start-->
<div class="team-area bg-area pt_80 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="main-headline">
					<div class="headline">
						<h2><?php echo $setting['home_title_team_member']; ?></h2>
					</div>
					<p><?php echo $setting['home_subtitle_team_member']; ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mt_30">
				<div class="team-carousel owl-carousel">
					<?php
					foreach ($team_members as $row) {

						$temp_arr = explode('.',$row['photo']);
						$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];

						?>
						<div class="team-item wow fadeIn" data-wow-delay="0.1s">
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
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>