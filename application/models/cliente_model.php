<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function crearCliente($data){
		$client = $this->db->get_where('cliente', array('email' => $data['email']))->row();
		if(count($client) > 0){
			return $client;
		}else{
			$client = $this->db->insert('cliente',array('name'=> $data['name'],'email'=> $data['email']));
			$cliente_id = $this->db->insert_id();
			$suscripcion = $this->db->insert('suscripciones',array('cliente'=> $cliente_id,'pago'=> $data['pago'], 'plan' => $data['plan'], 'fecha' => date('Y-m-d H:i:s') ));
			$suscripcion_id = $this->db->insert_id();			
		}

		return $cliente_id;
	}
	function getCliente(){
		$query = $this->db->get('cliente');
		if($query->num_rows() > 0){ 
			return $query;
		}else{
			return false;
		}
	}
}
?>