<div class="container-fluid px-5" style="margin-bottom: 75px;">
    <div class="row mt-3">
        <div class="col-12">
            <?php
            $success = $this->session->flashdata('success');
            $error = $this->session->flashdata('error');
            if ($success == true) {
            ?>
                <div class="alert alert-success"><?php echo $success ?></div>
            <?php
            } else if ($error == true) {
            ?>
                <div class="alert alert-danger"><?php echo $error ?></div>
            <?php
            }
            ?>
            <h2>EDIT STUDENT</h2>
            <hr>
        </div>
        <div class="col-12 mt-3 ps-5">
            <form action="<?php echo base_url('update-student/' . $getSingleStudentData->id ) ?>" method="post">
                <div class="row">
                    <div class="col-6 pt-2">
                        <div class="form-group d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">Student Name</label>
                            <input type="text" placeholder="Student" value="<?php echo set_value('name', $getSingleStudentData->student_name) ?>" name="name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-2 ps-3">
                            <div class="text-danger"><?php echo form_error('name') ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">College Name</label>
                            <select style="cursor: pointer; background: white;" name="college">
                                <option value="<?php echo $getSingleStudentData->college_id ?>"><?php echo $getSingleStudentData->college ?></option>
                                <?php
                                if ($getTableData != "") {
                                    foreach ($getTableData as $value) {
                                ?>
                                        <option value="<?php echo $value->id ?>"><?php echo $value->college ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 ps-3">
                            <div class="text-danger"><?php echo form_error('college') ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">Email</label>
                            <input type="email" placeholder="Email" value="<?php echo set_value('email', $getSingleStudentData->email) ?>" name="email">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 ps-3">
                            <div class="text-danger"><?php echo form_error('email') ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">Gender</label>
                            <select style="cursor: pointer; background: white;" value="<?php echo set_select('gender') ?>" name="gender">
                                <option value="<?php echo $getSingleStudentData->gender ?>"><?php echo $getSingleStudentData->gender ?></option>
                                <option value="Female">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 ps-3">
                            <div class="text-danger"><?php echo form_error('gender') ?></div>
                        </div>
                    </div>
                    <div class="col-6 pt-3 pb-4">
                        <div class="form-group d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">Course</label>
                            <input type="text" placeholder="Course" value="<?php echo set_value('course', $getSingleStudentData->course) ?>" name="course">
                        </div>
                    </div>
                    <div class="col-6 mt-2">
                        <div class="form-group mt-2 ps-3">
                            <div class="text-danger"><?php echo form_error('course') ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <button class="btn btn-primary px-4 py-1">ADD</button>
                            <a href="<?php echo base_url("dashboard") ?>" class="btn btn-primary px-4 py-1">BACK</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>