<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destination extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_destination');
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

		$data['destinations'] = $this->Model_destination->all_destination();

		$this->load->view('view_header',$data);
		$this->load->view('view_destination',$data);
		$this->load->view('view_footer',$data);
	}

	public function view($id=0)
	{
		if( !isset($id) || !is_numeric($id) ) {
			redirect(base_url());
		}

		$tot = $this->Model_destination->destination_check($id);
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

		$data['destinations'] = $this->Model_destination->all_destination();
		$data['destination'] = $this->Model_destination->destination_detail($id);
		$data['packages_by_d_id_total'] = $this->Model_destination->packages_by_d_id_total($id);
		$data['packages_by_d_id'] = $this->Model_destination->packages_by_d_id($id);
		$data['id'] = $id;

		$this->load->view('view_header',$data);
		$this->load->view('view_destination_detail',$data);
		$this->load->view('view_footer');
	}
}