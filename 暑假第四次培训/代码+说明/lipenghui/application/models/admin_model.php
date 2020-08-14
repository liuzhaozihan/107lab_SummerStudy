<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 后台用户管理
 */
class Admin_model extends CI_Model{
    /**
     * 查询后台用户数据
     */
    public function check($username){
        $data=$this->db->get_where('admin',array('username'=>$username))->result_array();
        return $data;
    }
    /**
     * 修改密码
     */
    public function change($uid,$data){
        $this->db->update('admin',$data,array('uid'=>$uid));
    }
}