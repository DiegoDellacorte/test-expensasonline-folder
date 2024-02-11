<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
	function getPlanes(){
		$query = $this->db->get('planes');
		if($query->num_rows() > 0){ 
			return $query;
		}else{
			return false;
		}
	}
}
?>