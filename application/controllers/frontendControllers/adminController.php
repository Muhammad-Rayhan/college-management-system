<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminController extends CI_Controller {

    public function dashboard()
    {
        $css = "";
        $js = "";
        $data = [
            'css' => $css,
            'js' => $js,
            'title' => 'College Management System',
            'body' => 'frontendViews/dashboard/dashboard',
        ];
        $this->load->view('frontendViews/layouts/baseLayout', $data);
    }
}