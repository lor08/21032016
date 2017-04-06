<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 06.04.17
 * Time: 11:58
 */
?>
@extends('front.master.layout')
@section('head')
	<title>{{$title or "Товар"}}</title>
@endsection
@section('content')
	<!-- end breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<ul>
					<li class="home"> <a href="index.html" title="Go to Home Page">Home</a><span>&mdash;›</span></li>
					<li class=""> <a href="grid.html" title="Go to Home Page">Women</a><span>&mdash;›</span></li>
					<li class="category13"><strong> Sample Product </strong></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end breadcrumbs -->

	<!-- main-container -->
	<section class="main-container col1-layout">
		<div class="main container">
			<div class="col-main">
				<div class="row">
					<div class="product-view">
						<div class="product-essential">
							<form action="#" method="post" id="product_addtocart_form">
								<input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
								<div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
									<ul class="moreview" id="moreview">
										<li class="moreview_thumb thumb_1"> <img class="moreview_thumb_image" src="{{ url('products-images') }}/product1.jpg" alt="thumbnail"> <img class="moreview_source_image" src="{{ url('products-images') }}/product1.jpg" alt=""> <span class="roll-over">Roll over image to zoom in</span> <img  class="zoomImg" src="{{ url('products-images') }}/product1.jpg" alt="thumbnail"></li>
										<li class="moreview_thumb thumb_2 moreview_thumb_active"> <img class="moreview_thumb_image" src="{{ url('products-images') }}/product1.jpg" alt="thumbnail"> <img class="moreview_source_image" src="{{ url('products-images') }}/product1.jpg" alt=""> <span class="roll-over">Roll over image to zoom in</span> <img  class="zoomImg" src="{{ url('products-images') }}/product4.jpg" alt="thumbnail"></li>
										<li class="moreview_thumb thumb_3"> <img class="moreview_thumb_image" src="{{ url('products-images') }}/product1.jpg" alt="thumbnail"> <img class="moreview_source_image" src="{{ url('products-images') }}/product1.jpg" alt=""> <span class="roll-over">Roll over image to zoom in</span> <img  class="zoomImg" src="{{ url('products-images') }}/product1.jpg" alt="thumbnail"></li>
										<li class="moreview_thumb thumb_4"> <img class="moreview_thumb_image" src="{{ url('products-images') }}/product1.jpg" alt="thumbnail"> <img class="moreview_source_image" src="{{ url('products-images') }}/product1.jpg" alt=""> <span class="roll-over">Roll over image to zoom in</span> <img  class="zoomImg" src="{{ url('products-images') }}/product1.jpg" alt="thumbnail"></li>
										<li class="moreview_thumb thumb_5"> <img class="moreview_thumb_image" src="{{ url('products-images') }}/product1.jpg" alt="thumbnail"> <img class="moreview_source_image" src="{{ url('products-images') }}/product1.jpg" alt=""> <span class="roll-over">Roll over image to zoom in</span> <img  class="zoomImg" src="{{ url('products-images') }}/product1.jpg" alt="thumbnail"></li>
										<li class="moreview_thumb thumb_6"> <img class="moreview_thumb_image" src="{{ url('products-images') }}/product1.jpg" alt="thumbnail"> <img class="moreview_source_image" src="{{ url('products-images') }}/product1.jpg" alt=""> <span class="roll-over">Roll over image to zoom in</span> <img  class="zoomImg" src="{{ url('products-images') }}/product1.jpg" alt="thumbnail"></li>
									</ul>
									<div class="moreview-control"> <a href="javascript:void(0)" class="moreview-prev"></a> <a href="javascript:void(0)" class="moreview-next"></a> </div>
								</div>
								<div class="product-shop col-lg-6 col-sm-6 col-xs-12">
									<div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
									<div class="product-name">
										<h1>Sample Product</h1>
									</div>
									<div class="ratings">
										<div class="rating-box">
											<div class="rating"></div>
										</div>
										<p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
									</div>
									<p class="availability in-stock">Availability: <span>In stock</span></p>
									<div class="price-block">
										<div class="price-box">
											<p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $315.99 </span> </p>
											<p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $309.99 </span> </p>
										</div>
									</div>
									<div class="short-description">
										<h2>Quick Overview</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
									</div>
									<div class="add-to-box">
										<div class="add-to-cart">
											<label for="qty">Quantity:</label>
											<div class="pull-left">
												<div class="custom pull-left">
													<button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
													<input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
													<button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
												</div>
											</div>
											<button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button"><span><i class="icon-basket"></i> Add to Cart</span></button>
											<div class="email-addto-box">
												<ul class="add-to-links">
													<li> <a class="link-wishlist" href="http://bit.do/bromq"><span>Add to Wishlist</span></a></li>
													<li><span class="separator">|</span> <a class="link-compare" href="compare.html"><span>Add to Compare</span></a></li>
												</ul>
												<p class="email-friend"><a href="#" class=""><span>Email to a Friend</span></a></p>
											</div>
										</div>
									</div>
									<div class="social">
										<ul>
											<li class="fb"><a href="#"></a></li>
											<li class="tw"><a href="#"></a></li>
											<li class="googleplus"><a href="#"></a></li>
											<li class="rss"><a href="#"></a></li>
											<li class="pintrest"><a href="#"></a></li>
											<li class="linkedin"><a href="#"></a></li>
											<li class="youtube"><a href="#"></a></li>
										</ul>
									</div>
								</div>
							</form>
						</div>
						<div class="product-collateral">
							<div class="col-sm-12 wow bounceInUp animated">
								<ul id="product-detail-tab" class="nav nav-tabs product-tabs">
									<li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>
									<li><a href="#product_tabs_tags" data-toggle="tab">Tags</a></li>
									<li> <a href="#reviews_tabs" data-toggle="tab">Reviews</a> </li>
									<li> <a href="#product_tabs_custom" data-toggle="tab">Custom Tab</a> </li>
									<li> <a href="#product_tabs_custom1" data-toggle="tab">Custom Tab1</a> </li>
								</ul>
								<div id="productTabContent" class="tab-content">
									<div class="tab-pane fade in active" id="product_tabs_description">
										<div class="std">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
											<p> Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>
										</div>
									</div>
									<div class="tab-pane fade" id="product_tabs_tags">
										<div class="box-collateral box-tags">
											<div class="tags">
												<form id="addTagForm" action="#" method="get">
													<div class="form-add-tags">
														<label for="productTagName">Add Tags:</label>
														<div class="input-box">
															<input class="input-text required-entry" name="productTagName" id="productTagName" type="text" >
															<button type="button" title="Add Tags" class=" button btn-add" onClick="submitTagForm()"> <span>Add Tags</span> </button>
														</div>
														<!--input-box-->
													</div>
												</form>
											</div>
											<!--tags-->
											<p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
										</div>
									</div>
									<div class="tab-pane fade" id="reviews_tabs">
										<div class="box-collateral box-reviews" id="customer-reviews">
											<div class="box-reviews1">
												<div class="form-add">
													<form id="review-form" method="post" action="#">
														<h3>Write Your Own Review</h3>
														<fieldset>
															<h4>How do you rate this product? <em class="required">*</em></h4>
															<span id="input-message-box"></span>
															<table id="product-review-table" class="data-table">

																<thead>
																<tr class="first last">
																	<th>&nbsp;</th>
																	<th><span class="nobr">1 *</span></th>
																	<th><span class="nobr">2 *</span></th>
																	<th><span class="nobr">3 *</span></th>
																	<th><span class="nobr">4 *</span></th>
																	<th><span class="nobr">5 *</span></th>
																</tr>
																</thead>
																<tbody>
																<tr class="first odd">
																	<th>Price</th>
																	<td class="value"><input type="radio" class="radio" value="11" id="Price_1" name="ratings[3]"></td>
																	<td class="value"><input type="radio" class="radio" value="12" id="Price_2" name="ratings[3]"></td>
																	<td class="value"><input type="radio" class="radio" value="13" id="Price_3" name="ratings[3]"></td>
																	<td class="value"><input type="radio" class="radio" value="14" id="Price_4" name="ratings[3]"></td>
																	<td class="value last"><input type="radio" class="radio" value="15" id="Price_5" name="ratings[3]"></td>
																</tr>
																<tr class="even">
																	<th>Value</th>
																	<td class="value"><input type="radio" class="radio" value="6" id="Value_1" name="ratings[2]"></td>
																	<td class="value"><input type="radio" class="radio" value="7" id="Value_2" name="ratings[2]"></td>
																	<td class="value"><input type="radio" class="radio" value="8" id="Value_3" name="ratings[2]"></td>
																	<td class="value"><input type="radio" class="radio" value="9" id="Value_4" name="ratings[2]"></td>
																	<td class="value last"><input type="radio" class="radio" value="10" id="Value_5" name="ratings[2]"></td>
																</tr>
																<tr class="last odd">
																	<th>Quality</th>
																	<td class="value"><input type="radio" class="radio" value="1" id="Quality_1" name="ratings[1]"></td>
																	<td class="value"><input type="radio" class="radio" value="2" id="Quality_2" name="ratings[1]"></td>
																	<td class="value"><input type="radio" class="radio" value="3" id="Quality_3" name="ratings[1]"></td>
																	<td class="value"><input type="radio" class="radio" value="4" id="Quality_4" name="ratings[1]"></td>
																	<td class="value last"><input type="radio" class="radio" value="5" id="Quality_5" name="ratings[1]"></td>
																</tr>
																</tbody>
															</table>
															<input type="hidden" value="" class="validate-rating" name="validate_rating">
															<div class="review1">
																<ul class="form-list">
																	<li>
																		<label class="required" for="nickname_field">Nickname<em>*</em></label>
																		<div class="input-box">
																			<input type="text" class="input-text required-entry" id="nickname_field" name="nickname">
																		</div>
																	</li>
																	<li>
																		<label class="required" for="summary_field">Summary<em>*</em></label>
																		<div class="input-box">
																			<input type="text" class="input-text required-entry" id="summary_field" name="title">
																		</div>
																	</li>
																</ul>
															</div>
															<div class="review2">
																<ul>
																	<li>
																		<label class="label-wide" for="review_field">Review<em>*</em></label>
																		<div class="input-box">
																			<textarea class="required-entry" rows="3" cols="5" id="review_field" name="detail"></textarea>
																		</div>
																	</li>
																</ul>
																<div class="buttons-set">
																	<button class="button submit" title="Submit Review" type="submit"><span>Submit Review</span></button>
																</div>
															</div>
														</fieldset>
													</form>
												</div>
											</div>
											<div class="box-reviews2">
												<h3>Customer Reviews</h3>
												<div class="box visible">
													<ul>
														<li>
															<table class="ratings-table">

																<tbody>
																<tr>
																	<th>Value</th>
																	<td><div class="rating-box">
																			<div class="rating"></div>
																		</div></td>
																</tr>
																<tr>
																	<th>Quality</th>
																	<td><div class="rating-box">
																			<div class="rating"></div>
																		</div></td>
																</tr>
																<tr>
																	<th>Price</th>
																	<td><div class="rating-box">
																			<div class="rating"></div>
																		</div></td>
																</tr>
																</tbody>
															</table>
															<div class="review">
																<h6><a href="#/catalog/product/view/id/61/">Excellent</a></h6>
																<small>Review by <span>Leslie Prichard </span>on 1/3/2014 </small>
																<div class="review-txt"> I have purchased shirts from Minimalism a few times and am never disappointed. The quality is excellent and the shipping is amazing. It seems like it's at your front door the minute you get off your pc. I have received my purchases within two days - amazing.</div>
															</div>
														</li>
														<li class="even">
															<table class="ratings-table">

																<tbody>
																<tr>
																	<th>Value</th>
																	<td><div class="rating-box">
																			<div class="rating"></div>
																		</div></td>
																</tr>
																<tr>
																	<th>Quality</th>
																	<td><div class="rating-box">
																			<div class="rating"></div>
																		</div></td>
																</tr>
																<tr>
																	<th>Price</th>
																	<td><div class="rating-box">
																			<div class="rating"></div>
																		</div></td>
																</tr>
																</tbody>
															</table>
															<div class="review">
																<h6><a href="#/catalog/product/view/id/60/">Amazing</a></h6>
																<small>Review by <span>Sandra Parker</span>on 1/3/2014 </small>
																<div class="review-txt"> Minimalism is the online ! </div>
															</div>
														</li>
														<li>
															<table class="ratings-table">

																<tbody>
																<tr>
																	<th>Value</th>
																	<td><div class="rating-box">
																			<div class="rating"></div>
																		</div></td>
																</tr>
																<tr>
																	<th>Quality</th>
																	<td><div class="rating-box">
																			<div class="rating"></div>
																		</div></td>
																</tr>
																<tr>
																	<th>Price</th>
																	<td><div class="rating-box">
																			<div class="rating"></div>
																		</div></td>
																</tr>
																</tbody>
															</table>
															<div class="review">
																<h6><a href="#/catalog/product/view/id/59/">Nicely</a></h6>
																<small>Review by <span>Anthony  Lewis</span>on 1/3/2014 </small>
																<div class="review-txt"> Unbeatable service and selection. This store has the best business model I have seen on the net. They are true to their word, and go the extra mile for their customers. I felt like a purchasing partner more than a customer. You have a lifetime client in me. </div>
															</div>
														</li>
													</ul>
												</div>
												<div class="actions"> <a class="button view-all" id="revies-button"><span><span>View all</span></span></a> </div>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="tab-pane fade" id="product_tabs_custom">
										<div class="product-tabs-content-inner clearfix">
											<p><strong>Lorem Ipsum</strong><span>&nbsp;is
                        simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when
                        an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the
                        leap into electronic typesetting, remaining essentially unchanged. It
                        was popularised in the 1960s with the release of Letraset sheets
                        containing Lorem Ipsum passages, and more recently with desktop
                        publishing software like Aldus PageMaker including versions of Lorem
                        Ipsum.</span></p>
										</div>
									</div>
									<div class="tab-pane fade" id="product_tabs_custom1">
										<div class="product-tabs-content-inner clearfix">
											<p> <strong> Comfortable </strong><span>&nbsp;preshrunk shirts. Highest Quality Printing.  6.1 oz. 100% preshrunk heavyweight cotton Shoulder-to-shoulder taping Double-needle sleeves and bottom hem

                        Lorem Ipsumis
                        simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when
                        an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the
                        leap into electronic typesetting, remaining essentially unchanged. It
                        was popularised in the 1960s with the release of Letraset sheets
                        containing Lorem Ipsum passages, and more recently with desktop
                        publishing software like Aldus PageMaker including versions of Lorem
                        Ipsum.</span></p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="box-additional">
									<div class="related-pro wow bounceInUp animated">
										<div class="slider-items-products">
											<div class="new_title center">
												<h2>Related Products</h2>
											</div>
											<div id="related-products-slider" class="product-flexslider hidden-buttons">
												<div class="slider-items slider-width-col4">

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img src="{{ url('products-images') }}/product1.jpg" class="img-responsive" alt="a" /> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a href="#l" title=" Sample Product"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box">
																			<p class="special-price"> <span class="price"> $45.00 </span> </p>
																			<p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
																		</div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="new-label new-top-right">New</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img src="{{ url('products-images') }}/product1.jpg" class="img-responsive" alt="a" /> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a href="#l" title=" Sample Product"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box"> <span class="regular-price"> <span class="price">$422.00</span> </span> </div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box"> <span class="regular-price"> <span class="price">$50.00</span> </span> </div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box">
																			<p class="special-price"> <span class="price"> $45.00 </span> </p>
																			<p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
																		</div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box">
																			<p class="special-price"> <span class="price"> $45.00 </span> </p>
																			<p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
																		</div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="new-label new-top-right">New</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box"> <span class="regular-price"> <span class="price">$422.00</span> </span> </div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box"> <span class="regular-price"> <span class="price">$50.00</span> </span> </div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box">
																			<p class="special-price"> <span class="price"> $45.00 </span> </p>
																			<p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
																		</div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

												</div>
											</div>
										</div>
									</div>
									<div class="upsell-pro wow bounceInUp animated">
										<div class="slider-items-products">
											<div class="new_title center">
												<h2>Upsell Products</h2>
											</div>
											<div id="upsell-products-slider" class="product-flexslider hidden-buttons">
												<div class="slider-items slider-width-col4">

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img src="{{ url('products-images') }}/product1.jpg" class="img-responsive" alt="a" /> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a href="#l" title=" Sample Product"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box">
																			<p class="special-price"> <span class="price"> $45.00 </span> </p>
																			<p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
																		</div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="new-label new-top-right">New</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img src="{{ url('products-images') }}/product1.jpg" class="img-responsive" alt="a" /> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a href="#l" title=" Sample Product"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box"> <span class="regular-price"> <span class="price">$422.00</span> </span> </div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box"> <span class="regular-price"> <span class="price">$50.00</span> </span> </div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box">
																			<p class="special-price"> <span class="price"> $45.00 </span> </p>
																			<p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
																		</div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box">
																			<p class="special-price"> <span class="price"> $45.00 </span> </p>
																			<p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
																		</div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="new-label new-top-right">New</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box"> <span class="regular-price"> <span class="price">$422.00</span> </span> </div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box"> <span class="regular-price"> <span class="price">$50.00</span> </span> </div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

													<!-- Item -->
													<div class="item">
														<div class="col-item">
															<div class="sale-label sale-top-right">Sale</div>
															<div class="product-image-area"> <a class="product-image" title="Sample Product" href="http://ow.ly/XqzNo"> <img alt="a" class="img-responsive" src="{{ url('products-images') }}/product1.jpg"> </a>
																<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
																		<div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
																	</a> <a class="quick-view" href="quick_view.html">
																		<div><i class="icon-eye-open"></i><span>Quick view</span></div>
																	</a> <a class="add_to_compare" href="compare.html">
																		<div><i class="icon-random"></i><span>Add to compare</span></div>
																	</a> <a class="addToWishlist wishlistProd_5" href="http://bit.do/bromq" >
																		<div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
																	</a> </div>
															</div>
															<div class="info">
																<div class="info-inner">
																	<div class="item-title"> <a title=" Sample Product" href="http://ow.ly/XqzNo"> Sample Product </a> </div>
																	<!--item-title-->
																	<div class="item-content">
																		<div class="ratings">
																			<div class="rating-box">
																				<div class="rating"></div>
																			</div>
																		</div>
																		<div class="price-box">
																			<p class="special-price"> <span class="price"> $45.00 </span> </p>
																			<p class="old-price"> <span class="price-sep">-</span> <span class="price"> $50.00 </span> </p>
																		</div>
																	</div>
																	<!--item-content-->
																</div>
																<!--info-inner-->

																<div class="clearfix"> </div>
															</div>
														</div>
													</div>
													<!-- End Item -->

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End main-container -->
@endsection
@section('scripts')
	<script type="text/javascript" src="{{ url('js/jquery.jcarousel.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/cloudzoom.js') }}"></script>
@endsection