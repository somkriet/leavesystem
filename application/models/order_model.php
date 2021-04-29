<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class order_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }


    public function show_all_order($query)
    {
        $q = $this->db->query($query);

        return $q->result();
    }

    public function add_new_order($query)
    {
       $q = $this->db->query($query);
    }

    public function edit_order($query)
    {
       $q = $this->db->query($query);
    }

    public function delete_order($query)
    {
       $q = $this->db->query($query);
    }
   

}
?>