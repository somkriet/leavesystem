<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_approve extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
		$this->load->library('langlib');
		$this->load->helper(array('form', 'url'));

        $this->CI = get_instance();
        $this->load->model('order_model');
        $this->load->model('customer_model');
        $this->load->model('product_model');
        
        $this->load->library("pagination");

        if ($this->session->userdata('lang') == 'english') {
            $lang = 'english';
            $this->session->set_userdata('lang', $lang);
        }else{
        	$lang = 'thailand';
            $this->session->set_userdata('lang', $lang);
        }

        $data_user = $this->session->userdata('lang');

        $this->lang->load($data_user,$data_user);
 
    }

	public function index()
	{
		// $this->load->view('view_home');
		$data = '1';

		$this->template->set('title', 'order');
        $this->template->load('template_layout', 'contents' , 'admin/v_leave_approve', $data);
	}
}
