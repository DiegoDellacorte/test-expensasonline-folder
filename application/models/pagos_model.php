<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagos_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
	function getFormasDePago(){
		$query = $this->db->get('formas_de_pago');
		if($query->num_rows() > 0){ 
			return $query;
		}else{
			return false;
		}
	}
}
?>