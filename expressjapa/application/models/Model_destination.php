<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_destination extends CI_Model 
{
    public function all_destination()
    {
        $query = $this->db->query("SELECT * FROM tbl_destination ORDER BY d_id ASC");
        return $query->result_array();
    }

    public function destination_check($id) {
        $sql = 'SELECT * FROM tbl_destination WHERE d_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->num_rows();
    }

    public function destination_detail($id) {
        $sql = 'SELECT * FROM tbl_destination WHERE d_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    public function packages_by_d_id($id) {
        $sql = 'SELECT * FROM tbl_package WHERE d_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->result_array();
    }
    public function packages_by_d_id_total($id) {
        $sql = 'SELECT * FROM tbl_package WHERE d_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->num_rows();
    }
}