<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
        log_message('debug', 'Ion Auth : Auth class loaded');
        if(!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $this->load->model('my_model');    
    }

    function index() {

        $this->show_page('dashboard_view', 'dashboard');     
    }
}
