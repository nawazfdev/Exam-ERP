@include('front.resources.header')
<div class="page-content">
<div class="section page-content-first">
			<div class="container">
				<div class="text-center mb-2  mb-md-3 mb-lg-4">
					<div class="h-sub theme-color">{{trans('WhatPeopleSays')}}</div>
					<h1>{{trans('Stories')}}</h1>
					<div class="h-decor"></div>
				</div>
			</div>
			<div class="container">
				<div class="rating-box">
					<div class="rating-number">5</div>
					<div class="star-rating"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></div>
					<div>{{trans('AverageCustomerRating')}}</div>
				</div>
				<div class="text-center mb-3 mb-md-4 max-900">
					<p>{{trans('RecentStories')}}</p>
					<!-- <p><a href="#writeReview" class="btn btn-hover-fill js-wrire-review"><i class="icon-right-arrow"></i><span>Write Your Review</span><i class="icon-right-arrow"></i></a></p> -->
				</div>
				<div class="row">
                    @foreach($stories as $story)
                        <div class="col-sm">
                            <div class="testimonial-wrap">
                                <div class="testimonial text-center">
                                    <div class="testimonial-photo">
                                        <img style="height:104px;weight:104px;" src="{{ asset($story->images) }}" alt="">
                                        <!-- <img src="{{ asset($story->images) }}" alt=""> -->
                                    </div>
                                    <div class="testimonial-title">{{ $story->title }}</div>
                                    <div class="star-rating"><span class="txt-gradient">
                                        @for ($i = 0; $i < $story->rating; $i++)
                                            <i class="icon-star"></i>
                                        @endfor
                                    </span></div>
                                    <div class="testimonial-text">
                                        <p>{!! $story->content !!}</p>
                                    </div>
                                    <div class="testimonial-author">
                                        <span class="testimonial-position">{{ $story->customer_name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

				<ul class="pagination justify-content-center">
                    {{ $stories->links() }}
                </ul>
				<!-- <div class="mt-5 mt-md-8" id="writeReview">
					<h3>Write a Review</h3>
					<div class="review-form-wrap opened mt-lg-3">
						<form class="contact-form pb-0" id="reviewForm" method="post" novalidate="novalidate">
							<div class="row align-items-center">
								<div class="col-auto">
									<label>Click For Rating</label>
								</div>
								<fieldset class="review-rating">
									<input type="radio" id="star5" name="rating" value="5">
									<label class="full" for="star5" title="5 stars"></label>
									<input type="radio" id="star4half" name="rating" value="4 and a half">
									<label class="half" for="star4half" title="4.5 stars"></label>
									<input type="radio" id="star4" name="rating" value="4">
									<label class="full" for="star4" title="4 stars"></label>
									<input type="radio" id="star3half" name="rating" value="3 and a half">
									<label class="half" for="star3half" title="3.5 stars"></label>
									<input type="radio" id="star3" name="rating" value="3">
									<label class="full" for="star3" title="3 stars"></label>
									<input type="radio" id="star2half" name="rating" value="2 and a half">
									<label class="half" for="star2half" title="2.5 stars"></label>
									<input type="radio" id="star2" name="rating" value="2">
									<label class="full" for="star2" title="2 stars"></label>
									<input type="radio" id="star1half" name="rating" value="1 and a half">
									<label class="half" for="star1half" title="1.5 stars"></label>
									<input type="radio" id="star1" name="rating" value="1">
									<label class="full" for="star1" title="1 star"></label>
									<input type="radio" id="starhalf" name="rating" value="half">
									<label class="half" for="starhalf" title="0.5 stars"></label>
								</fieldset>
							</div>
							<div class="row mt-1">
							<div class="col-lg-8">
								<input type="text" class="form-control" name="name" placeholder="Your name*">
								<div class="mt-15">
									<input type="text" class="form-control" placeholder="Month of Arrival">
								</div>
								<div class="mt-15">
									<textarea class="form-control" name="review" placeholder="Review"></textarea>
								</div>
								<div class="mt-3">
									<button type="submit" class="btn btn-hover-fill"><i class="icon-right-arrow"></i><span>Send Review</span><i class="icon-right-arrow"></i></button>
								</div>
								</div>
							</div>
						</form>
					</div>
				</div> -->
			</div>
		</div>
</div>
@include('front/resources.footer')	