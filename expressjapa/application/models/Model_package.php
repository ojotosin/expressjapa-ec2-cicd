<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_package extends CI_Model 
{
    public function package_detail($id) {
        $sql = 'SELECT * FROM tbl_package WHERE p_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    public function package_check($id) {
        $sql = 'SELECT * FROM tbl_package WHERE p_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->num_rows();
    }

    public function package_photos_total($id) {
        $sql = 'SELECT * FROM tbl_package_photo WHERE p_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->num_rows();
    }
    public function package_photos($id) {
        $sql = 'SELECT * FROM tbl_package_photo WHERE p_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->result_array();
    }

    public function package_videos_total($id) {
        $sql = 'SELECT * FROM tbl_package_video WHERE p_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->num_rows();
    }
    public function package_videos($id) {
        $sql = 'SELECT * FROM tbl_package_video WHERE p_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->result_array();
    }

    public function get_package_price_from_id($id) {
        $sql = 'SELECT * FROM tbl_package WHERE p_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
}