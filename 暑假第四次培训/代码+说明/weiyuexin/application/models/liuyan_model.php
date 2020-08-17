<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Liuyan_model extends CI_Model{

    /*发布留言*/
    public function add($data){
    	$this->db->insert('liuyan',$data);
    }


    /**
	*查看留言列表
	*/
	public function check(){
		$data = $this->db->get('liuyan')->result_array();
		return $data;
	}
	/*
	*删除指定id的留言
	*/
	public function delete_news($id){
		$this->db->delete('liuyan',array('id' => $id));
	}
}