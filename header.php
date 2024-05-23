<?php 
ob_start();
session_start();
include'sql/connect.php';
if (!isset($_SESSION['admin_login'])) {
header('location:login.php');
  }else {
    $admin =$_SESSION['admin_login'];
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/AdminLTE.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/style.css" />
  <script src="js/angular.min.js"></script>
  <script src="js/app.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <span class="logo-mini"><b>AD</b></span>
      <span class="logo-lg"><b>Trang Chủ Quản Trị</b></span>
    </a>
    
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/OIP.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $admin['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/OIP.jpg" class="img-circle" alt="User Image">
                <p>
                  <?php echo $admin['name']; ?>
                  <small><?php echo $admin['email']; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="index.php?module=user&action=changepass">Đổi Mật Khẩu</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                              <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Đăng Xuất</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->
  
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/OIP.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $admin['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="#" target="_blank">
          <i class="fa fa-home" aria-hidden="true"></i><span>Website</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Quản Lí Sản Phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="index.php?module=product"><i class="fa fa-circle-o"></i> Danh sách Sản Phẩm</a></li>
            <li><a href="index.php?module=product&action=them-moi"><i class="fa fa-circle-o"></i> Thêm Mới Sản Phẩm</a></li>
            <li><a href="index.php?module=category"><i class="fa fa-circle-o"></i> Danh mục Sản Phẩm</a></li>
          </ul>
         
        </li>
        
        <li>
          <a href="index.php?module=banner">
            <i class="fa fa-th"></i> <span>Quản Lí Baner</span>
           
          </a>
        </li>
        <li>
          <a href="index.php?module=order">
            <i class="glyphicon glyphicon-shopping-cart"></i> <span>Quản Lí Đơn Hàng</span>
          </a>
        </li>
        <li>
          <a href="index.php?module=thanhvien">
            <i class="glyphicon glyphicon-user"></i> <span>Quản Lí Khách Hàng</span>
          </a>
        </li>
        <li>
          <a href="index.php?module=user">
            <i class="glyphicon glyphicon-user"></i> <span>Quản Trị Viên</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 <div class="content-wrapper">