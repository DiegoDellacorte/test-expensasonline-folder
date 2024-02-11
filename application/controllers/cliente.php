<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->helper('form');		
		$this->load->model('plan_model');
		$this->load->model('cliente_model');
		$this->load->model('pagos_model');
		$this->load->library('form_validation');
		
	}
	public function agregar(){		
		$this->form_validation->set_rules('name', 'Nombre', 'required');
		$this->form_validation->set_rules('pago', 'Pago', 'required');
		$this->form_validation->set_rules('plan', 'Plan', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$suscripcion = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'pago' => $this->input->post('pago'),
			'plan' => $this->input->post('plan'),
		);
		$this->load->library('header',array('inicio','cliente'));
		$data['menu'] = $this->header->menu();
		$data['planes'] = $this->plan_model->getPlanes();
		$data['pagos'] = $this->pagos_model->getFormasDePago();
		if ($this->form_validation->run() === FALSE) {
			$data['error'] = '<h4 style="color:red;">Completar el formulario</h4>';
			
            $this->load->view('form',$data);
        } else {            
			$cliente = $this->cliente_model->crearCliente($suscripcion);            			
			$data['cliente'] = $cliente;
			//redirect('cliente/suscrito', 'refresh');
			//redirect('cliente/suscrito');
			echo "Te has suscriptio exitosamente";
        }
	
	}	

}