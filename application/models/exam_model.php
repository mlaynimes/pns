<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class exam_model extends CI_Model {
    public function set_exam($idSchool){
        $this->db->select('*');
        $this->db->from('exam');
        $this->db->where('exam_school_id', $idSchool);
        $this->db->order_by('exam_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function set_exam_one($examid){
        $this->db->select('*');
        $this->db->from('exam');
        $this->db->where('exam_id', $examid);
        $query = $this->db->get();
        return $query->result();
    }
}
?>