@include('front.resources.header')
<div class="page-content">
    <!--section-->
    <div class="section mt-0">
        <div class="breadcrumbs-wrap">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <span>  <a href="{{ route('front.blogs') }}">Our Blogs/News</a></span>
                </div>
            </div>
        </div>
    </div>
    <!--//section-->

    <!--section-->
    <div class="section page-content-first">
    <div class="container">
				<div class="row">
				<div class="col-lg-9 aside">
                    @foreach($blogPosts as $blogPost)
                        <div class="blog-post">
                            <div class="blog-post-info">
                                <div class="post-date">{{ $blogPost->created_at->format('d') }}<span>{{ $blogPost->created_at->format('M') }}</span></div>
                                <div>
                                    <h2 class="post-title"><a href="{{ route('front.blog_details', $blogPost->id) }}">{{ $blogPost->title }}</a></h2>
                                    <div class="post-meta">
                                        <div class="post-meta-author">By <a href="#"><i>admin</i></a></div>
    
                                    </div>
                                </div>
                            </div>
                            <div class="post-image">
                                @if ($blogPost->images)
                                    <a href="{{ route('front.blog_details', $blogPost->id) }}">
                                        <img style="height:450px;" src="{{ asset($blogPost->images) }}" alt="{{ $blogPost->title }}">
                                    </a>
                                @endif
                            </div>
                            <div class="post-teaser"> {{ Str::limit(strip_tags($blogPost->content), 200) }}</div>
                            <div class="mt-3 mt-lg-4"><a href="{{ route('front.blog_details', $blogPost->id) }}" class="btn btn-sm btn-hover-fill"><i class="icon-right-arrow"></i><span>Read more</span><i class="icon-right-arrow"></i></a></div>
                      </div>
                     @endforeach
                       
					<div class="clearfix"></div>
						<ul class="pagination justify-content-center">
							{{ $blogPosts->links() }}
						</ul>
					</div>
					<br>
					<div class="col-lg-3 aside-left mt-5 mt-lg-0">
						<div class="side-block">
							<h3 class="side-block-title">Categories</h3>
							<ul class="categories-list">
								@foreach($blogCategories as $category)
									<li><a href="{{ url("#") }}">{{ $category->name }}</a></li>
								@endforeach
							</ul>
						</div>

						<div class="side-block">
						<h3 class="side-block-title">Date Posts</h3>
						<div class="calendar">
						<!-- Calendar header -->
						<div class="calendar__header">
							<a href="{{ url("#") }}" class="prev"><i class="icon-left-arrow"></i></a>
							<span class="month">{{ now()->format('F Y') }}</span>
							<a href="{{ url("#") }}" class="next"><i class="icon-right-arrow"></i></a>
						</div>

						<table>
							<tbody>
								<tr>
									<th>M</th>
									<th>T</th>
									<th>W</th>
									<th>T</th>
									<th>F</th>
									<th>S</th>
									<th>S</th>
								</tr>
								@php
									$currentDate = now()->startOfMonth();
									$daysInMonth = now()->daysInMonth;
									$firstDayOfWeek = $currentDate->dayOfWeek;
									$dayCounter = 1;
								@endphp

								@for ($i = 0; $i < ceil(($daysInMonth + $firstDayOfWeek) / 7) * 7; $i++)
									@if ($i % 7 == 0)
										<tr>
									@endif
									<td>
										@if ($i >= $firstDayOfWeek && $dayCounter <= $daysInMonth)
											<a href="{{ url("#") }}" class="{{ in_array($currentDate->toDateString(), $postDates) ? 'selected' : '' }}">
												{{ $dayCounter }}
											</a>
											@php
												$dayCounter++;
												$currentDate->addDay();
											@endphp
										@endif
									</td>
									@if ($i % 7 == 6)
										</tr>
									@endif
								@endfor
							</tbody>
						</table>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
    <!--//section-->
</div>
	<!--footer-->
@include('front/resources.footer')	