<?php 
defined('BASEPATH') OR exit('No direct script access allowed');	
class Work_model extends CI_Model
{
	public $idpage;
	public $idpost;
	public $idcomment;
	public $access_token;
	public $ask;

	public function __construct()
	{
		parent::__construct();
	}

	public function setIDPage($idpage){
		$this->idpage = urldecode(trim($idpage));
	}

	public function setIDComment($id){
		$this->idcomment = urldecode(trim($id));
		$this->idpost = explode('_', $this->idcomment)[0];
	}

	public function setAccessToken($access_token){
		$this->access_token = urldecode(trim($access_token));
	}

	public function setAsk($message){
		$this->ask = urldecode(trim($message));
	}

	public function excute(){

		$rs = $this->db->query('SELECT speech.speech_id,speech.speech_set,speech.speech_reply FROM `post` INNER JOIN speech ON speech.speech_set = post.speech_set WHERE post.user_id = '.$this->session->user['user_id'].' AND post.post_fbid = '.$this->idpost.' AND speech.speech_ask LIKE "%'.$this->ask.'%"');
			
			
		if($rs->num_rows() > 0){
			$speech_reply = $rs->result_array()[0]['speech_reply'];
			$res = json_decode(file_get_contents('https://graph.facebook.com/'.$this->idcomment.'/comments?method=post&message='.$speech_reply.'&access_token='.$this->access_token),true);
			if(!empty($res['id'])) {
				$insert = array(
					'logs_idcomment' => $this->idcomment, 
					'logs_idsubcomment' => $res['id'], 
					'post_id' => $this->idpost, 
					'user_id' => $this->session->user['user_id'], 
					'speech_id' => $rs->result_array()[0]['speech_id'], 
					'logs_datetime' => date('Y-m-d H:i:s',time())
				);
				$this->db->insert('logs',$insert);
			}
		}
		return true;
	}

}
?>