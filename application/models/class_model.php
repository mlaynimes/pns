<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class class_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }


  public function set_classses($insert)
  {
    return($this->db->insert('classes', $insert));
  }


  public function set_manage_classes($idSchool){
    $this->db->select('*');
    $this->db->from('classes');
    $this->db->join('schools', 'schools_id = class_school_id');
    $this->db->where('class_school_id', $idSchool);
    $query = $this->db->get();

    return $query->result();
  }



  public function set_edit_class($classID)
  {
    $this->db->where('class_id', $classID);
    $query = $this->db->get('classes');
    return $query->result();
  }


  public function set_update_classs($update, $ID)
  {
    $this->db->where('class_id', $ID);
    return $this->db->update('classes', $update);
  }


  public function set_delete_class($id)
  {
    $this->db->where('class_id', $id);
    return $this->db->delete('classes');
  }


  public function get_class_list($idSchool){
    $this->db->select('*');
    $this->db->from('classes');
    $this->db->join('schools', 'schools_id = class_school_id');
    $this->db->where('class_school_id', $idSchool);
    $query = $this->db->get();
    return $query->result();
  }
}
?>
