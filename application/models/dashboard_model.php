<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_model extends CI_Model {
  public function set_school_id($idSchool){
    $this->db->where('schools_id', $idSchool);
    $se = $this->db->get('schools');

    return $se->result();
  }
}
