<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Send_sms_email extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('my_model');
		if(!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	function index() {
		$user_id = $this->session->userdata('user_id');
        $is_admin = $this->my_model->get_user($user_id);

        $this->db->order_by('case_detail.appeal_date', 'DESC');
        $this->db->where('case_detail.case_status', 0);
		$this->db->select('case_detail.id AS case_id, case_detail.*, user.mobile_no, user.email, DAY(case_detail.appeal_date) as appeal_day,advocate.advocate_name, court.court_name,department.department_name');    
		$this->db->from('case_detail');
		$this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id');
		$this->db->join('user', 'case_detail.user_id = user.id');
		$this->db->join('court', 'case_detail.court_id = court.court_id','left');
		$this->db->join('department', 'case_detail.department_id = department.id','left');
		$data['data'] = $this->db->get()->result_array();

		$this->show_page('sms/sms_view', 'send_sms_email', $data);
	}

	function send_sms() {
		
		$p = $this->input->post();
		
		$i=0;
			foreach ($p['mobile_no'] as $key => $value) {

				if($p['mobile_no'][$key] != "") {

					$i++;
				
					$no=$p['mobile_no'][$key];

					$appeal_date = $this->my_model->date_format_2($p['appeal_date'][$key]);
					$msg= "Your Case no : ".$p['case_no'][$key]." appeal on date ". $appeal_date ." at ". $p['court_name'][$key] ."  For more detail please check your court case register portal";

					$api ="https://www.fast2sms.com/dev/bulk?authorization=itgn9Ex8yFrwRPGahQHSJYUujBXmkv7NIVeOf1Cz4ZA60DcqdoISKlEfFkCMBv8xaN654opUdXsg70ty&sender_id=FSTSMS&language=unicode&route=p&numbers=".$no."&message=".$msg; 
      			
					$api = preg_replace("/ /", "%20", $api);
					
					$url = file_get_contents($api);
		
					$config = array(
                       'protocol'  =>  'smtps',
                       'smtp_host' =>  'ssl://smtps.googlemail.com',
                       'smtp_user' =>  'kutchdp@gmail.com',
                       'smtp_pass' =>  'kutchdp@2020',
                       'smtp_port' =>  '465',
                       'mailtype'  =>  'html',
                       'smtp_timeout' => '4',
                       'newline'   => "\r\n"
                      );
                      $this->load->library('email', $config);
        //               $this->email->initialize($config);
				    // 	$this->load->library('email');

					$to = $p['email'][$key];
					$subject = "Court case appeal - case no. ". $p['case_no'][$key]." ON Date : " . $appeal_date;
					
					$email_msg = " <div style='padding: 10px;background:#cdcdcd; border: 2px dashed #a0a0a0;margin: 20px;'><div style='background-color:powderblue;padding: 10px;'><h1>Court Case register</h1><h3>શાખા : ".$p['department_name'][$key]."</h3><h3>કેસ ટાઈટલ : ".$p['case_title'][$key]."</h3><h3>પ્રતિવાદી નામ : ".$p['applicant_name'][$key]."</h3><h3>સુનવણી તારીખ : ".$appeal_date."</h3><h3>કેસ નંબર : ".$p['case_no'][$key]."</h3><h3>કોર્ટ : ".$p['court_name'][$key]."</h3></div></div>";

					$this->email->from('kutchdp@gmail.com','Court Case Portal');
					$this->email->to($to);
					$this->email->subject($subject);
					$this->email->message($email_msg);

				// 	if ($this->email->send()) {
				// 		echo "success" ; 
				// 	} else { 
				// 		print_r($this->email->print_debugger());
				// 	}exit;

				}
			}

			$this->session->set_flashdata('message', 'Messsage and email sent successfully.');
			$data['i'] = $i;

			redirect('send_sms_email');

	}



}