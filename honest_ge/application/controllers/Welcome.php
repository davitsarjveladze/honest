<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
            $data2['User'] = $_SESSION['User'];
        } else {
            $data2['User'] =  null;
        }
        $data2['iSmobile'] =  $this->isMobile();
        $this->load->model('Post_model', 'reg');
        $data['posts'] = $this->reg->GetPosts();
		$data2['title'] = 'Honest - მთავარი';
        $this->load->view('templates/header',$data2);
        $this->load->view('templates/slider',$data2);
        $this->load->view('pages/home',$data);
		$this->load->view('templates/footer');
	}
}
