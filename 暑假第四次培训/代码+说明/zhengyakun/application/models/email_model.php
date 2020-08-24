<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email_model extends CI_Model{
    /**
     * 发表留言
     */
    public function add($data){
        $this->db->insert('email', $data);
    }
    /**
     * 查看留言
     */
    public function check_email(){
        $data = $this->db->select('eid,email,content,time')->from('email')->order_by('time', 'eid')->get()->result_array();
        return $data;
    }
	public function delete_news($id){
			$this->db->delete('email',array('eid' => $id));
		}
}