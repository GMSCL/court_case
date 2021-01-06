<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reports extends MY_Controller {

	var $data;
	var $reportViews = array(
		'pending_case' => "court/pending_case_view",
		'appeal_case' => "court/appeal_case_report_view",
		'hearing_date_wise' => "reports/appeal_date_wise_detail_view",
		'financial_expense_wise' => "reports/financial_expense_wise_detail_view",
		"all_cases_report" => "reports/all_cases_detail_report_view"
	);

	var $reportFileNames = array(
		'pending_case' => "Pending Cases Report",
		'appeal_case' => "Cases to Appeal Report",
		'hearing_date_wise' => "Hearing Date Wise Report",
		'financial_expense_wise' => "Financial Expense Wise Case Report",
		"all_cases_report" => "All Cases Report"
	);

	var $reportSheetNames = array(
		'pending_case' => "Pending Cases",
		'appeal_case' => "Cases to Appeal",
		'hearing_date_wise' => "Hearing Date Wise Cases",
		'financial_expense_wise' => "Financial Expense Wise Cases",
		"all_cases_report" => "All Cases"
	);

	var $reportFunctions = array(
		'pending_case' => 'pending_case_report',
		'appeal_case' => "appeal_case_report",
		'hearing_date_wise' => "appeal_date_wise_detail",
		"financial_expense_wise" => "financial_expense_wise_detail",
		"all_cases_report" => "all_cases_detail_report"
	);

	function __construct() {
		parent::__construct();
		$this->load->model('my_model');
		$this->load->helper('url');
		if(!$this->session->userdata('user_id')) {
			redirect('login');
		}
		$this->data['user_id'] = $this->session->userdata('user_id');
		$this->data['court']= $this->my_model->get_all_data('court');
		$this->data['department'] = $this->my_model->get_all_data('department');
		$data['applicant'] = $this->my_model->get_all_data('applicant');
		$this->data['advocate'] = $this->my_model->get_all_data('advocate');
		$this->data['case_type'] = $this->my_model->get_all_data('case_type');
		// print_r($this->data['department']);
	}

	function appeal_report() {
		$this->show_page('reports/appeal_date_wise_view', 'hearing_date_wise');
	}

	function all_cases_report() {
		$this->show_page('reports/all_cases_report_view', 'all_cases_report', $this->data);
	}

	function all_cases_detail_report() {
		$caseNo = $this->session->flashdata('case_no');
		$start_date = $this->session->flashdata('startDate');
		$end_date = $this->session->flashdata('endDate');
		$department = $this->session->flashdata('department_id');
		$court = $this->session->flashdata('court_id');
		$caseType = $this->session->flashdata('case_type_id');
		$caseStatus = $this->session->flashdata('case_status');
		$courtDecision = $this->session->flashdata('court_judgement');
		$advocate = $this->session->flashdata('advocate_id');
		$applicant = $this->session->flashdata('applicant_id');
		$interimOrderIssued = $this->session->flashdata('interim_order_issued');

		if ($caseNo == null) {
			$caseNo = $this->input->post('case_no');
			$this->session->set_flashdata('case_no', $caseNo);
		}
		if ($department == null) {
			$department = $this->input->post('department_id');
			$this->session->set_flashdata('department_id', $department);
		}
		if ($court == null) {
			$court = $this->input->post('court_id');
			$this->session->set_flashdata('court_id', $court);
		}
		if ($caseType == null) {
			$caseType = $this->input->post('case_type_id');
			$this->session->set_flashdata('case_type_id', $caseType);
		}
		if ($caseStatus == null) {
			$caseStatus = $this->input->post('case_status');
			$this->session->set_flashdata('case_status', $caseStatus);
		}
		if ($courtDecision == null) {
			$courtDecision = $this->input->post('court_judgement');
			$this->session->set_flashdata('court_judgement', $courtDecision);
		}
		if ($advocate == null) {
			$advocate = $this->input->post('advocate_id');
			$this->session->set_flashdata('advocate_id', $advocate);
		}
		if ($applicant == null) {
			$applicant = $this->input->post('applicant_id');
			$this->session->set_flashdata('applicant_id', $applicant);
		}
		if ($start_date == null && $end_date == null) {
			$sDate = $this->input->post('start');
			$eDate = $this->input->post('end');
			if ($sDate != null && $sDate != "") {
				$start_date = $this->my_model->date_format($sDate);
			}
			if ($eDate != null && $eDate != "") {
				$end_date = $this->my_model->date_format($eDate);
			}
			$this->session->set_flashdata('startDate', $start_date);
			$this->session->set_flashdata('endDate', $end_date);
		}
		if ($interimOrderIssued == null) {
			$interimOrderIssued = $this->input->post('interim_order_issued');
			$this->session->set_flashdata('interim_order_issued', $interimOrderIssued);
		}

		$user_id = $this->session->userdata('user_id');
        $is_admin = $this->my_model->get_user($user_id);

        if($is_admin != '1') { 
            $this->db->where('case_detail.department_id', $user_id);
        }

		if ($caseNo != null) {
			$this->db->where("case_detail.case_no like '%$caseNo%'");
		}
		if ($start_date != null && $end_date != null) {
			$this->db->where('appeal_date >=', $start_date);
			$this->db->where('appeal_date <=', $end_date);
		}
		if ($court != null) {
			$this->db->where('case_detail.court_id =', $court, FALSE);
		}
		if ($department != null) {
			$this->db->where('case_detail.department_id =', $department, FALSE);
		}
		if ($caseType != null) {
			$this->db->where('case_detail.case_type_id =', $caseType, FALSE);
		}
		if ($caseStatus != null) {
			$this->db->where('case_status =', $caseStatus, FALSE);
		}
		if ($courtDecision != null) {
			$this->db->where('court_judgement =', $courtDecision, FALSE);
		}
		if ($advocate != null) {
			$this->db->where('case_detail.advocate_id =', $advocate, FALSE);
		}
		if ($applicant != null) {
			$this->db->where("case_detail.applicant_id like '%$applicant%'");
		}
		if ($interimOrderIssued != null) {
			$this->db->where("case_detail.interim_order_issued = ", $interimOrderIssued);
		}

		$this->db->order_by('register_date', 'ASC');
		$this->db->select('case_detail.id AS case_id, case_type.case_type, case_detail.*, advocate.advocate_name, court.court_name,department.department_name'); 
		$this->db->select('IF (case_detail.case_status=1, "પુર્ણ", "ચાલુ") as case_status', false);
		$this->db->select('(CASE case_detail.court_judgement WHEN 1 THEN "તરફેંણમાં" WHEN 0 THEN "વિપરીત" ELSE "" END) as court_judgement', false);
		$this->db->select('IF (case_detail.interim_order_issued=1, "હા", "ના") as interim_order_issued', false);
		$this->db->from('case_detail');
		$this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id','left');
		$this->db->join('court', 'case_detail.court_id = court.court_id','left');
		$this->db->join('department', 'case_detail.department_id = department.id','left');
		$this->db->join('case_type', 'case_detail.case_type_id = case_type.id','left');
		$data['data'] = $this->db->get()->result_array();
		log_message('debug', "SQL query is ->" .$this->db->last_query());

		$data['date_1'] = $this->my_model->date_format_2($this->input->post('start'));
		$data['date_2'] = $this->my_model->date_format_2($this->input->post('end'));
		
		return $data;
	}

	function appeal_date_wise_detail() {

		$start_date = $this->session->flashdata('startDate');
		$end_date = $this->session->flashdata('endDate');

		if ($start_date == null && $end_date == null) {
			$sDate = $this->input->post('start');
			$eDate = $this->input->post('end');
			if ($sDate != null && $sDate != "") {
				$start_date = $this->my_model->date_format($sDate);
			}
			if ($eDate != null && $eDate != "") {
				$end_date = $this->my_model->date_format($eDate);
			}
			$this->session->set_flashdata('startDate', $start_date);
			$this->session->set_flashdata('endDate', $end_date);
		}

		$user_id = $this->session->userdata('user_id');
        $is_admin = $this->my_model->get_user($user_id);

        if($is_admin != '1') { 
            $this->db->where('case_detail.department_id', $user_id);
		}

		if ($start_date != null && $end_date != null) {
			$this->db->where('appeal_date >=', $start_date);
			$this->db->where('appeal_date <=', $end_date);
		}
		$this->db->order_by('appeal_date', 'ASC');
		$this->db->select('case_detail.id AS case_id, case_detail.*,advocate.advocate_name, court.court_name,department.department_name'); 
		$this->db->select('IF (case_detail.interim_order_issued=1, "હા", "ના") as interim_order_issued', false);
		$this->db->from('case_detail');
		$this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id','left');
		$this->db->join('court', 'case_detail.court_id = court.court_id','left');
		$this->db->join('department', 'case_detail.department_id = department.id','left');
		$data['data'] = $this->db->get()->result_array();
		log_message('debug', "SQL query is ->" .$this->db->last_query());

		$data['date_1'] = $this->my_model->date_format_2($this->input->post('start'));
		$data['date_2'] = $this->my_model->date_format_2($this->input->post('end'));
		
		// $this->show_page('reports/appeal_date_wise_detail_view', 'appeal_detail', $data);
		return $data;
	}

	function pending_case_report() {

		$user_id = $this->session->userdata('user_id');
        $is_admin = $this->my_model->get_user($user_id);

        if($is_admin != '1') { 
            $this->db->where('case_detail.department_id', $user_id);
        }

        $this->db->where('case_detail.case_status', 0);
        $this->db->order_by('case_detail.register_date', 'ASC');
		$this->db->select('case_detail.id AS case_id, case_detail.*, advocate.advocate_name, DAY(case_detail.register_date) as register_day,,court.court_name,department.department_name');    
		$this->db->select('IF (case_detail.interim_order_issued=1, "હા", "ના") as interim_order_issued', false);
		$this->db->from('case_detail');
		$this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id','left');
		$this->db->join('court', 'case_detail.court_id = court.court_id','left');
		$this->db->join('department', 'case_detail.department_id = department.id','left');
		$data['data'] = $this->db->get()->result_array();		
		
		// $this->show_page('court/pending_case_view', 'pending_case', $data);
		// loadView();
		return $data;
	}

	function loadView() {
		$params = $_SERVER['QUERY_STRING'];
		list(,$reportName) = explode('=', $params);
		$data = call_user_func_array(array($this, $this->reportFunctions[$reportName]), array());
		log_message('debug', "Viewing report ->".$reportName);
		$this->show_page($this->reportViews[$reportName], $reportName, $data);
	}

	function export() {
		$params = $_SERVER['QUERY_STRING'];
		list(,$reportName) = explode('=', $params);
		log_message('debug', "Report query parameters ->" .$params);
		$data = call_user_func_array(array($this, $this->reportFunctions[$reportName]), array());
		$this->exportToExcel($reportName, $data);
	}

	// TODO: This should ideally be moved to a separate controller. But for now since i couldn't find a 
	// way to pass report data (too much to be stored in session) between controllers have resorted to using this function.
	function exportToExcel($reportName, $data) {
		// create spreadsheet
		$this->spreadsheet = new Spreadsheet();
		
		// Configure spreadsheet
		$this->spreadsheet->getActiveSheet()->setTitle($this->reportSheetNames[$reportName]);
		$sheet = $this->spreadsheet->getActiveSheet();
		
		// read headers
		$str = file_get_contents(getcwd()."/application/config/reports.json");
		$headersJson = json_decode($str, true); // decode the JSON into an associative array
		$lastRow = sizeof($data['data']) + 1;
		$lastCol = end($headersJson[$reportName])['col'];

		// set headers
		$sheet->setCellValue("A1", "Sr. No.");
		foreach($headersJson[$reportName] as $key => $value) {
			$sheet->setCellValue("{$value['col']}1", $value['name']);
		}

		$dateCols = array();
        // write data
        $rows = 2;
        foreach ($data['data'] as $key => $val){
			$sheet->setCellValue('A' . $rows, $key + 1);
			foreach($headersJson[$reportName] as $key => $value) {

				if (array_key_exists('type', $value) && $value['type'] == 'date') {
					array_push($dateCols, $value['col']);
				}
				if (in_array($value['col'] ,$dateCols) && $val[$key] == '0000-00-00') {
					$sheet->setCellValue($value['col'] . $rows, "");
				} else {
					$sheet->setCellValue($value['col'] . $rows, mb_convert_encoding($val[$key], "UTF-8"));
				}
			}
            $rows++;
		}
		log_message('info', "date cols ->" .implode(',', $dateCols));

		// format spreadsheet
		$this->setSpreadsheetStyle($this->spreadsheet, $lastRow, $lastCol, $dateCols);

        $writer = new Xlsx($this->spreadsheet);		// create writer
        
        // set http headers for file download
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); 
		// header("Content-Type: application/vnd.ms-excel"); // for excel 2007 .xls format 
        header('Content-Disposition: attachment;filename="'. $this->reportFileNames[$reportName] .'.xlsx"');
        header('Cache-Control: max-age=0');

		// ob_end_clean();  // clean output buffer before writing.
        // download file
		$writer->save('php://output');
	}

	function appeal_case_report() {

		$user_id = $this->session->userdata('user_id');
        $is_admin = $this->my_model->get_user($user_id);

        if($is_admin != '1') { 
            $this->db->where('case_detail.department_id', $user_id);
        }

        $this->db->where('case_detail.appealed', 1);
        $this->db->order_by('case_detail.register_date', 'ASC');
		$this->db->select('case_detail.id AS case_id, case_detail.*, advocate.advocate_name, DAY(case_detail.register_date) as register_day,court.court_name,department.department_name');
		$this->db->select('IF (case_detail.case_status=1, "પુર્ણ", "ચાલુ") as case_status', false);
		$this->db->select('(CASE case_detail.court_judgement WHEN 1 THEN "તરફેંણમાં" WHEN 0 THEN "વિપરીત" ELSE "" END) as court_judgement', false);
		$this->db->from('case_detail');
		$this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id','left');
		$this->db->join('court', 'case_detail.court_id = court.court_id','left');
		$this->db->join('department', 'case_detail.department_id = department.id','left');
		$data['data'] = $this->db->get()->result_array();
		log_message('debug', "SQL query is ->".$this->db->last_query());
		// $this->show_page('court/appeal_case_report_view', 'appeal_case', $data);
		return $data;
	}

	function financial_expense() {

		$data['financial_expense'] = $this->my_model->get_all_data('financial_expense');
		$this->show_page('reports/financial_expense_view', 'financial_expense', $data);
	}

	function financial_expense_wise_detail() {
		$financial_expense = $this->input->post('financial_expense');

		$this->db->where('id', $financial_expense);
		$fin_expeense = $this->db->get('financial_expense')->result_array();

		$this->db->where('expense >=', $fin_expeense[0]['from_rupees']);
		$this->db->where('expense <=', $fin_expeense[0]['to_rupees']);
		$this->db->select('case_detail.id AS case_id, case_detail.*, advocate.advocate_name, court.court_name,department.department_name');    
		$this->db->from('case_detail');
		$this->db->join('advocate', 'case_detail.advocate_id = advocate.advocate_id','left');
		$this->db->join('court', 'case_detail.court_id = court.court_id','left');
		$this->db->join('department', 'case_detail.department_id = department.id','left');
		$data['data'] = $this->db->get()->result_array();

		$data['fin_expeense']= $fin_expeense;

		// $this->show_page('reports/financial_expense_wise_detail_view', 'financial_expense', $data);
		return $data;

	}

	function log_report() {
		$this->db->order_by('date_login', 'DESC');
		$this->db->from('login_log');
		$this->db->join('user', 'user.id = login_log.user_id');
		$data['data'] = $this->db->get()->result_array();

		$this->show_page('reports/log_report_view', 'log_report', $data);
	}

	function entry_report() {
		$data['data'] = $this->db->query("SELECT user.name, COUNT(distinct case_detail.id) AS total_entry, login_log.date_login, login_log.ip_address 
			FROM user 
			RIGHT JOIN login_log ON login_log.user_id = user.id 
			LEFT JOIN case_detail ON case_detail.user_id = user.id 
			GROUP BY login_log.user_id 
			ORDER BY login_log.date_login DESC")->result_array();
		// echo $this->db->last_query();exit;
		$this->show_page('reports/entry_report_view', 'entry_report', $data);
	}

	function profile() {
		$user_id = $this->session->userdata('user_id');

		$this->db->where('id', $user_id);
		$data['user'] = $this->db->get('user')->result_array();

		// print_r($data);exit;
		$this->show_page('reports/profile_view','' ,$data);
	}

	function change_profile() {
		$user_id = $this->session->userdata('user_id');


		$data = array(
			'mobile_no' => $this->input->post('mobile_no'), 
			'email' => $this->input->post('email')
		);
		$this->db->where('id', $user_id);
		$update = $this->db->update('user', $data);

		if($update) {
			$this->session->set_flashdata('message', 'Profile  updated successfully.');
			redirect('reports/profile');
		}
	}

	function setSpreadsheetStyle($spreadsheet, $lastRow, $lastCol, $dateCols) {

		$spreadsheet->getActiveSheet()->freezePane('B2'); // freeze 1st row i.e. Header and column A.

		// TODO: autoSize() does not seem to work correctly and leaves column width more then expected.
		// should ideally add a size property in reports.json config file to override autoSize() width setting for that particular column.
		foreach(range('A', $lastCol) as $columnID) { 
			if ($columnID != 'D' && $columnID != 'F') {
				$this->spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
			}
		}


		// TODO: setBreak to set the page break does not work, get it to work.
		// $this->spreadsheet->getActiveSheet()->setBreak("F20", \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_COLUMN); // set print break to last column.
		// log_message('debug', "page breaks:".implode(',', $this->spreadsheet->getActiveSheet()->getBreaks()));

		// $spreadsheet->getActiveSheet()->getPageSetup()->setPrintArea('A1:'.$lastCol.$lastRow);

		// add style to the header
		$styleArray = array(
			'font' => array(
			  'bold' => true,
			  'color' => array('rgb' => 'FFFFFF')
			),
			'alignment' => array(
			  'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			  'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			),
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('rgb' => '333333'),
				),
			),
			'fill' => array(
			  'type'       => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
			  'rotation'   => 90,
			  'startcolor' => array('rgb' => '307ECC'),
			  'endColor'   => array('rgb' => '307ECC'),
			),
		  );

		  $this->spreadsheet->getActiveSheet()->getStyle('A1:' .$lastCol .'1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
		  $this->spreadsheet->getActiveSheet()->getStyle('A1:' .$lastCol .'1')->getFill()->getStartColor()->setARGB('307ECC');
		  $this->spreadsheet->getActiveSheet()->getStyle('A1:' .$lastCol .'1')->applyFromArray($styleArray);
		  $this->spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
		  $this->spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(80);
		  $this->spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(50);

		  // set date format
		  $this->setStyleForDate($this->spreadsheet, $dateCols);

		  // set table data format
		  $styleArray = array(			
			'alignment' => array(
			  'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			  'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			),
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('rgb' => '333333'),
				),
			)
		  );
		 
		  $this->spreadsheet->getActiveSheet()->getStyle("A1:" .$lastCol .$lastRow)->getAlignment()->setWrapText(true);
		  $this->spreadsheet->getActiveSheet()->getStyle("A1:" .$lastCol .$lastRow)->applyFromArray($styleArray);
	}

	function setStyleForDate($spreadsheet, $cols) {

		foreach($cols as $vals) {
			$spreadsheet->getActiveSheet()->getStyle($vals)
					->getNumberFormat()
					->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
		}
	}
}