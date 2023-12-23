<?php
include "session.php";
if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'logout') {

  unset($_SESSION["name"]);
  unset($_SESSION["uid"]);
  header("Location: ../index.php");
}
include "../database/product_class.php";
include "../database/account_class.php";
include "../database/category_class.php";
include "../database/brand_class.php";

$product = new product();
$account = new account();
$category = new category();
$brand = new brand();

include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <div class="panel-body">
      <a>
        <?php //success message
        if (isset($_POST['success'])) {
          $success = $_POST["success"];
          echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
        }

        ?>
      </a>
    </div>
    <div class="col-md-14">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Danh sách người dùng</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table table-hover tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th>ID</th>
                  <th>FirstName</th>
                  <th>LastName</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>City</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = $account->getAllAccounts();

                foreach ($result as $row) { ?>
                  <tr>
                    <td>
                      <?php echo $row['user_id'] ?>
                    </td>
                    <td>
                      <?php echo $row['first_name'] ?>
                    </td>
                    <td>
                      <?php echo $row['last_name'] ?>
                    </td>
                    <td>
                      <?php echo $row['email'] ?>
                    </td>
                    <td>
                      <?php echo $row['password'] ?>
                    </td>
                    <td>
                      <?php echo $row['mobile'] ?>
                    </td>
                    <td>
                      <?php echo $row['address1'] ?>
                    </td>
                    <td>
                      <?php echo $row['address2'] ?>
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
    <div class="row">
      <div class="col-md-6">
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title"> Danh sách loại sản phẩm</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive ps">
              <table class="table table-hover tablesorter " id="">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Loại sản phẩm</th>
                    <th>Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $result = $category->getAllCategories();
                  foreach ($result as $row) {
                    $count_product = $category->countProducts($row['cat_id']);
                    ?>
                    <tr>
                      <td>
                        <?php echo $row["cat_id"] ?>
                      </td>
                      <td>
                        <?php echo $row["cat_title"] ?>
                      </td>
                      <td>
                        <?php echo $count_product ?>
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
      <div class="col-md-6">
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Brands List</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive ps">
              <table class="table table-hover tablesorter " id="">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Brands</th>
                    <th>Count</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $result = $brand->getAllBrands();
                  foreach ($result as $row) {
                    $count_brand = $brand->countBrand($row["brand_id"]) ?>
                    <tr>
                      <td>
                        <?php echo $row['brand_id'] ?>
                      </td>
                      <td>
                        <?php echo $row['brand_title'] ?>
                      </td>
                      <td>
                        <?php echo $count_brand ?>
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
    <!-- <div class="col-md-5">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Subscribers</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table table-hover tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th>ID</th>
                  <th>email</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_query($con, "select * from email_info") or die("query 1 incorrect.....");

                while (list($brand_id, $brand_title) = mysqli_fetch_array($result)) {
                  echo "<tr><td>$brand_id</td><td>$brand_title</td>

                        </tr>";
                }
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
    </div> -->



  </div>
</div>
<?php
include "footer.php";
?>