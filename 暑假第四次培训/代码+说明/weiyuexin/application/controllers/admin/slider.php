<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 轮播图图片控制器
 */
class Slider extends MY_Controller{
    /*构造函数自动载入模型*/
    public function __construct(){
    	parent::__construct();
        $this->load->model('slider_model');
    }


	/*修改轮播图图片模板显示*/
	public function send_slider()
	{
		$this->load->helper('form');
		$this->load->view('admin/slider');
	}

	/*修改轮播图图片动作*/
	public function send()
	{
		//轮播图图片上传————————————————
		//1、配置
		$config['upload_path'] = './slider/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000000';
		$config['file_name'] = time() . mt_rand(1000,9999);
		//2、载入上传类
        $this->load->library('upload',$config);
        //3、执行上传
        $status = $this->upload->do_upload('filename');
        if(!$status){
        	success('admin/slider/send_slider','必须上传图片!');
        }
        $wrong = $this->upload->display_errors();
        if($wrong){
        	error($wrong);
        }
        //返回信息
        $info = $this->upload->data();
        /*p($info);die;*/

		
		
		$id = $this->input->post('pic');
		$data = array(
			'filename' => $info['file_name'],
			'addtime' => time()
		);
		$this->slider_model->update_slider($id,$data);
		success('admin/slider/send_slider','修改成功!');
		
	}


	/*修改轮播图链接模板显示*/
	public function send_slider_lianjie()
	{
		$this->load->helper('form');
		$this->load->view('admin/slider_lianjie');
	}

	/*修改轮播图图片动作*/
	public function send_lianjie()
	{
        //载入表单验证类
		$this->load->library('form_validation');
		//设置规则
		$this->form_validation->set_rules('lianjie','链接','required|valid_url');
        //执行验证
		$status = $this->form_validation->run();
		if($status){
            $id = $this->input->post('id');
		$data = array(
			'lianjie' => $this->input->post('lianjie'),
			'addtime' => time()
		);
		$this->slider_model->update_slider_lianjie($id,$data);
		success('admin/slider/send_slider_lianjie','修改成功!');
		}else{
			$this->load->helper('form');
		    $this->load->view('admin/slider_lianjie');
		}
		
		
	}

}