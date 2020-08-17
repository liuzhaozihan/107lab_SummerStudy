<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class MY_Controller extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();

		$username = $this->session->userdata('username');
		$id = $this->session->userdata('id');
		if(!$id || !$username){
			redirect('admin/login/index');
		}
	}
}