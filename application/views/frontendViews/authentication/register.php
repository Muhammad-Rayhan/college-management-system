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
            } else if($error == true) {
            ?>
                <div class="alert alert-danger"><?php echo $error ?></div>
            <?php
            }
            ?>
            <h2>ADMIN REGISTRATION</h2>
            <hr>
        </div>
        <div class="col-12 mt-3 ps-5">
            <form action="<?php echo base_url('admin-signup') ?>" method="post">
                <div class="row">
                    <div class="col-6 pt-2">
                        <div class="form-group d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">Username</label>
                            <input type="text" placeholder="Username" value="<?php echo set_value('name') ?>" name="name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-2 ps-3">
                            <div class="text-danger"><?php echo form_error('name') ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">email</label>
                            <input type="email" placeholder="Email" value="<?php echo set_value('email') ?>" name="email">
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
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 ps-3">
                            <div class="text-danger"><?php echo form_error('gender') ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">Role</label>
                            <select style="cursor: pointer; background: white;" value="<?php echo set_select('role') ?>" name="role">
                                <option value="">Select</option>
                                <?php
                                if ($getRoleData == true) {
                                    foreach ($getRoleData as $key => $value) {
                                ?>
                                        <option value="<?php echo $value->id ?>"><?php echo $value->role_name ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 ps-3">
                            <div class="text-danger"><?php echo form_error('role') ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">Password</label>
                            <div class="showPassword">
                                <input type="password" placeholder="Password" value="<?php echo set_value('password') ?>" name="password">
                                <div class="form-check form-switch">
                                    <input class="form-check-input switch1" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="cursor: pointer;" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 ps-3">
                            <div class="text-danger"><?php echo form_error('password') ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">Password Again</label>
                            <div class="showPassword2">
                                <input type="password" value="<?php echo set_value('con_password') ?>" name="con_password">
                                <div class="form-check form-switch">
                                    <input class="form-check-input switch2" type="checkbox" role="switch" id="flexSwitchCheckChecked" style="cursor: pointer;" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group ps-3">
                            <div class="text-danger"><?php echo form_error('con_password') ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <button class="btn btn-primary px-4 py-1">REGISTER</button>
                            <a href="<?php echo base_url() ?>" class="btn btn-primary px-4 py-1">BACK</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".switch1").change(function() {
            if ($(this).prop("checked")) {
                $("input[name=password]").attr("type", "password");
            } else {
                $("input[name=password]").attr("type", "text");
            }
        });
        $(".switch2").change(function() {
            if ($(this).prop("checked")) {
                $("input[name=con_password]").attr("type", "password");
            } else {
                $("input[name=con_password]").attr("type", "text");
            }
        });
    });
</script>