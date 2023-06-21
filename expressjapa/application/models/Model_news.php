<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_news extends CI_Model 
{
    public function all_news()
    {
        $query = $this->db->query("SELECT * 
                        FROM tbl_news t1
                        JOIN tbl_category t2
                        ON t1.category_id = t2.category_id
                        ORDER BY t1.news_id DESC");
        return $query->result_array();
    }

    public function all_categories()
    {
        $query = $this->db->query("SELECT * FROM tbl_category ORDER BY category_name ASC");
        return $query->result_array();
    }

    public function news_check($id)
    {
        $sql = 'SELECT * FROM tbl_news WHERE news_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->num_rows();
    }

    public function news_detail($id)
    {
        $sql = 'SELECT * FROM tbl_news WHERE news_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    public function get_category_name_by_id($cat_id) {
        $sql = 'SELECT * FROM tbl_category WHERE category_id=?';
        $query = $this->db->query($sql,array($cat_id));
        return $query->first_row('array');
    }
}