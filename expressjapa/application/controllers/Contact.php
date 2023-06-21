<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_contact');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

		$data['testimonials'] = $this->Model_contact->all_testimonial();

		$this->load->view('view_header',$data);
		$this->load->view('view_contact',$data);
		$this->load->view('view_footer',$data);
	}

	public function send_email() 
	{

		$data['setting'] = $this->Model_common->all_setting();

		$error = '';

		if(isset($_POST['form_contact'])) {

			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$valid = 1;

			$name = $this->input->post('name', true);
			$phone = $this->input->post('phone', true);
			$email = $this->input->post('email', true);
			$message = $this->input->post('message', true);

	       	if($name == '') {
		    	$valid = 0;
		        $error .= 'Name can not be empty.<br>';
		    }

		    if($phone == '') {
		    	$valid = 0;
		        $error .= 'Phone can not be empty.<br>';
		    }

		    if($email == '') {
		    	$valid = 0;
		        $error .= 'Email can not be empty.<br>';
		    }

		    if($message == '') {
		    	$valid = 0;
		        $error .= 'Message can not be empty.<br>';
		    }

			if($data['setting']['recaptcha_status'] == 'Show') {
				if(empty($_POST['g-recaptcha-response'])) {
					$valid = 0;
					$error .= 'Please check the the captcha form.<br>';
				}
			}

		    if($valid == 1)
		    {
				$msg = '
            		<h3>Visitor Information</h3>
					<b>Name: </b> '.$_POST['name'].'<br><br>
					<b>Phone: </b> '.$_POST['phone'].'<br><br>
					<b>Email: </b> '.$_POST['email'].'<br><br>
					<b>City: </b> '.$_POST['message'].'
				';
            	
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
				$this->email->to($data['setting']['receive_email_to']);
				$this->email->reply_to($email, $name);

				$this->email->subject('Contact Form Email');
				$this->email->message($msg);

				$this->email->send();

		        $success = 'Thank you for sending the email. We will contact with you shortly.';
        		$this->session->set_flashdata('success',$success);

		    } 
		    else
		    {
        		$this->session->set_flashdata('error',$error);
		    }

			redirect($this->agent->referrer());
            
        } else {
            
            redirect($this->agent->referrer());
        }
	}
}