<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    protected $table_name = '';
    protected $primary_key = 'id';

    public function __construct() {
        parent::__construct();
    }

    public function insert($table_name, $data) {
        // $this->db->set("created_at", "NOW()", FALSE);
        $success = $this->db->insert($table_name, $data);
        if ($success) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    public function get($id) {
        return $this->db->get_where($this->table_name, array($this->primary_key => $id))->result_array();
    }

    public function get_all_data($table_name) {
        return $this->db->get($table_name)->result_array();
    }

    public function get_data($table_name, $id) {
        $this->db->where('id', $id);
        return $this->db->get($table_name)->result_array();
    }

    function date_format($date) {
        if (!empty($date) && $date != "") {            
            $d1 = date_create($date);
            $d2 = date_format($d1, 'Y-m-d');
            return $d2;
        }
        return $date;
    }

    function date_format_2($date) {
        if (!empty($date) && $date != "") {
            $d1 = date_create($date);
            $d2 = date_format($d1, 'd-m-Y');
            return $d2; 
        }
        return $date;
    }

    public function update($table_name, $data, $id, $col_name = 'id') {
        if ($col_name) {
            $this->db->where($col_name, $id);
        } else {
            $this->db->where('id', $id);
        }
        
        $this->db->update($table_name, $data);
        echo $this->db->last_query();
    }

    public function delete($table_name, $id, $col_name = 'id') {
        if ($col_name) {
            $this->db->where($col_name, $id);
        } else {
            $this->db->where('id', $id);
        }        
        return $this->db->delete($table_name);
    }

    function get_user($id) {
        $this->db->where('id', $id);
        $this->db->select('id,is_admin');
        $user_data = $this->db->get('user')->result_array()[0]['is_admin'];
        return $user_data;
    }

    function count_row($table_name) {
        
    }
}