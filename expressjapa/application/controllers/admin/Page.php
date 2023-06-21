<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_page');
    }
	public function index()
	{
		$error = '';
		$success = '';

		$data['setting'] = $this->Model_common->get_setting_data();
		$data['page'] = $this->Model_page->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_page',$data);
		$this->load->view('admin/view_footer');
		
	}
	public function update()
	{
		$error = '';
		$success = '';

		if(isset($_POST['form_home'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'mt_home' => $_POST['mt_home'],
				'mk_home' => $_POST['mk_home'],
				'md_home' => $_POST['md_home']
            );
        	$this->Model_page->update($form_data);
        	$success = 'Home Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}

		if(isset($_POST['form_about'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'about_heading' => $_POST['about_heading'],
				'about_content' => $_POST['about_content'],
				'mt_about'      => $_POST['mt_about'],
				'mk_about'      => $_POST['mk_about'],
				'md_about'      => $_POST['md_about']
            );
        	$this->Model_page->update($form_data);
        	$success = 'About Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}

		if(isset($_POST['form_faq'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'faq_heading' => $_POST['faq_heading'],
				'mt_faq'      => $_POST['mt_faq'],
				'mk_faq'      => $_POST['mk_faq'],
				'md_faq'      => $_POST['md_faq']
            );
        	$this->Model_page->update($form_data);
        	$success = 'FAQ Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}

		if(isset($_POST['form_service'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'service_heading' => $_POST['service_heading'],
				'mt_service'      => $_POST['mt_service'],
				'mk_service'      => $_POST['mk_service'],
				'md_service'      => $_POST['md_service']
            );
        	$this->Model_page->update($form_data);
        	$success = 'Service Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}

		if(isset($_POST['form_testimonial'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'testimonial_heading' => $_POST['testimonial_heading'],
				'mt_testimonial'      => $_POST['mt_testimonial'],
				'mk_testimonial'      => $_POST['mk_testimonial'],
				'md_testimonial'      => $_POST['md_testimonial']
            );
        	$this->Model_page->update($form_data);
        	$success = 'Testimonial Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}

		if(isset($_POST['form_news'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'news_heading' => $_POST['news_heading'],
				'mt_news'      => $_POST['mt_news'],
				'mk_news'      => $_POST['mk_news'],
				'md_news'      => $_POST['md_news']
            );
        	$this->Model_page->update($form_data);
        	$success = 'News Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}

		if(isset($_POST['form_contact'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'contact_heading' => $_POST['contact_heading'],
				'contact_address' => $_POST['contact_address'],
				'contact_email'   => $_POST['contact_email'],
				'contact_phone'   => $_POST['contact_phone'],
				'contact_map'     => $_POST['contact_map'],
				'mt_contact'      => $_POST['mt_contact'],
				'mk_contact'      => $_POST['mk_contact'],
				'md_contact'      => $_POST['md_contact']
            );
        	$this->Model_page->update($form_data);
        	$success = 'Contact Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}

		if(isset($_POST['form_search'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'search_heading' => $_POST['search_heading'],
				'mt_search'      => $_POST['mt_search'],
				'mk_search'      => $_POST['mk_search'],
				'md_search'      => $_POST['md_search']
            );
        	$this->Model_page->update($form_data);
        	$success = 'Search Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}

		if(isset($_POST['form_term'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'term_heading' => $_POST['term_heading'],
				'term_content' => $_POST['term_content'],
				'mt_term'      => $_POST['mt_term'],
				'mk_term'      => $_POST['mk_term'],
				'md_term'      => $_POST['md_term']
            );
        	$this->Model_page->update($form_data);
        	$success = 'Term Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}

		if(isset($_POST['form_privacy'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'privacy_heading' => $_POST['privacy_heading'],
				'privacy_content' => $_POST['privacy_content'],
				'mt_privacy'      => $_POST['mt_privacy'],
				'mk_privacy'      => $_POST['mk_privacy'],
				'md_privacy'      => $_POST['md_privacy']
            );
        	$this->Model_page->update($form_data);
        	$success = 'Privacy Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}

		if(isset($_POST['form_destination'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'destination_heading' => $_POST['destination_heading'],
				'mt_destination'      => $_POST['mt_destination'],
				'mk_destination'      => $_POST['mk_destination'],
				'md_destination'      => $_POST['md_destination']
            );
        	$this->Model_page->update($form_data);
        	$success = 'Destination Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}

		if(isset($_POST['form_team'])) {
			if(PROJECT_MODE == 0) {
				$this->session->set_flashdata('error',PROJECT_NOTIFICATION);
				redirect($_SERVER['HTTP_REFERER']);
			}
        	$form_data = array(
				'team_heading' => $_POST['team_heading'],
				'mt_team'      => $_POST['mt_team'],
				'mk_team'      => $_POST['mk_team'],
				'md_team'      => $_POST['md_team']
            );
        	$this->Model_page->update($form_data);
        	$success = 'Team Page Setting is updated successfully!';
        	$this->session->set_flashdata('success',$success);
		    redirect(base_url().'admin/page');
		}


		$data['setting'] = $this->Model_common->get_setting_data();
		$data['page'] = $this->Model_page->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_page',$data);
		$this->load->view('admin/view_footer');
	}
	
}
