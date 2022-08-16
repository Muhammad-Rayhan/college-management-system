<div class="container-fluid px-5" style="margin-bottom: 75px;">
    <div class="row mt-3">
        <div class="col-12">
            <?php
            $failedMessage = $this->session->flashdata('loginFailed');
            if ($failedMessage) {
            ?>
                <div class="alert alert-danger"><?php echo $failedMessage ?></div>
            <?php
            }
            ?>
            <h2>ADMIN DASHBOARD</h2>
            <h5>Welcome <?php echo $this->session->userdata('name') ?></h5>
            <a href="#" class="btn btn-primary">ADD COLLEGE</a>
            <a href="#" class="btn btn-primary">ADD CO-ADMIN</a>
            <a href="#" class="btn btn-primary">ADD STUDENT</a>
            <hr>
        </div>
        <div class="col-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>