<?php
include "session.php";
include "../database/product_class.php";

$product = new product();
error_reporting(0);
if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
  $product_id = $_GET['product_id'];
  ///////picture delete/////////
  $result = $product->getProduct($product_id);

  $picture = $result['product_image'];
  $path = "../product_images/$picture";

  if (file_exists($path) == true) {
    unlink($path);
  } else {
  }
  /*this is delet query*/
  $product->deleteProduct($product_id);
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


    <div class="col-md-14">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title"> Danh sách sản phẩm</h4>

        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table tablesorter " id="page1">
              <thead class=" text-primary">
                <tr>
                  <th>Mã sản phẩm</th>
                  <th>Ảnh</th>
                  <th>Tên</th>
                  <th>Giá</th>
                  <th>
                    <a class=" btn btn-primary" href="addproduct.php">Thêm mới</a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php

                $result = $product->getProductPage($page1);

                foreach ($result as $row) { ?>
                  <tr>
                    <td>
                      <?php echo $row['product_id'] ?>
                    </td>
                    <td><img src="../product_images/<?php echo $row['product_image'] ?>" alt="image"
                        style='width:50px; height:50px; border:groove #000'></td>
                    <td>
                      <?php echo $row['product_title'] ?>
                    </td>
                    <td>
                      <?php echo $row['product_price'] ?>
                    </td>
                    <td>

                      <a class=' btn btn-success'
                        href='productlist.php?product_id=<?php echo $row['product_id'] ?>&action=delete'>Delete</a>
                    </td>
                  </tr>
                <?php } ?>
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
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <?php
          //counting paging
          $count = $product->getAllProducts("mysql_num_rows");
          $a = $count / 10;
          $a = ceil($a);

          for ($b = 1; $b <= $a; $b++) {
            ?>
            <li class="page-item"><a class="page-link" href="productlist.php?page=<?php echo $b; ?>">
                <?php echo $b . " "; ?>
              </a></li>
            <?php
          }
          ?>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>



    </div>


  </div>
</div>
<?php
include "footer.php";
?>