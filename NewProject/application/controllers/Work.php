<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work extends CI_Controller {
	public $user;

	public function __construct()
	{
		parent::__construct();
		$this->user = $this->session->user;
		if(!isset($this->user['id'])) redirect(base_url().'main');
		$this->load->model('pages_model');
		$this->load->model('work_model');
	}

	public function pages($id=0,$access_token=null)
	{
		if($id <= 0 || $access_token == '') die('<script>window.close();</script>');
		$data['feeds_post'] = $this->pages_model->getAllPost($id);
		$data['id'] = $id;
		$data['access_token'] = $access_token;
		$this->load->view('work/work',$data);
	}

	public function ask($idpage='',$idcomment='',$messages='',$access_token='')
	{
		$tmp_array['tmp_idcomment'] = array(1);
		if(!isset($this->session->tmp_idcomment)) $this->session->set_userdata($tmp_array);
		$tmp_array['tmp_idcomment'] = $this->session->tmp_idcomment;
		if(array_search($idcomment, $tmp_array['tmp_idcomment']) != false) die(json_encode(true));
		if($idpage!='' && $idcomment!='' && $messages!='' && $access_token!=''){
			
			array_push($tmp_array['tmp_idcomment'], $idcomment);
			$this->session->set_userdata($tmp_array);
			$this->work_model->setIDPage($idpage);
			$this->work_model->setIDComment($idcomment);
			$this->work_model->setAsk($messages);
			$this->work_model->setAccessToken($access_token);
			$this->work_model->excute();
			
		}
		die(json_encode(true));
	}

}
