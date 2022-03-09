<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class school_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

  public function set_school_register($insert){
    return($this->db->insert('schools', $insert));
  }

  public function set_login($school_email){
    $this->db->where('schools_email', $school_email);
    $query = $this->db->get('schools');
    return $query->result();
}

  public function set_update_school_info($update, $schoolid){
    $this->db->where('schools_id', $schoolid);
    $query = $this->db->update('schools', $update);
    return $query;
  }

  public function set_update_profile($update, $schoolid){
    $this->db->where('schools_id', $schoolid);
    $query = $this->db->update('schools', $update);
    return $query;
  }

  public function set_update_school_password($update, $schoolid){
    $this->db->where('schools_id', $schoolid);
    return $query = $this->db->update('schools', $update);
  }

  public function set_school_recovery_password($schoolEmail){
    $this->db->where('schools_email', $schoolEmail);
    $query = $this->db->get('schools');
    return $query->result();
  }

  public function set_limit_check($date, $schoolid){
    $this->db->where('limit_date', $date);
    $this->db->where('limit_school_id', $schoolid);
    $this->db->get('limit');
    return $rows = $this->db->affected_rows();
  }

  public function set_limit_add($check){
    return($this->db->insert('limit', $check));
  }

  public function set_school_reset_pass($update, $email){
    $this->db->where('schools_email', $email);
    return $this->db->update('schools', $update);
  }
}
?>
