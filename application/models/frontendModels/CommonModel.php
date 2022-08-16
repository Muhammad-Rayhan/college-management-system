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

    //Admin Register or Not Checked
    public function checkAdminExist()
    {
        $checkAdmin = $this->db->where(['role' => '1'])->get("tbl_users");
        if($checkAdmin->num_rows() > 0){
            return $checkAdmin->num_rows();
        }
    }

    //Admin Login Check
    public function adminCheck($table, $email, $password)
    {
        return $this->db->where(['email' => $email, 'password' => $password])->get($table)->row();
    }
}
