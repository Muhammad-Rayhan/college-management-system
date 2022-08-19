<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_id'))
        return redirect('admin-login');
        $this->load->model('frontendModels/CommonModel');
    }

    public function dashboard()
    {
        $css = "";
        $js = "";
        $data = [
            'css' => $css,
            'js' => $js,
            'title' => 'College Management System',
            'body' => 'frontendViews/dashboard/dashboard',
        ];
        $this->load->view('frontendViews/layouts/baseLayout', $data);
    }

    //View Page College  
    public function viewCollege()
    {
        $tableCity = 'tbl_city';
        $css = "";
        $js = "";
        $data = [
            'css' => $css,
            'js' => $js,
            'title' => 'College Management System',
            'body' => 'frontendViews/pages/addCollege',
            'getCityData' => $this->CommonModel->getCityData($tableCity),
        ];
        $this->load->view('frontendViews/layouts/baseLayout', $data);
    }

    //View Page Student 
    public function viewCoAdmin()
    {
        $tableCollege = "tbl_college";
        $table = "tbl_roles";
        $css = "";
        $js = "";
        $data = [
            'css' => $css,
            'js' => $js,
            'title' => 'College Management System',
            'body' => 'frontendViews/pages/addCoAdmin',
            'getTableData' => $this->CommonModel->getTableData($tableCollege),
            'getRoleData' => $this->CommonModel->getRoleData($table),
        ];
        $this->load->view('frontendViews/layouts/baseLayout', $data);
    }

    //View Page Student 
    public function viewStudent()
    {
        $tableCollege = "tbl_college";
        $css = "";
        $js = "";
        $data = [
            'css' => $css,
            'js' => $js,
            'title' => 'College Management System',
            'body' => 'frontendViews/pages/addStudent',
            'getTableData' => $this->CommonModel->getTableData($tableCollege),
        ];
        $this->load->view('frontendViews/layouts/baseLayout', $data);
    }

    //Add College
    public function addCollege()
    {
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('college', 'College', 'required');
        if($this->form_validation->run()){
            $table = 'tbl_college';
            $data = [
                'city_id' => $this->input->post('city'),
                'college' => $this->input->post('college'),
            ];
            $result = $this->CommonModel->dataInsert($table, $data);
            if($result == true){
                $this->session->set_flashdata('insertSuccess', 'Data Insert Successfully.');
                return redirect(base_url('add-college'));
            } else{
                $this->session->set_flashdata('insertError', 'Data Not Found!');
                return redirect(base_url('add-college'));
            }
        } else {
            return $this->viewCollege();
        }
    }

    //Add Coadmin
    public function addCoAdmin()
    {
        $this->form_validation->set_rules('name', 'User Name', 'required');
        $this->form_validation->set_rules('college_id', 'College ID', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('con_password', 'Confirm Password', 'trim|required|matches[password]|min_length[5]');

        if ($this->form_validation->run()) {
            $table = 'tbl_users';
            $data = $this->input->post();
            $data['password'] = sha1($this->input->post('password'));
            $data['con_password'] = sha1($this->input->post('con_password'));
            $result = $this->CommonModel->dataInsert($table, $data);
            if ($result == true) {
                $this->session->set_flashdata('success', "Co-Admin Register Successfully.");
                return redirect(base_url('add-coadmin'));
            } else if ($result == false) {
                $this->session->set_flashdata('error', "Data Register Failed!.");
                return redirect(base_url('add-coadmin'));
            }
            // echo "<pre>";
            // print_r($data);
        } else {
            return $this->viewCoAdmin();
        }
    }

    //Add Coadmin
    public function addStudent()
    {
        $this->form_validation->set_rules('name', 'Student Name', 'required');
        $this->form_validation->set_rules('college', 'College Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('course', 'Course', 'required');

        if ($this->form_validation->run()) {
            $table = 'tbl_student';
            $data = [
                'student_name' => $this->input->post('name'),
                'college_id' => $this->input->post('college'),
                'email' => $this->input->post('email'),
                'gender' => $this->input->post('gender'),
                'course' => $this->input->post('course'),
            ];
            $result = $this->CommonModel->dataInsert($table, $data);
            if ($result == true) {
                $this->session->set_flashdata('success', "Add Student Successfully.");
                return redirect(base_url('add-student'));
            } else if ($result == false) {
                $this->session->set_flashdata('error', "Data Not Failed!.");
                return redirect(base_url('add-student'));
            }
            // echo "<pre>";
            // print_r($data);
        } else {
            return $this->viewStudent();
        }
    }

    //Display All Multi Table Data
    public function displayMultiTableData()
    {
        $resultList = $this->CommonModel->getMultiTableData();
        // echo "<pre>";
        // print_r($resultList);
        $result = array();
        $i = 1;
        foreach ($resultList as $value) {
            $result[] = [
                $i++,
                $value->college,
                $value->name,
                $value->email,
                $value->role_name,
                $value->gender,
                $value->city_id,
                '
                <a href="show-student/'.$value->college_id.'" class="btn btn-info py-1 text-white">View<a>
                '
            ];
        }
        $output = ['data' => $result];
        echo json_encode($output);
    }

    //Display Student Data Who Read in Same College
    public function showStudent($collegeID)
    {
        $css = "";
        $js = "";
        $data = [
            'css' => $css,
            'js' => $js,
            'title' => 'College Management System',
            'body' => 'frontendViews/pages/showStudent',
            'getStudentData' => $this->CommonModel->getStudentData($collegeID)
        ];
        $this->load->view('frontendViews/layouts/baseLayout', $data);
    }

    //Edit Student Data
    public function editStudent($id)
    {
        $tableCollege = "tbl_college";
        $css = "";
        $js = "";
        $data = [
            'css' => $css,
            'js' => $js,
            'title' => 'College Management System',
            'body' => 'frontendViews/pages/editStudent',
            'getSingleStudentData' => $this->CommonModel->getSingleStudentData($id),
            'getTableData' => $this->CommonModel->getTableData($tableCollege),
        ];
        $this->load->view('frontendViews/layouts/baseLayout', $data);
    }

    //Update Student Data 
    public function updateStudent($id)
    {
        $table = "tbl_student";
        $data = [
            'student_name' => $this->input->post('name'),
            'college_id' => $this->input->post('college'),
            'email' => $this->input->post('email'),
            'gender' => $this->input->post('gender'),
            'course' => $this->input->post('course'),
        ];
        $result = $this->CommonModel->updateData($table, $data, $id);
        if ($result == true) {
            $this->session->set_flashdata('success_update', "Data Update Successfully.");
            return redirect(base_url("dashboard"));
        } else {
            $this->session->set_flashdata('error_update', "Data Update Failed!");
            return redirect(base_url("dashboard"));
        }
    }

    //Delete Student Data
    public function deleteStudent($id)
    {
        $table = "tbl_student";
        $result = $this->CommonModel->dataDelete($table, $id);
        if($result == true){
            $this->session->set_flashdata('success_delete', "Data Delete Successfully.");
            return redirect(base_url("dashboard"));
        } else{
            $this->session->set_flashdata('error_delete', "Data Delete Failed!");
            return redirect(base_url("dashboard"));
        }
    }
}