<?php 
    $permission = $this->session->userdata('permission');
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-city"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $this->config->item('project_title'); ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo  base_url();?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
			<?php if($permission['user_entry']){ ?>
			<li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('users'); ?>">
                    <i class="fas fa-users"></i>
                    <span>User</span></a>
            </li>
            <?php } ?>
            
            <?php if($permission['plot_entry']){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('property'); ?>">
                    <i class="fas fa-users"></i>
                    <span>Entry</span></a>
            </li>
            <?php } ?>
            
            <?php if($permission['booking']){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('booking'); ?>">
                    <i class="fas fa-user"></i>
                    <span>Booking</span></a>
            </li>
            <?php } ?>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>