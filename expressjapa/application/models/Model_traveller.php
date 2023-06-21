<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_traveller extends CI_Model 
{

    public function check_traveller($id) {
        $sql = 'SELECT * FROM tbl_traveller WHERE traveller_id=? AND traveller_access=?';
        $query = $this->db->query($sql,array($id,0));
        return $query->num_rows();
    }

    public function traveller_registration_check($email) {
        $sql = 'SELECT * FROM tbl_traveller WHERE traveller_email=?';
        $query = $this->db->query($sql,array($email));
        return $query->num_rows();
    }

    public function registration_add($data) {
        $this->db->insert('tbl_traveller',$data);
        return $this->db->insert_id();
    }

    public function registration_confirm_check_url($email,$token) {
        $sql = 'SELECT * FROM tbl_traveller WHERE traveller_email=? AND traveller_token=?';
        $query = $this->db->query($sql,array($email,$token));
        return $query->num_rows();
    }

    public function registration_confirm_update($email,$token,$data) {
        $this->db->where('traveller_email',$email);
        $this->db->where('traveller_token',$token);
        $this->db->update('tbl_traveller',$data);
    }

    public function login_check_email($email) 
    {
        $where = array(
            'traveller_email' => $email
        );
        $this->db->select('*');
        $this->db->from('tbl_traveller');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    public function login_check_password($email,$password)
    {
        $where = array(
            'traveller_email' => $email,
            'traveller_password' => md5($password)
        );
        $this->db->select('*');
        $this->db->from('tbl_traveller');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    public function payment_history($id) {
        $sql = '
                SELECT *
                FROM tbl_payment t1
                JOIN tbl_package t2
                ON t1.p_id = t2.p_id
                WHERE t1.traveller_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->result_array();
    }

    public function get_destination_name_by_id($id) {
        $sql = 'SELECT * FROM tbl_destination WHERE d_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    public function traveller_profile_update($data,$id) {
        $this->db->where('traveller_id',$id);
        $this->db->update('tbl_traveller',$data);
    }

    function forget_password_check_email($email) {
        $sql = "SELECT * FROM tbl_traveller WHERE traveller_email=?";
        $query = $this->db->query($sql,array($email));
        return $query->first_row('array');
    }

    function forget_password_update($email,$data) {
        $this->db->where('traveller_email',$email);
        $this->db->update('tbl_traveller',$data);
    }

    function reset_password_check_url($email,$token) {
        $query = $this->db->query("SELECT * from tbl_traveller WHERE traveller_email=? AND traveller_token=?",array($email,$token));
        return $query->first_row('array');
    }

    function reset_password_update($email,$data) {
        $this->db->where('traveller_email',$email);
        $this->db->update('tbl_traveller',$data);
    }
}