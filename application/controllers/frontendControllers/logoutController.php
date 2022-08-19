<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logoutController extends CI_Controller {

    //Logout Here
    public function logout()
    {
        $this->session->unset_userdata('user_id');
        return redirect('admin-login');
    }
}