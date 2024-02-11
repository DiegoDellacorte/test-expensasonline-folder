<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cobros_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
	function getDetalleCobros(){		
		$this->db->select('cliente.email, formas_de_pago.name as forma_de_pago, planes.costo as precio');
		$this->db->from('cobros');
		$this->db->join('suscripciones', 'suscripciones.id = cobros.suscripcion');
		$this->db->join('formas_de_pago', 'formas_de_pago.id = suscripciones.pago');
		$this->db->join('planes', 'planes.id = suscripciones.plan');
		$this->db->join('cliente', 'cliente.id = suscripciones.cliente');		
		$this->db->where('suscripciones.estado', 1);
		$this->db->where('cobros.estado', 'generado');		
		$this->db->where('MONTH(cobros.fecha)', date('m'));
		$query = $this->db->get();

		if($query->num_rows() > 0){ 
			return json_encode($query->result());
		}else{
			return false;
		}
	}
	function getTotalCobros(){		
		$this->db->select('SUM(planes.costo) AS total_costo, COUNT(*) AS cantidad_registros');
		$this->db->from('cobros');
		$this->db->join('suscripciones', 'suscripciones.id = cobros.suscripcion');
		$this->db->join('formas_de_pago', 'formas_de_pago.id = suscripciones.pago');
		$this->db->join('planes', 'planes.id = suscripciones.plan');
		$this->db->join('cliente', 'cliente.id = suscripciones.cliente');
		$this->db->where('suscripciones.estado', 1);
		$this->db->where('cobros.estado', 'generado');
		$this->db->where('MONTH(cobros.fecha)', date('m'));
		$query = $this->db->get();

		if($query->num_rows() > 0){ 
			return json_encode($query->result());
		}else{
			return false;
		}
	}

	function generarCobros(){
		$this->db->select('suscripciones.id');
		$this->db->from('suscripciones');
		$this->db->where('suscripciones.estado', 1);
		$query = $this->db->get();
		foreach($query->result() as $suscripcion){
			$this->db->select('cobros.*');
			$this->db->from('cobros');
			$this->db->where('suscripcion', $suscripcion->id);
			$this->db->where('MONTH(fecha)', date('m'));

			$query = $this->db->get();
			if($query->num_rows() > 0){ 
				continue;
			}else{
				$cobro = $this->db->insert('cobros',array('suscripcion'=> $suscripcion->id, 'fecha' => date('Y-m-d H:i:s') ));
			}
		}
	}
}
?>