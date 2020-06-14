<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Taskmodel extends CI_Model {

public function getimages()
{    
	$this->load->database();
	$images ="select Id,image from images";
	$query = $this->db->query($images);
	return $query->result_array();
}
public function userdetails()
{    
	$this->load->database();
	$user ="select Id, first_name,last_name,mobile,Email from user";
	$query = $this->db->query($user);
	return $query->result();
}

  function insert($data)
 {
  $this->db->insert_batch('user', $data);
 }

}

?>