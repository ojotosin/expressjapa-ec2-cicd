<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_traveller extends CI_Model 
{
    function show() 
    {
        $sql = "SELECT * FROM tbl_traveller";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function current_status($id) 
    {
        $sql = "SELECT * FROM tbl_traveller WHERE traveller_id=?";
        $query = $this->db->query($sql, array($id));
        return $query->first_row('array');
    }

    function change_status($id, $access)
    {
        if($access == 1) {
            $now = 0;
        }
        else {
            $now = 1;
        }
        $this->db->set('traveller_access', $now);
        $this->db->where('traveller_id', $id);
        $this->db->update('tbl_traveller');
    }

    function delete($id)
    {
        $this->db->where('traveller_id',$id);
        $this->db->delete('tbl_traveller');
    }

    function get_data($id)
    {
        $sql = 'SELECT * FROM tbl_traveller WHERE traveller_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function traveller_check($id)
    {
        $sql = 'SELECT * FROM tbl_traveller WHERE traveller_id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
    
}