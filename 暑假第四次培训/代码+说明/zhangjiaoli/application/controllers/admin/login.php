<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台登陆控制器
 */
class Login extends CI_Controller{
	/*
	登陆方法
	 */
	public function index(){
		$this->load->view('admin/Login');
	}
	/*
	登陆验证
	 */
	public function loginAction(){
		$this->load->view('admin/loginAction');
	}
	/*
	退出登录
	 */
	public function logout(){
		$this->load->view('admin\loginOut');
	}
}