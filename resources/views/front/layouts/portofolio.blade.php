<section id="portfolio" class="portfolio sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Kategori Produk</h2>
            <p>Pengelolaan limbah yang efisien dan ramah lingkungan menjadi kebutuhan penting di era saat ini.
                SerbagunaBesar hadir sebagai solusi inovatif dalam kategori Produk Pengelolaan Limbah Terpadu. Dengan
                mengintegrasikan teknologi modern dan praktek-praktek berkelanjutan, SerbagunaBesar memungkinkan
                perusahaan dan komunitas untuk mengoptimalkan pengelolaan limbah mereka.</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

            <div>
                <ul class="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($categories as $category)
                        <li data-filter=".filter-{{ $category }}">{{ $category }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="row gy-4 portfolio-container">

                @foreach ($posts as $post)
                    @foreach ($post->categories as $category)
                        <div class="col-xl-4 col-md-6 portfolio-item filter-{{ $category->name }}">
                            <div class="portfolio-wrap">
                                <a href="{{ $post->postImage->first()->url }}" data-gallery="portfolio-gallery-app"
                                    class="glightbox" target="_blank">
                                    <img src="{{ $post->postImage->first()->url }}" class="img-fluid img-portfolio"
                                        alt="" style="width: 356px; height: 267px;">
                                </a>
                                <div class="portfolio-info">
                                    @php
                                        $whatsappMessage = 'Halo, saya tertarik dengan ' . $post->title . '. Berikut adalah gambar terkait: ' . $post->cta->cta_text . $post->postImage->first()->url . ' Apakah stok barang di atas masih tersedia?';
                                    @endphp
                                    <h4><a href="https://api.whatsapp.com/send?phone={{ $post->cta->cta_link }}&text={{ urlencode($whatsappMessage) }}"
                                            title="More Details" target="_blank">{{ $post->title }}</a></h4>
                                    <p>{!! $post->description !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach



                <!-- End Portfolio Item -->

                {{--  <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                    <div class="portfolio-wrap">
                        <a href="{{ URL::asset('front/img/portfolio/product-1.jpg') }}"
                            data-gallery="portfolio-gallery-app" class="glightbox"><img
                                src="{{ URL::asset('front/img/portfolio/product-1.jpg') }}" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Product 1</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
                    <div class="portfolio-wrap">
                        <a href="{{ URL::asset('front/img/portfolio/branding-1.jpg') }}"
                            data-gallery="portfolio-gallery-app" class="glightbox"><img
                                src="{{ URL::asset('front/img/portfolio/branding-1.jpg') }}" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Branding 1</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-books">
                    <div class="portfolio-wrap">
                        <a href="{{ URL::asset('front/img/portfolio/books-1.jpg') }}"
                            data-gallery="portfolio-gallery-app" class="glightbox"><img
                                src="{{ URL::asset('front/img/portfolio/books-1.jpg') }}" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Books 1</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <a href="{{ URL::asset('front/img/portfolio/app-2.jpg') }}"
                            data-gallery="portfolio-gallery-app" class="glightbox"><img
                                src="{{ URL::asset('front/img/portfolio/app-2.jpg') }}" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">App 2</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                    <div class="portfolio-wrap">
                        <a href="{{ URL::asset('front/img/portfolio/product-2.jpg') }}"
                            data-gallery="portfolio-gallery-app" class="glightbox"><img
                                src="{{ URL::asset('front/img/portfolio/product-2.jpg') }}" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Product 2</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
                    <div class="portfolio-wrap">
                        <a href="{{ URL::asset('front/img/portfolio/branding-2.jpg') }}"
                            data-gallery="portfolio-gallery-app" class="glightbox"><img
                                src="{{ URL::asset('front/img/portfolio/branding-2.jpg') }}" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Branding 2</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-books">
                    <div class="portfolio-wrap">
                        <a href="{{ URL::asset('front/img/portfolio/books-2.jpg') }}"
                            data-gallery="portfolio-gallery-app" class="glightbox"><img
                                src="{{ URL::asset('front/img/portfolio/books-2.jpg') }}" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Books 2</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <a href="{{ URL::asset('front/img/portfolio/app-3.jpg') }}"
                            data-gallery="portfolio-gallery-app" class="glightbox"><img
                                src="{{ URL::asset('front/img/portfolio/app-3.jpg') }}" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">App 3</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                    <div class="portfolio-wrap">
                        <a href="{{ URL::asset('front/img/portfolio/product-3.jpg') }}"
                            data-gallery="portfolio-gallery-app" class="glightbox"><img
                                src="{{ URL::asset('front/img/portfolio/product-3.jpg') }}" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Product 3</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
                    <div class="portfolio-wrap">
                        <a href="{{ URL::asset('front/img/portfolio/branding-3.jpg') }}"
                            data-gallery="portfolio-gallery-app" class="glightbox"><img
                                src="{{ URL::asset('front/img/portfolio/branding-3.jpg') }}" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Branding 3</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->

                <div class="col-xl-4 col-md-6 portfolio-item filter-books">
                    <div class="portfolio-wrap">
                        <a href="{{ URL::asset('front/img/portfolio/books-3.jpg') }}"
                            data-gallery="portfolio-gallery-app" class="glightbox"><img
                                src="{{ URL::asset('front/img/portfolio/books-3.jpg') }}" class="img-fluid"
                                alt=""></a>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html" title="More Details">Books 3</a></h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->  --}}

            </div><!-- End Portfolio Container -->

        </div>

    </div>
</section>
