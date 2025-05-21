<!-- header-->
@include('front.resources.header')
<!--  header end -->
<!--  wrapper  -->
<div id="wrapper">
    <!-- content-->
    <div class="content">
        <!-- section-->
        <section class="flat-header color-bg adm-header">
            <div class="wave-bg wave-bg2"></div>
            <div class="container">
                <div class="dasboard-wrap fl-wrap">
                    <div class="dasboard-breadcrumbs breadcrumbs"><a href="#">Home</a><a
                            href="#">Dashboard</a><span>Profile page</span></div>
                    <!--dasboard-sidebar-->
                    <div class="dasboard-sidebar">
                        <div class="dasboard-sidebar-content fl-wrap">
                            <div class="dasboard-avatar">
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
                            </div>
                            <div class="dasboard-sidebar-item fl-wrap">
                                <h3>
                                    <span>Welcome </span>
                                    {{ $user->name }}
                                </h3>
                            </div>
                            <a href="{{ route('front.dashboard-add-hotels') }}" class="ed-btn">Add Property</a>
                            <div class="user-stats fl-wrap">
                                <ul>
                                    <li>
                                        Listings
                                        <span> {{ $totalProperties }}</span>
                                    </li>
                                    <li>
                                        Bookings
                                        <span>{{ $totalBookings }}</span>
                                    </li>
                                    <li>
                                        Reviews
                                        <span>{{ $totalReviews }}</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('user.logout') }}" class="log-out-btn color-bg">Log Out <i
                            class="far fa-sign-out"></i></a>
                        </div>
                    </div>
                    <!--dasboard-sidebar end-->
                    <!-- dasboard-menu-->
                    <div class="dasboard-menu">
                        <div class="dasboard-menu-btn color3-bg">Dashboard Menu <i class="fal fa-bars"></i></div>
                        <ul class="dasboard-menu-wrap">
                            <li>
                                <a href="{{ route('front.dashboard') }}" class="user-profile-act">
                                    <i class="far fa-user"></i>Profile
                                </a>
                                <ul>
                                    <li><a href="{{ route('front.dashboard-myprofile') }}">Edit profile</a></li>
                                    <li><a href="{{ route('front.dashboard-password') }}">Change Password</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('front.dashboard-property-listing') }}"><i class="far fa-th-list"></i> My listigs </a>
                                <ul>
                                    <li><a href="{{ route('front.dashboard-property-listing') }}">Active</a><span>{{ $totalActiveProperties }}</span></li>
                                    <li><a href="{{ route('front.dashboard-property-listing') }}">Inactive</a><span>{{ $totalInactiveProperties }}</span></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('front.dashboard-bookings') }}"> <i class="far fa-calendar-check"></i> Bookings
                                    <span>{{ $todayTotalBookings }}</span></a></li>
                            <li><a href="{{ route('front.dashboard-review') }}"><i class="far fa-comments"></i> Reviews </a></li>
                        </ul>
                    </div>
                    <!--dasboard-menu end-->
                </div>
            </div>
        </section>
        <!-- section end-->
        <!-- section-->
        <section class="middle-padding">
            <div class="container">
                <!--dasboard-wrap-->
                <div class="dasboard-wrap fl-wrap">
                    <!-- dashboard-content-->
                    <div class="dashboard-content fl-wrap">
                        <div class="box-widget-item-header">
                            <h3> Your Stats</h3>
                        </div>
                        <!-- chart-wra-->
                        <div class="chart-wrap dashboard-item fl-wrap">
                            <div class="chart-header fl-wrap">
                                <div class="listsearch-input-item">
                                    <select data-placeholder="Week" class="chosen-select no-search-select">
                                        <option>Week</option>
                                        <option>Month</option>
                                        <option>Year</option>
                                    </select>
                                </div>
                                <div id="myChartLegend"></div>
                            </div>
                            <canvas id="canvas-chart"></canvas>
                        </div>
                        <!--chart-wra end-->
                        <!-- dashboard-list-box-->
                        <div class="dashboard-list-box fl-wrap activities mat-top">
                            <div class="dashboard-header fl-wrap">
                                <h3>Recent Activities</h3>
                            </div>
                            <!-- dashboard-list end-->
                            <div class="dashboard-list">
                                <div class="dashboard-message">
                                    <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                    <div class="dashboard-message-text">
                                        <p><i class="far fa-check"></i> Your listing <a href="#">Park Central</a> has
                                            been approved! </p>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-list end-->
                            <!-- dashboard-list end-->
                            <div class="dashboard-list">
                                <div class="dashboard-message">
                                    <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                    <div class="dashboard-message-text">
                                        <p><i class="far fa-heart"></i>Someone bookmarked your <a href="#">Holiday
                                                Home</a> listing!</p>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-list end-->
                            <!-- dashboard-list end-->
                            <div class="dashboard-list">
                                <div class="dashboard-message">
                                    <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                    <div class="dashboard-message-text">
                                        <p><i class="fal fa-comments-alt"></i> Someone left a review on <a href="#">Park
                                                Central</a> listing!</p>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-list end-->
                            <!-- dashboard-list end-->
                            <div class="dashboard-list">
                                <div class="dashboard-message">
                                    <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                    <div class="dashboard-message-text">
                                        <p><i class="far fa-check"></i> Your listing <a href="#">Holiday Home</a> has
                                            been approved! </p>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-list end-->
                            <!-- dashboard-list end-->
                            <div class="dashboard-list">
                                <div class="dashboard-message">
                                    <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                    <div class="dashboard-message-text">
                                        <p><i class="far fa-heart"></i>Someone bookmarked your <a href="#">Moonlight
                                                Hotel</a> listing!</p>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-list end-->
                            <!-- dashboard-list end-->
                            <div class="dashboard-list">
                                <div class="dashboard-message">
                                    <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                    <div class="dashboard-message-text">
                                        <p><i class="fal fa-comments-alt"></i> Someone left a review on <a
                                                href="#">Grand Hero Palace</a> listing!</p>
                                    </div>
                                </div>
                            </div>
                            <!-- dashboard-list end-->
                        </div>
                        <!-- dashboard-list-box end-->
                    </div>
                    <!-- dashboard-list-box end-->
                </div>
                <!-- dasboard-wrap end-->
            </div>
        </section>
        <!-- section end-->
        <div class="limit-box fl-wrap"></div>
    </div>
    <!-- content end-->
</div>
<!--wrapper end -->
<!--footer -->
@include('front.resources.footer')
<!--footer end -->