<div class="container-fluid px-5" style="margin-bottom: 75px;">
    <div class="row mt-3">
        <div class="col-12">
            <h2 class="text-center">ADMIN & CO ADMIN LOGIN</h2>
            <hr>
        </div>
        <div class="col-6 mt-3 ps-5">
            <div class="d-flex justify-content-between">
                <?php
                    if(1 == $getRegisterInfo){

                    } else{
                        ?>
                            <a href="<?php echo base_url('admin-register') ?>" class="btn btn-primary text-white">ADMIN REGISTER</a>
                        <?php
                    }
                ?>
                <a href="<?php echo base_url('admin-login') ?>" class="btn btn-primary text-white">ADMIN LOGIN</a>
            </div>
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