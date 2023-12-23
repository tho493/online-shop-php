<?php
include "session.php";
include "../database/order_class.php";
$order = new order();

if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
  $order_id = $_GET['order_id'];

  /*this is delet query*/
  mysqli_query($con, "delete from orders where order_id='$order_id'") or die("delete query is incorrect...");
}

///pagination
$page = $_GET['page'];

if ($page == "" || $page == "1") {
  $page1 = 0;
} else {
  $page1 = ($page * 10) - 10;
}

include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <!-- your content here -->
    <div class="col-md-14">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Danh sách đơn hàng
            <!-- / Trang
            <?php //echo $page; ?> -->
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table table-hover tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th>Mã người dùng</th>
                  <th>Tên</th>
                  <th>Tên sản phẩm</th>
                  <th>Liên hệ | Email</th>
                  <th>Địa chỉ</th>
                  <th>Số lượng</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = $order->getOrdersPage($page1);

                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $row['user_id'] ?>
                    </td>
                    <td>
                      <?php echo $row['f_name'] ?>
                    </td>
                    <td>
                      <?php echo $row['product_title'] ?>
                    </td>
                    <td>
                      <?php echo $row['email'] ?><br>
                      <?php echo $row['mobile'] ?>
                    </td>
                    <td>
                      <?php echo $row['address1'] ?><br>
                      ZIP:
                      <?php echo $row['zip'] ?><br>
                      <?php echo $row['city'] ?>
                    </td>
                    <td>
                      <?php echo $row['qty'] ?>
                    </td>
                    <td>
                      <?php echo $row['amt'] ?>
                    </td>

                    <td>
                      <a class=' btn btn-danger'
                        href='orders.php?order_id=<?php echo $row['order_id'] ?>&action=delete'>Delete</a>
                    </td>
                  </tr>
                <?php }
                ?>
              </tbody>
            </table>

            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php
include "footer.php";
?>