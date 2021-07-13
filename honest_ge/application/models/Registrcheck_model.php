<?php
class Registrcheck_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database('honest');
    }

    public function print2($data)
    {
        $insert = [
            'login'         => $data['name'],
            'password'      => $data['password'],
            'age'           => $data['age'],
            'question1'     => $data['question1'],
            'question2'     => $data['question2'],
            'question3'     => $data['question3'],
            'anserw1'       => $data['anserw1'],
            'anserw2'       => $data['anserw2'],
            'anserw3'       => $data['anserw3'],
        ];
        if (!(isset($data['name']) && strlen($data['name']) !== 0
            && isset($data['password']) && strlen($data['password']) !== 0
            && isset($data['age']) && is_numeric($data['age']) && $data['age'] > 0
            && isset($data['question1'])
            && isset($data['question2']) && isset($data['question3'])
            && isset($data['anserw1']) && isset($data['anserw2'])
            && isset($data['anserw3']))) {
            header('Location: http://www.honest.ge/registration');
        }
        return $this->db->insert('users', $insert);
    }

    public function IsRegistred($Data) {
        $this->db->where('password', $Data['password']);
        $this->db->where('login', $Data['name']);
        return $this->db->get('users')->result_array();
    }

    


}
