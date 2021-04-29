<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class supplier_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }


    public function show_all_supplier($query)
    {
        $q = $this->db->query($query);

        return $q->result();
    }

    public function add_new_supplier($query)
    {
       $q = $this->db->query($query);
    }

    public function edit_supplier($query)
    {
       $q = $this->db->query($query);
    }

    public function delete_supplier($query)
    {
       $q = $this->db->query($query);
    }
   

}
?>