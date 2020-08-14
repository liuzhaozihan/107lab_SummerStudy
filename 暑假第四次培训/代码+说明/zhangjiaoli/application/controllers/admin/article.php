<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台文章管理控制器
 */
class Article extends CI_Controller{
	/*
	添加文章
	 */
	public function addAction(){
		$this->load->view('admin\addAction');
	}
	/*
	删除文章
	 */
	public function delete(){
		$this->load->view('admin\delArticle');
	}
	/*
	搜索文章（按照题目）
	 */
	public function search(){
		$this->load->view('admin\search');
	}
	/*
	编辑文章
	 */
	public function edit(){
		$this->load->view('admin\edit');
	}
	public function editAction(){
		$this->load->view('admin\editAction');
	}
	/*
	文章置顶
	 */
	public function topAction(){
		$this->load->view('admin\topAction');
	}
}