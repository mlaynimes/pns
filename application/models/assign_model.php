<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class assign_model extends CI_Model
{
  public function set_class_assign($idSchool){
    $this->db->where('class_school_id', $idSchool);
    $query = $this->db->get('classes');
    return $query->result();
  }

  public function set_standard_assign($idSchool){
    $this->db->where('standards_schools_id', $idSchool);
    $query =  $this->db->get('standards');
    return $query->result();
  }


  public function set_teacher_assign($teacherID){
  $this->db->where('teachers_id', $teacherID);
  $query = $this->db->get('teachers');
  return $query->result();
}


  public function set_add_assign($insert){
    return($this->db->insert('assign', $insert));
  }


  public function set_get_assign($idSchool){
    $this->db->select('*');
    $this->db->from('assign');
    $this->db->join('classes', 'class_id = assign_class_id');
    $this->db->join('standards', 'standards_id = assign_standard_id');
    $this->db->join('teachers', 'teachers_id = assign_teacher_id');
    $this->db->where('assign_school_id', $idSchool);
    $this->db->order_by('assign_teacher_id', 'asce');
    $query = $this->db->get();

    return $query->result();
  }


  public function set_delete_assign($ID){
    $this->db->where('assign_id', $ID);
    return $this->db->delete('assign');
  }

  public function set_assign_edit($ID, $idSchool){
    $this->db->select('*');
    $this->db->from('assign');
    $this->db->join('classes', 'class_id = assign_class_id');
    $this->db->join('standards', 'standards_id = assign_standard_id');
    $this->db->join('teachers', 'teachers_id = assign_teacher_id');
    $this->db->where('assign_school_id', $idSchool);
    $this->db->where('assign_id', $ID);
    $query = $this->db->get();

    return $query->result();
}

public function set_assign_update($update, $IDassign){
  $this->db->where('assign_id', $IDassign);
  return $this->db->update('assign', $update);
}

public function set_count_students($idSchool){
  $this->db->select('MAX(students_year_entry), students_year_entry, count(*) as total, classes.class_name, standards.standards_name, standards.standards_id, classes.class_id');
  $this->db->from('students');
  $this->db->join('classes', 'classes.class_id = students.students_classes_id');
  $this->db->join('standards', 'standards.standards_id = students.students_standard_id');
  $this->db->where('students.students_schools_id', $idSchool);
  $this->db->group_by('standards.standards_id, classes.class_id, students_year_entry');
  $this->db->order_by('students_year_entry DESC');
  $query = $this->db->get();
  return $query->result();
}

public function set_assign_view_students($classid, $standardid){
  $this->db->select('*');
  $this->db->from('students');
  $this->db->join('classes', 'classes.class_id = students.students_classes_id');
  $this->db->join('standards', 'standards.standards_id = students.students_standard_id');
  $this->db->where('standards.standards_id', $standardid);
  $this->db->where('classes.class_id', $classid);
  $query = $this->db->get();
  return $query->result();
}

public function set_assign_student($examid, $assign_id, $student_year){  
  $this->db->select('*');
  $this->db->from('students, assign, subjects');
  $this->db->where('assign.assign_class_id = students.students_classes_id');
  $this->db->where('assign.assign_standard_id = students.students_standard_id');
  $this->db->where('students.students_year_entry', $student_year);
  $this->db->join('result', 'result.result_student_id = students.students_id and result.result_exam_id ='.$examid, 'left');
  $this->db->where('assign_id', $assign_id);
  $this->db->order_by('result_exam_id', 'ASC');
  $this->db->group_by('result.result_student_id');
  $this->db->group_by('students.students_id');
  $query = $this->db->get();
  return $query->result();
}

public function set_assign_studentII($examid, $assign_id, $student_year){  
  $this->db->select('*');
  $this->db->from('students, assign');
  $this->db->where('assign.assign_class_id = students.students_classes_id');
  $this->db->where('assign.assign_standard_id = students.students_standard_id');
  $this->db->where('students.students_year_entry', $student_year);
  $this->db->join('result', 'result.result_student_id = students.students_id and result_exam_id = 5', 'right');
  $this->db->where('assign_id', $assign_id);
 $this->db->group_by('result.result_student_id');
  $this->db->group_by('students.students_id');
   $query = $this->db->get();
  return $query->result();
  
}

public function set_assign_subject($assign_id){
  $this->db->select('*');
  $this->db->from('assign, subjects');
  $this->db->where('subjects.subject_standard_id = assign.assign_standard_id');
  $this->db->where('assign_id', $assign_id);
  $query = $this->db->get();
  return $query->result();
}

public function set_assign_view_record($assign_id, $student_year, $examid){
  $this->db->select('*');
  $this->db->from('students, assign, result, exam');
  $this->db->where('assign.assign_class_id = students.students_classes_id');
  $this->db->where('assign.assign_standard_id = students.students_standard_id');
  $this->db->where('exam.exam_id = result.result_exam_id');
  $this->db->where('students.students_year_entry', $student_year);
  $this->db->where('assign_id', $assign_id);
  $this->db->where('result_exam_id', $examid);
  $this->db->group_by('students.students_id');
  $query = $this->db->get();
  return $query->result();
}

public function set_assign_update_class($update, $studentid){
  $this->db->where_in('students_id', $studentid);
  return $this->db->update('students', $update);
}

}
