<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logcheck extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

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

    public function index()
    {
        $this->load->model('Registrcheck_model', 'reg');
        $user = $this->reg->IsRegistred($_POST);
        if (isset( $user[0]))
            $this->session->set_userdata('User', $user[0]);


        if (isset($_SESSION['User'])) {
            header('Location: http://www.honest.ge/ ');

            exit();
        } else {

            header('Location: http://www.honest.ge/login ');
            exit();

        }

    }
}
