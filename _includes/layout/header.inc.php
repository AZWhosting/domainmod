<?php
/**
 * /_includes/layout/header.inc.php
 *
 * This file is part of DomainMOD, an open source domain and internet asset manager.
 * Copyright (c) 2010-2018 Greg Chetcuti <greg@chetcuti.com>
 *
 * Project: http://domainmod.org   Author: http://chetcuti.com
 *
 * DomainMOD is free software: you can redistribute it and/or modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later
 * version.
 *
 * DomainMOD is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with DomainMOD. If not, see
 * http://www.gnu.org/licenses/.
 *
 */
?>
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo $web_root; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
          <img src="<?php echo $web_root; ?>/images/logo-mini.png">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" >
          <img src="<?php echo $web_root; ?>/images/logo.png">
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <span class="hidden-md hidden-lg">
         <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </a>
      </span>

      <div class="navbar-custom-menu">

<!-- Select language -->
        <ul class="nav navbar-nav">
         <li class="user-footer">
                <div class="form-group" style="padding-top:10px;">
                  <form method="post" action="">
                  <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="lang" onchange="this.form.submit();">
                    <option><?= __("Choose a Language...") ?></option>
                    <?php foreach ($languages as $key=>$l) { ?>
                      <option value="<?= $key ?>"><?= $l ?></option>
                    <?php } ?>
                  </select>
                </div>
          </li>
        </ul>
      <!-- End Select language -->

        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $_SESSION['s_first_name'] . " "; ?><?php echo $_SESSION['s_last_name']; ?></span>&nbsp;
              <i class="fa fa-user"></i>
            </a>

              <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                    <?php echo $_SESSION['s_first_name'] . " "; ?>
                    <?php echo $_SESSION['s_last_name']; ?><BR>
                    <?php echo $_SESSION['s_email_address']; ?><BR><BR>
                    <small>
                        <?= __("Currency") ?>: <?php echo $_SESSION['s_default_currency']; ?><BR>
                        <?= __("Time Zone") ?>: <?php echo $_SESSION['s_default_timezone']; ?><BR>
                        <?= __("Expiration Emails") ?>: <?php
                        if ($_SESSION['s_expiration_emails'] == '1') {
                            echo __("Yes");
                        } else {
                            echo __("No");
                        } ?>
                    </small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo $web_root; ?>/settings/profile/" class="btn btn-default btn-flat"><?= __("User") ?> Profile</a>&nbsp;&nbsp;
                </div>
                <div class="pull-right">
                  <a href="<?php echo $web_root; ?>/logout.php" class="btn btn-default btn-flat"><?= __("Sign out") ?></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <form action="<?php echo $web_root; ?>/domains/index.php" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="search_for" class="form-control" placeholder="<?= __("Domain Keyword Search") ?>"<?php if ($search_for && $search_for != '') echo ' value="' . $search_for . '"'; ?>>
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php require_once DIR_INC . '/layout/menu-main.inc.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <section class="content-header">

          <span class="visible-sm visible-md visible-lg">
              <?php
              $breadcrumb_position = 'left';
              require_once DIR_INC . '/layout/breadcrumbs.inc.php';
              ?>
          </span>

          <span class="visible-xs">
              <?php
              $breadcrumb_position = 'right';
              require_once DIR_INC . '/layout/breadcrumbs.inc.php';
              ?>
          </span>
          <BR>

        <?php
        if ($_SESSION['s_message_danger'] != "") {
            echo $system->showMessageDanger($_SESSION['s_message_danger']);
            unset($_SESSION['s_message_danger']);
        }

        if ($_SESSION['s_message_success'] != "") {
            echo $system->showMessageSuccess($_SESSION['s_message_success']);
            unset($_SESSION['s_message_success']);
        }

        require_once DIR_INC . '/layout/table-maintenance.inc.php';
        ?>

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-solid box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"><?= __($page_title) ?></h3>
            <?php if ($software_section_logo != '') { ?>
                <span class="pull-right"><i class="fa <?php echo $software_section_logo; ?>"></i></span>
            <?php } ?>
        </div>
        <div class="box-body">
