<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_payment extends CI_Model 
{
    function show() {
        $sql = "SELECT *
                FROM tbl_payment t1
                JOIN tbl_package t2
                ON t1.p_id = t2.p_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_payment',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_payment');
    }

    function get_destination_by_id($id) {
        $sql = "SELECT * FROM tbl_destination WHERE d_id=?";
        $query = $this->db->query($sql, array($id));
        return $query->first_row('array');
    }

    function get_traveller_by_id($id) {
        $sql = "SELECT * FROM tbl_traveller WHERE traveller_id=?";
        $query = $this->db->query($sql, array($id));
        return $query->first_row('array');
    }

    function payment_check($id)
    {
        $sql = 'SELECT * FROM tbl_payment WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
}