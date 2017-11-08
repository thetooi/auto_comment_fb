<?php 
defined('BASEPATH') OR exit('No direct script access allowed');	
class Dashboard_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getCountPost()
	{
		return $this->db->select('COUNT(distinct post_fbid) as countpost')->where('user_id',$this->user['user_id'])->get('post')->result_array()[0]['countpost'];
	}

	public function getCountComment()
	{
		return $this->db->select('COUNT(distinct logs_idcomment) as countcomment')->where('user_id', $this->user['user_id'])->get('logs')->result_array()[0]['countcomment'];
	}

	public function getAllPost($limit=0)
	{
		$this->db->where('user_id',$this->user['user_id']);
		$this->db->group_by('post_fbid');
		$this->db->order_by('post_id','desc');
		if($limit > 0) $this->db->limit($limit);
		return $this->db->get('post');
	}

	public function getAllComment($limit=0)
	{
		$this->db->where('user_id', $this->user['user_id']);
		$this->db->group_by('logs_idcomment');
		$this->db->order_by('logs_id','desc');
		if($limit > 0) $this->db->limit($limit);
		return $this->db->get('logs');
	}



}