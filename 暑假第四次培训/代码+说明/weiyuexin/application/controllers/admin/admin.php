<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 默认后台控制器
 */
class Admin extends MY_Controller{
	/*默认首页显示方法*/
	public function index()
	{
		$this->load->view('admin/index');
	}

	/*默认欢迎*/
	public function copy()
	{
		$this->load->view('admin/copy');
	}


	/*修改密码*/
    public function change(){
        $this->load->view('admin/passwd');
        
    }

    /*执行修改动作*/
    public function change_password(){
    	$this->load->model('admin_model');

    	$username = $this->session->userdata('username');
    	$userData = $this->admin_model->check($username);

        //判断原密码是否正确
    	$password = $this->input->post('password');
    	if(md5($password) != $userData[0]['password']){
            success('admin/admin/change','原始密码错误!!!');
    	}

        //判断两次输入的新密码是否一致
    	$passwordF = $this->input->post('passwordF');
    	$passwordS = $this->input->post('passwordS');
        
        if($passwordF != $passwordS){
        	success('admin/admin/change','两次输入的密码不同!!!');
        }


    	$id = $this->session->userdata('id');

    	$data = array(
            'password' => md5($passwordF)

    	);
    	$this->admin_model->change($id,$data);
    	success('admin/admin/change','修改成功!!!');
    }
}