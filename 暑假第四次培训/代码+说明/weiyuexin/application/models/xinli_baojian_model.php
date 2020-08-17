<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 发布心理百科模型
 */
class Xinli_baojian_model extends CI_Model
{
	/**
	*发布
	*/
	public function add($data)
	{
        $this->db->insert('xinli_baojian',$data);
	}

	/**
	*查看心理百科列表
	*/
	public function check(){
		$data = $this->db->get('xinli_baojian')->result_array();
		return $data;
	}

	/*
	*查询指定id的心理百科
	*/
	public function check_id($id){
        $data = $this->db->where(array('id' => $id))->get('xinli_baojian')->result_array();
        return $data;
	}

	/*
	*修改指定id的心理百科
	*/
	public function update_xinli_baojian($id,$data){
        $this->db->update('xinli_baojian',$data,array('id' => $id));
	}

	/*
	*删除指定id的心理百科
	*/
	public function delete_xinli_baojian($id){
		$this->db->delete('xinli_baojian',array('id' => $id));
	}
}