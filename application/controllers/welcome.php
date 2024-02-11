<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->helper('form');		
		$this->load->model('plan_model');
		$this->load->model('pagos_model');
	}
	public function index()
	{		
		$this->load->library('header',array('inicio','cliente'));
		$data['menu'] = $this->header->menu();
		$data['planes'] = $this->plan_model->getPlanes();
		$data['pagos'] = $this->pagos_model->getFormasDePago();
		$this->load->view('form',$data);
	}	
}