<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GetSuscripcionesActivas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('suscripciones_model');
	}
	public function index()
	{	
		$data = $this->suscripciones_model->getSuscripcionesActivas();
		$respons['status'] = 404;
		if ($data) {
			$respons['status'] = 200;
			$respons['data'] = $data;
        } else {            
			$respons['msj'] = 'No se encontraron suscripciones activas.';
        }
		echo json_encode($respons);
	}
}