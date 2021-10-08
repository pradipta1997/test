<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BRICASH-Inventory | <?= $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/main.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/main_theme.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- DataTables Responsive -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatable-responsive/css/responsive.dataTables.min.css">
    <!-- DataTables Button -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatable-button/css/buttons.bootstrap.min.css">
    <!--Sweetalert & Toastr-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/toastr.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/sweetalert2/sweetalert2.min.css">
    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/toastr.js"> </script>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue">
    <div class="wrapper">
        <header class="main-header">
            <a href="<?= base_url() ?>dashboard" class="logo">
                <span class="logo-mini"><b>K</b>UMS</span>
                <span class="logo-lg">
                    <b><?= $title; ?>
                </span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li> -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url() ?>assets/img/pegawai/default.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->session->userdata('user_login')['username']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= base_url() ?>assets/img/pegawai/default.png" class="img-circle" alt="User Image">
                                    <p><?= $this->session->userdata('user_login')['username']; ?></p>
                                    <p><?= $this->session->userdata('user_login')['nama_subgroup']; ?></p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#changePassword">Change Password</button>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('Auth/Logout') ?>" class="btn btn-danger">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url() ?>assets/img/pegawai/default.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left dark" style="padding-left: 20px;">
                        <p><?= $this->session->userdata('user_login')['username']; ?></p>
                        <p><?= $this->session->userdata('user_login')['nama_subgroup']; ?></p>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php foreach ($parent_nav as $prow) : ?>
                        <li class="<?= $prow->url_menu == "#" ? "treeview" : base_url($prow->url_menu) ?> <?= $prow->nama_menu == $this->session->userdata('parent_name') ? 'active menu-open' : '' ?>">
                            <a href="<?= $prow->url_menu == "#" ? "javascript:;" : base_url($prow->url_menu) ?>" class="nav-link nav-toggle">
                                <i class="fa fa-folder"></i>
                                <span class="title"><?= $prow->nama_menu; ?></span>
                                <?php if ($prow->url_menu == "#") { ?>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                <?php } ?>
                            </a>
                            <ul class="treeview-menu">
                                <?php $child_menus = $My_Controller->fetchsidebar_childMenuById($prow->id_menu); ?>
                                <?php foreach ($child_menus as $child_menuss => $val) { ?>
                                    <?php if ($prow->id_menu == $val->parent_id) { ?>
                                        <li class="nav-item <?= $val->nama_menu == $this->session->userdata('child_name') ? 'active' : '' ?>">
                                            <a href="<?= base_url() . "generals/getpage/" . $val->id_menu; ?>" class="nav-link ">
                                                <span class="title"><?= $val->nama_menu; ?></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <?php $My_Controller->Getsave_up_delPermissions(); ?>
                <h1><small></small></h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url(); ?>dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                    </li>
                    <?php if ($this->session->userdata('child_name')) { ?>
                        <li>
                            <?= $this->session->userdata('parent_name'); ?>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a style="color: green; font-weight: bold; font-style: normal" href="<?= $this->session->userdata('child_url'); ?>"><?= $this->session->userdata('child_name'); ?></a><span class="divider-last">&nbsp;</span>
                        </li>
                        <?php } else {
                        if ($this->session->userdata('parent_name')) { ?>
                            <li><a href="#"><?= $this->session->userdata('parent_name'); ?></a>
                                <span class="divider-last">&nbsp;</span>
                            </li>
                    <?php }
                    } ?>
                </ol>
            </section>
            <section class="content">

                <!-- Modal Change Password -->
                <div id="changePassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="changePassword-title" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?= base_url('Auth/changePassword/' . $this->session->userdata('user_login')['id_user']) ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="changePassword-title">Change Password</h5>
                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <div class="row">
                                            <div class="col-sm-10 col-md-10 col-lg-10">
                                                <input id="password" class="form-control" type="password" name="password">
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2">
                                                <button type="button" id="changeInputtype" class="btn btn-primary"><i id="iconPass" class="fa fa-eye" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Change Password" class="btn btn-primary">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <script>
                    $('#changeInputtype').on('click', function() {
                        let inputType = $('#password');
                        let iconPass = $('#iconPass');

                        if (inputType.attr('type') == 'password') {
                            iconPass.removeClass("fa fa-eye");
                            iconPass.addClass("fa fa-eye-slash");
                            $(this).removeClass("btn btn-primary");
                            $(this).addClass("btn btn-success");
                            inputType.prop('type', 'text');
                        } else {
                            iconPass.removeClass("fa fa-eye-slash");
                            iconPass.addClass("fa fa-eye");
                            $(this).removeClass("btn btn-success");
                            $(this).addClass("btn btn-primary");
                            inputType.prop('type', 'password');
                        }
                    })
                </script>