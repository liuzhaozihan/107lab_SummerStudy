<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 文章管理模型
 */
class Article_model extends CI_Model{
    /**
     * 发表文章
     */
    public function add($data){
        $this->db->insert('article',$data);
    }
    /**
     * 查看文章
     */
    public function article_category(){
        $data=$this->db->select('aid,title,cname,time')->from('article')->join('category','article.cid=category.cid')->order_by('flag', 'aid','asc')->get()->result_array();
        return $data;
    }
    /**
     * 查询文章
     */
    public function check(){
        $data['xwgg'] = $this->db->select('aid,title,time,thumb,info')->order_by('flag','time', 'desc')->get_where('article', array('cid' => 2))->result_array();
        $data['zxjj'] = $this->db->select('aid,title,info')->order_by('flag','time', 'desc')->get_where('article', array('cid' => 1))->result_array();
        $data['xlbk'] = $this->db->select('aid,title,info')->order_by('flag', 'time', 'desc')->get_where('article', array('cid' => 3))->result_array();
        $data['xlbj'] = $this->db->select('aid,title,info')->order_by('flag', 'time', 'desc')->get_where('article', array('cid' => 4))->result_array();
        $data['xlzx'] = $this->db->select('aid,title,info')->order_by('flag', 'time', 'desc')->get_where('article', array('cid' => 5))->result_array();
        $data['xzzx'] = $this->db->select('time,fid,title,file')->order_by('time','fid','desc')->get_where('files')->result_array();

        return $data;
    }
    /**
     * 通过栏目调取文章
     */
    public function category_article($cid){
        $data=$this->db->select('aid,time,thumb,title,info')->order_by('flag', 'time','desc')->get_where('article',array('cid'=>$cid))->result_array();
        return $data;
    }
    /**
     * 通过aid调取文章
     */
    public function aid_article($aid){
        $data=$this->db->join('category','article.cid=category.cid')->get_where('article',array('aid'=>$aid))->result_array();
        return $data;
    }
    /**
     * 删除文章
     */
    public function del($aid){
        $this->db->delete('article', array('aid' => $aid));
    }
    /**
     * 文章置顶
     */
    public function top($aid){
        $data1=array(
            'flag'=>0,
        );
        $data2=array(
            'flag'=>1,
        );
        $cid = $this->db->select('cid')->get_where('article', array('aid' => $aid))->result_array();
        $this->db->update('article', $data1,array('cid'=> $cid[0]['cid']));
        $this->db->update('article', $data2 , array('aid' => $aid));
    }
    /**
     * 文章访问量处理
     */
    public function add_reading($ip,$aid){
        $data0 = $this->db->select('ipid')->get_where('ip', array('aid' => $aid,'ip'=>$ip))->result_array();
        if(empty($data0)){
            $dataip=array(
                'ip'=>$ip,
                'aid'=>$aid,
            );
            $this->db->insert('ip', $dataip);
            $data = $this->db->select('reading')->get_where('article', array('aid' => $aid))->result_array();
            $data[0]['reading'] += 1;
            $data1 = array(
                'reading' => $data[0]['reading'],
            );
            $this->db->update('article', $data1, array('aid' => $aid));
        }
    }
    /**
     * 编辑文章
     */
    public function edit_article($aid,$data){
        $this->db->update('article', $data, array('aid' => $aid));
    }
}