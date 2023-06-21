<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_faq']; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $page['faq_heading']; ?></h1>
		</div>
	</div>
</div>

<div class="faq-page pt_40 pb_80">
	<div class="container wow fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
					<?php
					$i=0;
					foreach ($faqs as $row) {
						$i++;
						?>
						<div class="panel panel-default mt_15 wow fadeIn" data-wow-delay="0.1s">
							<div class="panel-heading" role="tab" id="heading">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>"><?php echo $row['faq_title']; ?></a>
								</h4>
							</div>
							<div id="collapse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading">
								<div class="panel-body">
									<?php echo $row['faq_content']; ?>
								</div>
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