<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 后台登录控制器
 */
class Login extends CI_Controller{
	/*默认登录方法*/
	public function index()
	{
		$this->load->view('admin/login');
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

    /*登录动作*/
    public function login_in(){
    	$code = $this->input->post('captcha');
    	if(!isset($_SESSION)){
            session_start();
        }
        if(strtoupper($code) != $_SESSION['code']){
        	success('admin/login/index','验证码错误');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('admin_model');
            $userData = $this->admin_model->check($username);
            if(!$userData || $userData[0]['password'] != md5($password)){
            	success('admin/login/index','用户名不存在或者密码错误');
            }
            
            $sessionData = array(
                'username' => $username,
                'id'       => $userData[0]['id'],
                'logintime'=> time()
                );
            $this->session->set_userdata($sessionData);
            success('admin/admin/index','登录成功');
        }
        
    }

    /*
    *退出登录
    */
    public function login_out(){
    	$this->session->sess_destroy();
    	success('admin/login/index','退出成功');
    }
    

    
}