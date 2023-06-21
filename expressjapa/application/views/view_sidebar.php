<div class="col-md-4 wow fadeIn" data-wow-delay="0.2s">
	<div class="sidebar mt_30">
		<?php
        if($this->session->flashdata('error2')) {
            echo '<div class="error-class">'.$this->session->flashdata('error2').'</div>';
        }
        if($this->session->flashdata('success2')) {
            echo '<div class="success-class">'.$this->session->flashdata('success2').'</div>';
        }
        ?>
		<?php echo form_open(base_url().'search',array('class' => '')); ?>
			<div class="sidebar-item">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search for..." name="search_string">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit" name="form_search"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</div>
		<?php echo form_close(); ?>
			
		<div class="sidebar-item">
			<h3>Categories</h3>
			<ul>
				<?php
				foreach ($categories as $row) {
					?>
					<li><a href="<?php echo base_url(); ?>category/<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></li>
					<?php
				}
				?>
			</ul>
		</div>
		<div class="sidebar-item">
			<h3>Recent News</h3>
			<ul>
				<?php
				$i=0;
				foreach ($news as $row) {
					$i++;
					if($i>$setting['total_recent_news_sidebar']) {break;}
					?>
						<li><a href="<?php echo base_url(); ?>news/view/<?php echo $row['news_id']; ?>"><?php echo $row['news_title']; ?></a></li>
					<?php
				}
				?>
			</ul>
		</div>
	</div>
</div>