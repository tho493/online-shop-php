<?php
include "session.php";
include("../database/product_class.php");
include("../database/category_class.php");
include("../database/brand_class.php");

if (isset($_POST['btn_save'])) {
  $product_name = $_POST['product_name'];
  $details = $_POST['details'];
  $desc = $_POST['desc'];
  $price = $_POST['price'];
  // $c_price = $_POST['c_price'];
  $product_type = $_POST['product_type'];
  $brand = $_POST['brand'];
  $tags = isset($_POST['tags']) ? $_POST['tags'] : 'None';

  //picture coding
  $picture_name = $_FILES['picture']['name'];
  $picture_type = $_FILES['picture']['type'];
  $picture_tmp_name = $_FILES['picture']['tmp_name'];
  $picture_size = $_FILES['picture']['size'];

  if ($picture_type == "image/jpeg" || $picture_type == "image/jpg" || $picture_type == "image/png" || $picture_type == "image/gif") {
    if ($picture_size <= 50000000)

      $pic_name = time() . "_" . $picture_name;
    move_uploaded_file($picture_tmp_name, "../product_images/" . $pic_name);

    $product = new product("$product_type", "$brand", "$product_name", "$price", "$desc", "$details", "$pic_name", "$tags");
    $product->addProduct();
    header("location: sumit_form.php?success=1");
  }

}
include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
      <div class="row">


        <div class="col-md-7">
          <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="title">Thêm sản phẩm</h5>
            </div>
            <div class="card-body">

              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tên sản phẩm(title)</label>
                    <input type="text" id="product_name" required name="product_name" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Mô tả cơ bản(description)</label>
                    <textarea rows="4" cols="80" id="desc" required name="desc" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Mô tả chi tiết(details)</label>
                    <textarea rows="4" cols="80" id="details" required name="details" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Giá bán(price)</label>
                    <input type="text" id="price" name="price" required class="form-control">
                  </div>
                </div>
              </div>



            </div>

          </div>
        </div>
        <div class="col-md-5">
          <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="title">Phân loại sản phẩm</h5>
            </div>
            <div class="card-body">

              <div class="row">

                <?php
                $category = new category();
                $result = $category->getAllCategories();
                ?>
                <div class="col-md-12">
                  <div class="form-group" style="background-color: #832ba0; border-radius: 50px">
                    <label for="uname">Loại sản phẩm:</label>
                    <select class="form-control" name="product_type"
                      style="background-color: #832ba0; border-radius: 50px">
                      <?php foreach ($result as $rows) { ?>
                        <option value="<?php echo $rows['cat_id']; ?>">
                          <?php echo $rows['cat_title']; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>


                <?php
                $brand = new brand();
                $result = $brand->getAllBrands();
                ?>
                <div class="col-md-12">
                  <div class="form-group" style="background-color: #832ba0; border-radius: 50px">
                    <label for="uname">Hãng sản phẩm:</label>
                    <select class="form-control" name="brand" style="background-color: #832ba0; border-radius: 50px">
                      <?php foreach ($result as $rows) { ?>
                        <option value="<?php echo $rows['brand_id']; ?>">
                          <?php echo $rows['brand_title']; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <!-- <div class="col-md-12">
                  <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <input type="number" id="product_type" name="product_type" required="[1-6]" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Hãng sản phẩm</label>
                    <input type="number" id="brand" name="brand" required class="form-control">
                  </div>
                </div> -->


                <div class="col-md-12">
                  <div class="form-group">
                    <label>Keywords</label>
                    <input type="text" id="tags" name="tags" required class="form-control">
                  </div>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Thêm sản
                phẩm</button>
            </div>
          </div>
        </div>

      </div>
    </form>

  </div>
</div>
<?php
include "footer.php";
?>