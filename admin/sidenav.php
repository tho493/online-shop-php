<!doctype html>
<html lang="en">

<head>
  <title>Manage shop!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="assets/css/Material+Icons.css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="assets/css/black-dashboard.css" rel="stylesheet" />

</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="" class="simple-text logo-normal">
          Danh mục
        </a>
      </div>
      <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="3a8db1f4-24d8-4dbf-85c9-4f5215c1b29a">
        <ul class="nav">
          <li class="nav-item" id='dashboard'>
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Trang chủ</p>
            </a>
          </li>
          <!-- <li class="nav-item " id='adduser'>
            <a class="nav-link" href="adduser.php">
              <i class="material-icons">person</i>
              <p>Thêm người dùng</p>
            </a>
          </li> -->
          <li class="nav-item" id='productlist'>
            <a class="nav-link" href="productlist.php">
              <i class="material-icons">list</i>
              <p>Danh sách sản phẩm</p>
            </a>

          </li>

          <li class="nav-item " id='orders'>
            <a class="nav-link" href="orders.php">
              <i class="material-icons">library_books</i>
              <p>Đơn hàng</p>
            </a>
          </li>
          <!-- <li class="nav-item " id='addproduct'>
            <a class="nav-link" href="addproduct.php">
              <i class="material-icons">add</i>
              <p>Thêm sản phẩm</p>
            </a>
          </li> -->
          <li class="nav-item " id='manageuser'>
            <a class="nav-link" href="manageuser.php">
              <i class="material-icons">edit_user</i>
              <p>Quản lý người dùng</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="index.php?action=logout">
              <i class="material-icons">logout</i>
              <p>Đăng xuất</p>
            </a>
          </li>
        </ul>
      </div>
    </div>