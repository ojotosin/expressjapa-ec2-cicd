<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<?php
$d_arr = array();
$p_photos = array();

$CI =& get_instance();
$CI->load->model('Model_package');
$d_arr = $CI->Model_package->get_destination_name_by_id($package['d_id']);
$p_photos = $CI->Model_package->get_package_photos($package['p_id']);
$p_videos = $CI->Model_package->get_package_videos($package['p_id']);

?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Package Detail</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/package" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">


      <div class="box box-info">
        
        <div class="box-body table-responsive">

          <table class="table table-bordered">
			<tbody>
			    <tr>
			        <th style="width:280px;">Package Name</th>
			        <td><?php echo $package['p_name'];?></td>
			    </tr>
                <tr>
                    <th>Destination Name</th>
                    <td><?php echo $d_arr['d_name'];?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        <?php echo $package['p_description']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Short Description</th>
                    <td>
                        <?php echo $package['p_description_short']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>
                       <?php echo $package['p_location']; ?> 
                    </td>
                </tr>
                <tr>
                    <th>Tour Start Date</th>
                    <td>
                        <?php echo $package['p_start_date']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Tour End Date</th>
                    <td>
                        <?php echo $package['p_end_date']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Last Booking Date</th>
                    <td>
                        <?php echo $package['p_last_booking_date']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Map</th>
                    <td>
                        <?php echo $package['p_map']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Itinerary</th>
                    <td>
                         <?php echo $package['p_itinerary']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Price (per person)</th>
                    <td>
                        <?php echo $package['p_price_single']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Policy</th>
                    <td>
                        <?php echo $package['p_policy']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Terms and Conditions</th>
                    <td>
                        <?php echo $package['p_terms']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Is Featured?</th>
                    <td>
                        <?php echo $package['p_is_featured']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Featured Photo</th>
                    <td>
                        <img src="<?php echo base_url().'public/uploads/'.$package['p_featured_photo']; ?>" alt="" style="width:400px;">
                    </td>
                </tr>
                <tr>
                    <th>Banner</th>
                    <td>
                        <img src="<?php echo base_url().'public/uploads/'.$package['p_banner_photo']; ?>" alt="" style="width:400px;">
                    </td>
                </tr>
                <tr>
                    <th>Tour Photos</th>
                    <td>
                        <?php
                        foreach($p_photos as $p_photo) {
                            $temp_arr = array();
                            $temp_arr = explode('.',$p_photo['p_photo']);
                            $temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
                            ?>
                            <a href="<?php echo base_url().'public/uploads/package_photos/'.$p_photo['p_photo']; ?>" class="magnific"><img src="<?php echo base_url().'public/uploads/package_photos/'.$temp_final; ?>" alt="" style="width:150px;margin-bottom:3px;"></a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Tour Videos</th>
                    <td>
                        <?php
                        foreach($p_videos as $p_video) {
                            echo '<div style="width:300px;">';
                            echo $p_video['p_video'];
                            echo '</div>';
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
  

</section>