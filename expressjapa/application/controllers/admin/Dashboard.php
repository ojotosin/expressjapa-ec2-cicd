<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_dashboard');
    }
	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$data['total_category'] = $this->Model_dashboard->show_total_category();
		$data['total_news'] = $this->Model_dashboard->show_total_news();
		$data['total_destination'] = $this->Model_dashboard->show_total_destination();
		$data['total_package'] = $this->Model_dashboard->show_total_package();
		$data['total_team_member'] = $this->Model_dashboard->show_total_team_member();
		$data['total_client'] = $this->Model_dashboard->show_total_client();
		$data['total_service'] = $this->Model_dashboard->show_total_service();
		$data['total_testimonial'] = $this->Model_dashboard->show_total_testimonial();
		$data['total_traveller'] = $this->Model_dashboard->show_total_traveller();
		

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_dashboard',$data);
		$this->load->view('admin/view_footer');
	}
}
