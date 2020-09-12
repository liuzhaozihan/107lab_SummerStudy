<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 后台登录控制器
 */
class Login extends CI_Controller{
    /**
     * 登录方法
     *
     * @return void
     */
    public function index(){

        $this->load->view('admin/login.html');
    }
    /**
     * 验证码
     *
     * @return void
     */
    public function code(){
        $config = array(
            'width'	=>	80,
            'height'=>	25,
            'codeLen'=>	4,
            'fontSize'=>16
            );
        $this->load->library('code', $config);
    
        $this->code->show();
    
    }
    /**
     * 登录
     */
    public function login_in(){
        $code=$this->input->post('captcha');
        if(!isset($_SESSION)){
            session_start();
        }
        if(strtoupper($code)!=$_SESSION['code']) error('验证码错误');
        
        $username=$this->input->post('username');
        $this->load->model('admin_model','admin');
        $userData=$this->admin->check($username);

        $passwd=$this->input->post('passwd');
        if(!$userData||$userData[0]['passwd']!=md5($passwd)) error('用户名或密码不正确');

        $sessionData=array(
            'username'=>$username,
            'uid'=>$userData[0]['uid'],
            'logintime'=>time()
        );
        $this->session->set_userdata($sessionData);
        success('admin/admin/index','登录成功');
    }
    /**
     * 退出登录
     */
    public function login_out(){
        $this->session->sess_destroy();
        success('admin/login/index','退出成功');
    }
}