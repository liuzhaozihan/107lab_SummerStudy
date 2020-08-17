<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*前台显示模型
*/

class Index_model extends CI_Model
{
	
	/*查询新闻公告数据*/
	public function check_news(){
		$data = $this->db->limit(8)->get('news')->result_array();
		return $data;
	}
	/*查询心理百科数据*/
	public function check_baike(){
		$data = $this->db->limit(5)->get('xinli_baike')->result_array();
		return $data;
	}
	/*查询心理保健数据*/
	public function check_baojian(){
		$data = $this->db->limit(5)->get('xinli_baojian')->result_array();
		return $data;
	}
	/*查询心理咨询数据*/
	public function check_zixun(){
		$data = $this->db->limit(5)->get('xinli_zixun')->result_array();
		return $data;
	}
	/*查询下载中心数据*/
	public function check_download(){
		$data = $this->db->limit(5)->get('download')->result_array();
		return $data;
	}


}