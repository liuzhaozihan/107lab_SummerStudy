<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 发布心理咨询模型
 */
class Xinli_zixun_model extends CI_Model
{
	/**
	*发布
	*/
	public function add($data)
	{
        $this->db->insert('xinli_zixun',$data);
	}

	/**
	*查看心理咨询列表
	*/
	public function check(){
		$data = $this->db->get('xinli_zixun')->result_array();
		return $data;
	}

	/*
	*查询指定id的心理咨询
	*/
	public function check_id($id){
        $data = $this->db->where(array('id' => $id))->get('xinli_zixun')->result_array();
        return $data;
	}

	/*
	*修改指定id的心理咨询
	*/
	public function update_xinli_zixun($id,$data){
        $this->db->update('xinli_zixun',$data,array('id' => $id));
	}

	/*
	*删除指定id的心理咨询
	*/
	public function delete_xinli_zixun($id){
		$this->db->delete('xinli_zixun',array('id' => $id));
	}
}