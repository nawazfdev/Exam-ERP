@include('front.resources.header')
<div class="page-content">
    <!--section-->
    <div class="section mt-0">
        <div class="breadcrumbs-wrap">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <span><a href="{{ route('front.contactus') }}">Contact Us</a></span>
                </div>
            </div>
        </div>
    </div>
    <!--//section-->
    	<!--section-->
		<div class="section page-content-first" style="padding-bottom:80px;">
			<div class="container">
				<div class="row">
					<div class="col-md col-lg-5">
						<div class="pr-0 pr-lg-8">
							<div class="title-wrap">
								<h2>{{trans('GetInTouchWithUs')}}</h2>
								<div class="h-decor"></div>
							</div>
							<div class="mt-2 mt-lg-4">
								<p>{{trans('GeneralQuestionsMessage')}}</p>
							</div>
							<div class="mt-2 mt-md-5"></div>
							<h5>{{trans('StayConnected')}}</h5>
							<div class="content-social mt-15">
                            <a href="{{ $siteSettings ? $siteSettings->facebook_link : '' }}" target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
								<a href="{{ $siteSettings ? $siteSettings->twitter_link : '' }}" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
								<a href="{{ $siteSettings ? $siteSettings->whatsapp_link : '' }}" target="blank" class="hovicon"><i class="icon-telephone"></i></a>
								<a href="{{ $siteSettings ? $siteSettings->youtube_link : '' }}" target="blank" class="hovicon"><i class="icon-play"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md col-lg-6 mt-4 mt-md-0">
                           <form action="{{ route('contactus.store') }}" class="contact-form" method="post">
							@csrf
							<div>
								<input type="text" class="form-control" name="name" placeholder="Your name*" required>
							</div>
							<div class="mt-15">
								<input type="text" class="form-control" name="email" placeholder="Email*" required>
							</div>
							<div class="mt-15">
								<input type="text" class="form-control" name="phone" placeholder="Your Phone" required>
							</div>
							<div class="mt-15">
								<textarea class="form-control" name="message" placeholder="Message"></textarea required>
							</div>
							<div class="mt-3">
								<button type="submit" class="btn btn-hover-fill"><i class="icon-right-arrow"></i><span>Send message</span><i class="icon-right-arrow"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--//section-->
	
	
	
</div>
	<!--footer-->
@include('front/resources.footer')	