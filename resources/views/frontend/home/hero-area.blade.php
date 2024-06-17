<style>
    .hero-area {
        padding: 10px 0 35px 0;
        /* Atur padding sesuai kebutuhan */
    }

    .hero-content {
        max-width: 800px;
        /* Atur lebar maksimum konten */
        margin: 0 auto;
        /* Center align konten */
    }

    .hero-content .section__title {
        font-size: 45px;
        /* Kurangi ukuran font */
        line-height: 1.2;
        /* Kurangi line-height */
    }

    .hero-content .section__desc {
        font-size: 16px;
        /* Kurangi ukuran font */
        line-height: 1.5;
        /* Kurangi line-height */
    }

    .hero-btn-box .btn,
    .hero-btn-box .btn-text {
        margin: 5px;
        /* Kurangi margin antara tombol */
    }

    .hero-slider-item {
        height: 80vh;
        /* Atur tinggi maksimum hero item */
        display: flex;
        align-items: center;
        /* Pusatkan konten secara vertikal */
    }

    .hero-bg-1,
    .hero-bg-2,
    .hero-bg-3 {
        background-size: cover;
        /* Pastikan gambar background cover */
        background-position: center;
        /* Pusatkan gambar background */
    }
</style>

<section class="hero-area">
    <div class=" owl-action-styled">
        <div class="hero-bg-1">
            <div class="container">
                <div class="hero-content">
                    <div class="section-heading">
                        <h2 class="section__title text-success fs-45 lh-60 pb-3">
                            Pelatihan Kesehatan 
                            <br> di Balai Pelatihan Kesehatan Provinsi Jambi</h2>
                        <p class="section__desc text-default pb-4">
                            Selamat datang pada kegiatan pelatihan kesehatan yang diselenggarakan oleh Balai <br>Pelatihan Kesehatan Provinsi Jambi. <br>
                            <br>Untuk memulai silahkan lihat video tutorial.
                        </p>
                    </div>

                    <!-- end section-heading -->
                    <div class="hero-btn-box d-flex flex-wrap align-items-center pt-1">
                        <a href="{{ route('login') }}" class="btn theme-btn mr-4 mb-4">Login <i class="la la-arrow-right icon ml-1"></i></a>
                        <a href="#" class="btn-text video-play-btn mb-4 text-danger" data-fancybox data-src="https://youtu.be/oWYuk9WR6J0?si=Mrjyidcp4H_QH56H">
                            Video Tutorial<i class="la la-play icon-btn ml-2"></i>
                        </a>
                    </div><!-- end hero-btn-box -->
                </div><!-- end hero-content -->
            </div><!-- end container -->
        </div><!-- end hero-slider-item -->

    </div><!-- end hero-slider -->
</section><!-- end hero-area -->