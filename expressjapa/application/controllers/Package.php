<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_package');
    }

	public function index()
	{
		redirect(base_url());
	}

	public function view($id=0)
	{

		if( !isset($id) || !is_numeric($id) ) {
			redirect(base_url());
		}

		$tot = $this->Model_package->package_check($id);
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
		
		$data['package'] = $this->Model_package->package_detail($id);
		$data['package_photos_total'] = $this->Model_package->package_photos_total($id);
		$data['package_photos'] = $this->Model_package->package_photos($id);
		$data['package_videos_total'] = $this->Model_package->package_videos_total($id);
		$data['package_videos'] = $this->Model_package->package_videos($id);
		$data['id'] = $id;

		$this->load->view('view_header',$data);
		$this->load->view('view_package',$data);
		$this->load->view('view_footer');
	}
}