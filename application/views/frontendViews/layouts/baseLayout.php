<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/app.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/sweetalert2.all.min">
    <script src="<?php echo base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
</head>

<body>

    <!-- Menubar Start -->
    <?php $this->load->view('frontendViews/layouts/header') ?>
    <!-- Menubar End -->
    <!-- Body Content Start -->
    <div class="body-content">
        <?php $this->load->view($body) ?>
    </div>
    <!-- Body Content End -->
    <!-- Footer Start -->
    <?php $this->load->view('frontendViews/layouts/footer') ?>
    <!-- Footer End -->

    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
</body>

</html>

<script>
    //Data Insert Successfull Message
    function dataSuccess(icon, title) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: icon,
            title: title
        })
    }

    //Data Insert Error Message
    function dataError(icon, title) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: icon,
            title: title
        })
    }
</script>