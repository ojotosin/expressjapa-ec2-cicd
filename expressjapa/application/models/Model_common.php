<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_common extends CI_Model 
{
    public function all_setting()
    {
        $query = $this->db->query("SELECT * from tbl_settings WHERE id=1");
        return $query->first_row('array');
    }
    public function all_page()
    {
        $query = $this->db->query("SELECT * from tbl_page WHERE id=1");
        return $query->first_row('array');
    }
    public function all_comment()
    {
        $query = $this->db->query("SELECT * from tbl_comment WHERE id=1");
        return $query->first_row('array');
    }
    public function all_social()
    {
        $query = $this->db->query("SELECT * from tbl_social");
        return $query->result_array();
    }
    public function all_news()
    {
        $query = $this->db->query("SELECT * FROM tbl_news ORDER BY news_id DESC");
        return $query->result_array();
    }
    public function all_featured_packages()
    {
        $query = $this->db->query("SELECT * FROM tbl_package WHERE p_is_featured=? ORDER BY p_id DESC",array('Yes'));
        return $query->result_array();
    }
    public function all_package()
    {
        $query = $this->db->query("SELECT * FROM tbl_package ORDER BY p_id DESC");
        return $query->result_array();
    }
    public function extension_check_photo($ext) {
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' && $ext!='JPG' && $ext!='PNG' && $ext!='JPEG' && $ext!='GIF' ) {
            return false;
        } else {
            return true;
        }
    }
}