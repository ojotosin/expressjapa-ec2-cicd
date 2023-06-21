<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_category');
    }

	public function index($id=0)
	{
		if( !isset($id) || !is_numeric($id) ) {
			redirect(base_url());
		}

		$tot = $this->Model_category->category_check($id);
		if(!$tot) {
			redirect(base_url());
		}


		$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();

		$data['news_by_category'] = $this->Model_category->all_news_by_category_id($id);
		$data['category'] = $this->Model_category->category_by_id($id);

		$this->load->view('view_header',$data);
		$this->load->view('view_category',$data);
		$this->load->view('view_footer',$data);
	}
}