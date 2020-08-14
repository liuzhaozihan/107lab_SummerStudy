<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller{
    /**
     * 构造函数
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model','art');
    }
    /**
     * 查看文章
     */
    public function index(){
        //后台设置后缀为空，否则分页出错
		$this->config->set_item('url_suffix', '');
		//载入分页类
		$this->load->library('pagination');
		$perPage = 10;

		//配置
		$config['base_url'] = site_url('admin/article/index');
		$config['total_rows'] = $this->db->count_all_results('article');
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 4;
		$config['first_link'] = '首页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['last_link'] = '尾页';
        
		$this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();

        $offset=$this->uri->segment(4);
        $this->db->limit($perPage,$offset);

        $data['article']=$this->art->article_category();
        $this->load->view('admin/check_article.html',$data);
    }
    /**
     * 发表文章
     */
    public function send_article(){
        $this->load->model('category_model','cate');
        $data['category']=$this->cate->check();

        $this->load->helper('form');
        $this->load->view('admin/article.html',$data);
    }
    /**
     * 发表动作
     */
    public function send(){
        //文件上传
        //配置

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['file_name'] = time() . mt_rand(1000,9999);
        //载入上传类
        $this->load->library('upload',$config);
        $status=$this->upload->do_upload('thumb');
        $wrong=$this->upload->display_errors();
        if($wrong){
            error($wrong);
        }
        //返回信息
        $info=$this->upload->data();
        //缩略图
        //配置
        $arr['source_image'] = $info['full_path'];
        $arr['create_thumb'] = FALSE;
        $arr['maintain_ratio'] = TRUE;
        $arr['width'] = 200;
        $arr['height'] = 200;
        //载入缩略图类
        $this->load->library('image_lib',$arr);
        //动作
        $status=$this->image_lib->resize();
        if(!$status){
            error('图片缩放失败');
        }

        //表单验证类
        $this->load->library('form_validation');
        //验证
        $status=$this->form_validation->run('article');

        if($status){
            $data=array(
                'title'=>$this->input->post('title'),
                'author' => $this->input->post('author'),
                'type'=>$this->input->post('type'),
                'cid'=>$this->input->post('cid'),
                'thumb'=>$info['file_name'],
                'info'=>$this->input->post('info'),
                'content'=>$this->input->post('content'),
            );
            $this->art->add($data);
            success('admin/article/index','文章发表成功');
        }else{
            $this->load->helper('form');
            $this->load->view('admin/article.html');
        }
    }

    /**
     * 编辑文章
     */
    public function edit_article(){
        $aid = $this->uri->segment(4);
        $data['article'] = $this->art->aid_article($aid);
        $this->load->model('category_model', 'cate');
        $data['category'] = $this->cate->check();
        $this->load->helper('form');
        // p($data);
        $this->load->view('admin/edit_article.html',$data);
    }

    /**
     * 编辑动作
     */
    public function edit(){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['file_name'] = time() . mt_rand(1000, 9999);
        //载入上传类
        $this->load->library('upload', $config);
        $status = $this->upload->do_upload('thumb');
        $wrong = $this->upload->display_errors();
        if ($wrong) {
            error($wrong);
        }
        //返回信息
        $info = $this->upload->data();
        //缩略图
        //配置
        $arr['source_image'] = $info['full_path'];
        $arr['create_thumb'] = FALSE;
        $arr['maintain_ratio'] = TRUE;
        $arr['width'] = 200;
        $arr['height'] = 200;
        //载入缩略图类
        $this->load->library('image_lib', $arr);
        //动作
        $status = $this->image_lib->resize();
        if (!$status) {
            error('图片缩放失败');
        }

        $aid=$this->input->post('aid');
        $this->load->library('form_validation');
        $status=$this->form_validation->run('article');
        if($status){
            $data = array(
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'type' => $this->input->post('type'),
                'cid' => $this->input->post('cid'),
                'thumb' => $info['file_name'],
                'info' => $this->input->post('info'),
                'content' => $this->input->post('content'),
            );
            $this->art->edit_article($aid,$data);
            success('admin/article/index', '编辑成功');
        }else{
            $this->load->helper('form');
            $this->load->view('admin/edit_article.html');
        }
    }
    /**
     * 文章置顶
     */
    public function to_top(){
        $aid = $this->uri->segment(4);
        // p($aid);die;
        $this->art->top($aid);
        success('admin/article/index', '置顶成功');
    }
    /**
     * 删除文章
     */
    public function del(){
        $aid = $this->uri->segment(4);
        $this->art->del($aid);
        success('admin/article/index', '删除成功');
    }
}