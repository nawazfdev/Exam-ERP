{{-- resources/views/front/dynamic_page.blade.php --}}
@include('front.resources.header')
<div class="content">
    @if (request()->is('/') || request()->is('index')) {{-- Check if the current URL is the homepage or /home --}}
        <!-- Slider Section -->
        <section class="innovation-section">
            <div class="large-container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($slides1 as $index => $slide)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $slide->feature_image) }}"
                                                    style="width:645px;height:340px;" class="d-block w-100"
                                                    alt="Slide {{ $index + 1 }}">
                                                <div class="carousel-caption d-md-block">
                                                    <div class="animated fadeInDown delay-1s">
                                                        <h2 class="display-1">{{ strtoupper($slide->title) }}</h2>
                                                    </div>
                                                    <div class="animated zoomIn delay-3s">
                                                        <a href="{{ route('detail.page', $slide->slug) }}"
                                                            class="btn btn-primary btn-lg">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 0.5%;">
                            <div class="col-md-6" style="padding-top: 2%;padding-bottom:2%;">
                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($slides2 as $index => $slide)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $slide->feature_image) }}"
                                                    style="width:645px;height:340px;" class="d-block w-100"
                                                    alt="Slide {{ $index + 1 }}">
                                                <div class="carousel-caption d-md-block">
                                                    <div class="animated fadeInDown delay-1s">
                                                        <h2 class="display-2">{{ strtoupper($slide->title) }}</h2>
                                                    </div>
                                                    <div class="animated zoomIn delay-3s">
                                                        <a href="{{ route('detail.page', $slide->slug) }}"
                                                            class="btn btn-primary btn-lg">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding-top: 2%;padding-bottom:2%;">
                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($slides3 as $index => $slide)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $slide->feature_image) }}"
                                                    style="width:645px;height:340px;" class="d-block w-100"
                                                    alt="Slide {{ $index + 1 }}">
                                                <div class="carousel-caption d-md-block">
                                                    <div class="animated fadeInDown delay-1s">
                                                        <h2 class="display-2">{{ strtoupper($slide->title) }}</h2>
                                                    </div>
                                                    <div class="animated zoomIn delay-3s">
                                                        <a href="{{ route('detail.page', $slide->slug) }}"
                                                            class="btn btn-primary btn-lg">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-6" style="padding-bottom:2%;">
                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($slides4 as $index => $slide)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $slide->feature_image) }}"
                                                    style="width:645px;height:340px;" class="d-block w-100"
                                                    alt="Slide {{ $index + 1 }}">
                                                <div class="carousel-caption d-md-block">
                                                    <div class="animated fadeInDown delay-1s">
                                                        <h2 class="display-2">{{ strtoupper($slide->title) }}</h2>
                                                    </div>
                                                    <div class="animated zoomIn delay-3s">
                                                        <a href="{{ route('detail.page', $slide->slug) }}"
                                                            class="btn btn-primary btn-lg">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6" style="padding-bottom:2%;">
                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($slides5 as $index => $slide)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $slide->feature_image) }}"
                                                    style="width:645px;height:340px;" class="d-block w-100"
                                                    alt="Slide {{ $index + 1 }}">
                                                <div class="carousel-caption d-md-block">
                                                    <div class="animated fadeInDown delay-1s">
                                                        <h2 class="display-2">{{ strtoupper($slide->title) }}</h2>
                                                    </div>
                                                    <div class="animated zoomIn delay-3s">
                                                        <a href="{{ route('detail.page', $slide->slug) }}"
                                                            class="btn btn-primary btn-lg">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="padding-top: 2%;padding-bottom:2%;">
                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($slides6 as $index => $slide)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $slide->feature_image) }}"
                                                    style="width:645px;height:340px;" class="d-block w-100"
                                                    alt="Slide {{ $index + 1 }}">
                                                <div class="carousel-caption d-md-block">
                                                    <div class="animated fadeInDown delay-1s">
                                                        <h2 class="display-2">{{ strtoupper($slide->title) }}</h2>
                                                    </div>
                                                    <div class="animated zoomIn delay-3s">
                                                        <a href="{{ route('detail.page', $slide->slug) }}"
                                                            class="btn btn-primary btn-lg">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fluid Section One -->
        <section class="fluid-section-one">
            <div class="outer-container clearfix">

                <!-- Image Column -->
                <div class="image-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <img style="width:654px;height:435px;" src="{{ asset('storage/' . $aboutUs->feature_image) }}"
                        alt="About Us">
                </div>

                <!-- Content Column -->
                <div class="content-column">
                    <div class="inner-column">
                        <!-- Section Title -->
                        <div class="sec-title">
                            <h2>{{ $aboutUs->title }}</h2>
                        </div>
                        <div class="text" style="text-align: justify;">
                            {!! $aboutUs->description !!}
                        </div>
                        <ul class="accordion-box">
                            @foreach ($aboutUs->items as $index => $item)
                                <!-- Block -->
                                <li class="accordion block {{ $loop->first ? 'active-block' : '' }} wow fadeInUp">
                                    <div class="acc-btn {{ $loop->first ? 'active' : '' }}">
                                        <div class="icon-outer">
                                            <span class="icon icon-plus fa fa-angle-right"></span>
                                        </div>
                                        {{ $item->heading }}
                                    </div>
                                    <div class="acc-content" style="{{ $loop->first ? 'display: block;' : 'display: none;' }}">
                                        <div class="content">
                                            <div class="text">{!! $item->content !!}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Fluid Section One -->

        <!-- Stories Section Two -->
        <section class="services-section-two">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="big-icon flaticon-settings-4"></div>
                    <!-- Sec Title -->
                    <div class="sec-title light wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        @php
                            $storySection = $homesectionsstories->first(); // Get the first record of type 'Stories'
                        @endphp

                        @if($storySection)
                            <div class="row clearfix">
                                <div class="pull-left col-xl-4 col-lg-5 col-md-12 col-sm-12">
                                    <h2>{{ $storySection->title }}</h2>
                                </div>
                                <div class="pull-left col-xl-8 col-lg-7 col-md-12 col-sm-12">
                                    <div class="text">{!! $storySection->description !!}</div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($stories->count())
                        <div class="three-item-carousel owl-carousel owl-theme">
                            @foreach($stories as $story)
                                <div class="services-block-two">
                                    <div class="inner-box">
                                        <div class="image">
                                            <a href="{{ route('detail.page', $story->slug) }}">
                                                <img style="width: 365px;height:205px;"
                                                    src="{{ asset('storage/' . $story->feature_image) }}"
                                                    alt="{{ $story->title }}" />
                                            </a>
                                        </div>
                                        <div class="lower-content">
                                            <h3><a href="{{ route('detail.page', $story->slug) }}">{{ $story->title }}</a></h3>
                                            <div class="text">{!! Str::limit(strip_tags($story->description), 150) !!}</div>
                                            <a href="{{ route('detail.page', $story->slug) }}" class="read-more">
                                                LEARN MORE <span class="arrow flaticon-next"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </section>
        <!-- End Stories Section Two -->
        <!-- Industries Section -->
        <section class="projects-section">
            <div class="auto-container">
                <!-- Sec Title -->
                @if($homesectionsindustries->count())
                    @foreach($homesectionsindustries as $section)
                        <div class="sec-title centered">
                            <h2>{{ $section->title }}</h2>
                            <div class="text">{!! $section->description !!}</div>
                        </div>
                    @endforeach
                @endif

                <div class="tab-container">
                    <!-- Tabs -->
                    <ul class="tab-links" style="justify-content: center;">
                        @foreach($industries as $key => $industry)
                            <li class="tab-link {{ $loop->first ? 'active' : '' }}" data-tab="tab-{{ $key }}">
                                {{ $industry->category->name }}
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        @foreach($industries as $key => $industry)
                            <div id="tab-{{ $key }}" class="tab-pane {{ $loop->first ? 'active' : '' }}">
                                <div class="row">
                                    <!-- Left Column: Content -->
                                    <div class="col-md-6">
                                        <h3 class="headingindustry">{{ $industry->category->name  }}</h3>
                                        @php
                                            $title = $industry->title;
                                            $categoryName = $industry->category->name;
                                            $categoryColor = $industry->category->color ?? '#2e59a8';

                                            // Check if the category name exists in the title
                                            if (strpos($title, $categoryName) !== false) {
                                                // Replace the category name with a span-wrapped version
                                                $styledTitle = str_replace($categoryName, "<span style='color: $categoryColor;'>$categoryName</span>", $title);
                                            } else {
                                                // If the category name is not in the title, display the title as is
                                                $styledTitle = $title;
                                            }
                                        @endphp

                                        <h3>{!! $styledTitle !!}</h3>

                                        <p>{!! $industry->description !!}</p>
                                        <a href="{{ route('detail.page', $industry->slug) }}" class="read-more special-btn">
                                            LEARN MORE <span class="arrow fas fa-angle-right"></span>
                                        </a>
                                    </div>
                                    <!-- Right Column: Image -->
                                    <div class="col-md-6">
                                        <img style="width:100%; height:auto; border-radius: 8px;"
                                            src="{{ asset('storage/' . $industry->feature_image) }}"
                                            alt="{{ $industry->title }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End Industries Section -->
        <!-- Touch with Us Section -->
        <section class="projects-section">
            <div class="auto-container">
                <div class="row">
                    <!-- Left Column: Content -->
                    <div class="col-md-7" style="background-image:url('images/Mask-group-10.png');">
                        <p class="touchus-heading">Get in Touch with Us and We’ll <span style="color: #2e59a8;">Help
                                You</span></p>
                        <p class="touchus-des">We’re committed to providing exceptional products/services and ensuring your
                            needs are met.
                            Whether you have inquiries, feedback, or you’re ready to collaborate, we’re excited to hear from
                            you.</p>
                        <ul class="contact-info-list-home">
                            <li><span class="icon icon-envelope-open"></span><strong>Email us</strong><a
                                    href="mailto:{{ $siteSettings->email ?? 'sales@klingerkloppe.com' }}"
                                    style="color: #0E1B1B;">{{ $siteSettings->email ?? 'sales@klingerkloppe.com'
                                    }}</a></li>
                            <li><span class="icon icon-call-in"></span><strong>Call Support</strong><a
                                    href="tel:{{ $siteSettings->phone ?? '+49-356-9368920' }}"
                                    style="color: #0E1B1B;">{{ $siteSettings->phone ?? '+49-356-9368920' }}</a></li>
                        </ul>
                    </div>
                    <!-- Right Column: Image -->
                    <div class="col-md-5" style="background-image:url('images/Mask-group-11.png');">
                        <div class="form-column col-lg-10 col-md-12 form-class">
                            <div class="inner-column wow fadeInRight animated" data-wow-delay="0ms"
                                style="visibility: visible; animation-delay: 0ms; animation-name: fadeInRight;">
                                <!-- Sec Title -->
                                <p class="form-heading">Get a <span style="color: #2e59a8;">FREE</span> Consultation</p>
                                <!-- Consultation Form -->
                                <div class="contact-form">
                                    <form method="POST" action="{{ route('consultation.store') }}">
                                        @csrf
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" name="projectname" placeholder="Project Name" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" name="name" placeholder="Name" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="email" name="email" placeholder="Email" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" name="phone" placeholder="Phone Number" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <textarea name="message" placeholder="Message" required></textarea>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <button class="theme-btn btn-style-five" type="submit">Send Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Touch with Us Section -->

    @elseif (request()->is('products'))
        <!--Page Title-->
        <section class="page-banner style-two"
            style="background-image:url('{{ asset('storage/' . $page->feature_image) }}');">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>{{ $page->title }}</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <!-- <li>What We Do</li> -->
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->

        <!-- Products Section Three -->
        <section class="services-section-three style-two">
            <div class="auto-container" style="text-align: justify;">
                <!-- Sec Title -->
                <div class="sec-title">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h2>Our Products</h2>
                        </div>
                        <div class="col-lg-8 col-md-12 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="text" style="text-align: justify;">{!! $page->content !!}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <!-- Products Block Three -->
                        <div class="services-block-three col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="image">
                                    <a href="{{ route('detail.page', $product->slug) }}">
                                        <img src="{{ asset('storage/' . $product->feature_image) }}" alt="{{ $product->title }}"
                                            style="width:412px;height:254px;" />
                                    </a>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="{{ route('detail.page', $product->slug) }}">{{ $product->title }}</a></h3>
                                    <div class="text">{!! Str::words(strip_tags($product->description), 50, '...') !!}</div>
                                    <a href="{{ route('detail.page', $product->slug) }}" class="read-more">LEARN MORE <span
                                            class="fas fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Products Section Three -->
    @elseif (request()->is('process-technologies'))
        <!--Page Title-->
        <section class="page-banner style-two"
            style="background-image:url('{{ asset('storage/' . $page->feature_image) }}');">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>{{ $page->title }}</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <!-- <li>What We Do</li> -->
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->

        <!-- Process Technologies Section Three -->
        <section class="services-section-three style-two">
            <div class="auto-container" style="text-align: justify;">
                <!-- Sec Title -->
                <div class="sec-title">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h2>{{ $page->title }}</h2>
                        </div>
                        <div class="col-lg-8 col-md-12 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="text" style="text-align: justify;">{!! $page->content !!}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($processes as $process)
                        <!-- Products Block Three -->
                        <div class="services-block-three col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="image">
                                    <a href="{{ route('detail.page', $process->slug) }}">
                                        <img src="{{ asset('storage/' . $process->feature_image) }}" alt="{{ $process->title }}"
                                            style="width:412px;height:254px;" />
                                    </a>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="{{ route('detail.page', $process->slug) }}">{{ $process->title }}</a></h3>
                                    <div class="text">{!! Str::words(strip_tags($process->description), 50, '...') !!}</div>
                                    <a href="{{ route('detail.page', $process->slug) }}" class="read-more">LEARN MORE <span
                                            class="fas fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
        <!-- End process Section Three -->
    @elseif (request()->is('investors'))
        <!--Page Title-->
        <section class="page-banner style-two"
            style="background-image:url('{{ asset('storage/' . $page->feature_image) }}');">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>{{ $page->title }}</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <!-- <li>What We Do</li> -->
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->
        <!-- Investors Section Three -->
        <section class="services-section-three style-two">
            <div class="auto-container" style="text-align: justify;">
                <!-- Sec Title -->
                <div class="sec-title">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h2>{{ $page->title }}</h2>
                        </div>
                        <div class="col-lg-8 col-md-12 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="text" style="text-align: justify;">{!! $page->content !!}</div>
                        </div>
                    </div>
                </div>
                <!-- Fun Facts Section -->
                <section class="fun-facts-section" style="background-image:url(images/background/4.png);">
                    <div class="auto-container">
                        <div class="title-style-one centered">
                            @php
                                $investorSection = $investors->first(); // Get the first record of type 'Stories'
                            @endphp
                            @if($investorSection)
                                <h2>{{ $investorSection->title }}</h2>
                                <div class="text">{!! $investorSection->description !!}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row clearfix">
                        <!-- Count Column -->
                        <div class="count-column col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="count-box">
                                    <!-- <div class="icon-container">
                                                                                                                                                                                    <i class="fas fa-check"></i>
                                                                                                                                                                                </div> -->
                                    <div class="count-outer"><span class="count-text" data-speed="2000"
                                            data-stop="165">0</span>M</div>
                                    <h4 class="counter-title">Green Energy Sector</h4>
                                </div>
                            </div>
                        </div>

                        <!-- Count Column -->
                        <div class="count-column col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="count-box">
                                    <!-- <div class="icon-container">
                                                                                                                                                                                    <i class="fas fa-user-friends"></i>
                                                                                                                                                                                </div> -->
                                    <div class="count-outer"><span class="count-text" data-speed="2000"
                                            data-stop="110">0</span>
                                    </div>
                                    <h4 class="counter-title">Employees</h4>
                                </div>
                            </div>
                        </div>

                        <!-- Count Column -->
                        <div class="count-column col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="count-box">
                                    <!-- <div class="icon-container">
                                                                                                                                                                                    <i class="fas fa-list-ul"></i>
                                                                                                                                                                                </div> -->
                                    <div class="count-outer"><span class="count-text" data-speed="2000"
                                            data-stop="35">0</span>
                                    </div>
                                    <h4 class="counter-title">Renewable Energy Projects</h4>
                                </div>
                            </div>
                        </div>

                        <!-- Count Column -->
                        <div class="count-column col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="count-box">
                                    <!-- <div class="icon-container">                                                                                        </div> -->
                                    <div class="count-outer"><span class="count-text" data-speed="2000"
                                            data-stop="43">0</span>
                                    </div>
                                    <h4 class="counter-title">Experience</h4>
                                </div>
                            </div>
                        </div>


                    </div>
                </section>
            </div>
        </section>
        <!-- Investor Section -->
        <!-- Stories Section Two -->
        <section class="services-section-two">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="big-icon flaticon-settings-4"></div>
                    <!-- Sec Title -->
                    <div class="sec-title light wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        @php
                            $storySection = $homesectionsstories->first(); // Get the first record of type 'Stories'
                        @endphp

                        @if($storySection)
                            <div class="row clearfix">
                                <div class="pull-left col-xl-4 col-lg-5 col-md-12 col-sm-12">
                                    <h2>{{ $storySection->title }}</h2>
                                </div>
                                <div class="pull-left col-xl-8 col-lg-7 col-md-12 col-sm-12">
                                    <div class="text">{!! $storySection->description !!}</div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($stories->count())
                        <div class="three-item-carousel owl-carousel owl-theme">
                            @foreach($stories as $story)
                                <div class="services-block-two">
                                    <div class="inner-box">
                                        <div class="image">
                                            <a href="{{ route('detail.page', $story->slug) }}">
                                                <img src="{{ asset('storage/' . $story->feature_image) }}"
                                                    alt="{{ $story->title }}" />
                                            </a>
                                        </div>
                                        <div class="lower-content">
                                            <h3><a href="{{ route('detail.page', $story->slug) }}">{{ $story->title }}</a></h3>
                                            <div class="text">{!! Str::limit(strip_tags($story->description), 150) !!}</div>
                                            <a href="{{ route('detail.page', $story->slug) }}" class="read-more">
                                                LEARN MORE <span class="arrow flaticon-next"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </section>
        <!-- End Stories Section Two -->
    @elseif (request()->is('careers'))
        <!--Page Title-->
        <section class="page-banner style-two"
            style="background-image:url('{{ asset('storage/' . $page->feature_image) }}');">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>{{ $page->title }}</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <!-- <li>What We Do</li> -->
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->
        <section class="fun-facts-section">
            <div class="auto-container">
                <div class="title-style-one centered">
                    {!! $page->content !!}
                </div>
            </div>
        </section>
        <!-- Careers Section -->
    @elseif (request()->is('contact-us'))
        <!--Page Title-->
        <section class="page-banner style-two"
            style="background-image:url('{{ asset('storage/' . $page->feature_image) }}');">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>{{ $page->title }}</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <!-- <li>What We Do</li> -->
                    </ul>
                </div>
            </div>
        </section>
        <section class="services-section-three style-two">
            <section class="contact-page-section">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!-- Info Column -->
                        <div class="info-column col-lg-4 col-md-12 col-sm-12">
                            <div class="inner-column wow fadeInLeft animated" data-wow-delay="0ms"
                                style="visibility: visible; animation-delay: 0ms; animation-name: fadeInLeft;">
                                <!-- Title Box -->
                                <div class="title-box">
                                    <h3>Contact US</h3>
                                    <div class="title-text">
                                        {!! $page->content !!}
                                    </div>
                                </div>
                                <ul class="contact-info-list">
                                    <li><span class="icon icon-home"></span><strong>Head
                                            Office</strong>{{ $siteSettings->address ?? 'Zimmern ob Rottweil, Germany' }}
                                    </li>
                                    <li><span class="icon icon-envelope-open"></span><strong>Email us</strong><a
                                            href="mailto:{{ $siteSettings->email ?? 'sales@klingerkloppe.com' }}"
                                            style="color: white;">{{ $siteSettings->email ?? 'sales@klingerkloppe.com'
                                            }}</a></li>
                                    <li><span class="icon icon-call-in"></span><strong>Call Support</strong><a
                                            href="tel:{{ $siteSettings->phone ?? '+49-356-9368920' }}"
                                            style="color: white;">{{ $siteSettings->phone ?? '+49-356-9368920' }}</a></li>
                                </ul>
                                <!-- Social Links -->
                                <ul class="social-links">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Form Column -->
                        <div class="form-column col-lg-8 col-md-12 col-sm-12">
                            <div class="inner-column wow fadeInRight animated" data-wow-delay="0ms"
                                style="visibility: visible; animation-delay: 0ms; animation-name: fadeInRight;">
                                <!-- Sec Title -->
                                <div class="sec-title">
                                    <h2>Send a Message</h2>
                                </div>

                                <!-- Contact Form -->
                                <div class="contact-form">
                                    <form method="POST" action="{{ route('contact.store') }}">
                                        @csrf
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" name="username" placeholder="First Name" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" name="lastname" placeholder="Last Name" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="email" name="email" placeholder="Email" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" name="phone" placeholder="Phone" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" name="company" placeholder="Company" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" name="subject" placeholder="Subject" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <textarea name="message" placeholder="Message" required></textarea>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <button class="theme-btn btn-style-five" type="submit">Send Now</button>
                                            </div>
                                        </div>
                                    </form>


                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- Contact Map Section -->
            <section class="contact-map-section">
                <div class="outer-container">
                    <div class="map-outer">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2456.7880541162117!2d8.493112975889302!3d51.992516575149736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ba3cc9c71b3819%3A0x8c5d2a9237098c82!2sG%C3%BCtersloher%20Str.%2077%2C%2033649%20Bielefeld%2C%20Germany!5e0!3m2!1sen!2s!4v1739050196940!5m2!1sen!2s"
                            width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </section>
            <!-- End Map Section -->
            <!-- End Contact Us Section -->
    @else
        <section class="hero-section">
            <div class="container">
                <h1>{{ $page->title }}</h1>
                <div class="page-content">
                    {!! $page->content !!} {{-- Render HTML content --}}
                </div>

            </div>
        </section>
    @endif
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tabs = document.querySelectorAll(".tab-links li");
        const tabPanes = document.querySelectorAll(".tab-pane");

        tabs.forEach(tab => {
            tab.addEventListener("click", function () {
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove("active"));
                // Add active class to clicked tab
                this.classList.add("active");

                // Hide all tab content
                tabPanes.forEach(pane => pane.classList.remove("active"));

                // Show the selected tab content
                const targetTab = this.getAttribute("data-tab");
                document.getElementById(targetTab).classList.add("active");
            });
        });
    });

</script>


@include('front.resources.footer')
