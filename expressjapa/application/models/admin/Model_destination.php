<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_destination extends CI_Model 
{
    function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_destination'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $sql = "SELECT * FROM tbl_destination ORDER BY d_id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function add($data) {
        $this->db->insert('tbl_destination',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('d_id',$id);
        $this->db->update('tbl_destination',$data);
    }

    function delete($id)
    {
        $this->db->where('d_id',$id);
        $this->db->delete('tbl_destination');
    }

    function get_destination($id)
    {
        $sql = 'SELECT * FROM tbl_destination WHERE d_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function destination_check($id)
    {
        $sql = 'SELECT * FROM tbl_destination WHERE d_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function duplicate_check($var1,$var2) {
        $sql = 'SELECT * FROM tbl_destination WHERE d_name=? and d_name!=?';
        $query = $this->db->query($sql,array($var1,$var2));
        return $query->num_rows();
    }

    function check_package($id) {
        $sql = 'SELECT * FROM tbl_package WHERE d_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->num_rows();
    }
    
}