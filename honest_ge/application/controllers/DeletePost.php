<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeletePost extends CI_Controller {

    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    public function index()
    {
       print_r($_POST);
        $this->load->model('Post_model', 'reg');
        $post = $this->reg->DeletePost($_POST['ID']);
    }
}
