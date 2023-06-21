<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
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

		$this->load->view('view_header',$data);
		$this->load->view('view_privacy',$data);
		$this->load->view('view_footer',$data);
	}
}