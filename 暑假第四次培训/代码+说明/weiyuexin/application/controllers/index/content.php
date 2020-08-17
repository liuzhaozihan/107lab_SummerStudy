<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller{
	/*新闻内容阅读页*/
	public function news_content(){
		//载入模板
		$this->load->model('news_model');

		$id = $this->uri->segment(4);
		if(!isset($_SESSION)){
            session_start();
        }
		$sessionData = array(
                'id'       => $id,
                );
        $this->session->set_userdata($sessionData);
        
        
        $data['news'] = $this->news_model->check_id($id);
        $this->load->helper('form');
        $this->load->view('index/php/news_content',$data);
        
	}
	/*心理百科阅读页*/
	public function baike_content(){
		//载入模板
		$this->load->model('xinli_baike_model');

		$id = $this->uri->segment(4);
		$data['news'] = $this->xinli_baike_model->check_id($id);
        $this->load->helper('form');
        $this->load->view('index/php/baike_content',$data);
	}
	/*心理保健阅读页*/
	public function baojian_content(){
		//载入模板
		$this->load->model('xinli_baojian_model');

		$id = $this->uri->segment(4);
		$data['news'] = $this->xinli_baojian_model->check_id($id);
        $this->load->helper('form');
        $this->load->view('index/php/baojian_content',$data);
	}
	/*心理咨询阅读页*/
	public function zixun_content(){
		//载入模板
		$this->load->model('xinli_zixun_model');

		$id = $this->uri->segment(4);
		$data['news'] = $this->xinli_zixun_model->check_id($id);
        $this->load->helper('form');
        $this->load->view('index/php/zixun_content',$data);
	}
}