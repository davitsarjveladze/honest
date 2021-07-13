<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    public function index()
    {
        if (isset($_SESSION['User'])) {
            $data['User'] = $_SESSION['User'];
        } else {
            $data2['User'] =  null;
        }
        $data['iSmobile'] =  $this->isMobile();
        $this->load->model('Post_model', 'reg');
        $post = $this->reg->GetOnePost($this->uri->segment(2));

        $data['title'] = 'Honest - კონტაქტები';
        $this->load->view('templates/header',$data);
        $this->load->view('pages/post',$post[0]);
        $this->load->view('templates/footer');
    }
}
