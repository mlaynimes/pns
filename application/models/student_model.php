<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class student_model extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

  public function set_class($idSchool){
    $this->db->where('class_school_id', $idSchool);
    $query = $this->db->get('classes');
    return $query->result();
  }

  public function set_standard($idSchool){
    $this->db->where('standards_schools_id', $idSchool);
    $query = $this->db->get('standards');
    return $query->result();
  }

  public function set_add_student($insert){
  return  ($this->db->insert('students', $insert));
  }


  public function set_manage_student($idSchool)
  {
    //$this->db->limit($limit, $start);
    $this->db->select('*');
    $this->db->from('students');
    $this->db->join('standards', 'standards_id = students_standard_id');
    $this->db->join('classes', 'class_id = students_classes_id');
    $this->db->where('students_schools_id', $idSchool);
    $this->db->order_by('students_id', 'desc');
    $query = $this->db->get();

    return $query->result();
  }

  public function set_count_student($idSchool){
    $this->db->where('students_schools_id', $idSchool);
    return $this->db->count_all('students');
}


  public function importStudent($inserdata){
      $res = $this->db->insert_batch('students', $inserdata);
      if($res){
        return TRUE;
      }else{
        return FALSE;
      }
  }

  public function delete_student($ID){
    $this->db->where('students_id', $ID);
    return $this->db->delete('students');
  }

  public function set_edit_student($studentID){
    $this->db->select('*');
    $this->db->from('students');
    $this->db->join('standards', 'standards_id = students_standard_id');
    $this->db->join('classes', 'class_id = students_classes_id');
    $this->db->where('students_id', $studentID);
    $query = $this->db->get();
    return $query->result();
  }

  public function set_update_student($update, $id){
    $this->db->where('students_id', $id);
    return $this->db->update('students', $update);

  }
}
