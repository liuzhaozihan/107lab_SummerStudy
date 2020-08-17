<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 发布轮播图图片模型
 */
class Slider_model extends CI_Model
{
	/**
	*发布轮播图图片
	*/
	public function add($data)
	{
        $this->db->insert('slider',$data);
	}

	/**
	*查看轮播图图片列表
	*/
	public function check(){
		$data = $this->db->get('slider')->result_array();
		return $data;
	}


	/**
	*前台展示轮播图图片
	*/
	public function show(){
        $data = $this->db->get('slider')->result_array();
        return $data;
	}

	/*
	*修改指定id的轮播图图片
	*/
	public function update_slider($id,$data){
        $this->db->update('slider',$data,array('id' => $id));
	}
    

    /*
	*修改指定id的轮播图链接
	*/
	public function update_slider_lianjie($id,$data){
        $this->db->update('slider',$data,array('id' => $id));
	}



	/*
	*删除指定id的轮播图图片
	*/
	public function delete_slider($id){
		$this->db->delete('slider',array('id' => $id));
	}
}