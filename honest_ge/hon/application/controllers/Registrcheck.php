<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrcheck extends CI_Controller {

    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    public function index()
    {

        $data['req']         = $_REQUEST;
        if (!(isset($data['req']['name']) && strlen($data['req']['name']) !== 0
            && isset($data['req']['password']) && strlen($data['req']['password']) !== 0
            && isset($data['req']['age']) && is_numeric($data['req']['age']) && $data['req']['age'] > 0
            && isset($data['req']['question1'])
            && isset($data['req']['question2']) && isset($data['req']['question3'])
            && isset($data['req']['anserw1']) && isset($data['req']['anserw2'])
            && isset($data['req']['anserw3']))) {
            header('Location: http://www.honest.ge/registration');
        }
        $this->load->view('pages/regsucc',$data);
        $this->load->model('Registrcheck_model', 'reg');
        if ($this->reg->print2($data['req'])) {
            header('Location: http://www.honest.ge/login ');
        }  else {
            header('Location: http://www.honest.ge/registration');
        }


    }
}
