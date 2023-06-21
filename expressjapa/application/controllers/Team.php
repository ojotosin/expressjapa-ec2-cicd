<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_team');
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

		$data['team_members'] = $this->Model_team->all_team_member();

		$this->load->view('view_header',$data);
		$this->load->view('view_team',$data);
		$this->load->view('view_footer',$data);
	}	
}