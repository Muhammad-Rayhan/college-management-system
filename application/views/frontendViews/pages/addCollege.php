<div class="container-fluid px-5" style="margin-bottom: 75px;">
    <div class="row mt-3">
        <div class="col-12">
            <?php
            $InsertMsg = $this->session->flashdata('insertSuccess');
            $InsertErrorMsg = $this->session->flashdata('insertError');
            if ($InsertMsg) {
            ?>
                <div class="alert alert-success"><?php echo $InsertMsg ?></div>
            <?php
            }
            if ($InsertErrorMsg) {
            ?>
                <div class="alert alert-danger"><?php echo $InsertErrorMsg ?></div>
            <?php
            }
            ?>
            <h2>ADD COLLEGE</h2>
            <hr>
        </div>
        <div class="col-12 mt-3 ps-5">
            <form action="<?php echo base_url('college') ?>" method="post">
                <div class="row">
                    <div class="col-6 pt-2">
                        <div class="form-group d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">City</label>
                            <select style="cursor: pointer; background: white;" name="city" id="city">
                                <option value="">Select</option>
                                <?php
                                if ($getCityData != '') {
                                    foreach ($getCityData as $value) {
                                ?>
                                        <option value="<?php echo $value->city ?>"><?php echo $value->city ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-2 ps-3">
                            <div class="text-danger"><?php echo form_error('city') ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 d-flex justify-content-between">
                            <label for="" style="font-size: 20px;">College</label>
                            <input type="text" placeholder="College" value="<?php echo set_value('college') ?>" name="college">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 ps-3">
                            <div class="text-danger"><?php echo form_error('college') ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-4">
                            <button class="btn btn-primary px-4 py-1">ADD</button>
                            <a href="<?php echo base_url('dashboard') ?>" class="btn btn-primary px-4 py-1">BACK</a>
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