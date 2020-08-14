<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
默认前台控制器
 */
class Home extends CI_Controller{
	/*
	默认首页显示方法
	 */
	public function index(){
		$this->load->view('index\index');
	}
	/*
	分类页显示
	 */
	public function category(){
		$this->load->view('index\newList');
	}
	public function xlbk(){
		$this->load->view('index\xlbk');
	}
	public function xlbj(){
		$this->load->view('index\xlbj');
	}
	public function xlzx(){
		$this->load->view('index\xlzx');
	}
	/*
	内容页显示
	 */
	public function content(){
		$this->load->view('index\content');
	}
	/*
	介绍页显示
	 */
	public function introduce(){
		$this->load->view('index\introduce');
	}
	/*
	下载页显示
	 */
	public function download(){
		$this->load->view('index\download');
	}
	/*
	留言页显示
	 */
	public function leaveMess(){
		$this->load->view('index\leaveMessage');
	}
}