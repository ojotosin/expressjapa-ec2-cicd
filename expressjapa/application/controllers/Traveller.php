<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Traveller extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_traveller');
    }

	public function dashboard()
	{
		if(!$this->session->userdata('traveller_id')) {
			redirect(base_url());
		} else {
			$tot = $this->Model_traveller->check_traveller($this->session->userdata('traveller_id'));
	    	if($tot) {
	    		redirect(base_url());
	    	}
		}
		$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

		//$data['team_members'] = $this->Model_team->all_team_member();

		$this->load->view('view_header',$data);
		$this->load->view('view_traveller_dashboard',$data);
		$this->load->view('view_footer',$data);
	}

	public function payment_history()
	{
		if(!$this->session->userdata('traveller_id')) {
			redirect(base_url());
		} else {
			$tot = $this->Model_traveller->check_traveller($this->session->userdata('traveller_id'));
	    	if($tot) {
	    		redirect(base_url());
	    	}
		}
		$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

		$data['tpayment'] = $this->Model_traveller->payment_history($this->session->userdata('traveller_id'));

		$this->load->view('view_header',$data);
		$this->load->view('view_traveller_payment_history',$data);
		$this->load->view('view_footer',$data);
	}

	public function registration() {
		$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

		$this->load->view('view_header',$data);
		$this->load->view('view_registration',$data);
		$this->load->view('view_footer',$data);
	}

	public function registration_add()
	{		
		$error = '';
		$success = '';

		$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

		$error = '';

		if(isset($_POST['form_registration'])) 
		{

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$traveller_name = $this->input->post('traveller_name',true);
			$traveller_email = $this->input->post('traveller_email',true);
			$traveller_phone = $this->input->post('traveller_phone',true);
			$traveller_address = $this->input->post('traveller_address',true);
			$traveller_city = $this->input->post('traveller_city',true);
			$traveller_state = $this->input->post('traveller_state',true);
			$traveller_country = $this->input->post('traveller_country',true);
			$traveller_password = $this->input->post('traveller_password',true);
			$traveller_re_password = $this->input->post('traveller_re_password',true);

			if($traveller_name == '')
			{
				$valid = 0;
				$error .= 'Name can not be empty<br>';
			}

			if($traveller_email == '')
			{
				$valid = 0;
				$error .= 'Email can not be empty<br>';
			}
			else
		    {
		    	// Email validation check
		        if(!filter_var($traveller_email, FILTER_VALIDATE_EMAIL))
		        {
		            $valid = 0;
		            $error .= 'Email address must be valid<br>';
		        }
		        else
		        {
		        	$tot = 0;
		        	$tot = $this->Model_traveller->traveller_registration_check($traveller_email);
		        	if($tot==1) {
		        		$error .= 'Email Address Already Exists<br>';
		        	}
		        }
		    }

			if($traveller_phone == '')
			{
				$valid = 0;
				$error .= 'Phone can not be empty<br>';
			}

			if($traveller_address == '')
			{
				$valid = 0;
				$error .= 'Address can not be empty<br>';
			}

			if($traveller_city == '')
			{
				$valid = 0;
				$error .= 'City can not be empty<br>';
			}

			if($traveller_state == '')
			{
				$valid = 0;
				$error .= 'State can not be empty<br>';
			}

			if($traveller_country == '')
			{
				$valid = 0;
				$error .= 'Country can not be empty<br>';
			}

			if($traveller_password == '' || $traveller_re_password == '')
            {
            	$valid = 0;
            	$error .= 'Password or Retype Password can not be empty<br>';
            }
            else
            {
            	if($traveller_password != $traveller_re_password)
            	{
            		$valid = 0;
            		$error .= 'Passwords do not match<br>';
            	}
            }

			if($data['setting']['recaptcha_status'] == 'Show') {
				if(empty($_POST['g-recaptcha-response'])) {
					$valid = 0;
					$error .= 'Please check the the captcha form.<br>';
				}
			}
            

		    if($valid == 1)
		    {
		    	$token = md5(uniqid(rand(), true));

		    	$form_data = array(
					'traveller_name'     => $_POST['traveller_name'],
					'traveller_email'    => $_POST['traveller_email'],
					'traveller_phone'    => $_POST['traveller_phone'],
					'traveller_address'  => $_POST['traveller_address'],
					'traveller_city'     => $_POST['traveller_city'],
					'traveller_state'    => $_POST['traveller_state'],
					'traveller_country'  => $_POST['traveller_country'],
					'traveller_password' => md5($_POST['traveller_password']),
					'traveller_token'    => $token,
					'traveller_access'   => 0
	            );
	            $this->Model_traveller->registration_add($form_data);

	            $verify_link = base_url().'traveller/registration_verify/'.$traveller_email.'/'.$token;

		    	$msg = 'Thank you for signing up! <br><br>
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br><br>
Please click this link to activate your account:<br>
<a href="'.$verify_link.'">'.$verify_link.'</a>';

				$config = [
					'protocol' => 'smtp',
					'smtp_host' => $data['setting']['smtp_host'],
					'smtp_port' => $data['setting']['smtp_port'],
					'smtp_user' => $data['setting']['smtp_username'],
					'smtp_pass' => $data['setting']['smtp_password'],
					'crlf' => "\r\n",
					'newline' => "\r\n",
					'mailtype'  => 'html',
					'charset'   => 'utf-8'
				];

				$this->load->library('email', $config);

				$this->email->from($data['setting']['send_email_from']);
				$this->email->to($traveller_email);
				$this->email->reply_to($data['setting']['send_email_from']);

				$this->email->subject('Registration Confirmation');
				$this->email->message($msg);

				$this->email->send();


				$success = 'Your registration is completed. Please check your email address to follow the process to confirm your registration. Check your spam folder also.';
        		$this->session->set_flashdata('success',$success);
		    }

		    else
		    {
		    	$form_data = array(
					'traveller_name'    => $_POST['traveller_name'],
					'traveller_email'   => $_POST['traveller_email'],
					'traveller_phone'   => $_POST['traveller_phone'],
					'traveller_address' => $_POST['traveller_address'],
					'traveller_city'    => $_POST['traveller_city'],
					'traveller_state'   => $_POST['traveller_state'],
					'traveller_country' => $_POST['traveller_country']
		        );
		        $this->session->set_flashdata('form_data', $form_data);
		    	$this->session->set_flashdata('error',$error);
		    }
		    redirect($this->agent->referrer());
		}
		else 
		{
			redirect($this->agent->referrer());
		}

		
	}

	function registration_verify($email=0,$token=0) {

		if(!$email || !$token ) {
			redirect(base_url());
		}

		$tot = $this->Model_traveller->registration_confirm_check_url($email,$token);
		if(!$tot) {
			redirect(base_url());
		}

		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

		$form_data = array(
			'traveller_token' => '',
			'traveller_access' => 1
        );
        $this->Model_traveller->registration_confirm_update($email,$token,$form_data);

		$this->load->view('view_header',$data);
		$this->load->view('view_thankyou',$data);
		$this->load->view('view_footer',$data);
	}

    public function login()
    {
        $data['setting'] = $this->Model_common->all_setting();
        $data['page'] = $this->Model_common->all_page();
        $data['comment'] = $this->Model_common->all_comment();
        $data['social'] = $this->Model_common->all_social();
        $data['featured_packages'] = $this->Model_common->all_featured_packages();
        $data['packages'] = $this->Model_common->all_package();
        $data['all_news'] = $this->Model_common->all_news();

        $error = '';
        
        if(isset($_POST['form1'])) {

            // Getting the form data
            $traveller_email = $this->input->post('traveller_email',true);
            $traveller_password = $this->input->post('traveller_password',true);

            // Checking the email address
            $un = $this->Model_traveller->login_check_email($traveller_email);

            if(!$un) {
                $error = 'Email address is wrong!';
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'traveller/login');
            }
			
			// When email found, checking the password
			$pw = $this->Model_traveller->login_check_password($traveller_email,$traveller_password);

			if(!$pw) {				
				$error = 'Password is wrong!';
				$this->session->set_flashdata('error',$error);
				redirect(base_url().'traveller/login');
			}

			if($data['setting']['recaptcha_status'] == 'Show') {
				if(empty($_POST['g-recaptcha-response'])) {
					$error = 'Please check the the captcha form.<br>';
				}
			}

			// When email and password both are correct
			$array = array(
				'traveller_id' => $pw['traveller_id'],
				'traveller_name' => $pw['traveller_name'],
				'traveller_email' => $pw['traveller_email'],
				'traveller_phone' => $pw['traveller_phone'],
				'traveller_address' => $pw['traveller_address'],
				'traveller_city' => $pw['traveller_city'],
				'traveller_state' => $pw['traveller_state'],
				'traveller_country' => $pw['traveller_country'],
				'traveller_password' => $pw['traveller_password'],
				'traveller_token' => $pw['traveller_token'],
				'traveller_access' => $pw['traveller_access']
			);
			$this->session->set_userdata($array);
			redirect(base_url().'traveller/dashboard');

        } else {
            $this->load->view('view_header',$data);
            $this->load->view('view_login',$data); 
            $this->load->view('view_footer',$data);   
        }
        
    }

    function logout() {
        $this->session->sess_destroy();
        redirect(base_url().'traveller/login');
    }

    function profile_update() {

    	if(!$this->session->userdata('traveller_id')) {
			redirect(base_url());
		} else {
			$tot = $this->Model_traveller->check_traveller($this->session->userdata('traveller_id'));
	    	if($tot) {
	    		redirect(base_url());
	    	}
		}

		$error = '';
		$success = '';

		$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

		if (isset($_POST['form1'])) {

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$this->form_validation->set_rules('traveller_name', 'Traveller Name', 'trim|required');
			$this->form_validation->set_rules('traveller_phone', 'Traveller Phone', 'trim|required');
			$this->form_validation->set_rules('traveller_address', 'Traveller Address', 'trim|required');
			$this->form_validation->set_rules('traveller_city', 'Traveller City', 'trim|required');
			$this->form_validation->set_rules('traveller_state', 'Traveller State', 'trim|required');
			$this->form_validation->set_rules('traveller_country', 'Traveller Country', 'trim|required');
            $this->form_validation->set_error_delimiters('', '<br>');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

            if( !(empty($_POST['traveller_password']) && empty($_POST['traveller_re_password'])) ) {
		        if($_POST['traveller_password'] != $_POST['traveller_re_password']) {
			    	$valid = 0;
			        $error .= "Passwords do not match. Try again.";	
		    	}
		    }

		    if($valid == 1) {
		    	if( !(empty($_POST['traveller_password']) && empty($_POST['traveller_re_password'])) ) {
		    		$form_data = array(
						'traveller_name'     => $_POST['traveller_name'],
						'traveller_phone'    => $_POST['traveller_phone'],
						'traveller_address'  => $_POST['traveller_address'],
						'traveller_city'     => $_POST['traveller_city'],
						'traveller_state'    => $_POST['traveller_state'],
						'traveller_country'  => $_POST['traveller_country'],
						'traveller_password' => md5($_POST['traveller_password'])
		            );
		    	} else {
		    		$form_data = array(
						'traveller_name'     => $_POST['traveller_name'],
						'traveller_phone'    => $_POST['traveller_phone'],
						'traveller_address'  => $_POST['traveller_address'],
						'traveller_city'     => $_POST['traveller_city'],
						'traveller_state'    => $_POST['traveller_state'],
						'traveller_country'  => $_POST['traveller_country']
		            );
		    	}
		    	
	        	$this->Model_traveller->traveller_profile_update($form_data,$this->session->userdata('traveller_id'));
	        	$success = 'Information is updated successfully!';
        		$this->session->set_flashdata('success',$success);

        		$this->session->set_userdata($form_data);

        		redirect(base_url().'traveller/profile_update');
		    }
		    else {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'traveller/profile_update');
		    }


		} else {
			$this->load->view('view_header',$data);
			$this->load->view('view_traveller_profile_update',$data);
			$this->load->view('view_footer',$data);	
		}		
    }


    public function forget_password()
    {
        $data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

        $error = '';
        $success = '';

        if(isset($_POST['form1'])) {

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

            $valid = 1;

            $traveller_email = $this->input->post('traveller_email',true);

            if($traveller_email == '')
			{
				$valid = 0;
				$error .= 'Email can not be empty<br>';
			}
			else
		    {
		    	// Email validation check
		        if(!filter_var($traveller_email, FILTER_VALIDATE_EMAIL))
		        {
		            $valid = 0;
		            $error .= 'Email address must be valid<br>';
		        }
		        else
		        {
		        	$tot = $this->Model_traveller->forget_password_check_email($traveller_email);
	                if(!$tot) {
	                    $valid = 0;
	                    $error .= 'You email address is not found in our system.<br>';
	                }
		        }
		    }
            
			if($data['setting']['recaptcha_status'] == 'Show') {
				if(empty($_POST['g-recaptcha-response'])) {
					$error .= 'Please check the the captcha form.<br>';
				}
			}
             

            if($valid == 1) {

                $token = md5(rand());

                // Update Database
                $form_data = array(
                    'traveller_token' => $token
                );
                $this->Model_traveller->forget_password_update($traveller_email,$form_data);
                
                // Send Email
                $msg = 'To reset your password, please <a href="'.base_url().'traveller/reset_password/'.$traveller_email.'/'.$token.'">click here</a> and enter a new password';

                $config = [
					'protocol' => 'smtp',
					'smtp_host' => $data['setting']['smtp_host'],
					'smtp_port' => $data['setting']['smtp_port'],
					'smtp_user' => $data['setting']['smtp_username'],
					'smtp_pass' => $data['setting']['smtp_password'],
					'crlf' => "\r\n",
					'newline' => "\r\n",
					'mailtype'  => 'html',
					'charset'   => 'utf-8'
				];

				$this->load->library('email', $config);
                               
                $this->email->from($data['setting']['send_email_from']);
				$this->email->to($traveller_email);
				$this->email->reply_to($data['setting']['send_email_from']);

				$this->email->subject('Password Reset Request');
				$this->email->message($msg);

				$this->email->send();

                $success = 'An email is sent to your email address. Please follow instruction in there.';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'traveller/forget_password');
            } else {
                $this->session->set_flashdata('error',$error);
		    	redirect(base_url().'traveller/forget_password');
            }
           
        } else {
        	$this->load->view('view_header',$data);
            $this->load->view('view_forget_password',$data);
            $this->load->view('view_footer',$data);
        }
        
    }


    public function reset_password($email=0,$token=0)
    {
        $tot = $this->Model_traveller->reset_password_check_url($email,$token);
        if(!$tot) {
            redirect(base_url().'traveller/login');
            exit;
        }

        $data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

        $error = '';
        $success = '';
        
        if(isset($_POST['form1'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
			
            $valid = 1;

            $traveller_password = $this->input->post('traveller_password',true);
            $traveller_re_password = $this->input->post('traveller_re_password',true);

            if($traveller_password == '' || $traveller_re_password == '')
            {
            	$valid = 0;
            	$error .= 'Password or Retype Password can not be empty<br>';
            }
            else
            {
            	if($traveller_password != $traveller_re_password)
            	{
            		$valid = 0;
            		$error .= 'Passwords do not match<br>';
            	}
            }

            $data['var1'] = $email;
            $data['var2'] = $token;

            if($valid == 1) {

                $form_data = array(
                    'traveller_password' => md5($traveller_password),
                    'traveller_token'    => ''
                );
                $this->Model_traveller->reset_password_update($email,$form_data);
                $success = 'Password is updated successfully!';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'traveller/reset_password_success/');
            } else {
            	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'traveller/reset_password/'.$data['var1'].'/'.$data['var2']);
            }

        } else {
            $data['var1'] = $email;
            $data['var2'] = $token;
            $this->load->view('view_header',$data);
            $this->load->view('view_reset_password',$data);
            $this->load->view('view_footer',$data);
        }
        
    }

    public function reset_password_success() {
    	
    	$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

    	$this->load->view('view_header',$data);
        $this->load->view('view_reset_password_success',$data);
        $this->load->view('view_footer',$data);
    }

}