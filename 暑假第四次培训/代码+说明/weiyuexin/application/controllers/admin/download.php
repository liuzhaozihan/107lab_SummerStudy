<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 文件控制器
 */
class Download extends MY_Controller{
    /*构造函数自动载入模型*/
    public function __construct(){
    	parent::__construct();
        $this->load->model('download_model');
    }

	/*查看文件列表*/
    public function index(){
		$data['download'] = $this->download_model->check();
		$this->load->view('admin/file_list',$data);
    }

	/*发表文件模板显示*/
	public function send_download()
	{
		$this->load->helper('form');
		$this->load->view('admin/download');
	}

	/*发布文件动作*/
	public function send()
	{
		//文件上传————————————————
		//1、配置
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'doc|docx';
		$config['max_size'] = '10000000';
		$config['file_name'] = time() . mt_rand(1000,9999);
		//2、载入上传类
        $this->load->library('upload',$config);
        //3、执行上传
        $status = $this->upload->do_upload('filename');
        if(!$status){
        	success('admin/download/send_download','必须上传文件!');
        }
        $wrong = $this->upload->display_errors();
        if($wrong){
        	error($wrong);
        }
        //返回信息
        $info = $this->upload->data();



		//载入表单验证类
		$this->load->library('form_validation');
		//设置规则
		$this->form_validation->set_rules('title','文件说明','required|max_length[99]');
		//执行验证
		$status = $this->form_validation->run();
		
		if($status){
			$data = array(
				'filename' => $info['file_name'] , 
				'title'  => $this->input->post('title') ,
				'addtime' => time()
			);
			$this->download_model->add($data);
			success('admin/download/index','发布成功!');
		}else{
			$this->load->helper('form');
		    $this->load->view('admin/download');
		}
	}


	/*删除文件*/
	public function del(){
		$id = $this->uri->segment(4);
		$this->download_model->delete($id);
		success('admin/download/index','删除成功!');
	}
}