<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 下载中心管理模型
 */
class Upload_model extends CI_Model{
    /**
     * 查看文件
     */
    public function check(){
        $data = $this->db->get('files')->result_array();
        return $data;
    }
    /**
     * 添加文件
     */
    public function add($data){
        $this->db->insert('files', $data);
    }
    /**
     * 删除文件
     */
    public function del($fid){
        $this->db->delete('files', array('fid' => $fid));
    }
}