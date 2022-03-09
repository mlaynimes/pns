<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class teacher_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }



  public function set_teachers($insert){
    return($this->db->insert('teachers', $insert));
  }


  public function set_manage_teachers($idSchool){
    $this->db->select('*');
    $this->db->from('teachers');
    $this->db->join('schools', 'schools_id = teachers_schools_id');
    $this->db->where('teachers_schools_id', $idSchool);
    $this->db->order_by('teachers_id', 'desc');
    $query = $this->db->get();

    return $query->result();
  }


  public function set_delete_teachers($teachersID){
    $this->db->where('teachers_id', $teachersID);
    $this->db->delete('teachers');

  }

  public function set_edit_teachers($teachersID, $idSchool){
    $this->db->where('teachers_id', $teachersID);
    $this->db->where('teachers_schools_id', $idSchool);
    $query = $this->db->get('teachers');
    return $query->result();

  }

  public function set_update_teachers($update, $teacherId){
    $this->db->where('teachers_id', $teacherId);
    return $this->db->update('teachers', $update);

  }


  public function set_login($teacher_email){
    $this->db->where('teachers_email', $teacher_email);
    $query = $this->db->get('teachers');
    return $query->result();
  }


  public function set_teacher_task($idTeacher){
    $this->db->select('*');
    $this->db->from('assign, students');
    $this->db->join('classes', 'class_id = assign_class_id');
    $this->db->join('standards', 'standards_id = assign_standard_id');
    $this->db->join('teachers', 'teachers_id = assign_teacher_id');
    $this->db->where('students_classes_id = assign_class_id');
    $this->db->where('students_standard_id = assign_standard_id');
    $this->db->where('assign_teacher_id', $idTeacher);
    $this->db->group_by('students_year_entry');
    $this->db->order_by('students_year_entry DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function set_student_attendance($assign_id, $students_year_entry, $idSchool){
    $this->db->select('*');
    $this->db->from('students, assign, classes, standards, schools');
    $this->db->where('classes.class_id = students.students_classes_id');
    $this->db->where('standards.standards_id = students.students_standard_id');
    $this->db->where('assign.assign_class_id = students.students_classes_id');
    $this->db->where('assign_standard_id = students_standard_id');
    $this->db->where('assign.assign_id', $assign_id);
    $this->db->where('schools.schools_id = students_schools_id');
    $this->db->where('students_year_entry', $students_year_entry);
    $this->db->where('students.students_schools_id', $idSchool);
    $query = $this->db->get();
    return $query->result();
  }

  public function set_update_teacher_pass($update, $teacherid){
    $this->db->where('teachers_id', $teacherid);
    return $this->db->update('teachers', $update);
  }
}
?>
