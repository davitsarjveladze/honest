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
        $mirchat = ['name' => $data['name'] . '-' . time(),
                    'mail' => 'anonymous@anonymous.anonymous',
                    'image' => '/assets/livechat/upload/default-avatars/a.png',
                    'roles' => 'GUEST',
                    'password'      => 'x',
                    'last_activity' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('mirrormx_customer_chat_user', $mirchat);
        $id = $this->db->insert_id();
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
            'chat_id'       => $id,
        ];
        return $this->db->insert('users', $insert);
    }

    public function IsRegistred($Data) {
        $this->db->where('password', $Data['password']);
        $this->db->where('login', $Data['name']);
        return $this->db->get('users')->result_array();
    }

    public function merUser($Data){
        $this->db->where('password', $Data['password']);
        $this->db->where('login', $Data['name']);
        $User = $this->db->get('users')->result_array();
        if (isset($User[0])){
         $this->db->where('id', $User[0]['chat_id']);
         return $this->db->get('mirrormx_customer_chat_user')->result_array();
    }
    }


}
