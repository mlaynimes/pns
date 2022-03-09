<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class panel_model extends CI_Model
{
    public function set_view_exam_result($idSchool){
        $this->db->select('*');
        $this->db->from('result');
        $this->db->join('exam', 'exam.exam_id = result.result_exam_id', 'right');
        $this->db->join('standards', 'standards.standards_id = result.result_standard_id', 'left');
        $this->db->join('students','students.students_id = result.result_student_id','left');
        $this->db->join('classes', 'classes.class_id = result.result_class_id', 'left');
        $this->db->group_by('exam.exam_id');
        $this->db->group_by('students.students_year_entry');
        $this->db->group_by('result.result_standard_id');
        $this->db->group_by('exam.exam_id');
        $this->db->order_by('exam.exam_id DESC');
        $this->db->where('exam_school_id', $idSchool);
        $query = $this->db->get();
        return $query->result();
    }

    public function set_add_exam($insert){
       return ($this->db->insert('exam', $insert)); 
    }

    public function set_delete_exam($delete){
        $this->db->where('exam_id', $delete);
        return $this->db->delete('exam');
    }

    public function set_update_exam($update, $examid){
        $this->db->where('exam_id', $examid);
        return $this->db->update('exam', $update);
    }


    public function set_panel_view_record($examid, $standardid, $year){
        $this->db->select('*, GROUP_CONCAT(subject_name, ",", result_marks SEPARATOR " || ") as subjectResult, SUM(result.result_marks) as totalMark, ROUND(AVG(result.result_marks),0) as avgMark, RANK() OVER(ORDER BY AVG(result.result_marks)DESC)as ranking');
        $this->db->from('result');
        $this->db->join('schools', 'schools.schools_id = result.result_school_id');
        $this->db->join('exam', 'exam.exam_id = result_exam_id');
        $this->db->join('subjects', 'subjects.subject_id = result.result_subject_id');
        $this->db->join('standards', 'standards.standards_id = result.result_standard_id');
        $this->db->join('classes', 'classes.class_id = result.result_class_id');
        $this->db->join('students', 'students.students_id = result.result_student_id');
        $this->db->where('students_year_entry', $year);
        $this->db->where('result.result_exam_id', $examid);
        $this->db->where('result.result_standard_id', $standardid);
        $this->db->group_by('result_student_id');
        $this->db->order_by('avgMark', 'DESC');
        $query = $this->db->get();
        return $query->result();
      }

    public function set_limit_update($limitid, $update){
        $this->db->where('limit_id', $limitid);
        return $this->db->update('limit', $update);
    }
  
      public function set_limit_reduce($idSchool){
        $date = date("d-M-Y");
        $this->db->where('limit_date', $date);
        $this->db->where('limit_school_id', $idSchool);
        $query = $this->db->get('limit');
        return $query->result();
      }

}