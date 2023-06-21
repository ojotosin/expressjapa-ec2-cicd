<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_service');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$data['service'] = $this->Model_service->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_service',$data);
		$this->load->view('admin/view_footer');
	}

	public function add()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$error = '';
		$success = '';

		if(isset($_POST['form1'])) {

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('short_description', 'Short Description', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
			$this->form_validation->set_rules('icon', 'Icon', 'trim|required');

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
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for banner<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error .= 'You must have to select a photo for banner<br>';
		    }

		    if($valid == 1) 
		    {
				$next_id = $this->Model_service->get_auto_increment_id();
				foreach ($next_id as $row) {
		            $ai_id = $row['Auto_increment'];
		        }

		        $final_name = 'service-'.$ai_id.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		        $final_name1 = 'service-banner-'.$ai_id.'.'.$ext1;
		        move_uploaded_file( $path_tmp1, './public/uploads/'.$final_name1 );

		        $form_data = array(
					'name'              => $_POST['name'],
					'short_description' => $_POST['short_description'],
					'description'       => $_POST['description'],
					'icon'              => $_POST['icon'],
					'photo'             => $final_name,
					'banner'            => $final_name1,
					'meta_title'        => $_POST['meta_title'],
					'meta_keyword'      => $_POST['meta_keyword'],
					'meta_description'  => $_POST['meta_description']
	            );
	            $this->Model_service->add($form_data);

		        $success = 'Service is added successfully!';
		        $this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/service');
		    } 
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/service/add');
		    }
            
        } else {
            
            $this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_service_add',$data);
			$this->load->view('admin/view_footer');
        }
		
	}


	public function edit($id)
	{
		
    	// If there is no service in this id, then redirect
    	$tot = $this->Model_service->service_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/service');
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

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('short_description', 'Short Description', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
			$this->form_validation->set_rules('icon', 'Icon', 'trim|required');

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
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for banner<br>';
		        }
		    }

		    if($valid == 1) 
		    {
		    	$data['service'] = $this->Model_service->getData($id);

		    	if($path == '' && $path1 == '') {
		    		$form_data = array(
						'name'              => $_POST['name'],
						'short_description' => $_POST['short_description'],
						'description'       => $_POST['description'],
						'icon'              => $_POST['icon'],
						'meta_title'        => $_POST['meta_title'],
						'meta_keyword'      => $_POST['meta_keyword'],
						'meta_description'  => $_POST['meta_description']
		            );
		            $this->Model_service->update($id,$form_data);
				}
				if($path != '' && $path1 == '') {
					unlink('./public/uploads/'.$data['service']['photo']);

					$final_name = 'service-'.$id.'.'.$ext;
		        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		        	$form_data = array(
						'name'              => $_POST['name'],
						'short_description' => $_POST['short_description'],
						'description'       => $_POST['description'],
						'icon'              => $_POST['icon'],
						'photo'             => $final_name,
						'meta_title'        => $_POST['meta_title'],
						'meta_keyword'      => $_POST['meta_keyword'],
						'meta_description'  => $_POST['meta_description']
		            );
		            $this->Model_service->update($id,$form_data);
				}
				if($path == '' && $path1 != '') {
					unlink('./public/uploads/'.$data['service']['banner']);

					$final_name1 = 'service-banner-'.$id.'.'.$ext1;
		        	move_uploaded_file( $path_tmp1, './public/uploads/'.$final_name1 );

		        	$form_data = array(
						'name'              => $_POST['name'],
						'short_description' => $_POST['short_description'],
						'description'       => $_POST['description'],
						'icon'              => $_POST['icon'],
						'banner'            => $final_name1,
						'meta_title'        => $_POST['meta_title'],
						'meta_keyword'      => $_POST['meta_keyword'],
						'meta_description'  => $_POST['meta_description']
		            );
		            $this->Model_service->update($id,$form_data);
				}
				if($path != '' && $path1 != '') {

					unlink('./public/uploads/'.$data['service']['photo']);
					unlink('./public/uploads/'.$data['service']['banner']);

					$final_name = 'service-'.$id.'.'.$ext;
		        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

					$final_name1 = 'service-banner-'.$id.'.'.$ext1;
		        	move_uploaded_file( $path_tmp1, './public/uploads/'.$final_name1 );

		        	$form_data = array(
						'name'              => $_POST['name'],
						'short_description' => $_POST['short_description'],
						'description'       => $_POST['description'],
						'icon'              => $_POST['icon'],
						'photo'             => $final_name,
						'banner'            => $final_name1,
						'meta_title'        => $_POST['meta_title'],
						'meta_keyword'      => $_POST['meta_keyword'],
						'meta_description'  => $_POST['meta_description']
		            );
		            $this->Model_service->update($id,$form_data);
				}

				$success = 'Service is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/service');
		    }
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/service/edit/'.$id);
		    }
           
		} else {
			$data['service'] = $this->Model_service->getData($id);
	       	$this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_service_edit',$data);
			$this->load->view('admin/view_footer');
		}

	}


	public function delete($id) 
	{
		// If there is no service in this id, then redirect
    	$tot = $this->Model_service->service_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/service');
        	exit;
    	}

		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

        $data['service'] = $this->Model_service->getData($id);
        if($data['service']) {
            unlink('./public/uploads/'.$data['service']['photo']);
            unlink('./public/uploads/'.$data['service']['banner']);
        }

        $this->Model_service->delete($id);
        $success = 'Service is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'admin/service');
    }

}