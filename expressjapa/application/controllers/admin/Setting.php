<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_setting');
    }
	public function index()
	{
		$error = '';
		$success = '';

		$data['setting'] = $this->Model_common->get_setting_data();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_setting',$data);
		$this->load->view('admin/view_footer');
		
	}
	public function update()
	{
		$error = '';
		$success = '';

		$data['setting'] = $this->Model_common->get_setting_data();

		if(isset($_POST['form_logo'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;
			$path = $_FILES['photo_logo']['name'];
		    $path_tmp = $_FILES['photo_logo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	// removing the existing photo
		    	unlink('./public/uploads/'.$data['setting']['logo']);

		    	// updating the data
		    	$final_name = 'logo'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );
		    			        
				$form_data = array(
					'logo' => $final_name
	            );
	        	$this->Model_setting->update($form_data);

	        	$success = 'Logo is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_favicon'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo_favicon']['name'];
		    $path_tmp = $_FILES['photo_favicon']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	// removing the existing photo
		    	unlink('./public/uploads/'.$data['setting']['favicon']);

		    	// updating the data
		    	$final_name = 'favicon'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );
		    			        
				$form_data = array(
					'favicon' => $final_name
	            );
	        	$this->Model_setting->update($form_data);

	        	$success = 'Favicon is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_general'])) {	
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}		
        	$form_data = array(
				'footer_copyright' => $_POST['footer_copyright'],
				'footer_address'   => $_POST['footer_address'],
				'footer_email'     => $_POST['footer_email'],
				'footer_phone'     => $_POST['footer_phone'],
				'top_bar_email'    => $_POST['top_bar_email'],
				'top_bar_phone'    => $_POST['top_bar_phone']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'General Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}


		if(isset($_POST['form_email'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'send_email_from'  => $_POST['send_email_from'],
				'receive_email_to' => $_POST['receive_email_to'],
				'smtp_host'        => $_POST['smtp_host'],
				'smtp_port'        => $_POST['smtp_port'],
				'smtp_username'    => $_POST['smtp_username'],
				'smtp_password'    => $_POST['smtp_password']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Email Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}

		if(isset($_POST['form_captcha'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'recaptcha_site_key' => $_POST['recaptcha_site_key'],
				'recaptcha_status' => $_POST['recaptcha_status']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Captcha Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}

		if(isset($_POST['form_other'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'preloader' => $_POST['preloader'],
				'website_name' => $_POST['website_name']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Other Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}

		if(isset($_POST['form_news_tours'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'total_recent_news_footer'    => $_POST['total_recent_news_footer'],
				'total_upcoming_tour_footer'  => $_POST['total_upcoming_tour_footer'],
				'total_featured_tour_footer'  => $_POST['total_featured_tour_footer'],
				'total_recent_news_sidebar'   => $_POST['total_recent_news_sidebar'],
				'total_recent_news_home_page' => $_POST['total_recent_news_home_page']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'News and Tour Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}


		if(isset($_POST['form_home_service'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'home_title_service'    => $_POST['home_title_service'],
				'home_subtitle_service' => $_POST['home_subtitle_service'],
				'home_status_service'   => $_POST['home_status_service']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Service Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}

		if(isset($_POST['form_home_team_member'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'home_title_team_member'    => $_POST['home_title_team_member'],
				'home_subtitle_team_member' => $_POST['home_subtitle_team_member'],
				'home_status_team_member'   => $_POST['home_status_team_member']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Team Member Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}

		if(isset($_POST['form_home_counter_text'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'counter_1_title' => $_POST['counter_1_title'],
				'counter_1_value' => $_POST['counter_1_value'],
				'counter_2_title' => $_POST['counter_2_title'],
				'counter_2_value' => $_POST['counter_2_value'],
				'counter_3_title' => $_POST['counter_3_title'],
				'counter_3_value' => $_POST['counter_3_value'],
				'counter_4_title' => $_POST['counter_4_title'],
				'counter_4_value' => $_POST['counter_4_value'],
				'counter_status'  => $_POST['counter_status']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Counter Text Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}

		if(isset($_POST['form_home_counter_photo'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['counter_photo']['name'];
		    $path_tmp = $_FILES['counter_photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	// removing the existing photo
		    	unlink('./public/uploads/'.$data['setting']['counter_photo']);

		    	// updating the data
		    	$final_name = 'counter'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );
		    			        
				$form_data = array(
					'counter_photo' => $final_name
	            );
	        	$this->Model_setting->update($form_data);

	        	$success = 'Counter Photo is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}

		if(isset($_POST['form_home_testimonial_text'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'home_title_testimonial'    => $_POST['home_title_testimonial'],
				'home_subtitle_testimonial' => $_POST['home_subtitle_testimonial'],
				'home_status_testimonial'   => $_POST['home_status_testimonial']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Testimonial Text Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}


		if(isset($_POST['form_home_testimonial_photo'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['home_photo_testimonial']['name'];
		    $path_tmp = $_FILES['home_photo_testimonial']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	// removing the existing photo
		    	unlink('./public/uploads/'.$data['setting']['home_photo_testimonial']);

		    	// updating the data
		    	$final_name = 'testimonial'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );
		    			        
				$form_data = array(
					'home_photo_testimonial' => $final_name
	            );
	        	$this->Model_setting->update($form_data);

	        	$success = 'Testimonial Photo is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_home_news'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'home_title_news'    => $_POST['home_title_news'],
				'home_subtitle_news' => $_POST['home_subtitle_news'],
				'home_status_news'   => $_POST['home_status_news']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'News Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}

		if(isset($_POST['form_home_client'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'home_title_client'    => $_POST['home_title_client'],
				'home_subtitle_client' => $_POST['home_subtitle_client'],
				'home_status_client'   => $_POST['home_status_client']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Client Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}

		if(isset($_POST['form_home_destination'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'home_title_destination'    => $_POST['home_title_destination'],
				'home_subtitle_destination' => $_POST['home_subtitle_destination'],
				'home_status_destination'   => $_POST['home_status_destination']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Destination Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}

		if(isset($_POST['form_home_featured_package'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'home_title_featured_package'    => $_POST['home_title_featured_package'],
				'home_subtitle_featured_package' => $_POST['home_subtitle_featured_package'],
				'home_status_featured_package'   => $_POST['home_status_featured_package']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Featured Package Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}

		if(isset($_POST['form_color'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'front_end_color' => $_POST['front_end_color']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Front End Color Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}

		if(isset($_POST['form_banner_about'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_about']);
		    	$final_name = 'banner_about'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_about' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'About Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}

		if(isset($_POST['form_banner_faq'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_faq']);
		    	$final_name = 'banner_faq'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_faq' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'FAQ Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_service'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_service']);
		    	$final_name = 'banner_service'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_service' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Service Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_testimonial'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_testimonial']);
		    	$final_name = 'banner_testimonial'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_testimonial' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Testimonial Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_news'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_news']);
		    	$final_name = 'banner_news'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_news' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'News Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_contact'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_contact']);
		    	$final_name = 'banner_contact'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_contact' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Contact Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_search'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_search']);
		    	$final_name = 'banner_search'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_search' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Search Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_category'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_category']);
		    	$final_name = 'banner_category'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_category' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Category Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_terms'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_terms']);
		    	$final_name = 'banner_terms'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_terms' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Terms and Conditions Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}

		if(isset($_POST['form_banner_privacy'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_privacy']);
		    	$final_name = 'banner_privacy'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_privacy' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Privacy Policy Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}

		if(isset($_POST['form_banner_destination'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_destination']);
		    	$final_name = 'banner_destination'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_destination' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Destination Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_team'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_team']);
		    	$final_name = 'banner_team'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_team' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Team Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_payment'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_payment']);
		    	$final_name = 'banner_payment'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_payment' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Payment Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_payment_success'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_payment_success']);
		    	$final_name = 'banner_payment_success'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_payment_success' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Payment Success Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_payment_pending'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_payment_pending']);
		    	$final_name = 'banner_payment_pending'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_payment_pending' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Payment Pending Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_banner_registration'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_registration']);
		    	$final_name = 'banner_registration'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_registration' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Registration Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}

		if(isset($_POST['form_banner_login'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_login']);
		    	$final_name = 'banner_login'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_login' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Login Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}

		if(isset($_POST['form_banner_forget_password'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_forget_password']);
		    	$final_name = 'banner_forget_password'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_forget_password' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Forget Password Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}

		if(isset($_POST['form_banner_reset_password'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_reset_password']);
		    	$final_name = 'banner_reset_password'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_reset_password' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Reset Password Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}

		if(isset($_POST['form_banner_reset_password_success'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_reset_password_success']);
		    	$final_name = 'banner_reset_password_success'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_reset_password_success' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Reset Password Success Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}

		if(isset($_POST['form_banner_verify_registration'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_verify_registration']);
		    	$final_name = 'banner_verify_registration'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_verify_registration' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Verify Registration Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}

		if(isset($_POST['form_banner_verify_subscriber'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	unlink('./public/uploads/'.$data['setting']['banner_verify_subscriber']);
		    	$final_name = 'banner_verify_subscriber'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );		    			        
				$form_data = array(
					'banner_verify_subscriber' => $final_name
	            );
	        	$this->Model_setting->update($form_data);
	        	$success = 'Verify Subscriber Page Banner is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}


		if(isset($_POST['form_payment'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'paypal_email'      => $_POST['paypal_email'],
				'stripe_public_key' => $_POST['stripe_public_key'],
				'stripe_secret_key' => $_POST['stripe_secret_key'],
				'bank_detail'       => $_POST['bank_detail']
            );
        	$this->Model_setting->update($form_data);   	
        	$success = 'Payment Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}


		if(isset($_POST['form_newsletter_text'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
	    	$form_data = array(
				'newsletter_title'  => $_POST['newsletter_title'],
				'newsletter_text'   => $_POST['newsletter_text'],
				'newsletter_status' => $_POST['newsletter_status']
	        );
	    	$this->Model_setting->update($form_data);   	
	    	$success = 'Newsletter Text Setting is updated successfully!';
	    	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/setting');
		}


		if(isset($_POST['form_newsletter_photo'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			$valid = 1;
			$path = $_FILES['newsletter_photo']['name'];
		    $path_tmp = $_FILES['newsletter_photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	// removing the existing photo
		    	unlink('./public/uploads/'.$data['setting']['newsletter_photo']);

		    	// updating the data
		    	$final_name = 'newsletter'.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );
		    			        
				$form_data = array(
					'newsletter_photo' => $final_name
	            );
	        	$this->Model_setting->update($form_data);

	        	$success = 'Newsletter Photo is updated successfully!';
		    	$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/setting');
		    } else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/setting');
		    }
		}
	


		$data['setting'] = $this->Model_common->get_setting_data();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_setting',$data);
		$this->load->view('admin/view_footer');
	}

}
