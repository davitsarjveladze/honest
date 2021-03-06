<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

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
        $this->load->model('Post_model', 'reg');
        $this->load->model('Chat_model', 'chmod');

        if (isset($_SESSION['User'])) {
            $data['User'] = $_SESSION['User'];
            $data['messages'] = json_encode($this->chmod->GetMessages($_SESSION['User']),JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        } else {
            $data2['User'] =  null;
        }

        $data['iSmobile'] =  $this->isMobile();
        $data['title'] = 'Honest - შესახებ';
        $this->load->view('templates/header',$data);
		$this->load->view('pages/chat',$data);
		$this->load->view('templates/footer');
	}
}
