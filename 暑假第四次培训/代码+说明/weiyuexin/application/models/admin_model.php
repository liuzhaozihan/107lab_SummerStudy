<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*后台用户管理模型
*/

class Admin_model extends CI_Model
{
	
	/*查询后台用户数据*/
	public function check($username){
		$data = $this->db->where(array('username'=>$username))->get('users')->result_array();
		return $data;
	}

	/*修改密码*/
	public function change($id,$data){
		$this->db->update('users',$data,array('id' => $id));
	}
	/*管理员注册*/
	public function register($data){
		$this->db->insert('users',$data);
	}
}