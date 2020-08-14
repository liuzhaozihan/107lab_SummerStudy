<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MY_Controller{
    /**
     * 查看留言
     */
    public function index()
    {
        $this->load->model('email_model', 'email');
        //后台设置后缀为空，否则分页出错
        $this->config->set_item('url_suffix', '');
        //载入分页类
        $this->load->library('pagination');
        $perPage = 10;

        //配置
        $config['base_url'] = site_url('admin/email/index');
        $config['total_rows'] = $this->db->count_all_results('email');
        $config['per_page'] = $perPage;
        $config['uri_segment'] = 5;
        $config['first_link'] = '首页';
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $config['last_link'] = '尾页';

        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();
        $offset = $this->uri->segment(5);
        $this->db->limit($perPage, $offset);

        $data['email'] = $this->email->check_email();
        $this->load->view('admin/email.html', $data);
    }
}