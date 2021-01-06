<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Indicator extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('my_model');
		if(!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	function court() {
		$data['court'] = $this->my_model->get_all_data('court');
		$this->show_page('indicator/court_view', 'court', $data);
	}

	function insert_court() {
		$this->form_validation->set_rules('court_name','Court Name','required');
		if($this->form_validation->run()){
			$p = $this->input->post();
			$court_insert = $this->my_model->insert('court', $p);

			if($court_insert) {
				$this->session->flashdata('success_msg', 'Court Name Added successfully.');
				redirect('indicator/court');
			}

		}else{
			$data['court'] = $this->my_model->get_all_data('court');
			$this->show_page('indicator/court_view', 'court', $data);
		}
	}

	function court_update($id) {
		$p = $this->input->post();
		$this->my_model->update('court', $p, $id, 'court_id');
		redirect('indicator/court');
	}

	function court_delete($id) {
		$this->my_model->delete('court', $id, 'court_id');
		redirect('indicator/court');
	}

	function department() {
		$data['department'] = $this->my_model->get_all_data('department');
		$this->show_page('indicator/department_view', 'department', $data);
	}

	function insert_department() {
		$this->form_validation->set_rules('department_name','department Name','required');
		if($this->form_validation->run()){
			$p = $this->input->post();
			$department_insert = $this->my_model->insert('department', $p);

			if($department_insert) {
				$this->session->flashdata('success_msg', 'department Name Added successfully.');
				redirect('indicator/department');
			}

		}else{
			$data['department'] = $this->my_model->get_all_data('department');
			$this->show_page('indicator/department_view', 'department', $data);
		}
	}

	function department_update($id) {
		$p = $this->input->post();
		$this->my_model->update('department', $p, $id);
		redirect('indicator/department');
	}

	function department_delete($id) {
		$this->my_model->delete('department', $id);
		redirect('indicator/department');
	}

	function applicant() {
		$data['applicant'] = $this->my_model->get_all_data('applicant');
		$this->show_page('indicator/applicant_view', 'applicant', $data);
	}

	function insert_applicant() {
		$this->form_validation->set_rules('applicant_name','applicant Name','required');
		if($this->form_validation->run()){
			$p = $this->input->post();
			$applicant_insert = $this->my_model->insert('applicant', $p);

			if($applicant_insert) {
				$this->session->flashdata('success_msg', 'applicant Name Added successfully.');
				redirect('indicator/applicant');
			}

		}else{
			$data['applicant'] = $this->my_model->get_all_data('applicant');
			$this->show_page('indicator/applicant_view', 'applicant', $data);
		}
	}

	function applicant_update($id) {
		$p = $this->input->post();
		$this->my_model->update('applicant', $p, $id);
		redirect('indicator/applicant');
	}

	function applicant_delete($id) {
		$this->my_model->delete('applicant', $id);
		redirect('indicator/applicant');
	}

	function advocate() {
		$data['advocate'] = $this->my_model->get_all_data('advocate');
		$this->show_page('indicator/advocate_view', 'advocate', $data);
	}

	function insert_advocate() {
		$this->form_validation->set_rules('advocate_name','advocate Name','required');
		if($this->form_validation->run()){
			$p = $this->input->post();
			$advocate_insert = $this->my_model->insert('advocate', $p);

			if($advocate_insert) {
				$this->session->flashdata('success_msg', 'advocate Name Added successfully.');
				redirect('indicator/advocate');
			}

		}else{
			$data['advocate'] = $this->my_model->get_all_data('advocate');
			$this->show_page('indicator/advocate_view', 'advocate', $data);
		}
	}

	function advocate_update($id) {
		$p = $this->input->post();
		$this->my_model->update('advocate', $p, $id, 'advocate_id');
		redirect('indicator/advocate');
	}

	function advocate_delete($id) {
		$this->my_model->delete('advocate', $id, 'advocate_id');
		redirect('indicator/advocate');
	}

	function case_type() {
		$data['case_type'] = $this->my_model->get_all_data('case_type');
		$this->show_page('indicator/case_type_view', 'case_type', $data);
	}

	function insert_case_type() {
		// changed case_type_name to case_type in set_rules below
		$this->form_validation->set_rules('case_type','case_type Name','required'); 
		if($this->form_validation->run()){
			$p = $this->input->post();
			$case_type_insert = $this->my_model->insert('case_type', $p);

			if($case_type_insert) {
				$this->session->flashdata('success_msg', 'case_type Name Added successfully.');
				redirect('indicator/case_type');
			}

		}else{
			$data['case_type'] = $this->my_model->get_all_data('case_type');
			$this->show_page('indicator/case_type_view', 'case_type', $data);
		}
	}

	function case_type_update($id) {
		$p = $this->input->post();
		$this->my_model->update('case_type', $p, $id);
		redirect('indicator/case_type');
	}

	function case_type_delete($id) {
		$this->my_model->delete('case_type', $id);
		redirect('indicator/case_type');
	}

}