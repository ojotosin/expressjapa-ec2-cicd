<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_search');
    }

	public function index() {

		$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

		$error2 = '';

		if(isset($_POST['search_string'])) {

			$data['search_string'] = $_POST['search_string'];
			$data['result'] = $this->Model_search->search($_POST['search_string']);
			$data['total'] = $this->Model_search->search_total($_POST['search_string']);

			$this->load->view('view_header',$data);
			$this->load->view('view_search',$data);
			$this->load->view('view_footer',$data);

		} else {
			redirect(base_url());
		}

	}
}