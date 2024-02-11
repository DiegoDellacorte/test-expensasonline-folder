<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suscripciones_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
	function getSuscripcionesActivas(){		
		$this->db->select('cliente.email, formas_de_pago.name as forma_de_pago, planes.costo as precio');
		$this->db->from('suscripciones');		
		$this->db->join('formas_de_pago', 'formas_de_pago.id = suscripciones.pago');
		$this->db->join('planes', 'planes.id = suscripciones.plan');
		$this->db->join('cliente', 'cliente.id = suscripciones.cliente');		
		$this->db->where('suscripciones.estado', 1);
		$query = $this->db->get();

		if($query->num_rows() > 0){ 
			return json_encode($query->result());
		}else{
			return false;
		}
	}
}
?>