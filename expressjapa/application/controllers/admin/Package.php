<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_package');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();
		$data['package'] = $this->Model_package->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_package',$data);
		$this->load->view('admin/view_footer');
	}

	public function view($id = 0)
	{

		if($id == 0) {
			redirect(base_url().'admin/package');
		}

		$data['setting'] = $this->Model_common->get_setting_data();
		$data['package'] = $this->Model_package->get_package($id);

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_package_detail',$data);
		$this->load->view('admin/view_footer');
	}

	public function add()
	{
		$data['setting'] = $this->Model_common->get_setting_data();
		$data['destination'] = $this->Model_package->all_destination();

		$error = '';
		$success = '';

		if(isset($_POST['form1'])) {

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$this->form_validation->set_rules('p_name', 'Package Name', 'trim|required');
			$this->form_validation->set_rules('p_start_date', 'Tour Start Date', 'trim|required');
			$this->form_validation->set_rules('p_end_date', 'Tour End Date', 'trim|required');
			$this->form_validation->set_rules('p_last_booking_date', 'Last Booking Date', 'trim|required');
			$this->form_validation->set_rules('p_price_single', 'Per Person Price', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];

		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error .= 'You must have to select a photo for featured photo<br>';
		    }


		    $path1 = $_FILES['banner']['name'];
		    $path_tmp1 = $_FILES['banner']['tmp_name'];

		    if($path1!='') {
		        $ext1 = pathinfo( $path1, PATHINFO_EXTENSION );
		        $file_name1 = basename( $path1, '.' . $ext1 );
		        $ext_check1 = $this->Model_common->extension_check_photo($ext1);
		        if($ext_check1 == FALSE) {
		            $valid = 0;
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error .= 'You must have to select a photo for banner photo<br>';
		    }

		    $photosArray1 = array();
		    $i=0;
		    if(isset($_FILES['photos']['name'])){
		        foreach($_FILES['photos']['name'] as $val) {
		            $photosArray1[$i] = $val;
		            $i++;
		        }
		    }

		    $photosArray2 = array();
		    $i=0;
		    if(isset($_FILES['photos']['tmp_name'])){
		        foreach($_FILES['photos']['tmp_name'] as $val) {
		            $photosArray2[$i] = $val;
		            $i++;
		        }
		    }

		    $videosArray = array();
		    $i=0;
		    if(isset($_POST['videos'])){
		        foreach($_POST['videos'] as $val) {
		            $videosArray[$i] = $val;
		            $i++;
		        }
		    }

		    if($valid == 1) 
		    {
				$next_id = $this->Model_package->get_auto_increment_id();
				foreach ($next_id as $row) {
		            $ai_id = $row['Auto_increment'];
		        }

		        $final_name = 'package-'.$ai_id.'.'.$ext;
		        copy( $path_tmp, './public/uploads/'.$final_name );

		        $final_name1 = 'package-banner-'.$ai_id.'.'.$ext1;
		        move_uploaded_file( $path_tmp1, './public/uploads/'.$final_name1 );

		        $final_name_thumb = 'package-'.$ai_id.'-thumb'.'.'.$ext;
		        $source_image = $path_tmp;
		        $destination = './public/uploads/'.$final_name_thumb;
		        $new_width = 360;
		        $new_height = 240;
		        $quality = 100;
		        $this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

		        $form_data = array(
					'p_name'              => $_POST['p_name'],
					'p_featured_photo'    => $final_name,
					'p_banner_photo'      => $final_name1,
					'p_description'       => $_POST['p_description'],
					'p_description_short' => $_POST['p_description_short'],
					'p_location'          => $_POST['p_location'],
					'p_start_date'        => $_POST['p_start_date'],
					'p_end_date'          => $_POST['p_end_date'],
					'p_last_booking_date' => $_POST['p_last_booking_date'],
					'p_map'               => $_POST['p_map'],
					'p_itinerary'         => $_POST['p_itinerary'],
					'p_price_single'      => $_POST['p_price_single'],
					'p_policy'            => $_POST['p_policy'],
					'p_terms'             => $_POST['p_terms'],
					'p_is_featured'       => $_POST['p_is_featured'],
					'd_id'                => $_POST['d_id'],
					'meta_title'          => $_POST['meta_title'],
					'meta_keyword'        => $_POST['meta_keyword'],
					'meta_description'    => $_POST['meta_description']
	            );
	            $this->Model_package->add($form_data);

	            $next_id = $this->Model_package->get_auto_increment_id1();
				foreach ($next_id as $row) {
		            $ai_id1 = $row['Auto_increment'];
		        }

		        for($i=0;$i<count($photosArray1);$i++) {

		        	$ext = pathinfo( $photosArray1[$i], PATHINFO_EXTENSION );
			        $file_name = basename( $path, '.' . $ext );
			        $ext_check = $this->Model_common->extension_check_photo($ext);
			        if($ext_check == FALSE) {
			        	continue;
			        }

		            $final_name = $ai_id1.'.'.$ext;

		            $form_data = array(
						'p_id'    => $ai_id,
						'p_photo' => $final_name
		            );
		            $this->Model_package->add1($form_data);
		            
		            copy( $photosArray2[$i], './public/uploads/package_photos/'.$final_name );

		            $final_name_thumb = $ai_id1.'-thumb'.'.'.$ext;
		            $source_image = $photosArray2[$i];
		            $destination = './public/uploads/package_photos/'.$final_name_thumb;
		            $new_width = 340;
		            $new_height = 280;
		            $quality = 100;
		            $this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

		            $ai_id1 = $ai_id1 + 1;
		        }

		        for($i=0;$i<count($videosArray);$i++) {

		            if($videosArray[$i] == '') {
		                continue;
		            }

		            $form_data = array(
						'p_id'    => $ai_id,
						'p_video' => $videosArray[$i]
		            );
		            $this->Model_package->add2($form_data);

		        }


		        $success = 'Package is added successfully!';
				$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/package');
		    } 
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/package/add');
		    }
            
        } else {
            $this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_package_add',$data);
			$this->load->view('admin/view_footer');
        }
		
	}





	public function edit($id)
	{
		
    	// If there is no package in this id, then redirect
    	$tot = $this->Model_package->package_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/package');
        	exit;
    	}
       	
       	$data['setting'] = $this->Model_common->get_setting_data();
		$data['destination'] = $this->Model_package->all_destination();
		$data['package'] = $this->Model_package->get_package($id);
		$data['package_photos'] = $this->Model_package->get_package_photos($id);
		$data['package_videos'] = $this->Model_package->get_package_videos($id);

		$error = '';
		$success = '';

		if(isset($_POST['form1'])) {

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$this->form_validation->set_rules('p_name', 'Package Name', 'trim|required');
			$this->form_validation->set_rules('p_start_date', 'Tour Start Date', 'trim|required');
			$this->form_validation->set_rules('p_end_date', 'Tour End Date', 'trim|required');
			$this->form_validation->set_rules('p_last_booking_date', 'Last Booking Date', 'trim|required');
			$this->form_validation->set_rules('p_price_single', 'Per Person Price', 'trim|required');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];

		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
		        }
		    }


		    $path1 = $_FILES['banner']['name'];
		    $path_tmp1 = $_FILES['banner']['tmp_name'];

		    if($path1!='') {
		        $ext1 = pathinfo( $path1, PATHINFO_EXTENSION );
		        $file_name1 = basename( $path1, '.' . $ext1 );
		        $ext_check1 = $this->Model_common->extension_check_photo($ext1);
		        if($ext_check1 == FALSE) {
		            $valid = 0;
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
		        }
		    }


		    $photosArray1 = array();
		    $i=0;
		    if(isset($_FILES['photos']['name'])){
		        foreach($_FILES['photos']['name'] as $val) {
		            $photosArray1[$i] = $val;
		            $i++;
		        }
		    }

		    $photosArray2 = array();
		    $i=0;
		    if(isset($_FILES['photos']['tmp_name'])){
		        foreach($_FILES['photos']['tmp_name'] as $val) {
		            $photosArray2[$i] = $val;
		            $i++;
		        }
		    }

		    $videosArray = array();
		    $i=0;
		    if(isset($_POST['videos'])){
		        foreach($_POST['videos'] as $val) {
		            $videosArray[$i] = $val;
		            $i++;
		        }
		    }

		    if($valid == 1)
		    {

		    	if($path == '' && $path1 == '') {
		    		$form_data = array(
						'p_name'              => $_POST['p_name'],
						'p_description'       => $_POST['p_description'],
						'p_description_short' => $_POST['p_description_short'],
						'p_location'          => $_POST['p_location'],
						'p_start_date'        => $_POST['p_start_date'],
						'p_end_date'          => $_POST['p_end_date'],
						'p_last_booking_date' => $_POST['p_last_booking_date'],
						'p_map'               => $_POST['p_map'],
						'p_itinerary'         => $_POST['p_itinerary'],
						'p_price_single'      => $_POST['p_price_single'],
						'p_policy'            => $_POST['p_policy'],
						'p_terms'             => $_POST['p_terms'],
						'p_is_featured'       => $_POST['p_is_featured'],
						'd_id'                => $_POST['d_id'],
						'meta_title'          => $_POST['meta_title'],
						'meta_keyword'        => $_POST['meta_keyword'],
						'meta_description'    => $_POST['meta_description']
		            );
		            $this->Model_package->update($id,$form_data);
				}

				if($path != '' && $path1 == '') {

					unlink('./public/uploads/'.$_POST['current_photo']);

					$temp_arr = explode('.',$_POST['current_photo']);
					$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
					unlink('./public/uploads/'.$temp_final);

					$final_name = 'package-'.$id.'.'.$ext;
					copy( $path_tmp, './public/uploads/'.$final_name );
				
					$final_name_thumb = 'package-'.$id.'-thumb'.'.'.$ext;
					$source_image = $path_tmp;
					$destination = './public/uploads/'.$final_name_thumb;
					$new_width = 360;
				  	$new_height = 240;
				 	$quality = 100;
				 	$this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

				 	$form_data = array(
						'p_name'              => $_POST['p_name'],
						'p_featured_photo'    => $final_name,
						'p_description'       => $_POST['p_description'],
						'p_description_short' => $_POST['p_description_short'],
						'p_location'          => $_POST['p_location'],
						'p_start_date'        => $_POST['p_start_date'],
						'p_end_date'          => $_POST['p_end_date'],
						'p_last_booking_date' => $_POST['p_last_booking_date'],
						'p_map'               => $_POST['p_map'],
						'p_itinerary'         => $_POST['p_itinerary'],
						'p_price_single'      => $_POST['p_price_single'],
						'p_policy'            => $_POST['p_policy'],
						'p_terms'             => $_POST['p_terms'],
						'p_is_featured'       => $_POST['p_is_featured'],
						'd_id'                => $_POST['d_id'],
						'meta_title'          => $_POST['meta_title'],
						'meta_keyword'        => $_POST['meta_keyword'],
						'meta_description'    => $_POST['meta_description']
		            );
		            $this->Model_package->update($id,$form_data);
				}

				if($path == '' && $path1 != '') {

					// Banner Photo Change
					unlink('./public/uploads/'.$_POST['current_banner']);

					$final_name1 = 'package-banner-'.$id.'.'.$ext1;
		        	copy( $path_tmp1, './public/uploads/'.$final_name1 );

		        	$form_data = array(
						'p_name'              => $_POST['p_name'],
						'p_banner_photo'      => $final_name1,
						'p_description'       => $_POST['p_description'],
						'p_description_short' => $_POST['p_description_short'],
						'p_location'          => $_POST['p_location'],
						'p_start_date'        => $_POST['p_start_date'],
						'p_end_date'          => $_POST['p_end_date'],
						'p_last_booking_date' => $_POST['p_last_booking_date'],
						'p_map'               => $_POST['p_map'],
						'p_itinerary'         => $_POST['p_itinerary'],
						'p_price_single'      => $_POST['p_price_single'],
						'p_policy'            => $_POST['p_policy'],
						'p_terms'             => $_POST['p_terms'],
						'p_is_featured'       => $_POST['p_is_featured'],
						'd_id'                => $_POST['d_id'],
						'meta_title'          => $_POST['meta_title'],
						'meta_keyword'        => $_POST['meta_keyword'],
						'meta_description'    => $_POST['meta_description']
		            );
		            $this->Model_package->update($id,$form_data);
				}

				if($path != '' && $path1 != '') {

					// Featured Photo Change
					unlink('./public/uploads/'.$data['destination']['d_featured_photo']);
					$final_name = 'package-'.$id.'.'.$ext;
		        	copy( $path_tmp, './public/uploads/'.$final_name );

		        	$temp_arr = explode('.',$data['destination']['d_featured_photo']);
					$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
					unlink('./public/uploads/'.$temp_final);

		        	$final_name_thumb = 'package-'.$id.'-thumb'.'.'.$ext;
					$source_image = $path_tmp;
					$destination = './public/uploads/'.$final_name_thumb;
					$new_width = 360;
				  	$new_height = 240;
				 	$quality = 100;
				 	$this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

				 	// Banner Photo Change
				 	unlink('./public/uploads/'.$_POST['current_banner']);

					$final_name1 = 'package-banner-'.$id.'.'.$ext1;
		        	copy( $path_tmp1, './public/uploads/'.$final_name1 );

					$form_data = array(
						'p_name'              => $_POST['p_name'],
						'p_featured_photo'    => $final_name,
						'p_banner_photo'      => $final_name1,
						'p_description'       => $_POST['p_description'],
						'p_description_short' => $_POST['p_description_short'],
						'p_location'          => $_POST['p_location'],
						'p_start_date'        => $_POST['p_start_date'],
						'p_end_date'          => $_POST['p_end_date'],
						'p_last_booking_date' => $_POST['p_last_booking_date'],
						'p_map'               => $_POST['p_map'],
						'p_itinerary'         => $_POST['p_itinerary'],
						'p_price_single'      => $_POST['p_price_single'],
						'p_policy'            => $_POST['p_policy'],
						'p_terms'             => $_POST['p_terms'],
						'p_is_featured'       => $_POST['p_is_featured'],
						'd_id'                => $_POST['d_id'],
						'meta_title'          => $_POST['meta_title'],
						'meta_keyword'        => $_POST['meta_keyword'],
						'meta_description'    => $_POST['meta_description']
		            );
		            $this->Model_package->update($id,$form_data);
				}

				$next_id = $this->Model_package->get_auto_increment_id1();
				foreach ($next_id as $row) {
		            $ai_id1 = $row['Auto_increment'];
		        }

		        for($i=0;$i<count($photosArray1);$i++) {

		        	$ext = pathinfo( $photosArray1[$i], PATHINFO_EXTENSION );
			        $file_name = basename( $path, '.' . $ext );
			        $ext_check = $this->Model_common->extension_check_photo($ext);
			        if($ext_check == FALSE) {
			        	continue;
			        }

		            $final_name = $ai_id1.'.'.$ext;

		            $form_data = array(
						'p_id'    => $id,
						'p_photo' => $final_name
		            );
		            $this->Model_package->add1($form_data);
		            
		            copy( $photosArray2[$i], './public/uploads/package_photos/'.$final_name );

		            $final_name_thumb = $ai_id1.'-thumb'.'.'.$ext;
		            $source_image = $photosArray2[$i];
		            $destination = './public/uploads/package_photos/'.$final_name_thumb;
		            $new_width = 340;
		            $new_height = 280;
		            $quality = 100;
		            $this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

		            $ai_id1 = $ai_id1 + 1;
		        }

		        for($i=0;$i<count($videosArray);$i++) {

		            if($videosArray[$i] == '') {
		                continue;
		            }

		            $form_data = array(
						'p_id'    => $id,
						'p_video' => $videosArray[$i]
		            );
		            $this->Model_package->add2($form_data);

		        }
		    	
				$success = 'Package is updated successfully';
				$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/package');
		    }
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/package/edit/'.$id);
		    }
           
		} else {
			$data['package'] = $this->Model_package->get_package($id);
            $this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_package_edit',$data);
			$this->load->view('admin/view_footer');
		}

	}

	public function delete_photo($pp_id=0,$p_id=0) {

		if( $pp_id == 0 || $p_id == 0 ) {
			redirect(base_url().'package');
		}

		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data['package_photo'] = $this->Model_package->get_package_photo($pp_id);
        if($data['package_photo']) {
            unlink('./public/uploads/package_photos/'.$data['package_photo']['p_photo']);
            $temp_arr = explode('.',$data['package_photo']['p_photo']);
			$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
			unlink('./public/uploads/package_photos/'.$temp_final);
        }

		$this->Model_package->delete_photo($pp_id);

		$success = 'Package Photo is deleted successfully';
		$this->session->set_flashdata('success',$success);
    	redirect(base_url().'admin/package/edit/'.$p_id);
	}

	public function delete_video($pv_id=0,$p_id=0) {

		if( $pv_id == 0 || $p_id == 0 ) {
			redirect(base_url().'package');
		}

		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->Model_package->delete_video($pv_id);
		$success = 'Package Video is deleted successfully';
		$this->session->set_flashdata('success',$success);
    	redirect(base_url().'admin/package/edit/'.$p_id);
	}


	public function delete($id) 
	{
    	$tot = $this->Model_package->package_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/package');
        	exit;
    	}

		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

    	$temp_arr = array();

        $data['package'] = $this->Model_package->get_package($id);
        if($data['package']) {
            unlink('./public/uploads/'.$data['package']['p_featured_photo']);
            unlink('./public/uploads/'.$data['package']['p_banner_photo']);
            $temp_arr = explode('.',$data['package']['p_featured_photo']);
			$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
			unlink('./public/uploads/'.$temp_final);
        }

        $this->Model_package->delete($id);

        $package_photos = $this->Model_package->get_package_photos($id);
        foreach($package_photos as $row) {
			unlink('./public/uploads/package_photos/'.$row['p_photo']);
            $temp_arr = explode('.',$row['p_photo']);
			$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
			unlink('./public/uploads/package_photos/'.$temp_final);
        }

        $this->Model_package->delete1($id);

        $success = 'Package is deleted successfully';
		$this->session->set_flashdata('success',$success);
    	redirect(base_url().'admin/package');
    }
    

}