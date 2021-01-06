<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Log extends MY_Controller {

	function __construct() {
		parent::__construct();
		log_message('debug', 'Ion Auth : Auth class loaded');
		if(!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	function password_change_log() {

	}

}
