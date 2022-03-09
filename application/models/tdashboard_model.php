<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tdashboard_model extends CI_Model {
  public function set_teacher_id($idTeacher){
    $this->db->select('*');
    $this->db->from('teachers');
    $this->db->join('schools', 'schools_id = teachers_schools_id');
    $this->db->where('teachers_id', $idTeacher);
    $se = $this->db->get();
    return $se->result();
  }
}
