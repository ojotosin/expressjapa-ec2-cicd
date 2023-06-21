<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_payment');
        $this->load->library('Paypal_lib');
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

		if(isset($_POST['form_book'])) {

			if(!$this->session->userdata('traveller_id')) {
				redirect(base_url().'traveller/login');
			}

			$data['p_id'] = $_POST['p_id'];
			$data['number_of_person'] = $_POST['number_of_person'];
			$data['p_price_single'] = $_POST['p_price_single'];

			$this->load->view('view_header',$data);
			$this->load->view('view_payment',$data);
			$this->load->view('view_footer',$data);

		} else {			
			redirect(base_url());
		}		
	}

	public function bank() {
		
		$data['setting'] = $this->Model_common->all_setting();
		
		$payment_date = date('Y-m-d');
        $invoice_no = time();
        $amount = floatval($_POST['item_amount']);
        $cents = floatval($amount * 100);

        $traveller_id = $this->session->userdata('traveller_id');
        $transaction_id = '';

        $arr_data = array(
			'traveller_id'          => $traveller_id,
			'payment_date'          => $payment_date,
			'txnid'                 => $transaction_id,
			'p_id'                  => $_POST['p_id'],
			'paid_amount'           => $amount,
			'total_person'          => $_POST['total_person'],
			'card_number'           => '',
			'card_cvv'              => '',
			'card_month'            => '',
			'card_year'             => '',
			'bank_transaction_info' => $_POST['transaction_info'],
			'payment_method'        => 'Bank Deposit',
			'payment_status'        => 'Pending',
			'invoice_no'            => $invoice_no
        );
        $this->Model_payment->payment_add($arr_data);		        

        redirect(base_url().'payment/success');

	}

	public function stripe() {

		$data['setting'] = $this->Model_common->all_setting();

		require './public/payment/stripe/lib/init.php';

		if (isset($_POST['payment']) && $_POST['payment'] == 'posted') {

		    \Stripe\Stripe::setApiKey($data['setting']['stripe_secret_key']);
		    try {
		        if (!isset($_POST['stripeToken']))
		            throw new Exception("The Stripe Token was not generated correctly");

		        $payment_date = date('Y-m-d');
		        $invoice_no = time();
		        $amount = floatval($_POST['item_amount']);
		        $cents = floatval($amount * 100);

		        
		        $response = \Stripe\Charge::create(array(
		                    "amount" => $cents,
		                    "currency" => "usd",
		                    "card" => $_POST['stripeToken'],
		                    "description" => 'Stripe Payment'
		        ));

		        $transaction_id = $response->id;
		        $transaction_status = $response->status;

		        $traveller_id = $this->session->userdata('traveller_id');

		        $arr_data = array(
					'traveller_id'          => $traveller_id,
					'payment_date'          => $payment_date,
					'txnid'                 => $transaction_id,
					'p_id'                  => $_POST['p_id'],
					'paid_amount'           => $amount,
					'total_person'          => $_POST['total_person'],
					'card_number'           => $_POST['card_number'],
					'card_cvv'              => $_POST['card_cvv'],
					'card_month'            => $_POST['card_month'],
					'card_year'             => $_POST['card_year'],
					'bank_transaction_info' => '',
					'payment_method'        => 'Stripe',
					'payment_status'        => 'Completed',
					'invoice_no'            => $invoice_no
	            );
	            $this->Model_payment->payment_add($arr_data);

		        redirect(base_url().'payment/success');

		    } catch (Exception $e) {
		        $error = $e->getMessage();
		        ?><script type="text/javascript">alert('Error: <?php echo $error; ?>');</script><?php
		    }
		}
	}

	public function paypal() {

		$p_id = $_POST['p_id'];
		$amount = $_POST['item_amount'];
		$total_person = $_POST['total_person'];

		// getting package name by package id
		$package = $this->Model_payment->package_name_by_package_id($p_id);


		//Set variables for paypal form
        $returnURL = base_url().'paypal/success'; //payment success url
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url
        $notifyURL = base_url().'paypal/ipn'; //ipn url

        $traveller_id = $this->session->userdata('traveller_id');

        $invoice_no = time();

        $form_data = array(
            'traveller_id' => $traveller_id,
            'payment_date' => date('Y-m-d'),
            'txnid' => '',
            'p_id' => $p_id,
            'paid_amount' => $amount,
            'total_person' => $total_person,
            'card_number' => '',
            'card_cvv' => '',
            'card_month' => '',
            'card_year' => '',
            'bank_transaction_info' => '',
            'payment_method' => 'PayPal',
            'payment_status' => 'Pending',
            'invoice_no' => $invoice_no
        );
        $this->Model_payment->add($form_data);

        $arr = array(
            'inv_no' => $invoice_no
        );
        $this->session->set_userdata($arr);

        
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $package['p_name']);
        $this->paypal_lib->add_field('item_number',  $p_id);
        $this->paypal_lib->add_field('amount',  $amount);
        $this->paypal_lib->add_field('total_person',  $total_person);        
        
        $this->paypal_lib->paypal_auto_form();
	}

	public function success() {
		$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();
		$this->load->view('view_header',$data);
		$this->load->view('view_payment_success', $data);	
		$this->load->view('view_footer',$data);
	}

	public function cancel() {
		$data['setting'] = $this->Model_common->all_setting();
		$data['page'] = $this->Model_common->all_page();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['featured_packages'] = $this->Model_common->all_featured_packages();
		$data['packages'] = $this->Model_common->all_package();
		$data['all_news'] = $this->Model_common->all_news();
		$this->load->view('view_header',$data);
		$this->load->view('view_payment_cancel', $data);	
		$this->load->view('view_footer',$data);
	}


}