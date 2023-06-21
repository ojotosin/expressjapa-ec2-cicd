<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller 
{
     function  __construct(){
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('Model_payment');
     }
     
     function success() {
        $paypalInfo = $this->input->get();

        $inv_no = $this->session->userdata('inv_no');

        $form_data = array(
            'txnid' => $paypalInfo["tx"],
            'payment_status' => $paypalInfo["st"],
        );
        $this->Model_payment->update($inv_no,$form_data);

        $this->session->unset_userdata('inv_no');
        
        redirect(base_url().'payment/success');
     }
     
    function cancel() {
        $inv_no = $this->session->userdata('inv_no');
        $this->Model_payment->delete($inv_no);
        $this->session->unset_userdata('inv_no');
        redirect(base_url().'payment/cancel');
    }
     
     function ipn(){
        $paypalInfo = $this->input->post();
        $data['user_id']        = $paypalInfo['custom'];
        $data['product_id']     = $paypalInfo["item_number"];
        $data['txn_id']         = $paypalInfo["txn_id"];
        $data['payment_gross']  = $paypalInfo["payment_gross"];
        $data['currency_code']  = $paypalInfo["mc_currency"];
        $data['payer_email']    = $paypalInfo["payer_email"];
        $data['payment_status'] = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;        
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
    }
}