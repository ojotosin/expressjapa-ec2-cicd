<?php
$dt = explode('-',$news_detail['news_date']);
?>

<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $news_detail['banner']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $news_detail['news_title']; ?></h1>
		</div>
	</div>
</div>

<div class="single-blog-area pt_50 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<div class="col-md-8 wow fadeIn" data-wow-delay="0.1s">
				<div class="single-blog mt_30">
					<div class="blog-image mb_30">
						<img src="<?php echo base_url(); ?>public/uploads/<?php echo $news_detail['photo']; ?>" alt="Blog Image">
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
					<h3><?php echo $news_detail['news_title']; ?></h3>
					<ul>
						<li><b>Category:</b> <a href="<?php echo base_url(); ?>category/<?php echo $news_detail['category_id']; ?>"><?php echo $category_name; ?></a></li>
					</ul>
					<p>
						<?php echo $news_detail['news_content']; ?>
					</p>
					<h3>Share This News</h3>
					<?php $url = base_url().'news/view/'.$news_detail['news_id']; ?>
					<div class="share_buttons">
						<a class="facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $url; ?>&t=<?php echo $news_detail['news_title']; ?>"><i class="fa fa-facebook-f"></i></a>

						<a class="twitter" target="_blank" href="https://twitter.com/share?text=<?php echo $news_detail['news_title']; ?>&url=<?php echo $url; ?>"><i class="fa fa-twitter"></i></a>

						<a class="pinterest" target="_blank" href="https://www.pinterest.com/pin/create/button/?description=<?php echo $news_detail['news_title']; ?>&media=&url=<?php echo $url; ?>"><i class="fa fa-pinterest"></i></a>

						<a class="linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $news_detail['news_title']; ?>"><i class="fa fa-linkedin"></i></a>
					</div>

				</div>
				<?php if($news_detail['comment'] == 'On'): ?>
				<div class="comment-list headstyle mt_30 wow fadeIn" data-wow-delay="0.1s">
					<h3>Comments</h3>
					<div class="row">
						<div class="col-md-12">			
							<?php
							$final_url = base_url().'news/'.$id;
							?>
							<div class="fb-comments" data-href="<?php echo $final_url; ?>" data-numposts="5"></div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			
			<?php $this->view('view_sidebar'); ?>

		</div>
	</div>
</div>