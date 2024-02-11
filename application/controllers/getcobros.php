<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GetCobros extends CI_Controller {

	public function __construct()
	{
		parent::__construct();				
		$this->load->model('cobros_model');		
	}
	public function index()
	{		
		$data = $this->cobros_model->getDetalleCobros();
		$respons['status'] = 404;
		if ($data) {
			$respons['status'] = 200;
			$respons['data'] = $data;
        } else {            
			$respons['msj'] = 'No se encontraron cobros.';
        }
		echo json_encode($respons);
	}
	
	public function total(){		
		$data = $this->cobros_model->getTotalCobros();
		$respons['status'] = 404;
		if ($data) {
			$respons['status'] = 200;
			$respons['data'] = $data;
        } else {            
			$respons['msj'] = 'No se encontraron cobros.';
        }
		echo json_encode($respons);
	}
}