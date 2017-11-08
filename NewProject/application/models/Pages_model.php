<?php 
defined('BASEPATH') OR exit('No direct script access allowed');	
class Pages_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function loadPage($link){
		$str = array();
		$str['str'] = '';
		$pages = json_decode(file_get_contents($link),true);
		// $pages = json_decode(file_get_contents('https://graph.facebook.com/me/accounts?limit=6&access_token='.$this->session->user['access_token']),true);
        //$id_cover = 0;
  		if(!isset($pages['data'][0]['id'])) {
        	$str['status'] = false;
        	return false;
        }
        $str['status'] = true;
        $str['nextpage'] = isset($pages['paging']['next']) ? $pages['paging']['next']: '';
        foreach ($pages['data'] as $key => $value) {
            //$id_cover = null;
            $profile_page = json_decode(file_get_contents('https://graph.facebook.com/me/?access_token='.$value['access_token']),true);

            // $albums = json_decode(file_get_contents('https://graph.facebook.com/me/albums?access_token='.$value['access_token']),true);
            // foreach ($albums['data'] as $_key => $_value) {
            //     if($_value['type'] != "cover") continue;
            //     $_cover = json_decode(file_get_contents('https://graph.facebook.com/'.$_value['id'].'/photos?access_token='.$value['access_token']),true);
            //     $id_cover = $_cover['data'][0]['id'];
            //     break;
            // }
            $username = isset($profile_page['username']) ? $profile_page['username'] : $value['id'];
			$str['str'] .= '<!-- start form -->';
			$str['str'] .= '<div class="col-lg-4 col-md-5">';
			$str['str'] .= '<div class="card card-user">';
			$str['str'] .= '<div class="image">';
            $str['str'] .= '<img src="https://graph.facebook.com/4/picture?width=200" alt="'.$value['name'].'"/>';
            $str['str'] .= '</div>';
            $str['str'] .= '<div class="content">';
            $str['str'] .= '<div class="author">';
            $str['str'] .= '<img class="avatar border-white" src="https://graph.facebook.com/'.$value['id'].'/picture?width=200" alt="'.$value['name'].'"/>';
            $str['str'] .= '<h4 class="title">'.$value['name'].'<br />';
            $str['str'] .= '<a target="_blank" href="https://www.facebook.com/'.$username.'"><small>@'.$username.'</small></a>';
            $str['str'] .= '</h4>';
            $str['str'] .= '</div>';
            $str['str'] .= '<p class="description text-center">ยอดไลค์ '.number_format($profile_page['likes']).' ไลค์';
            $str['str'] .= '</p>';
            $str['str'] .= '</div>';
            $str['str'] .= '<hr>';
            $str['str'] .= '<div class="text-center">';
            $str['str'] .= '<div class="row">';
            $str['str'] .= '<div class="col-md-3 col-md-offset-1">1200<br /><small>คำสอน</small></div>';
            $str['str'] .= '<div class="col-md-4">1200<br /><small>คอมเมนต์</small></div>';
            $str['str'] .= '<div class="col-md-3">';
            $str['str'] .= '<a target="_blank" href="'.base_url().'profile/pages/'.$value['id'].'/'.$value['access_token'].'/'.urlencode(urlencode($value['name'])).'"><i class="ti-settings"></i><br>จัดการ</a>';
            $str['str'] .= '</div>';
            $str['str'] .= '</div>';
            $str['str'] .= '</div>';
            $str['str'] .= '</div>';
                        
            $str['str'] .= '</div>';
			$str['str'] .= '<!-- end form -->';


        }
	    return $str;
	}

    public function add_speech($set='',$ask='',$reply='')
    {
        $insert = array(
            'speech_ask' => trim($ask),
            'speech_reply' => urlencode(trim($reply)),
            'speech_set' => trim($set),
            'user_id' => $this->session->user['user_id'],
            'speech_datetime' => date('Y-m-d H:i:s',time()),
        );
        $this->db->insert('speech',$insert);
        return true;
    }

    public function del_speech($id)
    {
        $where = array(
            'user_id' => $this->session->user['user_id'],
            'speech_id' => $id
        );
        $this->db->where($where)->delete('speech');
        return true;
    }

    public function getSpeechSet($set)
    {
        $where = array(
            'user_id' => $this->session->user['user_id'],
            'speech_set' => urldecode($set)
        );
        return $this->db->where($where)->get('speech');
    }

    public function add_post($idpage='',$idpost='',$speech_set='')
    {
        $insert = array(
            'post_fbid' => trim($idpost),
            'post_idpage' => $idpage,
            'speech_set' => $speech_set,
            'user_id' => $this->session->user['user_id'],
            'post_datetime' => date('Y-m-d H:i:s',time())
        );
        $this->db->insert('post',$insert);
        return true;
    }

    public function del_post($id)
    {
        $where = array(
            'user_id' => $this->session->user['user_id'],
            'post_id' => $id
        );
        $this->db->where($where)->delete('post');
        return true;
    }

    public function getAllPost($id)
    {
        $this->db->query('SELECT post.post_id,post.post_fbid,speech.speech_set FROM `post` INNER JOIN speech ON speech.speech_set = post.speech_set WHERE post.user_id = '.$this->session->user['user_id'].' AND post.post_idpage = '.$id);
        return $this->db->get('post');
    }

    public function getAllSpeechSet()
    {
       
        $where = array(
            'user_id' => $this->session->user['user_id']
        );
        $this->db->select('speech_id,speech_set,COUNT(speech_set)')->where($where)->group_by('speech_set');
        return $this->db->get('speech');
    }


}
?>