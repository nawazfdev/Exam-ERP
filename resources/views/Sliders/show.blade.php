@include('front.resources.header')
            <!--  wrapper  -->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!--section -->
                    <section class="hero-section no-padding" data-scrollax-parent="true" id="sec1">
                        <div class="slider-container-wrap fl-wrap color3-bg">
                            <div class="slider-container">
                                <!-- slideshow-item -->
                                <div class="slider-item fl-wrap">
                                    <div class="hero-parallax">
                                        <div class="bg"  data-bg="images/bg/27.jpg" data-scrollax="properties: { translateY: '200px' }"></div>
                                        <div class="overlay op7"></div>
                                    </div>
                                    <div class="hero-section-wrap fl-wrap">
                                        <div class="container">
                                            <div class="home-intro">
                                                <div class="section-title-separator"><span></span></div>
                                                <h2>PodSot Hotel Booking System</h2>
                                                <span class="section-separator"></span>
                                                <h3>Let's start exploring the world together with PodSot</h3>
                                            </div>
                                            <div class="main-search-input-wrap">
                                                <div class="main-search-input fl-wrap">
                                                    <div class="main-search-input-item location" id="autocomplete-container">
                                                        <span class="inpt_dec"><i class="fal fa-map-marker"></i></span>
                                                        <input type="text" placeholder="Hotel , City..." class="autocomplete-input" id="autocompleteid2"  value=""/>
                                                        <a href="#"><i class="fal fa-dot-circle"></i></a>
                                                    </div>
                                                    <div class="main-search-input-item main-date-parent3 main-search-input-item_small">
                                                        <span class="inpt_dec"><i class="fal fa-calendar-check"></i></span> <input type="text" placeholder="When" name="main-input-search_slider"   value=""/>
                                                    </div>
                                                    <div class="main-search-input-item">
                                                        <div class="qty-dropdown fl-wrap">
                                                            <div class="qty-dropdown-header fl-wrap"><i class="fal fa-users"></i> Persons</div>
                                                            <div class="qty-dropdown-content fl-wrap">
                                                                <div class="quantity-item">
                                                                    <label><i class="fas fa-male"></i> Adults</label>
                                                                    <div class="quantity">
                                                                        <input type="number" min="1" max="3" step="1" value="1">
                                                                    </div>
                                                                </div>
                                                                <div class="quantity-item">
                                                                    <label><i class="fas fa-child"></i> Children</label>
                                                                    <div class="quantity">
                                                                        <input type="number" min="0" max="3" step="1" value="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="main-search-button color2-bg" onclick="window.location.href='hotels.php'">Search <i class="fal fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  slideshow-item end  -->
                                <!-- slideshow-item -->
                                <div class="slider-item fl-wrap">
                                    <div class="hero-parallax">
                                        <div class="bg"  data-bg="images/bg/23.jpg" data-scrollax="properties: { translateY: '200px' }"></div>
                                        <div class="overlay op7"></div>
                                    </div>
                                    <div class="hero-section-wrap fl-wrap">
                                        <div class="container">
                                            <div class="home-intro-card">
                                                <div class="home-intro-card-counter">123 Hotels</div>
                                                <div class="weather-grid"   data-grcity="London"></div>
                                                <div class="clearfix"></div>
                                                <h3>Discover Lahore - City  is Never Sleeps</h3>
                                                <h5>Lahore is a traveler's paradise, alive with history, culture, and vibrant energy. From majestic landmarks to buzzing food streets, every moment here promises an unforgettable adventure. Explore Lahore, where the journey never ends!  </h5>
                                                <a href="hotels.php" class="btn  color2-bg float-btn">View All Hotels<i class="fas fa-caret-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  slideshow-item end  -->
                                <!-- slideshow-item -->
                                <div class="slider-item fl-wrap">
                                    <div class="hero-parallax">
                                        <div class="bg"  data-bg="images/bg/9.jpg" data-scrollax="properties: { translateY: '200px' }"></div>
                                        <div class="overlay op7"></div>
                                    </div>
                                    <div class="hero-section-wrap fl-wrap">
                                        <div class="container">
                                            <div class="home-intro-card">
                                                <div class="listing-rating-wrap">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <h3>Family Guest House Islamabad</h3>
                                                <div class="clearfix"></div>
                                                <div class="home-intro-card-counter home-intro-card-counter_price">Awg/Night Rs.4500</div>
                                                <div class="clearfix"></div>
                                                <h5>Affordable, comfortable, and family-friendly accommodation in the heart of Islamabad. Enjoy a home-like stay with exceptional service and hospitality!  </h5>
                                                <a href="hotel-details.php" class="btn  color2-bg float-btn">View All Details<i class="fas fa-caret-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  slideshow-item end  -->
                            </div>
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section id="sec2">
                        <div class="container">
                                <div class="section-title">
                                    <div class="section-title-separator"><span></span></div>
                                    <h2>Popular Destination</h2>
                                    <span class="section-separator"></span>
                                    <p>Explore some of the best tips from around the city from our partners and friends.</p>
                                </div>
                            </div>
                            <!-- portfolio start -->
                            <div class="gallery-items fl-wrap mr-bot spad home-grid">
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>79 </span> Hotels</div>
                                            <img  src="images/city/islamabad.jpg"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="hotels.php">Islamabad</a></h3>
                                                <div class="weather-grid"   data-grcity="Rome"></div>
                                                <div class="clearfix"></div>
                                                <p>Constant care and attention to the patients makes good record</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item gallery-item-second">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <img  src="images/city/lahore.jpg"   alt="">
                                            <div class="listing-counter"><span>43 </span> Hotels</div>
                                            <div class="listing-item-cat">
                                                <h3><a href="hotels.php">Lahore</a></h3>
                                                <div class="weather-grid"   data-grcity="Paris"></div>
                                                <div class="clearfix"></div>
                                                <p>Constant care and attention to the patients makes good record</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>23 </span> Hotels</div>
                                            <img  src="images/city/karachi.jpg"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="hotels.php">Karachi</a></h3>
                                                <div class="weather-grid"   data-grcity="London"></div>
                                                <div class="clearfix"></div>
                                                <p>Constant care and attention to the patients makes good record</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>57</span> Hotels</div>
                                            <img  src="images/city/Rawalpindi.jpg"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="hotels.php">Rawalpindi</a></h3>
                                                <div class="weather-grid"   data-grcity="Dubai"></div>
                                                <div class="clearfix"></div>
                                                <p>Constant care and attention to the patients makes good record</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>122</span> Hotels</div>
                                            <img  src="images/city/Faisalabad.jpg"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="hotels.php">Faisalabad</a></h3>
                                                <div class="weather-grid"   data-grcity="New York"></div>
                                                <div class="clearfix"></div>
                                                <p>Constant care and attention to the patients makes good record</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                            </div>
                            <!-- portfolio end -->
                            <a href="hotels.php" class="btn    color-bg">Explore All Cities<i class="fas fa-caret-right"></i></a>

                    </section>
                    <!-- section end -->
                    <!-- section-->
                    <section class="grey-blue-bg">
                        <!-- container-->
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Exclusive Hotel Picks</h2>
                                <span class="section-separator"></span>
                                <p>Discover exceptional comfort, prime locations, and unmatched hospitality with our exclusive selection of top-rated hotels, thoughtfully curated for your perfect stay.</p>
                            </div>
                        </div>
                        <!-- container end-->
                        <!-- carousel -->
                        <div class="list-carousel fl-wrap card-listing ">
                            <!--listing-carousel-->
                            <div class="listing-carousel  fl-wrap ">
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="hotel-details.php"><img src="images/gal/8.jpg" alt=""></a>
                                                <div class="listing-avatar"><a href="author-single.php"><img src="images/avatar/1.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>HaDi Khan</strong></span>
                                                </div>
                                                <div class="sale-window">Sale 20%</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Very Good</strong>27 Reviews </div>
                                                        <span>5.0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="hotel-details.php">Family Lodge Guest House</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i>Islamabad, Pakistan</a></div>
                                                    </div>
                                                </div>
                                                <p>Enjoy a home-like stay with exceptional service and hospitality.Your gateway to a luxurious and memorable stay.</p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                                                    <li><i class="fal fa-parking"></i><span>Parking</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-utensils"></i><span> Restaurant</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-category-price">Awg/Night <span>Rs. 4500</span></div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="hotel-details.php"><img src="images/gal/4.jpg" alt=""></a>
                                                <div class="listing-avatar"><a href="author-single.php"><img src="images/avatar/2.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Julie Cramp</strong></span>
                                                </div>
                                                <div class="sale-window big-sale">Sale 50%</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Good</strong>12 Reviews </div>
                                                        <span>4.2</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="hotel-details.php">Decent Lodge Hotel</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i>Lahore, Pakistan</a></div>
                                                    </div>
                                                </div>
                                                <p> Experience comfort and warmth at Decent Lodge Hotel, Lahore – your perfect home away from home.</p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                                                    <li><i class="fal fa-parking"></i><span>Parking</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-utensils"></i><span> Restaurant</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-opt-link">
                                                        <div class="geodir-category-price">Awg/Night <span>Rs. 5000</span></div>
                                                    </div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.76221766" data-newlongitude="-73.96511769"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="hotel-details.php"><img src="images/gal/7.jpg" alt=""></a>
                                                <div class="listing-avatar"><a href="author-single.php"><img src="images/avatar/3.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Andy Moore</strong></span>
                                                </div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Good</strong>6 Reviews </div>
                                                        <span>4.7</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="hotel-details.php">Red Fort Hotel</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i>Lahore, Pakistan</a></div>
                                                    </div>
                                                </div>
                                                <p> Stay in elegance and comfort at Red Fort Hotel, Lahore – where luxury meets convenience.</p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                                                    <li><i class="fal fa-parking"></i><span>Parking</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-utensils"></i><span> Restaurant</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-opt-link">
                                                        <div class="geodir-category-price">Awg/Night <span>Rs. 3500</span></div>
                                                    </div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.88496706" data-newlongitude="-73.88191222"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="hotel-details.php"><img src="images/gal/2.jpg" alt=""></a>
                                                <div class="listing-avatar"><a href="author-single.php"><img src="images/avatar/4.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Mary Jones</strong></span>
                                                </div>
                                                <div class="sale-window">Sale 20%</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="3"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Pleasant</strong>10 Reviews </div>
                                                        <span>3.2</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="hotel-details.php">Moon Palace Hotel</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> Lahore, Pakistan</a></div>
                                                    </div>
                                                </div>
                                                <p>Moon Palace Hotel – Experience a perfect blend of luxury, comfort, and exceptional service in the heart of the city.</p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                                                    <li><i class="fal fa-parking"></i><span>Parking</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-utensils"></i><span> Restaurant</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-opt-link">
                                                        <div class="geodir-category-price">Awg/Night <span>Rs. 6000</span></div>
                                                    </div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.72228267" data-newlongitude="-73.99246214"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="hotel-details.php"><img src="images/gal/3.jpg" alt=""></a>
                                                <div class="listing-avatar"><a href="author-single.php"><img src="images/avatar/5.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Fider Mamby</strong></span>
                                                </div>
                                                <div class="sale-window">Sale 10%</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Very Good</strong>102 Reviews </div>
                                                        <span>4.7</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="hotel-details.php">Indigo Heights Hotel</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> Lahore, Pakistan</a></div>
                                                    </div>
                                                </div>
                                                <p> Indigo Heights Hotel – Where modern elegance meets unrivaled comfort, offering a luxurious stay with stunning views. </p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                                                    <li><i class="fal fa-parking"></i><span>Parking</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-utensils"></i><span> Restaurant</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-opt-link">
                                                        <div class="geodir-category-price">Awg/Night <span>Rs. 6000</span></div>
                                                    </div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.94982541" data-newlongitude="-73.84357452"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!--slick-slide-item end-->
                          
                            </div>
                            <!--listing-carousel end-->
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                        </div>
                        <!--  carousel end-->
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section class="parallax-section" data-scrollax-parent="true">
                        <div class="bg"  data-bg="images/bg/2.jpg" data-scrollax="properties: { translateY: '100px' }"></div>
                        <div class="overlay op7"></div>
                        <!--container-->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="colomn-text fl-wrap pad-top-column-text_small">
                                        <div class="colomn-text-title">
                                            <h3>Most Popular Hotels</h3>
                                            <p>Discover the most popular hotels, offering unbeatable comfort, prime locations, and top-notch service for an unforgettable stay.</p>
                                            <a href="hotels.php" class="btn  color2-bg float-btn">View All Hotels<i class="fas fa-caret-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <!--light-carousel-wrap-->
                                    <div class="light-carousel-wrap fl-wrap">
                                        <!--light-carousel-->
                                        <div class="light-carousel">
                                            <!--slick-slide-item-->
                                            <div class="slick-slide-item">
                                                <div class="hotel-card fl-wrap title-sin_item">
                                                    <div class="geodir-category-img card-post">
                                                        <a href="hotel-details.php"><img src="images/gal/8.jpg" alt=""></a>
                                                        <div class="listing-counter">Awg/Night <strong>Rs.3500</strong></div>
                                                        <div class="sale-window">Sale 20%</div>
                                                        <div class="geodir-category-opt">
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <h4 class="title-sin_map"><a href="hotel-details.php">Moon Palace Hotel</a></h4>
                                                            <div class="geodir-category-location"><a href="#" class="single-map-item" data-newlatitude="40.90261483" data-newlongitude="-74.15737152"><i class="fas fa-map-marker-alt"></i> Lahore, Pakistan</a></div>
                                                            <div class="rate-class-name">
                                                                <div class="score"><strong> Good</strong>8 Reviews </div>
                                                                <span>4.8</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--slick-slide-item end-->
                                            <!--slick-slide-item-->
                                            <div class="slick-slide-item">
                                                <div class="hotel-card fl-wrap title-sin_item">
                                                    <div class="geodir-category-img">
                                                        <a href="hotel-details.php"><img src="images/gal/7.jpg" alt=""></a>
                                                        <div class="listing-counter">Awg/Night <strong>Rs.4200</strong></div>
                                                        <div class="sale-window big-sale">Sale 50%</div>
                                                        <div class="geodir-category-opt">
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <h4 class="title-sin_map"><a href="hotel-details.php">Family Lodge Guest House</a></h4>
                                                            <div class="geodir-category-location"><a href="#" class="single-map-item" data-newlatitude="40.72228267" data-newlongitude="-73.99246214"><i class="fas fa-map-marker-alt"></i> Islamabad, Pakistan</a></div>
                                                            <div class="rate-class-name">
                                                                <div class="score"><strong> Good</strong>2 Reviews </div>
                                                                <span>4.7</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--slick-slide-item end-->
                                            <!--slick-slide-item-->
                                            <div class="slick-slide-item">
                                                <div class="hotel-card fl-wrap title-sin_item">
                                                    <div class="geodir-category-img">
                                                        <a href="hotel-details.php"><img src="images/gal/3.jpg" alt=""></a>
                                                        <div class="listing-counter">Awg/Night <strong>Rs.5500</strong></div>
                                                        <div class="sale-window">Sale 10%</div>
                                                        <div class="geodir-category-opt">
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <h4 class="title-sin_map"><a href="hotel-details.php">Indigo Heights Hotel</a></h4>
                                                            <div class="geodir-category-location"><a href="#" class="single-map-item" data-newlatitude="40.76221766" data-newlongitude="-73.96511769"><i class="fas fa-map-marker-alt"></i> Lahore, Pakistan</a></div>
                                                            <div class="rate-class-name">
                                                                <div class="score"><strong> Good</strong>31 Reviews </div>
                                                                <span>4.9</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--slick-slide-item end-->
                                        </div>
                                        <!--light-carousel end-->
                                        <div class="fc-cont  lc-prev"><i class="fal fa-angle-left"></i></div>
                                        <div class="fc-cont  lc-next"><i class="fal fa-angle-right"></i></div>
                                    </div>
                                    <!--light-carousel-wrap end-->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                       <!-- section-->
                    <section class="grey-blue-bg">
                        <!-- container-->
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Exclusive Car Rental Picks</h2>
                                <span class="section-separator"></span>
                                <p>Discover our top car rental options for a smooth and stylish ride, every time.</p>
                            </div>
                        </div>
                        <!-- container end-->
                        <!-- carousel -->
                        <div class="list-carousel fl-wrap card-listing ">
                            <!--listing-carousel-->
                            <div class="listing-carousel  fl-wrap ">
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="hotel-details.php"><img src="images/gal/cars/1.jpg" alt=""></a>
                                                <div class="listing-avatar"><a href="author-single.php"><img src="images/avatar/1.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>HaDi Khan</strong></span>
                                                </div>
                                                <div class="sale-window">Sale 20%</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Very Good</strong>27 Reviews </div>
                                                        <span>5.0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="hotel-details.php">Saif Rent a Car Lahore</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i>Islamabad, Pakistan</a></div>
                                                    </div>
                                                </div>
                                                <p>Saif Rent a Car Lahore – Your trusted partner for reliable, affordable, and comfortable rides.</p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-user-friends"></i><span>6 Passenger</span></li>
                                                    <li><i class="fal fa-car"></i><span>Auto</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-suitcase"></i><span> 4 Baggage</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-category-price">Awg/Day <span>Rs. 4500</span></div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="hotel-details.php"><img src="images/gal/cars/2.jpg" alt=""></a>
                                                <div class="listing-avatar"><a href="author-single.php"><img src="images/avatar/1.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>HaDi Khan</strong></span>
                                                </div>
                                                <div class="sale-window">Sale 20%</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Very Good</strong>27 Reviews </div>
                                                        <span>5.0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="hotel-details.php">Saif Rent a Car Lahore</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i>Islamabad, Pakistan</a></div>
                                                    </div>
                                                </div>
                                                <p>Saif Rent a Car Lahore – Your trusted partner for reliable, affordable, and comfortable rides.</p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-user-friends"></i><span>6 Passenger</span></li>
                                                    <li><i class="fal fa-car"></i><span>Auto</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-suitcase"></i><span> 4 Baggage</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-category-price">Awg/Day <span>Rs. 4500</span></div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="hotel-details.php"><img src="images/gal/cars/3.jpg" alt=""></a>
                                                <div class="listing-avatar"><a href="author-single.php"><img src="images/avatar/1.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>HaDi Khan</strong></span>
                                                </div>
                                                <div class="sale-window">Sale 20%</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Very Good</strong>27 Reviews </div>
                                                        <span>5.0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="hotel-details.php">Saif Rent a Car Lahore</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i>Islamabad, Pakistan</a></div>
                                                    </div>
                                                </div>
                                                <p>Saif Rent a Car Lahore – Your trusted partner for reliable, affordable, and comfortable rides.</p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-user-friends"></i><span>6 Passenger</span></li>
                                                    <li><i class="fal fa-car"></i><span>Auto</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-suitcase"></i><span> 4 Baggage</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-category-price">Awg/Day <span>Rs. 4500</span></div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="hotel-details.php"><img src="images/gal/cars/4.jpg" alt=""></a>
                                                <div class="listing-avatar"><a href="author-single.php"><img src="images/avatar/1.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>HaDi Khan</strong></span>
                                                </div>
                                                <div class="sale-window">Sale 20%</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Very Good</strong>27 Reviews </div>
                                                        <span>5.0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="hotel-details.php">Saif Rent a Car Lahore</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i>Islamabad, Pakistan</a></div>
                                                    </div>
                                                </div>
                                                <p>Saif Rent a Car Lahore – Your trusted partner for reliable, affordable, and comfortable rides.</p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-user-friends"></i><span>6 Passenger</span></li>
                                                    <li><i class="fal fa-car"></i><span>Auto</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-suitcase"></i><span> 4 Baggage</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-category-price">Awg/Day <span>Rs. 4500</span></div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="hotel-details.php"><img src="images/gal/cars/5.jpg" alt=""></a>
                                                <div class="listing-avatar"><a href="author-single.php"><img src="images/avatar/1.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>HaDi Khan</strong></span>
                                                </div>
                                                <div class="sale-window">Sale 20%</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Very Good</strong>27 Reviews </div>
                                                        <span>5.0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="hotel-details.php">Saif Rent a Car Lahore</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i>Islamabad, Pakistan</a></div>
                                                    </div>
                                                </div>
                                                <p>Saif Rent a Car Lahore – Your trusted partner for reliable, affordable, and comfortable rides.</p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-user-friends"></i><span>6 Passenger</span></li>
                                                    <li><i class="fal fa-car"></i><span>Auto</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-suitcase"></i><span> 4 Baggage</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-category-price">Awg/Day <span>Rs. 4500</span></div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!--slick-slide-item end-->
                          
                            </div>
                            <!--listing-carousel end-->
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                        </div>
                        <!--  carousel end-->
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Why Choose Us</h2>
                                <span class="section-separator"></span>
                                <p>Enjoy hassle-free car rentals and hotel bookings with affordable rates, reliable service, and a wide selection tailored to your needs.</p>
                            </div>
                            <!-- -->
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- process-item-->
                                    <div class="process-item big-pad-pr-item">
                                        <span class="process-count"> </span>
                                        <div class="time-line-icon"><i class="fal fa-headset"></i></div>
                                        <h4><a href="#"> Best service guarantee</a></h4>
                                        <p>Experience unmatched quality with our best service guarantee – your satisfaction is our priority!</p>
                                    </div>
                                    <!-- process-item end -->
                                </div>
                                <div class="col-md-4">
                                    <!-- process-item-->
                                    <div class="process-item big-pad-pr-item">
                                        <span class="process-count"> </span>
                                        <div class="time-line-icon"><i class="fal fa-gift"></i></div>
                                        <h4> <a href="#">Exclusive Deals</a></h4>
                                        <p>Unlock unbeatable savings with our exclusive deals on car rentals and hotel bookings!</p>
                                    </div>
                                    <!-- process-item end -->
                                </div>
                                <div class="col-md-4">
                                    <!-- process-item-->
                                    <div class="process-item big-pad-pr-item nodecpre">
                                        <span class="process-count"> </span>
                                        <div class="time-line-icon"><i class="fal fa-credit-card"></i></div>
                                        <h4><a href="#"> Affordable Rates</a></h4>
                                        <p>Enjoy top-quality service at unbeatable prices with our affordable rates on car rentals and hotel bookings!</p>
                                    </div>
                                    <!-- process-item end -->
                                </div>
                            </div>
                            <!--process-wrap   end-->
                            <div class=" single-facts fl-wrap mar-top">
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-users"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="254">154</div>
                                            </div>
                                        </div>
                                        <h6>New Visiters Every Week</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-thumbs-up"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="12168">12168</div>
                                            </div>
                                        </div>
                                        <h6>Happy customers every year</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-award"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="172">172</div>
                                            </div>
                                        </div>
                                        <h6>Won Awards</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-hotel"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="732">732</div>
                                            </div>
                                        </div>
                                        <h6>New Listing Every Week</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section class="color-bg hidden-section">
                        <div class="wave-bg wave-bg2"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- -->
                                    <div class="colomn-text  pad-top-column-text fl-wrap">
                                        <div class="colomn-text-title">
                                            <h3>Our App   Available Now</h3>
                                            <p>Our App is Available Now – Download and enjoy seamless booking for cars and hotels at your fingertips!</p>
                                            <a href="#" class=" down-btn color3-bg"><i class="fab fa-apple"></i> Download for iPhone</a>
                                            <a href="#" class=" down-btn color3-bg"><i class="fab fa-android"></i> Download for Android</a>
                                        </div>
                                    </div>
                                    <!--process-wrap   end-->
                                </div>
                                <div class="col-md-6">
                                    <div class="collage-image">
                                        <img src="images/api.png" class="main-collage-image" alt="">
                                        <div class="images-collage-title color3-bg">POD<span>SOT</span></div>
                                        <div class="collage-image-min cim_1"><img src="images/api/1.jpg" alt=""></div>
                                        <div class="collage-image-min cim_2"><img src="images/api/2.jpg" alt=""></div>
                                        <div class="collage-image-min cim_3"><img src="images/api/3.jpg" alt=""></div>
                                        <div class="collage-image-input">Search <i class="fa fa-search"></i></div>
                                        <div class="collage-image-btn color2-bg">Booking now</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Testimonials</h2>
                                <span class="section-separator"></span>
                                <p>See what our satisfied customers have to say – real stories, real experiences, and trusted service!</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!--slider-carousel-wrap -->
                        <div class="slider-carousel-wrap text-carousel-wrap fl-wrap">
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                            <div class="text-carousel single-carousel fl-wrap">
                                <!--slick-item -->
                                <div class="slick-item">
                                        <div class="text-carousel-item">
                                            <div class="popup-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                            <div class="review-owner fl-wrap">Ahmed Khan - <span>Karachi</span></div>
                                            <p> "Amazing service! The team was professional and delivered exactly what I needed. Highly recommended for anyone in Pakistan!"</p>
                                            <a href="#" class="testim-link">Via WhatsApp</a>
                                        </div>
                                    </div>
                                <!--slick-item end -->
                                <!--slick-item -->
                                <div class="slick-item">
                                        <div class="text-carousel-item">
                                            <div class="popup-avatar"><img src="images/avatar/2.jpg" alt=""></div>
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                                            <div class="review-owner fl-wrap">Ayesha Bano - <span>Lahore</span></div>
                                            <p> "Fantastic experience! Their customer support was very responsive, and they went above and beyond to assist me."</p>
                                            <a href="#" class="testim-link">Via Facebook</a>
                                        </div>
                                    </div>
                                <!--slick-item end -->
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="images/avatar/3.jpg" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <div class="review-owner fl-wrap">Usman Ali - <span>Islamabad</span></div>
                                        <p> "Excellent quality and timely delivery. I was impressed by their dedication to customer satisfaction. Keep it up!"</p>
                                        <a href="#" class="testim-link">Via Instagram</a>
                                    </div>
                                </div>
                                <!--slick-item end -->
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="images/avatar/4.jpg" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <div class="review-owner fl-wrap">Sara Malik - <span>Rawalpindi</span></div>
                                        <p> "I was amazed by the attention to detail and the personalized service. They truly value their clients."</p>
                                        <a href="#" class="testim-link">Via Email</a>
                                    </div>
                                </div>
                                <!--slick-item end -->
                            </div>
                        </div>
                        <!--slider-carousel-wrap end-->
                    </section>
                    <!-- section end-->
                    <section class="parallax-section" data-scrollax-parent="true">
                        <div class="bg"  data-bg="images/bg/14.jpg" data-scrollax="properties: { translateY: '100px' }"></div>
                        <div class="overlay"></div>
                        <!--container-->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <!-- column text-->
                                    <div class="colomn-text fl-wrap">
                                        <div class="colomn-text-title">
                                            <h3>The owner of the hotel or business ?</h3>
                                            <p>"Welcome to our hotel, where comfort meets luxury. Our property is designed to provide an exceptional experience for every guest. From elegant rooms to personalized services, we ensure your stay is memorable."</p>
                                            <a href="dashboard-add-hotels.php" class="btn  color-bg float-btn">Add your hotel<i class="fal fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <!--column text   end-->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section class="middle-padding">
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Tips & Articles</h2>
                                <span class="section-separator"></span>
                                <p>Discover insights, updates, and valuable tips from Podsot to enhance your experience.</p>
                            </div>
                            <div class="row home-posts">
                                <div class="col-md-4">
                                    <article class="card-post">
                                        <div class="card-post-img fl-wrap">
                                            <a href="blog-single.php"><img src="images/all/11.jpg" alt=""></a>
                                        </div>
                                        <div class="card-post-content fl-wrap">
                                            <h3><a href="blog-single.php">Maximizing Your Stay with Podsot.</a></h3>
                                            <p>Learn how Podsot ensures every guest enjoys premium comfort and outstanding services during their stay.</p>
                                            <div class="post-author"><a href="#"><img src="images/avatar/4.jpg" alt=""><span>By, Alex Khan</span></a></div>
                                            <div class="post-opt">
                                                <ul>
                                                    <li><i class="fal fa-calendar"></i> <span>25 November 2024</span></li>
                                                    <li><i class="fal fa-eye"></i> <span>345</span></li>
                                                    <li><i class="fal fa-tags"></i> <a href="#">Travel</a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-4">
                                    <article class="card-post">
                                        <div class="card-post-img fl-wrap">
                                            <div class="list-single-main-media fl-wrap">
                                                <div class="single-slider-wrapper fl-wrap">
                                                    <div class="single-slider fl-wrap">
                                                        <div class="slick-slide-item"><img src="images/all/9.jpg" alt=""></div>
                                                        <div class="slick-slide-item"><img src="images/all/7.jpg" alt=""></div>
                                                        <div class="slick-slide-item"><img src="images/all/1.jpg" alt=""></div>
                                                    </div>
                                                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                                                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-post-content fl-wrap">
                                            <h3><a href="blog-single.php">Top Features of Podsot Properties.</a></h3>
                                            <p>Discover the unique features that make Podsot properties stand out and deliver an unforgettable experience.</p>
                                            <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By, Sarah Malik</span></a></div>
                                            <div class="post-opt">
                                                <ul>
                                                    <li><i class="fal fa-calendar"></i> <span>18 November 2024</span></li>
                                                    <li><i class="fal fa-eye"></i> <span>412</span></li>
                                                    <li><i class="fal fa-tags"></i> <a href="#">Hospitality</a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-4">
                                    <article class="card-post">
                                        <div class="card-post-img fl-wrap">
                                            <a href="blog-single.php"><img src="images/all/10.jpg" alt=""></a>
                                        </div>
                                        <div class="card-post-content fl-wrap">
                                            <h3><a href="blog-single.php">Planning Your Next Trip with Podsot.</a></h3>
                                            <p>Get tips on planning your trips and making the most of your stays with Podsot’s expert guidance.</p>
                                            <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By, John Doe</span></a></div>
                                            <div class="post-opt">
                                                <ul>
                                                    <li><i class="fal fa-calendar"></i> <span>12 November 2024</span></li>
                                                    <li><i class="fal fa-eye"></i> <span>298</span></li>
                                                    <li><i class="fal fa-tags"></i> <a href="#">Travel Tips</a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <a href="blog.php" class="btn color-bg">Read All News<i class="fas fa-caret-right"></i></a>
                        </div>
                        <div class="section-decor"></div>
                    </section>

                </div>
                <!-- content end-->
            </div>
            <!--wrapper end -->
<!--footer -->
@include('front.resources.footer')
<!--footer end -->
            
