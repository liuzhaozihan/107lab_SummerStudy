<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('upload_model', 'up');
    }
    /**
     * 查看文件
     */
    public function index(){
        $data['upload'] = $this->up->check();

        $this->load->view('admin/upload.html', $data);
    }
    /**
     * 删除文件
     */
    public function del(){
        $fid = $this->uri->segment(4);
        $this->up->del($fid);
        success('admin/upload/index', '删除成功');
    }
    /**
     * 上传文件
     */
    public function send_file(){
        $data['upload'] = $this->up->check();

        $this->load->helper('form');
        $this->load->view('admin/add_upload.html', $data);
    }
    /**
     * 上传动作
     */
    public function send()
    {
        //文件上传
        //配置

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|docx|ppt|pptx|xls|xlsx|pdf';
        $config['max_size'] = '100000';
        $config['file_name'] = time() . mt_rand(1000, 9999);
        //载入上传类
        $this->load->library('upload', $config);
        $status = $this->upload->do_upload('file');
        $wrong = $this->upload->display_errors();
        if ($wrong) {
            error($wrong);
        }
        //返回信息
        $info = $this->upload->data();

        //表单验证类
        $this->load->library('form_validation');
        //验证
        $status = $this->form_validation->run('upload');

        if ($status) {
            $data = array(
                'title' => $this->input->post('title'),
                'file' => $info['file_name'],
                'time' => time()
            );
            $this->up->add($data);
            success('admin/upload/index', '文件上传成功');
        } else {
            $this->load->helper('form');
            $this->load->view('admin/add_upload.html');
        }
    }
}