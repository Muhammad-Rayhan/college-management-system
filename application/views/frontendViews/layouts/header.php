<!-- Menubar Start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <h5 class="text-white py-2">COLLEGE MANAGEMENT SYSTEM</h5>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <?php
            $data = $this->session->userdata('user_id');
            if ($data) {
                $role_id = $this->session->userdata('role');
                if ($role_id == 1) {
            ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" href="#"><b style="margin-right: 5px;" class="text-white">SETTING</b></a>
                            <ul class="dropdown-menu bg-white" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="<?php echo base_url('dashboard') ?>"><i class="fa-solid fa-house-chimney me-2"></i><b>Dashboard</b></a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('dashboard') ?>"><i class="fa-solid fa-people-roof me-2"></i><b>Co Admin</b></a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('logout') ?>"><i class="fa-solid fa-right-from-bracket me-2"></i><b>Log Out</b></a></li>
                            </ul>
                        </li>
                    </ul>
                <?php
                } else if ($role_id > 1) {
                ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" href="#"><b style="margin-right: 5px;" class="text-white">SETTING</b></a>
                            <ul class="dropdown-menu bg-white" aria-labelledby="dropdownMenuButton1">
                                <!-- <li><a class="dropdown-item" href="<?php echo base_url('dashboard') ?>"><i class="fa-solid fa-house-chimney me-2"></i><b>Dashboard</b></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('dashboard') ?>"><i class="fa-solid fa-house-chimney me-2"></i><b>Co Admin</b></a></li> -->
                                <li><a class="dropdown-item" href="<?php echo base_url('logout') ?>"><i class="fa-solid fa-right-from-bracket me-2"></i><b>Log Out</b></a></li>
                            </ul>
                        </li>
                    </ul>
            <?php
                }
            }
            ?>
        </div>
    </div>
</nav>
<!-- Menubar End -->