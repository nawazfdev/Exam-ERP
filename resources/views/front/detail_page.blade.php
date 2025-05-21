@include('front.resources.header')

<div class="content">
    <!-- Page Title -->
    <section class="page-banner" style="background-image:url('{{ asset('storage/' . $item->feature_image) }}');">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>{{ $item->title ?? 'Detail Page' }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>{{ $item->title ?? 'Detail' }}</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Sidebar -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar padding-right">
                        <div class="sidebar-widget categories-two">
                            <div class="widget-content">
                                <ul class="services-categories">
                                    @foreach($models as $key => $model)
                                        <li class="{{ $type == $key ? 'active' : '' }}">
                                            <a href="{{ route('pages.show', $key) }}">{{ ucfirst($key) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Support Widget -->
                        <div class="sidebar-widget support-widget">
                            <div class="widget-content">
                                <span class="icon flaticon-telephone-1"></span>
                                <div class="text">Got any Questions? <br> Call us Today!</div>
                                <div class="number">1-800-369-8527</div>
                                <div class="email"><a href="mailto:support@solustrid.net">support@solustrid.net</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="services-detail">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset($item->feature_image ? 'storage/' . $item->feature_image : 'images/default.png') }}" alt="{{ $item->title }}" />
                            </div>
                            <div class="lower-content" style="text-align: justify;">
                                <div class="title-box">
                                    <h2>{{ $item->title }}</h2>
                                </div>
                                <div class="text">
                                    {!! $item->description ?? 'No details available for this item.' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('front.resources.footer')
