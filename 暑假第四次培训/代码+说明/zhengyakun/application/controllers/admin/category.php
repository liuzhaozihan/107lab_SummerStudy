<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller{
    /**
     * 构造函数
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model','cate');
    }
    /**
     * 查看栏目
     *
     * @return void
     */
    public function index(){
        $this->load->model('article_model', 'art');
        $data['article'] = $this->art->article_category();

        $data['category']=$this->cate->check();
        $this->load->view('admin/cate.html',$data);
    }
    /**
     * 添加栏目
     */
    public function add_cate(){
        //调试模式
        // $this->output->enable_profiler(TRUE);
        $this->load->helper('form');
        $this->load->view('admin/add_cate.html');
    }
    /**
     * 添加动作
     */
    public function add(){
        $this->load->library('form_validation');
        $status=$this->form_validation->run('cate');

        if($status){
            // echo 'sql';
            $data=array(
                'cname'=>$this->input->post('cname')
            );
            $this->cate->add($data);
            success('admin/category/index','添加成功');
        }else{
            $this->load->helper('form');
            $this->load->view('admin/add_cate.html');
        }
    }
    /**
     * 编辑
     */
    public function edit_cate(){
        $cid=$this->uri->segment(4);
        $data['category']=$this->cate->check_cate($cid);

        $this->load->helper('form');
        $this->load->view('admin/edit_cate.html',$data);
    }
    /**
     * 编辑动作
     */
    public function edit(){
        $this->load->library('form_validation');
        $status=$this->form_validation->run('cate');

        if($status){
            $cid=$this->input->post('cid');
            $cname=$this->input->post('cname');
            $data=array(
                'cname'=>$cname
            );
            
            $data['category']=$this->cate->update_cate($cid,$data);
            success('admin/category/index','编辑成功');
        }else{
            $this->load->helper('form');
            $this->load->view('admin/edit_cate.html');
        }
    }
    /**
     * 删除栏目
     */
    public function del(){
        $cid=$this->uri->segment(4);
        $this->cate->del($cid);
        success('admin/category/index','删除成功');
    }
}