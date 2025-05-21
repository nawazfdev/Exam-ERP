<!--Main Footer-->
<footer class="main-footer">
    <div class="large-container">

        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">

                <!--big column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget about-widget">
                                <div class="logo">
                                    <a href="{{ url('/') }}">
                                        <img src="images/f-logo.png" alt="Logo" />
                                    </a>
                                </div>
                                <div class="text" style="text-align: justify;">
                                    {{ $siteSettings->meta_description ?? 'Revolutionize your industry with our advanced process technology solutions. We’re your innovation partner, customizing excellence for your unique needs. Explore efficiency, embrace sustainability, and lead the way to a brighter future with us.' }}
                                </div>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget services-widget">
                                <h2>Services</h2>
                                <ul class="footer-service-list">
                                    <li><a href="#">{{ $siteSettings->service_1 ?? 'Green Energy' }}</a></li>
                                    <li><a href="#">{{ $siteSettings->service_2 ?? 'Petrochemicals' }}</a></li>
                                    <li><a href="#">{{ $siteSettings->service_3 ?? 'Process Technologies' }}</a></li>
                                    <li><a href="#">{{ $siteSettings->service_4 ?? 'Consulting' }}</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <!--big column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget post-widget">
                                <h2>Company</h2>
                                <ul class="footer-service-list">
                                    @foreach ($pages as $page)
                                        <li><a href="{{ url($page->slug) }}">{{ $page->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget contact-widget">
                                <h2>Our Location</h2>
                                <ul class="footer-service-list">
                                    <li>{{ $siteSettings->address ?? 'Zimmern ob Rottweil, Germany' }}</li>
                                </ul>
                                <h2>Contact</h2>
                                <div class="number">{{ $siteSettings->phone ?? '+49-356-9368920' }}</div>
                                <ul>
                                    <li><a href="mailto:{{ $siteSettings->email ?? 'sales@klingerkloppe.com' }}"
                                            style="color: white;">{{ $siteSettings->email ?? 'sales@klingerkloppe.com'
                                            }}</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="clearfix">
                <div class="meta-copyright-content">
                    {!! $siteSettings->meta_copyright !!}
                </div>
                <div class="pull-right">
                    <!-- Social Links -->
                    <ul class="social-links">
                        <li><a href="{{ $siteSettings->facebook_link ?? '#' }}"><span
                                    class="fab fa-facebook-f"></span></a></li>
                        <li><a href="{{ $siteSettings->google_plus_link ?? '#' }}"><span
                                    class="fab fa-google-plus-g"></span></a></li>
                        <li><a href="{{ $siteSettings->twitter_link ?? '#' }}"><span class="fab fa-twitter"></span></a>
                        </li>
                        <li><a href="{{ $siteSettings->linkedin_link ?? '#' }}"><span
                                    class="fab fa-linkedin-in"></span></a></li>
                        <li><a href="{{ $siteSettings->youtube_link ?? '#' }}"><span class="fab fa-youtube"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</footer>


</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
<!--Scroll to top-->

<!-- jQuery and Bootstrap -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Revolution Slider -->
<script src="{{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('js/main-slider-script.js') }}"></script>


<!-- Additional Scripts -->
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/validate.js') }}"></script>
<script src="{{ asset('js/owl.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>
<script src="{{ asset('js/appear.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<!--Google Map APi Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcaOOcFcQ0hoTqANKZYz-0ii-J0aUoHjk"></script>
<script src="js/map-script.js"></script>
<!--End Google Map APi-->
</body>

</html>