<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('login_model');
		log_message('debug', 'Ion Auth : Auth class loaded');
	}

	function index() {
		$data['district_name'] = $this->db->get('district_detail')->result_array();
		$this->load->view('login_view', $data);
	}

	function user_login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$query = $this->login_model->login_data($username, $password);

		if(!empty($query)) {
			$this->session->set_userdata('user_id', $query[0]['id']);
			$this->session->set_userdata('user_name', $query[0]['name']);

			$ip = $this->input->ip_address();
			date_default_timezone_set("Asia/Kolkata");
			$login_date = date('Y-m-d H:i:s');

			$data = array(
				'user_id' => $query[0]['id'],
				'ip_address' => $ip,
				'date_login' => $login_date
			); 
			$insert = $this->db->insert('login_log', $data);
			
			redirect('calendar');
		} else {
			$this->session->set_flashdata('error_msg', 'Username or password is wrong.');
			redirect('login');
		}

	}

	function do_logout() {
		redirect('login');
	}

	function get_village($id) { 
		$this->db->where("taluka_id",$id);
		$this->db->order_by('village_name','ASC');
		$result = $this->db->get("village")->result();
		echo json_encode($result);       
	}

	function forgot_password() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->helper('form');

		$this->form_validation->set_rules('taluka', 'Taluka Name', 'required');
		$this->form_validation->set_rules('village', 'village Name', 'required');
		$this->form_validation->set_rules('email', 'email ', 'required');
		$this->form_validation->set_rules('mobile_no', 'mobile_no ', 'required');

		if ($this->form_validation->run() == TRUE) {
			date_default_timezone_set("Asia/Kolkata");
			$requested_on = date('Y-m-d H:i:s');

			$ip = $this->input->ip_address();
			$data = array(
				'taluka_id' => $this->input->post('taluka'), 
				'village_id' => $this->input->post('village'), 
				'talati_name' => $this->input->post('talati_name'), 
				'email' => $this->input->post('email'), 
				'mobile_no' => $this->input->post('mobile_no'), 
				'ip_address' => $ip,
				'requested_on' => $requested_on
				); 
			$this->db->insert('forgot_password', $data);

			$data['taluka'] = $this->db->get('taluka')->result_array();

			$this->load->view('login_view', $data);

		} 
	}
	
	function password_email() {
		$taluka_id = $thid->input->post('taluka_id');
		$village_id = $thid->input->post('village_id');
		$email_id = $thid->input->post('email_id');

		$this->db->where('taluka_id', $taluka_id);
		$this->db->where('village_id', $village_id);
		$this->db->where('email_id', $email_id);
		$this->db->select('*');
		$user_detail = $this->db->get('user')->result_array();

		$this->load->library('email');

		$to = $user[0]['email_id'];
		$subject = "Your password of Your milkat register account";
		$html = "Your password is". $user_detail[0]['password'];

		$this->email->from('milkatregister@gmail.com','Myeschool Portal');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($html);

		if ($this->email->send()) {
			echo "success" ; 

		} else { 
			print_r($this->email->print_debugger());
		}		

	}

	function test() {
		$this->load->library('email');

		$to = "vinodahir2011@gmail.com";
		$subject = "vinodahir2011@gmail.com";
		$html = "vinodahir2011@gmail.com";

		$this->email->from('milkatregister@gmail.com','Myeschool Portal');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($html);

		if ($this->email->send()) {
			echo "success" ; 

		} else { 
			print_r($this->email->print_debugger());
		}
	}
	
	function hello() {
	    $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 25,
    'smtp_user' => 'xxx',
    'smtp_pass' => 'xxx',
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
);
$this->load->library('email', $config);
$this->email->set_newline("\r\n");

	    $to = "vinodahir2011@gmail.com";
		$subject = "vinodahir2011@gmail.com";
		$html = "vinodahir2011@gmail.com";

		$this->email->from('milkatregister@gmail.com','Myeschool Portal');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($html);

		if ($this->email->send()) {
			echo "success" ; 

		} else { 
			print_r($this->email->print_debugger());
		}
	}

}
