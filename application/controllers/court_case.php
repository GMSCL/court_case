<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Court_case extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('my_model');
		if(!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	function index() {
		$user_id = $this->session->userdata('user_id');
		$data['court'] = $this->my_model->get_all_data('court');
		$data['department'] = $this->my_model->get_data('department', $user_id);
		// $data['applicant'] = $this->my_model->get_all_data('applicant');
		$data['advocate'] = $this->my_model->get_all_data('advocate');
		$data['case_type'] = $this->my_model->get_all_data('case_type');


		$this->show_page('court/court_case_upload_view', 'court_case', $data);
	}



	function insert_court_case() {
		
		$user_id = $this->session->userdata('user_id');
		if (!empty($this->input->post('appeal_date'))) {

			$appeal_date = $this->my_model->date_format($this->input->post('appeal_date'));
		} else {
			$appeal_date = '';
		}


		$register_date = $this->my_model->date_format($this->input->post('register_date'));
		if (!empty($this->input->post('affidavit_date'))) {
			$affidavit_date = $this->my_model->date_format($this->input->post('affidavit_date'));
		} else {
			$affidavit_date = '';
		}

		if (!empty($this->input->post('interim_order_issue_date'))) {
			$interim_order_issue_date = $this->my_model->date_format($this->input->post('interim_order_issue_date'));
		} else {
			$interim_order_issue_date = '';
		}

		$ip = $this->input->ip_address();
		date_default_timezone_set("Asia/Kolkata");
		$created_date = date('Y-m-d H:i:s');

		$data = array(
			'user_id' => $user_id, 
			'department_id' => $user_id, 
			'court_id' => $this->input->post('court_id'), 
			'case_title' => $this->input->post('case_title'), 
			'applicant_id' => $this->input->post('applicant_id'), 
			'case_no' => $this->input->post('case_no'), 
			'case_type_id' => $this->input->post('case_type_id'), 
			'affidavit' => $this->input->post('affidavit'), 
			'case_status' => $this->input->post('case_status'), 
			'interim_order_issued' => $this->input->post('interim_order_issued'),
			'interim_order_issued_on' => $interim_order_issue_date,
			'interim_order' => $this->input->post('interim_order'),
			'short_note_of_case' => $this->input->post('short_note_of_case'), 
			'applicant_id' => $this->input->post('applicant_id'), 
			'advocate_id' => $this->input->post('advocate_id'), 
			'affidavit_date' => $affidavit_date, 
			'appeal_date' => $appeal_date, 
			'register_date' => $register_date, 
			'expense' => $this->input->post('expense'), 
			'ip_address' => $ip,
			'created_at' => $created_date
		); 
		$insert = $this->db->insert('case_detail', $data);

		if($insert) {
			$this->session->set_flashdata('message', 'Court Case Added successfully.');
			redirect('court_case');
		}
	}

	function department_wise_detail() {

		$data['court'] = $this->my_model->get_all_data('court');
		$data['department'] = $this->my_model->get_all_data('department');
		$data['advocate'] = $this->my_model->get_all_data('advocate');
		$data['case_type'] = $this->my_model->get_all_data('case_type');
		$data['financial_expense'] = $this->my_model->get_all_data('financial_expense');

		$user_id = $this->session->userdata('user_id');
        $is_admin = $this->my_model->get_user($user_id);

        if($is_admin != '1') { 
            $this->db->where('case_detail.department_id', $user_id);
        }
		$this->db->select('case_detail.id AS case_id, case_detail.*, advocate.advocate_name, court.court_name,department.department_name');    
		$this->db->from('case_detail');
		$this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id','left');
		$this->db->join('court', 'case_detail.court_id = court.court_id','left');
		$this->db->join('department', 'case_detail.department_id = department.id','left');
		$data['data'] = $this->db->get()->result_array();

		$this->show_page('court/court_register_department_view', 'court_case_detail', $data);
	}

	function department_detail($user_id) {

		$this->db->where('case_detail.department_id', $user_id);
		$this->db->select('case_detail.id AS case_id, case_detail.*, advocate.advocate_name,court.court_name,department.department_name'); 
		$this->db->from('case_detail');
		$this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id','left');
		$this->db->join('court', 'case_detail.court_id = court.court_id','left');
		$this->db->join('department', 'case_detail.department_id = department.id','left');
		$data['data'] = $this->db->get()->result_array();

		$this->show_page('court/court_register_department_view', 'court_case_detail', $data);
	}

	function case_detail($id) {
		$user_id = $this->session->userdata('user_id');

		$is_admin = $this->my_model->get_user($user_id);

		$this->db->where('case_detail.id', $id);
		$this->db->select('*');    
		$this->db->from('case_detail');
		$this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id','left');
		$this->db->join('court', 'case_detail.court_id = court.court_id','left');
		$this->db->join('department', 'case_detail.department_id = department.id','left');
		$this->db->join('case_type', 'case_detail.case_type_id = case_type.id','left');
		$data['data'] = $this->db->get()->result_array();
		// print_r($data);exit;

		$data['court'] = $this->my_model->get_all_data('court');
		$data['department'] = $this->my_model->get_data('department', $user_id);
		$data['advocate'] = $this->my_model->get_all_data('advocate');
		$data['case_type'] = $this->my_model->get_all_data('case_type');

		$this->db->where('case_id', $id);
		$this->db->order_by('case_hearing_date', 'DESC');
		$data['case_hearing'] = $this->db->get('case_hearing')->result_array();

		// print_r($data['case_hearing']);exit;
		$data['id'] = $id;

		$this->show_page('court/case_edit_view', 'court_case_detail', $data);
	}

	function update_court_case($id) {
		
		$user_id = $this->session->userdata('user_id');
		$ap_date = $this->input->post('appeal_date');
		$af_date = $this->input->post('affidavit_date');
		$lastDateToAppeal = $this->input->post('last_date_to_appeal');
		$orderComplianceDate = $this->input->post('order_compliance_date');

		if (empty($ap_date) || ($ap_date == '00-00-0000')) {
			$appeal_date ="";
		} else {
			$appeal_date = $this->my_model->date_format($this->input->post('appeal_date'));
		}

		if (empty($af_date) || ($ap_date == '00-00-0000')) {
			$affidavit_date ="";
		} else {
			$affidavit_date = $this->my_model->date_format($this->input->post('affidavit_date'));
		}

		if (empty($lastDateToAppeal) || ($lastDateToAppeal == '00-00-0000')) {
			$last_date_to_appeal ="";
		} else {
			$last_date_to_appeal = $this->my_model->date_format($lastDateToAppeal);
		}

		if (!empty($orderComplianceDate) && ($orderComplianceDate != '00-00-0000')) { 
			$order_compliance_date = $this->my_model->date_format($this->input->post('order_compliance_date'));
		}else{
			$order_compliance_date = '';
		}
		// $affidavit_date = $this->my_model->date_format($this->input->post('affidavit_date'));
		$register_date = $this->my_model->date_format($this->input->post('register_date'));
		$order_implementation_date = $this->my_model->date_format($this->input->post('order_implementation_date'));

		if (!empty($order_implementation_date) && ($order_implementation_date != '00-00-0000')) {
			$order_implementation_date = $this->my_model->date_format($order_implementation_date);
		} else {
			$order_implementation_date ="";
		}

		$interimOrderIssueDate = $this->my_model->date_format($this->input->post('interim_order_issue_date'));
		if (!empty($interimOrderIssueDate) && ($interimOrderIssueDate != '00-00-0000')) {
			$interimOrderIssueDate = $this->my_model->date_format($interimOrderIssueDate);
		} else {
			$interimOrderIssueDate ="";
		}

		$ip = $this->input->ip_address();
		date_default_timezone_set("Asia/Kolkata");
		$updated_date = date('Y-m-d H:i:s');

		
		$data = array( 
			'case_title' => $this->input->post('case_title'), 
			'case_type_id' => $this->input->post('case_type_id'), 
			'case_status' => $this->input->post('case_status'), 
			'appealed' => $this->input->post('appealed'),
			'last_date_to_appeal' => $last_date_to_appeal,
			'case_no' => $this->input->post('case_no'), 
			'applicant_id' => $this->input->post('applicant_id'), 
			'short_note_of_case' => $this->input->post('short_note_of_case'), 
			'applicant_id' => $this->input->post('applicant_id'), 
			'advocate_id' => $this->input->post('advocate_id'), 
			'affidavit_date' => $affidavit_date, 
			'appeal_date' => $appeal_date, 
			'register_date' => $register_date, 
			'expense' => $this->input->post('expense'), 
			'court_judgement' => $this->input->post('court_judgement'),
			'court_order' => $this->input->post('court_order'),
			'order_compliance_date' => $order_compliance_date,
			'implementation_status' => $this->input->post('implementation_status'),
			'order_implementation_date' => $order_implementation_date,
			'interim_order_issued' => $this->input->post('interim_order_issued'),
			'interim_order_issued_on' => $interimOrderIssueDate,
			'interim_order' => $this->input->post('interim_order'),
			'ip_address' => $ip,
			'updated_at' => $updated_date
		); 

		// print_r($data);exit;
		$this->db->where('id', $id);
		$update = $this->db->update('case_detail', $data);

		if($update) {
			$this->session->set_flashdata('message', 'Court Case updated successfully.');
			redirect('court_case/case_detail/'.$id);
		}
	}



	function print_court_register() {
		$user_id = $this->session->userdata('user_id');
		$user_id = $this->session->userdata('user_id');
        $is_admin = $this->my_model->get_user($user_id);

        if($is_admin != '1') { 
            $this->db->where('case_detail.department_id', $user_id);
        }

		$this->db->select('case_detail.id AS case_id, case_detail.*, advocate.advocate_name,   court.court_name,department.department_name');    
		$this->db->from('case_detail');
		$this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id','left');
		$this->db->join('court', 'case_detail.court_id = court.court_id','left');
		$this->db->join('department', 'case_detail.department_id = department.id','left');
		$data['data'] = $this->db->get()->result_array();

		$this->show_page('court/court_register_print_view', 'print_court_register', $data);
	}

	function court_case_detail($id) {
		$user_id = $this->session->userdata('user_id');

		$is_admin = $this->my_model->get_user($user_id);

		$this->db->where('case_detail.id', $id);
		$this->db->select('*');    
		$this->db->from('case_detail');
		$this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id','left');
		$this->db->join('court', 'case_detail.court_id = court.court_id','left');
		$this->db->join('case_type', 'case_detail.case_type_id = case_type.id','left');
		$this->db->join('department', 'case_detail.department_id = department.id','left');
		$data['data'] = $this->db->get()->result_array();

		$this->db->where('case_id', $id);
		$this->db->order_by('case_hearing_date', 'DESC');
		$data['case_hearing'] = $this->db->get('case_hearing')->result_array();

		$this->show_page('court/court_case_detail_view', 'court_case_detail', $data);
	}

	public function add_appeal() {

		$id = $this->input->post('id');
		$new_appeal_date = $this->my_model->date_format($this->input->post('new_appeal_date'));
		$appeal_date = $this->my_model->date_format($this->input->post('appeal_date'));
		$last_date_short_note = $this->input->post('last_date_short_note');

		$data = array(
			'case_id'	=> $id,
			'case_hearing_date'	=> $new_appeal_date,
			'last_date_short_note' => $last_date_short_note
		);
		
		$insert = $this->db->insert('case_hearing', $data);

		$appeal_date = array( 
			'appeal_date' => $appeal_date
		); 
		$this->db->where('id', $id);
		$update = $this->db->update('case_detail', $appeal_date);

		redirect('court_case/case_detail/'.$id);
	}

	function court_case_delete($case_id) {
		$this->db->where('id', $case_id);
		$this->db->delete('case_detail');	
		
		$this->session->set_flashdata('message', 'Court case successfully deleted.');

		redirect('court_case/department_wise_detail');
	}

	function case_hearing_delete($case_id, $case_hearing_id) {

		$this->db->where('id', $case_hearing_id);
		$this->db->delete('case_hearing');	
		$this->session->set_flashdata('message', 'Case Appeal Detail  successfully deleted.');

		redirect('court_case/case_detail/'.$case_id);

	}	

	function search() {
		print_r($this->input->post());
	}

}