<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class attendance_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

  public function set_attendance($insert){
    $query = $this->db->insert('attendance', $insert);

    if($query){
      return TRUE;
    }else{
      return False;
    }
  }


  public function set_update_attendance($insert, $date){
  //  print_r($insert);
    $plucked = array_map(function($rows){return $rows['attendance_students_id'];}, $insert);
    $ids = join("','", $plucked);
    $this->db->select('*');
    $this->db->where('attendance_data', $date);
    $this->db->where_in('attendance_students_id', $ids);
    $query = $this->db->get('attendance');
    $user = $query->result();
    $rows = $query->num_rows();

    //print_r ($rows);

    if($rows > 0){
    $this->db->where('attendance_data', $date);
      return $query = $this->db->update_batch('attendance', $insert, 'attendance_students_id');
      //echo "update";
    }else{
      return $ins = $this->db->insert_batch('attendance', $insert);
      //echo "insert";
    }
  }

  public function set_check_attendance($insert){
    $this->db->where('attendance_data', $insert, $insert->attendance_data);
    $this->db->where('attendance_students_id', $insert, $insert['attendance_students_id']);
    $query = $this->db->get('attendance');
    return $query->result();
  }

  public function set_attendance_view($assign_id, $students_year_entry, $idSchool, $date){
    $this->db->select('*');
    $this->db->from('students, assign, classes, standards, schools');
    $this->db->join('attendance', 'students.students_id = attendance.attendance_students_id');
    $this->db->where('classes.class_id = students.students_classes_id');
    $this->db->where('standards.standards_id = students.students_standard_id');
    $this->db->where('assign.assign_class_id = students.students_classes_id');
    $this->db->where('assign_standard_id = students_standard_id');
    $this->db->where('assign.assign_id', $assign_id);
    $this->db->where('schools.schools_id = students_schools_id');
    $this->db->where('students_year_entry', $students_year_entry);
    $this->db->where('students.students_schools_id', $idSchool);
    $this->db->where('attendance_data', $date);
    $query = $this->db->get();
    return $query->result();
  }

  public function set_report_attendance($assign_id, $students_year_entry){
    $this->db->select('attendance_data, assign_id, attendance_id');
    $this->db->from('students, assign, classes, standards, schools');
    $this->db->join('attendance', 'students.students_id = attendance.attendance_students_id');
    $this->db->where('classes.class_id = students.students_classes_id');
    $this->db->where('standards.standards_id = students.students_standard_id');
    $this->db->where('assign.assign_class_id = students.students_classes_id');
    $this->db->where('assign_standard_id = students_standard_id');
    $this->db->where('students_year_entry', $students_year_entry);
    $this->db->group_by('attendance_data');
    $this->db->order_by('attendance_data', 'desc');
    $this->db->where('assign_id', $assign_id);
    $query =  $this->db->get();
    return $query->result();
  }
}
