<?php 
defined('BASEPATH') OR exit('No direct script access allowed');	
class Login_model extends CI_Model
{
	public $app;
	public function __construct()
	{
		parent::__construct();
		$this->app = array(
			"api_key"=>"882a8490361da98702bf97a021ddc14d",
			"secret"=>"62f8ce9f74b12f84c123cc23437a4a32"
		);
	}

	public function get_sig($email,$password){
		$data['api_key'] = $this->app["api_key"];
		$data['method'] = "auth.login";
		$data['credentials_type'] = 'password';
		$data['email'] = $email;
		$data['password'] = $password;
		$data['format'] = "JSON";
		$data['v'] = '1.0';				
		ksort($data);					
		$args = '';									
		foreach ($data as $key => $value){
			$args .= $key.'='.$value;
		}
								
		$data['sig'] = md5($args.$this->app["secret"]);
	    return $data["sig"];
	}
}
?>