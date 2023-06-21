<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_payment extends CI_Model 
{
    function payment_add($data) {
        $this->db->insert('tbl_payment',$data);
        return $this->db->insert_id();
    }

    function paypal_status_update($inv_no,$data) {
        $this->db->where('invoice_no',$inv_no);
        $this->db->update('tbl_payment',$data);
    }

    function delete($inv_no)
    {
        $this->db->where('invoice_no',$inv_no);
        $this->db->delete('tbl_payment');
    }

    function package_name_by_package_id($id) {
        $sql = "SELECT * FROM tbl_package WHERE p_id=?";
        $query = $this->db->query($sql, array($id));
        return $query->first_row('array');
    }

    function add($data) {
        $this->db->insert('tbl_payment',$data);
        return $this->db->insert_id();
    }

    function update($invoice_no,$data) {
        $this->db->where('invoice_no',$invoice_no);
        $this->db->update('tbl_payment',$data);
    }

    function get_total_persons_by_package($id) {
        $sql = "SELECT * FROM tbl_payment WHERE p_id=? AND payment_status=?";
        $query = $this->db->query($sql, array($id, 'Completed'));
        return $query->result_array();
    }

}