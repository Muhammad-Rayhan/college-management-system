<div class="container-fluid px-5" style="margin-bottom: 75px;">
    <div class="row mt-3">
        <div class="col-12">
            <!-- ======================================== -->
            <?php
            $failedMessage = $this->session->flashdata('loginFailed');
            if ($failedMessage) {
            ?>
                <div class="alert alert-danger"><?php echo $failedMessage ?></div>
            <?php
            }
            ?>
            <?php
            $success_delete = $this->session->flashdata('success_delete');
            $error_delete = $this->session->flashdata('error_delete');
            $success_update = $this->session->flashdata('success_update');
            $error_update = $this->session->flashdata('error_update');
            if ($success_delete) {
            ?>
                <div class="alert alert-success"><?php echo $success_delete ?></div>
            <?php
            }
            if ($error_delete) {
            ?>
                <div class="alert alert-success"><?php echo $error_delete ?></div>
            <?php
            }
            if ($success_update) {
            ?>
                <div class="alert alert-success"><?php echo $success_update ?></div>
            <?php
            }
            if ($error_update) {
            ?>
                <div class="alert alert-success"><?php echo $error_update ?></div>
            <?php
            }
            ?>
            <!-- ========================================= -->
            <?php
            $role_id = $this->session->userdata('role');
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            if ($role_id == 1) {
            ?>
                <h2>ADMIN DASHBOARD</h2>
                <h5>Welcome <?php echo $this->session->userdata('name') ?></h5>
                <a href="<?php echo base_url('add-college') ?>" class="btn btn-primary">ADD COLLEGE</a>
                <a href="<?php echo base_url('add-coadmin') ?>" class="btn btn-primary">ADD COADMIN</a>
                <a href="<?php echo base_url('add-student') ?>" class="btn btn-primary">ADD STUDENT</a>
            <?php
            } else if ($role_id > 1) {
            ?>
                <h2>COADMIN DASHBOARD</h2>
                <h5>Welcome <?php echo $this->session->userdata('name') ?></h5>
                <!-- <a href="<?php echo base_url('add-college') ?>" class="btn btn-primary">ADD COLLEGE</a>
                <a href="<?php echo base_url('add-coadmin') ?>" class="btn btn-primary">ADD COADMIN</a>
                <a href="<?php echo base_url('add-student') ?>" class="btn btn-primary">ADD STUDENT</a> -->
            <?php
            }
            ?>
            <hr>
        </div>
        <div class="col-12">
            <?php
            $role_id = $this->session->userdata('role');
            if ($role_id == 1) {
            ?>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>College Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Gender</th>
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            <?php
            } else if ($role_id > 1) {
            ?>
                <table id="example1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>College Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Gender</th>
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            ajax: "<?php echo base_url('display-data') ?>",
            order: [],
        });
    });
    $(document).ready(function() {
        $('#example1').DataTable({
            ajax: "<?php echo base_url('student-data') ?>",
            order: [],
        });
    });
</script>