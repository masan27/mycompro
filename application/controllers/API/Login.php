<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Login extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('m_login');
    }

    public function cek_post()
    {
    $model = $this->m_login;

    $user = $this->input->post('username');
		$pass = $this->input->post('password');

		$where = array(
			'username' => $user,
			'password' => sha1('thecroc ' . $pass)
        );
        
        $login = $model->cek_user("t_user", $where);
        if($login){            
            $this->response($login, 200);
        }
        else{
            $this->response(array('message' => 'Error User not found'));
        }
    }
}