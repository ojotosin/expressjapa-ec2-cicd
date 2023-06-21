<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Traveller extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_traveller');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();
		$data['traveller'] = $this->Model_traveller->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_traveller',$data);
		$this->load->view('admin/view_footer');
	}

	public function change_status($id) 
	{
    	$tot = $this->Model_traveller->traveller_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/traveller');
        	exit;
    	}

		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

    	$current = $this->Model_traveller->current_status($id);

        $this->Model_traveller->change_status($id, $current['traveller_access']);
        redirect(base_url().'admin/traveller');
    }

	public function delete($id) 
	{
    	$tot = $this->Model_traveller->traveller_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/traveller');
        	exit;
    	}

		if(PROJECT_MODE == 0) {
			$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
			redirect($_SERVER['HTTP_REFERER']);
		}

        $this->Model_traveller->delete($id);
        redirect(base_url().'admin/traveller');
    }

}