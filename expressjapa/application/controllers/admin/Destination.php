<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destination extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_destination');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();
		$data['destination'] = $this->Model_destination->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_destination',$data);
		$this->load->view('admin/view_footer');
	}

	public function add()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$error = '';
		$success = '';
		$error = '';

		if(isset($_POST['form1'])) {

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$this->form_validation->set_rules('d_name', 'Designation Name', 'trim|required');

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
		        $error .= 'You must have to select a photo for featured photo<br>';
		    }

		    if($valid == 1) 
		    {
				$next_id = $this->Model_destination->get_auto_increment_id();
				foreach ($next_id as $row) {
		            $ai_id = $row['Auto_increment'];
		        }

				$final_name = 'destination-'.$ai_id.'.'.$ext;
		        copy( $path_tmp, './public/uploads/'.$final_name );

				$final_name_thumb = 'destination-'.$ai_id.'-thumb'.'.'.$ext;
				$source_image = $path_tmp;
				$destination = './public/uploads/'.$final_name_thumb;
				$new_width = 360;
			  	$new_height = 240;
			 	$quality = 100;
			 	$this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

				$final_name1 = 'destination-banner-'.$ai_id.'.'.$ext1;
		        move_uploaded_file( $path_tmp1, './public/uploads/'.$final_name1 );

		        $form_data = array(
					'd_name'               => $_POST['d_name'],
					'd_featured_photo'     => $final_name,
					'd_banner_photo'       => $final_name1,
					'd_heading'            => $_POST['d_heading'],
					'd_short_description'  => $_POST['d_short_description'],
					'd_package_heading'    => $_POST['d_package_heading'],
					'd_package_subheading' => $_POST['d_package_subheading'],
					'd_detail_heading'     => $_POST['d_detail_heading'],
					'd_detail_subheading'  => $_POST['d_detail_subheading'],
					'd_introduction'       => $_POST['d_introduction'],
					'd_experience'         => $_POST['d_experience'],
					'd_weather'            => $_POST['d_weather'],
					'd_hotel'              => $_POST['d_hotel'],
					'd_transportation'     => $_POST['d_transportation'],
					'd_culture'            => $_POST['d_culture'],
					'meta_title'           => $_POST['meta_title'],
					'meta_keyword'         => $_POST['meta_keyword'],
					'meta_description'     => $_POST['meta_description']
	            );
	            $this->Model_destination->add($form_data);

		        $success = 'Destination is added successfully!';
				$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/destination');
		    } 
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/destination/add');
		    }
            
        } else {
            $this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_destination_add',$data);
			$this->load->view('admin/view_footer');
        }
		
	}





	public function edit($id)
	{
		
    	// If there is no service in this id, then redirect
    	$tot = $this->Model_destination->destination_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/destination');
        	exit;
    	}
       	
       	$data['setting'] = $this->Model_common->get_setting_data();
		$error = '';
		$success = '';


		if(isset($_POST['form1'])) 
		{

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$this->form_validation->set_rules('d_name', 'Designation Name', 'trim|required');

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

		    if($valid == 1) 
		    {
		    	$data['destination'] = $this->Model_destination->get_destination($id);

		    	if($path == '' && $path1 == '') {
		    		$form_data = array(
						'd_name'               => $_POST['d_name'],
						'd_heading'            => $_POST['d_heading'],
						'd_short_description'  => $_POST['d_short_description'],
						'd_package_heading'    => $_POST['d_package_heading'],
						'd_package_subheading' => $_POST['d_package_subheading'],
						'd_detail_heading'     => $_POST['d_detail_heading'],
						'd_detail_subheading'  => $_POST['d_detail_subheading'],
						'd_introduction'       => $_POST['d_introduction'],
						'd_experience'         => $_POST['d_experience'],
						'd_weather'            => $_POST['d_weather'],
						'd_hotel'              => $_POST['d_hotel'],
						'd_transportation'     => $_POST['d_transportation'],
						'd_culture'            => $_POST['d_culture'],
						'meta_title'           => $_POST['meta_title'],
						'meta_keyword'         => $_POST['meta_keyword'],
						'meta_description'     => $_POST['meta_description']
		            );
		            $this->Model_destination->update($id,$form_data);
				}

				if($path != '' && $path1 == '') {

					// Featured Photo Change
					unlink('./public/uploads/'.$data['destination']['d_featured_photo']);
					$final_name = 'destination-'.$id.'.'.$ext;
		        	copy( $path_tmp, './public/uploads/'.$final_name );

		        	$temp_arr = explode('.',$data['destination']['d_featured_photo']);
					$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
					unlink('./public/uploads/'.$temp_final);

		        	$final_name_thumb = 'destination-'.$id.'-thumb'.'.'.$ext;
					$source_image = $path_tmp;
					$destination = './public/uploads/'.$final_name_thumb;
					$new_width = 360;
				  	$new_height = 240;
				 	$quality = 100;
				 	$this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

				 	$form_data = array(
						'd_name'               => $_POST['d_name'],
						'd_featured_photo'     => $final_name,
						'd_heading'            => $_POST['d_heading'],
						'd_short_description'  => $_POST['d_short_description'],
						'd_package_heading'    => $_POST['d_package_heading'],
						'd_package_subheading' => $_POST['d_package_subheading'],
						'd_detail_heading'     => $_POST['d_detail_heading'],
						'd_detail_subheading'  => $_POST['d_detail_subheading'],
						'd_introduction'       => $_POST['d_introduction'],
						'd_experience'         => $_POST['d_experience'],
						'd_weather'            => $_POST['d_weather'],
						'd_hotel'              => $_POST['d_hotel'],
						'd_transportation'     => $_POST['d_transportation'],
						'd_culture'            => $_POST['d_culture'],
						'meta_title'           => $_POST['meta_title'],
						'meta_keyword'         => $_POST['meta_keyword'],
						'meta_description'     => $_POST['meta_description']
		            );
		            $this->Model_destination->update($id,$form_data);
				}

				if($path == '' && $path1 != '') {

					// Banner Photo Change
					unlink('./public/uploads/'.$_POST['current_banner']);

					$final_name1 = 'destination-banner-'.$id.'.'.$ext1;
		        	copy( $path_tmp1, './public/uploads/'.$final_name1 );

		        	$form_data = array(
						'd_name'               => $_POST['d_name'],
						'd_banner_photo'       => $final_name1,
						'd_heading'            => $_POST['d_heading'],
						'd_short_description'  => $_POST['d_short_description'],
						'd_package_heading'    => $_POST['d_package_heading'],
						'd_package_subheading' => $_POST['d_package_subheading'],
						'd_detail_heading'     => $_POST['d_detail_heading'],
						'd_detail_subheading'  => $_POST['d_detail_subheading'],
						'd_introduction'       => $_POST['d_introduction'],
						'd_experience'         => $_POST['d_experience'],
						'd_weather'            => $_POST['d_weather'],
						'd_hotel'              => $_POST['d_hotel'],
						'd_transportation'     => $_POST['d_transportation'],
						'd_culture'            => $_POST['d_culture'],
						'meta_title'           => $_POST['meta_title'],
						'meta_keyword'         => $_POST['meta_keyword'],
						'meta_description'     => $_POST['meta_description']
		            );
		            $this->Model_destination->update($id,$form_data);
				}

				if($path != '' && $path1 != '') {

					// Featured Photo Change
					unlink('./public/uploads/'.$data['destination']['d_featured_photo']);
					$final_name = 'destination-'.$id.'.'.$ext;
		        	copy( $path_tmp, './public/uploads/'.$final_name );

		        	$temp_arr = explode('.',$data['destination']['d_featured_photo']);
					$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
					unlink('./public/uploads/'.$temp_final);

		        	$final_name_thumb = 'destination-'.$id.'-thumb'.'.'.$ext;
					$source_image = $path_tmp;
					$destination = './public/uploads/'.$final_name_thumb;
					$new_width = 360;
				  	$new_height = 240;
				 	$quality = 100;
				 	$this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

				 	// Banner Photo Change
				 	unlink('./public/uploads/'.$_POST['current_banner']);

					$final_name1 = 'destination-banner-'.$id.'.'.$ext1;
		        	copy( $path_tmp1, './public/uploads/'.$final_name1 );

					$form_data = array(
						'd_name'               => $_POST['d_name'],
						'd_featured_photo'     => $final_name,
						'd_banner_photo'       => $final_name1,
						'd_heading'            => $_POST['d_heading'],
						'd_short_description'  => $_POST['d_short_description'],
						'd_package_heading'    => $_POST['d_package_heading'],
						'd_package_subheading' => $_POST['d_package_subheading'],
						'd_detail_heading'     => $_POST['d_detail_heading'],
						'd_detail_subheading'  => $_POST['d_detail_subheading'],
						'd_introduction'       => $_POST['d_introduction'],
						'd_experience'         => $_POST['d_experience'],
						'd_weather'            => $_POST['d_weather'],
						'd_hotel'              => $_POST['d_hotel'],
						'd_transportation'     => $_POST['d_transportation'],
						'd_culture'            => $_POST['d_culture'],
						'meta_title'           => $_POST['meta_title'],
						'meta_keyword'         => $_POST['meta_keyword'],
						'meta_description'     => $_POST['meta_description']
		            );
		            $this->Model_destination->update($id,$form_data);
				}
		    	
				$success = 'Destination is updated successfully';
				$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/destination');
		    }
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/destination/edit/'.$id);
		    }
           
		} else {
			$data['destination'] = $this->Model_destination->get_destination($id);
            $this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_destination_edit',$data);
			$this->load->view('admin/view_footer');
		}

	}


	public function delete($id) 
	{
		// If there is no destination in this id, then redirect
    	$tot = $this->Model_destination->destination_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/destination');
        	exit;
    	}

		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

    	// Check if there is a package in this destination. If found, destination can not be deleted.
    	$status = $this->Model_destination->check_package($id);
    	if($status) 
    	{
    		$error = 'Destination can not be deleted because there is package under this';
    		$this->session->set_flashdata('error',$error);
    		redirect(base_url().'admin/destination');
    	} 
    	else 
    	{
    		$data['destination'] = $this->Model_destination->get_destination($id);
	        if($data['destination']) {
	            unlink('./public/uploads/'.$data['destination']['d_featured_photo']);
	            unlink('./public/uploads/'.$data['destination']['d_banner_photo']);
	            $temp_arr = explode('.',$data['destination']['d_featured_photo']);
				$temp_final = $temp_arr[0].'-thumb'.'.'.$temp_arr[1];
				unlink('./public/uploads/'.$temp_final);
	        }

	        $this->Model_destination->delete($id);
	        $success = 'Destination is deleted successfully';
	        $this->session->set_flashdata('success',$success);
    		redirect(base_url().'admin/destination');
    	}
        
		
    }
    

}