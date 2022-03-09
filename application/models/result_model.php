<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class result_model extends CI_Model {

    public function set_record_result_add($insert){
        return($this->db->insert_batch('result', $insert));
    }

    public function set_record_result_delete($studentid, $examid){
        $this->db->where('result_student_id', $studentid);
        $this->db->where('result_exam_id', $examid);
        $this->db->delete('result');
        $row = $this->db->affected_rows();
         if($row = 0 or $row = 1){
             return true;
         }
    }

    public function set_delete_multiple($student_ids = array(), $exam_ids){
      
        foreach($student_ids as $studentid){
            $this->db->where('result_exam_id', $exam_ids);
            $this->db->delete('result', array('result_student_id' => $studentid));
         }
         return true;
       }

       public function set_view_result($examid, $assign_id, $student_year, $idSchool){
        $this->db->select('*, GROUP_CONCAT(subject_name, ",", result_marks SEPARATOR " || ") as subjectResult, SUM(result.result_marks) as totalMark, ROUND(AVG(result.result_marks),0) as avgMark, RANK() OVER(ORDER BY AVG(result.result_marks)DESC)as ranking');
        $this->db->from('result, assign');
        $this->db->join('schools', 'schools.schools_id = result.result_school_id');
        $this->db->join('exam', 'exam.exam_id = result_exam_id');
        $this->db->join('subjects', 'subjects.subject_id = result.result_subject_id');
        $this->db->join('standards', 'standards.standards_id = result.result_standard_id');
        $this->db->join('classes', 'classes.class_id = result.result_class_id');
        $this->db->join('students', 'students.students_id = result.result_student_id');
        $this->db->where('assign.assign_class_id = result.result_class_id');
        $this->db->where('assign.assign_standard_id = result.result_standard_id');
        $this->db->where('assign.assign_id', $assign_id);
        $this->db->where('students_year_entry', $student_year);
        $this->db->where('assign.assign_school_id', $idSchool);
        $this->db->where('result.result_exam_id', $examid);
        $this->db->group_by('result_student_id');
        $this->db->order_by('avgMark', 'DESC');
        $query = $this->db->get();
        return $query->result();
       }
}