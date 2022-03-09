<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class standard_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

  public function set_standard($insert){
    return($this->db->insert('standards', $insert));
  }

  public function get_standard($idSchool){
    $this->db->select('*');
    $this->db->from('standards');
    $this->db->join('schools', 'schools_id = standards_schools_id');
    $this->db->where('standards_schools_id', $idSchool);
    $this->db->order_by('standards_id', 'asc');
    $query = $this->db->get();

    return $query->result();
  }


  public function set_edit_standard($standardID){
    $this->db->where('standards_id', $standardID);
    $query = $this->db->get('standards');
    return $query->result();
  }


  public function set_update_standard($update, $ID){
    $this->db->where('standards_id', $ID);
    return $this->db->update('standards', $update);
  }


  public function set_delete_standard($id){
  $this->db->where('standards_id', $id);
  return $this->db->delete('standards');
}

public function get_standard_list($idSchool){
  $this->db->select('*');
  $this->db->from('standards');
  $this->db->join('schools', 'schools_id = standards_schools_id');
  $this->db->where('standards_schools_id', $idSchool);
  $query = $this->db->get();

  return $query->result();
}


}
  ?>
