<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CommonModel extends CI_Model {

    /*========================= CRUD Start =========================*/
    //Data Insert Query
    public function dataInsert($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    /*========================= CRUD End =========================*/

    //Get Role Data
    public function getRoleData($table){
        return $this->db->get($table)->result();
    }
}
