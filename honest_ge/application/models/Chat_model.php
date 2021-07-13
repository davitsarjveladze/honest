<?php
class Chat_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database('honest');
    }

    public function GetMessages($data)
    {
        $this->db->where('ChatID',$data['id']);
        return $this->db->get('chat')->result_array();
    }

    public function GetAllMessages() {
        $sendData = [];
        $users = $this->SelectUser();

        $allMessage = $this->db->get('chat')->result_array();
        foreach ($allMessage as $val ) {
            $val['Type'] = $val['msg_Type'];
            $val['date'] = $val['msg_date'];
            if (isset($sendData[$val['chatID']])) {
                $sendData[$val['chatID']][] = $val;
            } else {
                $sendData[$val['chatID']] = [$val];
            }
        }
        return $sendData;
    }

    public function SelectUser() {
        $this->db->select('id, login');
        return $this->db->get('users')->result_array();
    }

}
