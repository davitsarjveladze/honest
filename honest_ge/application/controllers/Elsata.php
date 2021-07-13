<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Elsata extends CI_Controller {


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
            $data['iSmobile'] =  $this->isMobile();
            $this->load->model('Post_model', 'reg');
            $data2['posts'] = $this->reg->GetPosts();
            $data['title'] = 'Honest - შესახებ';
            $this->load->view('templates/header',$data);
            if ($_SESSION['User']['id'] == 1) {
                $this->load->view('pages/admin_index', $data2);
            }
            $this->load->view('templates/footer');
        } else {
            $data2['User'] =  null;
            $this->load->view('templates/header');
            $this->load->view('templates/footer');

        }

    }
}
