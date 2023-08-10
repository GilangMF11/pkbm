<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Broadcash_Model extends CI_Model {

    public function getAllData()
    {
        return $this->db->get('tbl_terkirim')->result();
    }

    public function insert_pesan($data) {
        $this->db->insert('tbl_pesan', $data);
    }
}
?>
