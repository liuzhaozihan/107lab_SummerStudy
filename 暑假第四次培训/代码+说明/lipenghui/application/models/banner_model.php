<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner_model extends CI_Model{

    /**
     * 查看信息
     */
    public function banner_info(){
        $data = $this->db->select('bid,image,link')->from('banner')->order_by('bid')->get()->result_array();
        return $data;
    }
    /**
     * 编辑信息
     */
    public function update_banner($bid, $data){
        $this->db->update('banner', $data, array('bid' => $bid));
    }
    /**
     * 查询对应轮播图信息
     */
    public function check_banner($bid){
        $data = $this->db->where(array('bid' => $bid))->get('banner')->result_array();
        return $data;
    }
}