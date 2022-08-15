<div class="container-fluid px-5" style="margin-bottom: 75px;">
    <div class="row mt-3">
        <div class="col-12">
            <h2>ADMIN LOGIN</h2>
            <hr>
        </div>
        <div class="col-12 mt-3 ps-5">
            <form action="<?php echo base_url('admin-signin') ?>" method="post">
                <div class="row">
                    <div class="col-6 pt-2">
                        <div class="form-group d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">Email</label>
                            <input type="email" placeholder="Email" value="<?php echo set_value('email') ?>" name="email">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-2 ps-3">
                            <div class="text-danger"><?php echo form_error('email') ?></div>
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
                        <div class="form-group">
                            <button class="btn btn-primary px-4 py-1">LOGIN</button>
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
    });
</script>