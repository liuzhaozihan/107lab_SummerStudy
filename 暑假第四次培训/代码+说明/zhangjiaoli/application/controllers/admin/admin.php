<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台默认控制器
 */

class Admin extends CI_Controller{
	/*
	后台默认方式
	 */
	public function index(){
		$this->load->view('admin\index');
	}
	/*
	验证登录
	 */
	public function is_manage_login(){
		$this->load->view('admin\is_manage_login');
	}
	public function tool(){
		$this->load->view('admin\tool.inc');
	}
	/*
	修改密码
	 */
	public function editpw(){
		$this->load->view('admin\editpw');
	}
}