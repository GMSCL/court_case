<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends MY_Controller {

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

        if($is_admin != '1') { 
			$this->db->where('user_id', $user_id);
        }
		$this->db->select('id, case_no, case_title, appeal_date, applicant_id, order_compliance_date, implementation_status');
		$data['result'] = $this->db->get("case_detail")->result();
   		$date = "2020-10-16T10:00:00";
   		if(!empty($data['result'])) { 
	        foreach ($data['result'] as $key => $value) {
	            $data['data'][$key]['id'] = $value->id;
	            $data['data'][$key]['title'] = $value->case_title;
	            $data['data'][$key]['start'] = $value->appeal_date;
	            // $data['data'][$key]['className'] =  'label-important';
	            // $data['data'][$key]['url'] =  ;
				$data['data'][$key]['backgroundColor'] = "#fcba03";
				$data['data'][$key]['textColor'] = "#20232A	";

				// Add order compliance date in Calendar View with a different color code.
				if ($value -> order_compliance_date != null) {
					$data['data'][$key]['id'] = $value->id;
					$data['data'][$key]['title'] = $value->case_no;
					$data['data'][$key]['start'] = $value->order_compliance_date;
					if ($value -> implementation_status == 1) {
						$data['data'][$key]['backgroundColor'] = "#63BA3C";
					} else {
						$data['data'][$key]['backgroundColor'] = "#EB3434";
					}
					$data['data'][$key]['display'] = "auto";
				}
			}
   		} else {
   			$data['data']['id'] = '';
   		}

   		
        $h['is_admin'] = $is_admin;

		$h['active'] = 'calendar';
		$h['district_name'] = $this->db->get('district_detail')->result_array()[0]['district_name'];
		
		$this->load->view('template/header_view', $h);
		$this->load->view('calendar/calendar_view', $data);
        // $this->load->view('template/footer_view');

	}

}