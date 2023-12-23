<div class="main main-raised">
	<div class="container mainn-raised" style="width:100%;">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->


			<!-- Wrapper for slides -->
			<div class="carousel-inner">

				<div class="item active">
					<img src="img/banner-1.jpg" alt="Los Angeles" style="width:100%;">
				</div>

				<div class="item">
					<img src="img/banner-2.jpg" alt="New York" style="width:100%;">

				</div>
				<div class="item">
					<img src="img/banner-3.jpg" alt="New York" style="width:100%;">

				</div>
				<div class="item">
					<img src="img/banner-4.jpg" alt="New York" style="width:100%;">

				</div>

			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>



	<!-- SECTION -->
	<div class="section mainn mainn-raised">


		<!-- container -->
		<div class="container">

			<!-- row -->
			<div class="row">
				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<?php
					$product = new product();
					$pro_1 = $product->getProduct(5);
					?>
					<a href="product.php?p=<?php echo $pro_1[0]['product_id'] ?>">
						<div class="shop">
							<div class="shop-img">
								<img src="./product_images/<?php echo $pro_1[0]['product_image'] ?>" alt="">
							</div>
							<div class="shop-body">
								<h3>
									<?php echo $pro_1[0]['product_title'] ?>
								</h3>
								<a href="product.php?p=<?php echo $pro_1[0]['product_id'] ?>" class="cta-btn">Shop now
									<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<?php
					$product = new product();
					$pro_1 = $product->getProduct(10);
					?>
					<a href="product.php?p=<?php echo $pro_1[0]['product_id'] ?>">
						<div class="shop">
							<div class="shop-img">
								<img src="./product_images/<?php echo $pro_1[0]['product_image'] ?>" alt="">
							</div>
							<div class="shop-body">
								<h3>
									<?php echo $pro_1[0]['product_title'] ?>
								</h3>
								<a href="product.php?p=<?php echo $pro_1[0]['product_id'] ?>" class="cta-btn">Shop now
									<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<?php
					$product = new product();
					$pro_1 = $product->getProduct(12);
					?>
					<a href="product.php?p=<?php echo $pro_1[0]['product_id'] ?>">
						<div class="shop">
							<div class="shop-img">
								<img src="./product_images/<?php echo $pro_1[0]['product_image'] ?>" alt="">
							</div>
							<div class="shop-body">
								<h3>
									<?php echo $pro_1[0]['product_title'] ?>
								</h3>
								<a href="product.php?p=<?php echo $pro_1[0]['product_id'] ?>" class="cta-btn">Shop now
									<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				<!-- /shop -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->



	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Thiết bị điện tử</h3>
						<!-- <div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
								<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
								<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
								<li><a data-toggle="tab" href="#tab1">Accessories</a></li>
							</ul>
						</div> -->
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12 mainn mainn-raised">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">
									<?php
									$result = $product->getProductInCat(1);
									foreach ($result as $row) {
										$pro_id = $row['product_id'];
										$pro_cat = $row['product_cat'];
										$pro_brand = $row['product_brand'];
										$pro_title = $row['product_title'];
										$pro_price = $row['product_price'];
										$pro_image = $row['product_image'];
										$cat_name = $row["cat_title"];

										?>
										<div class='product'>
											<a href='product.php?p=<?php echo $pro_id ?>'>
												<div class='product-img'>
													<img src='product_images/<?php echo $pro_image ?>'
														style='max-height: 170px;' alt=''>
													<div class='product-label'>
														<span class='sale'>-30%</span>
														<span class='new'>NEW</span>
													</div>
												</div>
											</a>
											<div class='product-body'>
												<p class='product-category'>
													<?php echo $cat_name ?>
												</p>
												<h3 class='product-name header-cart-item-name'><a
														href='product.php?p=<?php echo $pro_id ?>'>
														<?php echo $pro_title ?>
													</a></h3>
												<h4 class='product-price header-cart-item-info'>$
													<?php echo $pro_price + $pro_price * 0.3 ?>
													<del class='product-old-price'>$
														<?php echo $pro_price + $pro_price * 0.3 ?>
													</del>
												</h4>
												<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
												</div>
												<!-- <div class='product-btns'>
													<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span
															class='tooltipp'>add to wishlist</span></button>
													<button class='add-to-compare'><i class='fa fa-exchange'></i><span
															class='tooltipp'>add to compare</span></button>
													<button class='quick-view'><i class='fa fa-eye'></i><span
															class='tooltipp'>quick view</span></button>
												</div> -->
											</div>
											<div class='add-to-cart'>
												<button pid='<?php echo $pro_id ?>' id='product'
													class='add-to-cart-btn block2-btn-towishlist' href='#'><i
														class='fa fa-shopping-cart'></i> add to cart</button>
											</div>
										</div>
										<?php
									}
									?>
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->


	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Thời trang</h3>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12 mainn mainn-raised">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab2" class="tab-pane fade in active">
								<div class="products-slick" data-nav="#slick-nav-2">
									<!-- product -->
									<?php
									$product = new product();
									$result = $product->getProductInCat("4");
									foreach ($result as $row) {
										$pro_id = $row['product_id'];
										$pro_cat = $row['product_cat'];
										$pro_brand = $row['product_brand'];
										$pro_title = $row['product_title'];
										$pro_price = $row['product_price'];
										$pro_image = $row['product_image'];
										$cat_name = $row["cat_title"];
										?>

										<div class='product'>
											<a href='product.php?p=<?php echo $pro_id ?>'>
												<div class='product-img'>

													<img src='product_images/<?php echo $pro_image ?>'
														style='max-height: 170px;' alt=''>
													<div class='product-label'>
														<span class='sale'>-30%</span>
														<span class='new'>NEW</span>
													</div>
												</div>
											</a>
											<div class='product-body'>
												<p class='product-category'>
													<?php echo $cat_name ?>
												</p>
												<h3 class='product-name header-cart-item-name'><a
														href='product.php?p=<?php echo $pro_id ?>'>
														<?php echo $pro_title ?>
													</a></h3>
												<h4 class='product-price header-cart-item-info'>$
													<?php echo $pro_price ?>
													<del class='product-old-price'>$
														<?php echo $pro_price + $pro_price * 0.3 ?>
													</del>
												</h4>
												<div class='product-rating'>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
													<i class='fa fa-star'></i>
												</div>
												<div class='product-btns'>
													<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span
															class='tooltipp'>add to wishlist</span></button>
													<button class='add-to-compare'><i class='fa fa-exchange'></i><span
															class='tooltipp'>add to compare</span></button>
													<button class='quick-view'><i class='fa fa-eye'></i><span
															class='tooltipp'>quick view</span></button>
												</div>
											</div>
											<div class='add-to-cart'>
												<button pid='<?php echo $pro_id ?>' id='product'
													class='add-to-cart-btn block2-btn-towishlist' href='#'><i
														class='fa fa-shopping-cart'></i> add to cart</button>
											</div>
										</div>
										<?php
									}
									?>
									<!-- /product -->
								</div>
								<div id="slick-nav-2" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- /Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<?php
				$result = $product->getProductInCat("1");
				?>
				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">
							<?php echo $result[0]['cat_title'] ?>
						</h4>
						<div class="section-nav">
							<div id="slick-nav-3" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-3">
						<div>
							<!-- product widget -->
							<?php
							for ($i = 0; $i < 3; $i++) {
								if (!empty($result[$i])) {
									$price = $result[$i]['product_price'];
									?>
									<div class="product-widget">
										<div class="product-img">
											<img src="./product_images/<?php echo $result[$i]['product_image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">
												<?php echo $result[$i]['cat_title'] ?>
											</p>
											<h3 class="product-name"><a href="#">
													<?php echo $result[$i]['product_title'] ?>
												</a></h3>
											<h4 class="product-price">
												<?php echo $price ?><del class="product-old-price">$
													<?php echo $price + $price * 0.3 ?>
												</del>
											</h4>
										</div>
									</div>
								<?php }
							} ?>
							<!-- product widget -->
						</div>

						<div>
							<!-- product widget -->
							<?php
							for ($i = 4; $i < 7; $i++) {
								if (!empty($result[$i])) {
									$price = $result[$i]['product_price'];
									?>
									<div class="product-widget">
										<div class="product-img">
											<img src="./product_images/<?php echo $result[$i]['product_image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">
												<?php echo $result[$i]['cat_title'] ?>
											</p>
											<h3 class="product-name"><a href="#">
													<?php echo $result[$i]['product_title'] ?>
												</a></h3>
											<h4 class="product-price">
												<?php echo $price ?><del class="product-old-price">$
													<?php echo $price + $price * 0.3 ?>
												</del>
											</h4>
										</div>
									</div>
								<?php }
							} ?>
							<!-- product widget -->
						</div>
					</div>
				</div>

				<?php
				$result = $product->getProductInCat("2");
				?>
				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">
							<?php echo $result[0]['cat_title'] ?>
						</h4>
						<div class="section-nav">
							<div id="slick-nav-4" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-4">
						<div>
							<!-- product widget -->
							<?php
							for ($i = 0; $i < 3; $i++) {
								if (!empty($result[$i])) {
									$price = $result[$i]['product_price'];
									?>
									<div class="product-widget">
										<div class="product-img">
											<img src="./product_images/<?php echo $result[$i]['product_image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">
												<?php echo $result[$i]['cat_title'] ?>
											</p>
											<h3 class="product-name"><a href="#">
													<?php echo $result[$i]['product_title'] ?>
												</a></h3>
											<h4 class="product-price">
												<?php echo $price ?><del class="product-old-price">$
													<?php echo $price + $price * 0.3 ?>
												</del>
											</h4>
										</div>
									</div>
								<?php }
							} ?>
							<!-- product widget -->
						</div>

						<div>
							<!-- product widget -->
							<?php
							for ($i = 0; $i < 3; $i++) {
								if (!empty($result[$i])) {
									$price = $result[$i]['product_price'];
									?>
									<div class="product-widget">
										<div class="product-img">
											<img src="./product_images/<?php echo $result[$i]['product_image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">
												<?php echo $result[$i]['cat_title'] ?>
											</p>
											<h3 class="product-name"><a href="#">
													<?php echo $result[$i]['product_title'] ?>
												</a></h3>
											<h4 class="product-price">
												<?php echo $price ?><del class="product-old-price">$
													<?php echo $price + $price * 0.3 ?>
												</del>
											</h4>
										</div>
									</div>
								<?php }
							} ?>
							<!-- product widget -->
						</div>
					</div>
				</div>

				<div class="clearfix visible-sm visible-xs">

				</div>

				<?php
				$result = $product->getProductInCat("3");
				?>
				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">
							<?php echo $result[0]['cat_title'] ?>
						</h4>
						<div class="section-nav">
							<div id="slick-nav-5" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-5">
						<div>
							<!-- product widget -->
							<?php
							for ($i = 0; $i < 3; $i++) {
								if (!empty($result[$i])) {
									$price = $result[$i]['product_price'];
									?>
									<div class="product-widget">
										<div class="product-img">
											<img src="./product_images/<?php echo $result[$i]['product_image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">
												<?php echo $result[$i]['cat_title'] ?>
											</p>
											<h3 class="product-name"><a href="#">
													<?php echo $result[$i]['product_title'] ?>
												</a></h3>
											<h4 class="product-price">
												<?php echo $price ?><del class="product-old-price">$
													<?php echo $price + $price * 0.3 ?>
												</del>
											</h4>
										</div>
									</div>
								<?php }
							} ?>
							<!-- product widget -->
						</div>

						<div>
							<!-- product widget -->
							<?php
							for ($i = 0; $i < 3; $i++) {
								if (!empty($result[$i])) {
									$price = $result[$i]['product_price'];
									?>
									<div class="product-widget">
										<div class="product-img">
											<img src="./product_images/<?php echo $result[$i]['product_image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category">
												<?php echo $result[$i]['cat_title'] ?>
											</p>
											<h3 class="product-name"><a href="#">
													<?php echo $result[$i]['product_title'] ?>
												</a></h3>
											<h4 class="product-price">
												<?php echo $price ?><del class="product-old-price">$
													<?php echo $price + $price * 0.3 ?>
												</del>
											</h4>
										</div>
									</div>
								<?php }
							} ?>
							<!-- product widget -->
						</div>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
</div>