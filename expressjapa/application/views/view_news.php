<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_news']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $page['news_heading']; ?></h1>
		</div>
	</div>
</div>

<div class="blog-area pt_50 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<?php
			foreach ($news as $row) {

				$temp_arr = explode('.',$row['photo']);
				$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];

				$dt = explode('-',$row['news_date']);

				?>
				<div class="col-md-4 col-xs-6 clear-three wow fadeIn" data-wow-delay="0.6s">
					<div class="blog-item mt_30">
						<a href="<?php echo base_url(); ?>news/view/<?php echo $row['news_id']; ?>">
							<div class="blog-image">
								<img src="<?php echo base_url(); ?>public/uploads/<?php echo $temp_final; ?>" alt="Blog Image">
								<div class="date">
									<h3><?php echo $dt[2]; ?></h3>
									<h4>
										<?php
										if($dt[1] == '01') {echo 'Jan';}
										if($dt[1] == '02') {echo 'Feb';}
										if($dt[1] == '03') {echo 'Mar';}
										if($dt[1] == '04') {echo 'Apr';}
										if($dt[1] == '05') {echo 'May';}
										if($dt[1] == '06') {echo 'Jun';}
										if($dt[1] == '07') {echo 'Jul';}
										if($dt[1] == '08') {echo 'Aug';}
										if($dt[1] == '09') {echo 'Sep';}
										if($dt[1] == '10') {echo 'Oct';}
										if($dt[1] == '11') {echo 'Nov';}
										if($dt[1] == '12') {echo 'Dec';}
										?>
									</h4>
								</div>
							</div>
						</a>
						<div class="blog-text">
							<a class="b-head" href="<?php echo base_url(); ?>news/view/<?php echo $row['news_id']; ?>"><?php echo $row['news_title']; ?></a>
							<ul>
								<li><b>Category:</b> <a href="<?php echo base_url(); ?>category/<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></li>
							</ul>
							<p>
								<?php echo $row['news_content_short']; ?>
							</p>
							<div class="button mt_15">
								<a href="<?php echo base_url(); ?>news/view/<?php echo $row['news_id']; ?>">Read More <i class="fa fa-chevron-circle-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>			
		</div>
	</div>
</div>