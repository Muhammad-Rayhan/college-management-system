<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CommonModel extends CI_Model {

    /*========================= CRUD Start =========================*/
    //Data Insert Query
    public function dataInsert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    //Data Edit
    public function getSingleStudentData($id)
    {
        $this->db->select("*");
        $this->db->from("tbl_college");
        $this->db->join("tbl_student", "tbl_student.college_id = tbl_college.id");
        $this->db->where("tbl_student.id", $id);
        return $this->db->get()->row();
    }

    //Data Update
    public function updateData($table, $data, $id)
    {
        return $this->db->where('id', $id)->update($table, $data);
    }

    //Data Delete
    public function dataDelete($table, $id){
        return $this->db->where('id', $id)->delete($table);
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

    /*========================= Get Data Start =========================*/
    //Get City Data
    public function getCityData($tableCity){
        return $this->db->get($tableCity)->result();
    }

    //Get College Data
    public function getTableData($tableCollege){
        return $this->db->get($tableCollege)->result();
    }
    /*========================= Get Data End =========================*/

    /*========================= Display All college, Coadmin & Role Data Fatch on Multi Table =========================*/
    public function getMultiTableData(){
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->join('tbl_college', 'tbl_college.id = tbl_users.college_id');
        $this->db->join('tbl_roles', 'tbl_roles.id = tbl_users.role');
        return $this->db->get()->result();
    }
    /*========================= Display All college, Coadmin & Role Data Fatch on Multi Table =========================*/

    /*========================= Display Student Data Fatch on Multi Table =========================*/
    public function getStudentData($collegeID){
        $this->db->select('*');
        $this->db->from('tbl_college');
        $this->db->join('tbl_student', 'tbl_student.college_id = tbl_college.id');
        $this->db->where("tbl_student.college_id", $collegeID);
        return $this->db->get()->result();
    }
    /*========================= Display All Student Data Fatch on Multi Table =========================*/
}
