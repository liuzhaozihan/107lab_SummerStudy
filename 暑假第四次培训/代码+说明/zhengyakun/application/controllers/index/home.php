<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model', 'art');
        $this->load->model('category_model', 'cate');
    }
    /**
     * 默认首页
     *
     * @return void
     */
    public function index(){
        $this->output->cache(5/60);
        $this->load->model('banner_model', 'banner');
        // $this->load->model('upload_model', 'up');
        $data = $this->art->check();
        // $data['up'] = $this->up->check();
        $data['banner'] = $this->banner->banner_info();
        $data['category'] = $this->cate->limit_category(7);

        // p($data);die;
        $this->load->view('index/home.html',$data);
    }
    /**
     * 下载中心
     *
     * @return void
     */
    public function upload()
    {
        $this->load->model('upload_model', 'up');
        $data['category'] = $this->cate->limit_category(7);
        //后台设置后缀为空，否则分页出错
        $this->config->set_item('url_suffix', '');
        //载入分页类
        $this->load->library('pagination');
        $perPage = 10;
        //$this->db->count_all_results('article');
        //配置
        $config['base_url'] = site_url('index/home/upload');
        $config['total_rows'] =$this->db->count_all_results('files');
        $config['per_page'] = $perPage;
        $config['uri_segment'] = 4;
        $config['first_link'] = '首页';
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $config['last_link'] = '尾页';

        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();
        $offset = $this->uri->segment(4);
        $this->db->limit($perPage, $offset);

        $data['file'] = $this->up->check();
        $this->load->helper('form');
        // p($data);die;
        // p($offset);die;
        $this->load->view('index/upload.html', $data);
    }
    /**
     * 留言页
     *
     * @return void
     */
    public function leaveMessage(){

        $data['category'] = $this->cate->limit_category(7);
        $this->load->helper('form');
        $this->load->view('index/leaveMessage.html',$data);
    }
    /**
     * 留言动作
     */
    public function send()
    {
        //表单验证类
        $data['category'] = $this->cate->limit_category(7);
        $this->load->library('form_validation');
        $this->load->model('email_model', 'email');
        //验证
        $status = $this->form_validation->run('email');


        if ($status) {
            $data = array(
                'email' => $this->input->post('email'),
                'content' => $this->input->post('content')
            );
            $this->email->add($data);
            success('index/home/leaveMessage', '留言发表成功');
        } else {
            $this->load->helper('form');
            $this->load->view('index/leaveMessage.html',$data);
        }
    }
    /**
     * 分类页
     */
    public function category(){
        $cid = $this->uri->segment(4);
        $data['category'] = $this->cate->limit_category(7);
        //后台设置后缀为空，否则分页出错
        $this->config->set_item('url_suffix', '');
        //载入分页类
        $this->load->library('pagination');
        $perPage = 10;
        //配置
        $config['base_url'] = site_url().'index/home/category/'.$cid;
        $config['total_rows'] = count($this->art->category_article($cid));
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
        
        $data['article'] = $this->art->category_article($cid);
        // p($cid);
        // p($data);
        // p($offset);
        // die;
        $this->load->view('index/category.html',$data);
    }
    /**
     * 文章阅读
     */
    public function article(){
        $aid=$this->uri->segment(2);
        $data['category'] = $this->cate->limit_category(7);

        $data['article']=$this->art->aid_article($aid);
        $ip = $_SERVER['REMOTE_ADDR'];
        $this->art->add_reading($ip,$aid);
        $this->load->view('index/article.html',$data);
    }
}