<?php
class Post_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database('honest');
    }

    public function print2($data)
    {
        $insert = [
            'title' => $data['title'],
            'text'  => $data['text']
        ];
        $this->db->insert('posts', $insert);
    }

    public function GetPosts(){
        $this->db->select('title, id');
         return $this->db->get('posts')->result_array();

    }

    public function GetOnePost($id){
        $this->db->where('id',$id);
        return $this->db->get('posts')->result_array();
    }

    public function DeletePost($ID) {
        foreach ($ID as $id){
            $this->db->where('id',$id);
            $this->db->delete('posts');
        }
    }


}
