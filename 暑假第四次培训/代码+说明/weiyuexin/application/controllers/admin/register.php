<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
	/*默认注册方法*/
	public function index()
	{
		$this->load->view('admin/register');
	}


	/*
	*验证码
	*/
	public function code(){
		$config = array(
            'width' => 100,
            'height' => 43
		);
        $this->load->library('code',$config);
        $this->code->show();
	}

	/*注册动作*/
	public function register_in(){
		$code = $this->input->post('captcha');
		if(!isset($_SESSION)){
			session_start();
		}
		if(strtoupper($code) != $_SESSION['code']){
			success('admin/register/index','验证码错误');
		}else{
            //载入表单验证类
			$this->load->library('form_validation');
		//设置规则
			$this->form_validation->set_rules('username','用户名','required');

			$this->form_validation->set_rules('password','密码','required');

			$this->form_validation->set_rules('pwd','确认密码','required');
		//执行验证
			$status = $this->form_validation->run();

			if($status){
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $pwd = $this->input->post('pwd');
                if($pwd != $password){
                	success('admin/register/index','两次输入的密码不同，请重新输入');
                }


				$data = array(
					'username' => $username , 
					'password'  =>  md5($password)
				);
				$this->load->model('admin_model');
				$this->admin_model->register($data);
				success('admin/login/index','注册成功，请登录!');
			}else{
				$this->load->helper('form');
				$this->load->view('admin/register');
			}
		}

	}
}