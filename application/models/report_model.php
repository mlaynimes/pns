<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

  public function set_generate_pdf($assign_id, $attendance_data, $idSchool){
      $this->db->select('*');
      $this->db->from('students, assign, classes, standards, schools');
      $this->db->join('attendance', 'students.students_id = attendance.attendance_students_id');
      $this->db->where('classes.class_id = students.students_classes_id');
      $this->db->where('standards.standards_id = students.students_standard_id');
      $this->db->where('assign.assign_class_id = students.students_classes_id');
      $this->db->where('assign_standard_id = students_standard_id');
      $this->db->where('assign.assign_id', $assign_id);
      $this->db->where('schools.schools_id = students_schools_id');
      $this->db->where('students.students_schools_id', $idSchool);
      $this->db->where('attendance_data', $attendance_data);
      $query = $this->db->get();
      return $query->result();
    }

  }
