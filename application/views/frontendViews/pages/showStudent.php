<div class="container-fluid px-5" style="margin-bottom: 75px;">
    <div class="row mt-3">
        <div class="col-12">
            <h2>VIEW STUDENT</h2>
            <!-- <h5>Welcome <?php echo $this->session->userdata('name') ?></h5> -->
            <a href="<?php echo base_url('dashboard') ?>" class="btn btn-primary mt-2">BACK</a>
            <hr>
        </div>
        <?php
            // echo "<pre>";
            // print_r($getStudentData);
        ?>
        <div class="col-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>College Name</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($getStudentData != "") {
                        $i = 1;
                        foreach ($getStudentData as $value) {
                    ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $value->student_name ?></td>
                                <td><?php echo $value->college ?></td>
                                <td><?php echo $value->course ?></td>
                                <td><?php echo $value->email ?></td>
                                <td><?php echo $value->gender ?></td>
                                <td>
                                    <a href="<?php echo base_url('edit-student/' . $value->id) ?>" style="text-decoration: none; border: 1px solid green; padding: 1px 12px; border-radius: 3px; color: green;">Edit</a>
                                    <!-- <a href="<?php echo base_url('delete-student/' . $value->id) ?>" style="text-decoration: none; border: 1px solid red; padding: 1px 12px; border-radius: 3px; color: red;">Delete</a> -->
                                    <a href="<?php echo base_url('delete-student/' . $value->id) ?>" style="text-decoration: none; border: 1px solid red; padding: 1px 12px; border-radius: 3px; color: red;">Delete</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>