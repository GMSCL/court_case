<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();

    }

    function show_page($page=null, $active=null, $data=null) {
    	$user_id = $this->session->userdata('user_id');

    	$this->db->where('id', $user_id);
        $this->db->select('id,is_admin');
        $h['is_admin'] = $this->db->get('user')->result_array()[0]['is_admin'];

        $h['active']=$active;
        $h['district_name'] = $this->db->get('district_detail')->result_array()[0]['district_name'];
         // print_r($h);exit;
        $this->load->view('template/header_view', $h);
        $this->load->view($page, $data);
        $this->load->view('template/footer_view');

    }

}