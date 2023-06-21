<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_package extends CI_Model 
{
    function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_package'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_auto_increment_id1()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_package_photo'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $sql = "SELECT * FROM tbl_package ORDER BY p_id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function add($data) {
        $this->db->insert('tbl_package',$data);
        return $this->db->insert_id();
    }

    function add1($data) {
        $this->db->insert('tbl_package_photo',$data);
        return $this->db->insert_id();
    }

    function add2($data) {
        $this->db->insert('tbl_package_video',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('p_id',$id);
        $this->db->update('tbl_package',$data);
    }

    function delete($id)
    {
        $this->db->where('p_id',$id);
        $this->db->delete('tbl_package');
    }

    function delete1($id)
    {
        $this->db->where('p_id',$id);
        $this->db->delete('tbl_package_photo');
    }

    function get_package($id)
    {
        $sql = 'SELECT * FROM tbl_package WHERE p_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function duplicate_check($var1,$var2) {
        $sql = 'SELECT * FROM tbl_package WHERE p_name=? and p_name!=?';
        $query = $this->db->query($sql,array($var1,$var2));
        return $query->num_rows();
    }

    function get_destination_name_by_id($id) {
        $sql = 'SELECT * FROM tbl_destination WHERE d_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    public function get_total_package()
    {
        $sql = "SELECT * FROM tbl_package ORDER BY p_id ASC";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }


    public function get_package_photos($id)
    {
        $sql = "SELECT * FROM tbl_package_photo WHERE p_id=?";
        $query = $this->db->query($sql,array($id));
        return $query->result_array();
    }

    public function get_package_photo($id)
    {
        $sql = "SELECT * FROM tbl_package_photo WHERE pp_id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    public function get_package_videos($id)
    {
        $sql = "SELECT * FROM tbl_package_video WHERE p_id=?";
        $query = $this->db->query($sql,array($id));
        return $query->result_array();
    }

    public function all_destination()
    {
        $sql = "SELECT * FROM tbl_destination ORDER BY d_name ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function delete_photo($pp_id) {
        $this->db->where('pp_id',$pp_id);
        $this->db->delete('tbl_package_photo');
    }

    public function delete_video($pv_id) {
        $this->db->where('pv_id',$pv_id);
        $this->db->delete('tbl_package_video');
    }

    function package_check($id)
    {
        $sql = 'SELECT * FROM tbl_package WHERE p_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
    
}