<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Controller{
    /**
     * 查看信息
     */
    public function index(){
        $this->load->model('banner_model', 'banner');
        $data['banner'] = $this->banner->banner_info();

        $this->load->view('admin/check_banner.html', $data);
    }
    /**
     * 编辑信息
     */
    public function edit_banner(){
        $this->load->model('banner_model', 'banner');
        $bid = $this->uri->segment(4);
        $data['banner'] = $this->banner->check_banner($bid);
        $this->load->helper('form');
        $this->load->view('admin/edit_banner.html',$data);
    }
    /**
     * 编辑动作
     */
    public function edit(){
        $this->load->model('banner_model', 'banner');
        $this->load->library('form_validation');
        //配置
        $config['upload_path'] = './banners/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['file_name'] = time() . mt_rand(1000, 9999);
        //载入上传类
        $this->load->library('upload', $config);
        $status = $this->upload->do_upload('image');
        $wrong = $this->upload->display_errors();
        if ($wrong) {
            error($wrong);
        }
        $info = $this->upload->data();
        
        $status = $this->form_validation->run('banner');
        if ($status) {
            $bid = $this->input->post('bid');
            $link = $this->input->post('link');
            $image = $info['file_name'];
            $data = array(
                'image' =>$image,
                'link' => $link
            );
            $this->banner->update_banner($bid,$data);
            success('admin/banner/index', '编辑成功');
        } else {
            $this->load->helper('form');
            $this->load->view('admin/edit_banner.html');
        }
    }
}