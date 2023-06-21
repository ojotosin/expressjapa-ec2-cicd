<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_payment');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();
		$data['payment'] = $this->Model_payment->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_payment',$data);
		$this->load->view('admin/view_footer');
	}

	public function delete($id) 
	{
    	$tot = $this->Model_payment->payment_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/payment');
        	exit;
    	}

		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

        $this->Model_payment->delete($id);
        $success = 'Payment is deleted successfully!';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'admin/payment');
    }

    public function make_complete($id) {

		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

    	$form_data = array(
			'payment_status' => 'Completed'
        );
        $this->Model_payment->update($id,$form_data);

    	$success = 'Payment status is changed successfully!';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'admin/payment');
    }

}