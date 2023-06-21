<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_news');
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

		$data['news'] = $this->Model_news->all_news();
		
		$this->load->view('view_header',$data);
		$this->load->view('view_news',$data);
		$this->load->view('view_footer',$data);
	}

	public function view($id=0)
	{
		if( !isset($id) || !is_numeric($id) ) {
			redirect(base_url());
		}

		$tot = $this->Model_news->news_check($id);
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

		$data['news'] = $this->Model_news->all_news();
		$data['news_detail'] = $this->Model_news->news_detail($id);
		$data['category'] = $this->Model_news->get_category_name_by_id($data['news_detail']['category_id']);
		$data['category_name'] = $data['category']['category_name'];
		$data['id'] = $id;

		$data['categories'] = $this->Model_news->all_categories();
		
		$this->load->view('view_header',$data);
		$this->load->view('view_news_detail',$data);
		$this->load->view('view_footer',$data);

	}
}