<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 默认前台控制器
 */
class Home extends CI_Controller{
	/*默认首页显示方法*/
	public function index()
	{
        //载入模板
        $this->load->model('index_model');
        $this->load->model('slider_model');
        //大轮播图
        $data['slider'] = $this->slider_model->show();

        $data['index_news'] = $this->index_model->check_news();
        $data['index_baike'] = $this->index_model->check_baike();
        $data['index_baojian'] = $this->index_model->check_baojian();
        $data['index_zixun'] = $this->index_model->check_zixun();
        $data['index_download'] = $this->index_model->check_download();

		$this->load->view('index/index',$data);
	}

	/*新闻列表页*/
	public function news()
	{
		//载入分类页
        $this->load->library('pagination');
        $perPage = 10;
        //载入模板
        $this->load->model('news_model');
        //配置项设置
        $config['base_url'] = site_url('index/home/news');
        $config['total_rows'] = $this->db->count_all_results('news');
        $config['per_page'] = $perPage;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();
        $offset = $this->uri->segment(4);
        $this->db->limit($perPage,$offset);


        $data['news'] = $this->news_model->check();
        $this->load->view('index/php/news',$data);
	}

    /*心理百科列表页*/
    public function baike(){
        $this->load->model('xinli_baike_model');
        $data['baike'] = $this->xinli_baike_model->check();
        $this->load->view('index/php/xinli_baike',$data);
    }
    /*心理保健列表页*/
    public function baojian(){
        $this->load->model('xinli_baojian_model');
        $data['baojian'] = $this->xinli_baojian_model->check();
        $this->load->view('index/php/xinli_baojian',$data);
    }
    /*心理咨询列表页*/
    public function zixun(){
        $this->load->model('xinli_zixun_model');
        $data['zixun'] = $this->xinli_zixun_model->check();
        $this->load->view('index/php/xinli_zixun',$data);
    }
    /*下载中心列表页*/
    public function download(){
        $this->load->model('download_model');
        $data['download'] = $this->download_model->check();
        $this->load->view('index/php/download',$data);
    }



	/*留言板*/
    public function liuyan()
    {
        $this->load->helper('form');
    	$this->load->view('index/php/liuyan.php');
    }


    /*执行留言操作*/
    public function add_liuyan(){
        $this->load->model('liuyan_model');
        //载入表单验证类
        $this->load->library('form_validation');
        //设置规则
        $this->form_validation->set_rules('email','邮箱','required|valid_email');

        $this->form_validation->set_rules('content','留言内容','required');

        //执行验证
        $status = $this->form_validation->run();
        
        if($status){
            $data = array(
                'email' => $this->input->post('email') , 
                'content' => $this->input->post('content') ,
                'addtime' => time()
            );
            $this->liuyan_model->add($data);
            success('index/home/liuyan','发布成功!');
        }else{
            $this->load->helper('form');
            $this->load->view('index/php/liuyan');
        }
    }






    /*中心简介*/
    public function jianjie()
    {
    	$this->load->view('index/php/jianjie.php');
    }
}