<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public $user;
	public $active_menu;

	public function __construct()
	{
		parent::__construct();

		$this->user = $this->session->user;
		if(!isset($this->user['id'])) redirect(base_url().'main');
		$this->active_menu = array(
			'index' => false,
			'pages' => false,
			'speech' => false
		);
		$this->load->model('dashboard_model');
		$this->load->model('pages_model');
	}

	public function index()
	{
		$this->active_menu['index'] = true;
		$data['menu'] = $this->active_menu;
		$data['page_name'] = 'Dashboard';

		$data['count_post'] = $this->dashboard_model->getCountPost();
		$data['count_comment'] = $this->dashboard_model->getCountComment();
		$data['feeds_post'] = $this->dashboard_model->getAllPost(20);
		$data['feeds_comment'] = $this->dashboard_model->getAllComment(20);

		$data['id'] = $this->user['id'];
		$data['name'] = $this->user['name'];
		$this->load->view('plugin/head');
		$this->load->view('profile/plugin/menu',$data);
		$this->load->view('profile/index');
		$this->load->view('plugin/footer');
	}

	public function pages($id=0,$access_token=null)
	{
		//set_time_limit(0);
		if($this->input->get('cmd') == "loadpage" && $this->input->get('link')){
			if(!$this->pages_model->loadPage($this->input->get('link'))['status']) die(json_encode(array('status'=>false)));
			$json['status'] = true;
			$json['nextpage'] = $this->pages_model->loadPage($this->input->get('link'))['nextpage'];
			$json['str'] = $this->pages_model->loadPage($this->input->get('link'))['str'];
			die(json_encode($json));
		}

		if($this->input->get('action') == "add_post" && $this->input->post('idpost') != '' && $this->input->post('speech_set') != ''){
			$this->pages_model->add_post($id,$this->input->post('idpost'),$this->input->post('speech_set'));
		}else if($this->input->get('action') == "del_post" && $this->input->get('post_id') != ""){
			$this->pages_model->del_post($this->input->get('post_id'));
		}

		$this->active_menu['pages'] = true;
		$data['menu'] = $this->active_menu;
		$data['page_name'] = 'Pages';

		$data['id'] = $this->user['id'];
		$data['name'] = $this->user['name'];

		if($id > 0 && $access_token != null){
			$data['data_speech'] = $this->pages_model->getAllSpeechSet()->result_array();
			$data['feeds_post'] = $this->pages_model->getAllPost($id);
		}

		$this->load->view('plugin/head');
		$this->load->view('profile/plugin/menu',$data);
		if($id < 1 || $access_token == null) $this->load->view('profile/pages');
		else $this->load->view('profile/view_page',$data);
		$this->load->view('plugin/footer');
		
	}

	public function speech($set='')
	{
		$this->active_menu['speech'] = true;
		$data['menu'] = $this->active_menu;
		$data['page_name'] = 'Speech';
		$data['id'] = $this->user['id'];
		$data['name'] = $this->user['name'];

		if($this->input->get('cmd') == "add_speech" && $this->input->post('speech_set') != '' && $this->input->post('ask') != '' && $this->input->post('reply') != ''){
			$this->pages_model->add_speech($this->input->post('speech_set'),$this->input->post('ask'),$this->input->post('reply'));			
		}else if($this->input->get('cmd') == "del_speech" && $this->input->get('speech_id') != ""){
			$this->pages_model->del_speech($this->input->get('speech_id'));
		}

		if($set != ''){
			$data['data_speech'] = $this->pages_model->getSpeechSet($set)->result_array();
		}else{
			$data['data_speech'] = $this->pages_model->getAllSpeechSet()->result_array();
		}

		$this->load->view('plugin/head');
		$this->load->view('profile/plugin/menu',$data);
		if($set != '') $this->load->view('profile/view_speech',$data);
		else $this->load->view('profile/speech',$data);
		$this->load->view('plugin/footer');
		
	}
}
