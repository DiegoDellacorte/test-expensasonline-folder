<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('cobros_model');
		
	}
	public function cobros()
	{
		$this->cobros_model->generarCobros();
	}
	
}