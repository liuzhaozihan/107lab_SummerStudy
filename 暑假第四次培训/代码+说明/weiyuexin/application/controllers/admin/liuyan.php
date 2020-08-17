<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Liuyan extends MY_Controller{
	/*查看留言列表*/
    public function index(){
    	$this->load->model('liuyan_model');
    	//载入分类页
    	$this->load->library('pagination');
    	$perPage = 4;

    	//配置项设置
    	$config['base_url'] = site_url('admin/liuyan/index');
    	$config['total_rows'] = $this->db->count_all_results('liuyan');
    	$config['per_page'] = $perPage;
    	$config['uri_segment'] = 4;
    	$config['first_link'] = '首页';
    	$config['prev_link'] = '上一页';
    	$config['next_link'] = '下一页';
    	$config['last_link'] = '尾页';

    	$this->pagination->initialize($config);

    	$data['links'] = $this->pagination->create_links();
    	$offset = $this->uri->segment(4);
    	$this->db->limit($perPage,$offset);


		$data['news'] = $this->liuyan_model->check();
		$this->load->view('admin/liuyan_list',$data);
    }


    /*删除留言*/
	public function del(){
		$this->load->model('liuyan_model');
		$id = $this->uri->segment(4);
		$this->liuyan_model->delete_news($id);
		success('admin/liuyan/index','删除成功!');
	}
}