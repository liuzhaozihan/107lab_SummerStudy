<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 发布新闻模型
 */
class News_model extends CI_Model
{
	/**
	*发布
	*/
	public function add($data)
	{
        $this->db->insert('news',$data);
	}

	/**
	*查看新闻列表
	*/
	public function check(){
		$data = $this->db->get('news')->result_array();
		return $data;
	}

	/*
	*查询指定id的新闻
	*/
	public function check_id($id){
        $data = $this->db->where(array('id' => $id))->get('news')->result_array();

        
        $sessionid = $this->session->userdata('id');
        
        if($id = $sessionid){
            $read_total = $data[0]['read_total'] + 1;
            $data1 = array('read_total' => $read_total );
            $this->db->update('news',$data1,array('id' => $id));
        }
        return $data;
	}

	/*
	*修改指定id的新闻
	*/
	public function update_news($id,$data){
        $this->db->update('news',$data,array('id' => $id));
	}

	/*
	*删除指定id的新闻
	*/
	public function delete_news($id){
		$this->db->delete('news',array('id' => $id));
	}
}