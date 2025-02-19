<?php
session_start();
include "database/db.php";
include "database/category_class.php";
include "database/product_class.php";

$ip_add = getenv("REMOTE_ADDR");
$category = new category();
$product = new product();

if (isset($_POST["categoryhome"])) {
	$result = $category->getAllCategories(); //"WHERE cat_id!=1"
	?>
	<!-- responsive-nav -->
	<div id='responsive-nav'>
		<!-- NAV -->
		<ul class='main-nav nav navbar-nav'>
			<li class='active'><a href='index.php'>Home</a></li>
			<!-- <li><a href='store.php'>Electronics</a></li> -->
			<?php
			foreach ($result as $row) {
				$cid = $row["cat_id"];
				$cat_name = $row["cat_title"];
				?>
				<li cid='<?php echo $cid ?>'><a href='store.php'>
						<?php echo $cat_name ?>
					</a></li>
				<?php
			}
			;
}
?>
	</ul>
</div>
<?php


if (isset($_POST["page"])) {
	$count = $product->getAllProducts("mysql_num_rows");
	$pageno = ceil($count / 2);
	for ($i = 1; $i <= $pageno; $i++) {
		echo "
			<li><a href='#product-row' page='$i' id='page'>$i</a></li>";
	}
}
if (isset($_POST["getProducthome"])) {
	$limit = 3;
	if (isset($_POST["setPage"])) {
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	} else {
		$start = 0;
	}

	// $product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id LIMIT $start,$limit";
	// $run_query = mysqli_query($con, $product_query);

	$result = $product->getProductWithStartLimit($start, $limit);

	foreach ($result as $row) {
		$pro_id = $row['product_id'];
		$pro_cat = $row['product_cat'];
		$pro_brand = $row['product_brand'];
		$pro_title = $row['product_title'];
		$pro_price = $row['product_price'];
		$sale_pro_price = $row['product_price'] + $row['product_price'] * 0.3;
		$pro_image = $row['product_image'];
		$cat_name = $row["cat_title"];

		echo "<div class='product-widget'>
					<a href='product.php?p=$pro_id'> 
						<div class='product-img'>
							<img src='product_images/$pro_image' alt=''>
						</div>
						<div class='product-body'>
							<p class='product-category'>$cat_name</p>
							<h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
							<h4 class='product-price'>$pro_price<del class='product-old-price'>$sale_pro_price</del></h4>
						</div></a>
					</div>";
	}
}


if (isset($_POST["gethomeProduct"])) {
	$limit = 9;
	if (isset($_POST["setPage"])) {
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	} else {
		$start = 0;
	}

	$result = $product->getProductWithStartLimit($start, $limit);

	foreach ($result as $row) {
		$pro_id = $row['product_id'];
		$pro_cat = $row['product_cat'];
		$pro_brand = $row['product_brand'];
		$pro_title = $row['product_title'];
		$pro_price = $row['product_price'];
		$pro_image = $row['product_image'];

		$cat_name = $row["cat_title"];

		echo "<div class='col-md-3 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='product-btns'>
											<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
                                </div>";
	}
	;

}

if (isset($_POST["get_seleted_Category"]) || isset($_POST["search"])) {
	if (isset($_POST["get_seleted_Category"])) {
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id";
	} else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_keywords LIKE '%$keyword%'";
	}

	$run_query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($run_query)) {
		$pro_id = $row['product_id'];
		$pro_cat = $row['product_cat'];
		$pro_brand = $row['product_brand'];
		$pro_title = $row['product_title'];
		$pro_price = $row['product_price'];
		$pro_image = $row['product_image'];
		$cat_name = $row["cat_title"];
		echo " <div class='col-md-4 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img  src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='product-btns'>
											<button class='add-to-wishlist' tabindex='0'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view' ><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' href='#' tabindex='0' class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
							</div>
			";
	}
}