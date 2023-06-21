<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_page extends CI_Model 
{
	public function show()
	{
        $query = $this->db->query("SELECT * from tbl_page WHERE id=1");
        return $query->first_row('array');
    }

    public function update($data)
	{
        $this->db->where('id',1);
        $this->db->update('tbl_page',$data);
    }
}