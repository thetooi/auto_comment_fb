<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model','login');
	}

	public function index()
	{
		$this->load->view('plugin/head');
		$this->load->view('index');
		$this->load->view('plugin/footer');
	}

	public function getFormLogin()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		
		if(isset($email) && isset($password) && $email != "" && $password != ""){
		

		    $link = "https://api.facebook.com/restserver.php?api_key=".$this->login->app["api_key"]."&credentials_type=password&email=".$email."&format=JSON&method=auth.login&password=".$password."&v=1.0&sig=".$this->login->get_sig($email,$password);

			die('<h4>"คัดลอก ข้อความในกล่องสี่เหลี่ยมด้านล่างทั้งหมดไปใส่ช่องว่างด้านล่าง"</h4><iframe id="OD1" style="width: 100%;background-color: #fff;" src="'.$link.'"></iframe>');
		}else die('<h4>ข้อมูลท่านยังไม่ครบถ้วน</h4>');
	}

	public function login()
	{
		$token = $this->input->post("token");
		$data = json_decode(trim($token),true);
		$dataUser = json_decode(file_get_contents('https://graph.facebook.com/me/?access_token='.$data['access_token']),true);
		if(isset($dataUser['id']) && isset($dataUser['name'])) {
			$user['user'] = array('id' => $dataUser['id'], 'name' => $dataUser['name'], 'access_token' => $data['access_token']);
			$re = $this->db->where('user_fbid',$dataUser['id'])->get('user');
			if($re->num_rows() == 0){
				$insert = array(
					'user_fbid' => $dataUser['id'],
					'user_fbname' => $dataUser['name'],
					'user_createtime' => date('Y-m-d H:i:s',time())
				);
				$this->db->insert('user',$insert);
				$user['user']['user_id'] = $this->db->insert_id();
			}else $user['user']['user_id'] = $re->result_array()[0]['user_id'];
			$this->session->set_userdata($user);
			die(json_encode(array('status'=>true)));
		}else die(json_encode(array('status'=>false)));
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}
}
