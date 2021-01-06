<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        log_message('debug', 'Ion Auth : Auth class loaded');
        if(!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $this->load->model('my_model');    
    }

    function index() {

        $user_id = $this->session->userdata('user_id');
        $is_admin = $this->my_model->get_user($user_id);
        // echo $is_admin;exit;

        if($is_admin == '1') { 
            $admin_condition = '';
        } else { 
            $admin_condition = 'WHERE case_detail.user_id = '.$user_id;
        }

        $data['case'] = $this->db->query("SELECT
            department.department_name,case_detail.user_id,
            COUNT(distinct case_detail.id) AS total_case,
            SUM(if(case_detail.case_status = 0, 1, 0)) AS total_pending_case,
            SUM(if(MONTH(case_detail.appeal_date) = MONTH(NOW()) , 1, 0)) AS total_appeal
            FROM
            case_detail
            LEFT JOIN department ON case_detail.department_id = department.id $admin_condition GROUP BY case_detail.department_id")->result_array();
        // echo $this->db->last_query();exit;

        date_default_timezone_set("Asia/Kolkata");
        $current_date = date('Y-m-d');

        if($is_admin != '1') { 
            $this->db->where('case_detail.department_id', $user_id);
        }
        $this->db->where('case_detail.appeal_date >', $current_date);
        $this->db->order_by('case_detail.appeal_date', 'ASC');
        $this->db->select('case_detail.id AS case_id, case_detail.*, advocate.advocate_name, DAY(case_detail.appeal_date) as appeal_day,court.court_name,department.department_name');
        $this->db->from('case_detail');
        $this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id','left');
        $this->db->join('court', 'case_detail.court_id = court.court_id','left');
        $this->db->join('department', 'case_detail.department_id = department.id','left');
        $data['data'] = $this->db->get()->result_array();
        // echo $this->db->last_query();exit;   

        $data['is_admin'] = $is_admin;

        $this->show_page('home_view', 'home', $data);     
    }

    function forgot_password_log() {
        $user_id = $this->session->userdata('user_id');

        $this->db->where('id' , $user_id);
        $user = $this->db->get('user')->result_array();

        $taluka_id = $user[0]['taluka_id'];

        $this->db->where('forgot_password.taluka_id', $taluka_id);
        $this->db->select('*');    
        $this->db->from('forgot_password');
        $this->db->join('village', 'forgot_password.village_id = village.id');
        $this->db->join('taluka', 'forgot_password.taluka_id = taluka.id');
        $data['forgot_password'] = $this->db->get()->result_array();

        $this->show_page('forgot_password_log_view', 'forgot_password', $data);

    }
}
