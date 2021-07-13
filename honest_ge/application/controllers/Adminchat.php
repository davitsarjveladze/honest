<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminchat extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

        function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }

        function isMobile() {
            return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
        }

        public function index() {
            $data['iSmobile'] =  $this->isMobile();
        $this->load->model('Post_model', 'reg');
        $this->load->model('Chat_model', 'chmod');

        if (isset($_SESSION['User'])) {
            $data['User'] = $_SESSION['User'];
            $data['messages'] = json_encode($this->chmod->GetAllMessages(),JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
            $data['AllUsers'] = json_encode($this->chmod->SelectUser(),JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
            $data['iSmobile'] =  $this->isMobile();
            $data['title'] = 'Honest - შესახებ';
            $this->load->view('templates/header',$data);
            if ($_SESSION['User']['id'] == 1) {
                $this->load->view('pages/adminchat',$data);
            }
        } else {
            $data2['User'] =  null;
            $this->load->view('templates/header',$data);
            $this->load->view('templates/footer');

        }
    }


}
