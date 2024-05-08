<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{ $appsetting->Website_name ?? 'Website name' }}</h4>
                    <div class="footer-underline"></div>
                    <p>
                        Loren Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Sitemaps</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="{{ url('/new-arrivals') }}" class="text-white">New Arrivals
                            Products</a></div>
                    <div class="mb-2"><a href="{{ url('/Featured') }}" class="text-white">Featured Products</a></div>
                    <div class="mb-2"><a href="{{ url('/cart') }}" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{ $appsetting->Address ?? 'Website Address' }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $appsetting->Phone1 ?? '+963 xxx xxx xxx' }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{ $appsetting->Email_ID ?? 'Website@email.com' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - Hamze Abo Issa IT - Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        @if ($appsetting->Facebook)
                            <a href="{{ $appsetting->Facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if ($appsetting->Twitter)
                            <a href="{{ $appsetting->Twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if ($appsetting->Instagram)
                            <a href="{{ $appsetting->Instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if ($appsetting->YouTube)
                            <a href="{{ $appsetting->YouTube }}" target="_blank"><i class="fa fa-youtube-play"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
