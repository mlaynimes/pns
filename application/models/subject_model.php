<?php
class subject_model extends CI_Model{
    
    public function set_subject_add($insert){
        return ($this->db->insert('subjects', $insert));
    }

    public function set_subject_get($idSchool){
        $this->db->select('standards_name, GROUP_CONCAT(subject_id, ",", subject_name ORDER BY subject_id SEPARATOR " || ") as subject,');
        $this->db->from('subjects');
        $this->db->join('standards', 'standards_id = subject_standard_id');
        $this->db->where('subject_school_id', $idSchool);
        $this->db->group_by('subject_standard_id');
        $query = $this->db->get();
        return $query->result();

    }


    public function set_update_subject($IDsubject, $update){
        $this->db->where('subject_id', $IDsubject);
        return $this->db->update('subjects', $update);
    }
    
    
    public function set_delete_subject($IDsubject){
    $this->db->where('subject_id', $IDsubject);
    return $this->db->delete('subjects');
    }
}
?>
