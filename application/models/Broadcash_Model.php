<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Broadcash_Model extends CI_Model {

    public function insert_pesan($data) {
        $this->db->insert('tbl_pesan', $data);
    }
}
?>
