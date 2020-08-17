<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 发布文件模型
 */
class Download_model extends CI_Model
{
	/**
	*发布文件
	*/
	public function add($data)
	{
        $this->db->insert('download',$data);
	}

	/**
	*查看文件列表
	*/
	public function check(){
		$data = $this->db->get('download')->result_array();
		return $data;
	}

	/*
	*查询指定id的文件
	*/
	public function check_id($id){
        $data = $this->db->where(array('id' => $id))->get('download')->result_array();
        return $data;
	}

	/*
	*删除指定id的文件
	*/
	public function delete($id){
		$this->db->delete('download',array('id' => $id));
	}
}