
@extends('frontend/layouts.pop')
@extends('frontend/layouts.template')

@section('content')
<style>
    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0,0,0,.3);
        padding: 20px;
        /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); */
    }
</style>
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(frontend/assets/img/slide/slide-1.jpg)">
          <div class="container">
            <h2>Selamat Datang di <span>Klinik Giri Husada</span></h2>
            <p>Sistem informasi berbasis website berupa klinik online yang berguna untuk meningkatkan operasional 
              dalam pengelolaan berkas klinik secara menyeluruh serta memberikan pelayanan yang optimal kepada pasien.</p>
            <a href="#about" class="btn-get-started scrollto">Selengkapnya</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(frontend/assets/img/slide/slide-2.jpg)">
          <div class="container">
            <h2>Tujuan Sistem Klinik Online</h2>
            <p>Dapat membantu petugas klinik dalam mengelola data pasien, obat-obatan, keuangan, serta laporan untuk meningkatkan efisiensi dan efektivitas kerja. Serta membantu memastikan bahwa 
              informasi medis pasien tersimpan dan terakses dengan aman dan tepat waktu.</p>
            <a href="#about" class="btn-get-started scrollto">Selengkapnya</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(frontend/assets/img/slide/slide-3.jpg)">
          <div class="container">
            <h2>Target Sistem Klinik Online</h2>
            <p>Target pembuatan sistem Klinik Online yakni diperuntukkan kepada Direktur, staff beserta dokter 
              dari Klinik Giri Husada guna meningkatkan kualitas layanan kepada pasien dengan cepat dan akurat.</p>
            <a href="#about" class="btn-get-started scrollto">Selengkapnya</a>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

<!-- ======= Pengumuman Section ======= -->
<!-- <section id="pengumuman">
  
<div class="container">

<h2>Pengumuman</h2>
<p>5-Juli-2023</p>
<h3>Pengumuman akan tersedia</h3>
</div>

</section>End Pengumuman -->


<!-- ======= Post Grid Section ======= -->
<section id="posts" class="posts">
<div class="container">
    <h1>Pengumuman</h1>
    <hr>
    <div class="row row-cards">
    @if(isset($notification))
    <div class="alert alert-warning">
        {{ $notification }}
    </div>
      @endif
      <div class="container">
    <div class="row">
        @foreach ($pengumuman as $item)
            <div class="col-lg-4 mb-4">
                <div class="card position-relative">
                    <div class="card-img-top-container" >
                        <img src="{{ asset('/storage/pengumuman/'.$item->pengumuman_gambar) }}" class="card-img-top" alt="{{ $item->pengumuman_judul }}" style="width: 100%; height: 100%;">
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="d-flex align-items-center mb-2">
                                <label for="judul" class="mr-2 font-weight-bold">Judul :</label>
                                <h5 class="card-title mb-0">{{ $item->pengumuman_judul }}</h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="font-weight-bold">Deskripsi :</label>
                            <p class="card-text font-weight-bold">{{ $item->pengumuman_deskripsi }}</p>
                        </div>
                        <div class="form-group">
                            <div class="d-flex align-items-center mb-2">
                                <label for="tanggal" class="mr-2 font-weight-bold">Tanggal :</label>
                                <span class="card-title mb-0">{{ $item->pengumuman_tanggal }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>




        
    </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnify.js') }}"></script>
<script>
    $(function() {
        $('[data-magnify]').magnify();
    });
</script>
</section><!-- End Cta Section -->



</div> <!-- End .row -->
</div>
</section> <!-- End Post Grid Section -->


    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Dalam keadaan darurat? Butuh bantuan sekarang?</h3>
          <p>Kami juga menyediakan jasa antar jemput pasien bagi pasien yang sedang dalam keadaan darurat dan memang 
            segera membutuhkan bantuan. </br>Dengan adanya layanan ini, calon pasien tidak perlu bingung lagi untuk melakukan pengobatan ataupun rawat inap.</p>
          <a class="cta-btn scrollto" href="">Hubungi Via WhatsApp</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

     <!-- ======= About Us Section ======= -->
     <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang Kami</h2>
          <p>Klinik Online adalah sistem website berupa klinik online yang diperuntukkan untuk semua petugas klinik dalam mengelola operasional klinik, seperti 
            membantu dalam mengelola data pasien, obat-obatan, keuangan, serta laporan untuk meningkatkan efisiensi dan efektivitas kerja.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="frontend/assets/img/tentang.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Pada sistem website ini mempunyai beberapa fitur yang dapat membantu untuk mengelola kebutuhan petugas klinik</h3>
            <p class="fst-italic">
              Adapun fitur-fitur pada sistem website klinik online yaitu, sebagai berikut :
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Login dan Menambahkan Akun.</li>
              <li><i class="bi bi-check-circle"></i> Pengelompokan Data Pasien</li>
              <li><i class="bi bi-check-circle"></i> Riwayat Data Pasien</li>
              <li><i class="bi bi-check-circle"></i> Kelola Data Admin</li>
              <li><i class="bi bi-check-circle"></i> Kelola Data Pelayanan</li>
              <li><i class="bi bi-check-circle"></i> Kelola Data Pekerja</li>
              <li><i class="bi bi-check-circle"></i> Kelola Data Gaji</li>
              <li><i class="bi bi-check-circle"></i> Rekam Medis</li>
            </ul>
            <p>
              Dengan adanya sistem website klinik online dapat membantu rumah pihak klinik dalam memberikan layanan yang baik dan tepat waktu kepada pasien melalui akses informasi 
              medis yang tepat dan akurat
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Poli Pelayanan</h2>
          <p>Sesuai dengan data dari klinik Giri Husada, 
            terdapat beberapa poli pelayanan yang bisa dipilih pasien sesuai dengan keluhan penyakitnya.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="fa-solid fa-kit-medical"></i></div>
            <h4 class="title"><a href="">Poli Umum</a></h4>
            <p class="description">Pelayanan kedokteran berupa pemeriksaan kesehatan, 
              pengobatan dan penyuluhan kepada pasien.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="fa-solid fa-person-breastfeeding"></i></div>
            <h4 class="title"><a href="">Poli Kesehatan Ibu & Anak</a></h4>
            <p class="description">Pelayanan rawat jalan di bidang kesehatan yang menyangkut pelayanan dan pemeliharaan ibu hamil, ibu menyusui, bayi dan anak balita</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="fa-solid fa-tooth"></i></div>
            <h4 class="title"><a href="">Poli Gigi</a></h4>
            <p class="description">Pelayanan kesehatan gigi merupakan pemeriksaan kesehatan gigi, 
            pengobatan dan pemberian tindakan medis dasar kesehatan gigi, seperti penambalan gigi, pencabutan gigi dan pembersihan karang gigi.</p>
          </div>
        </div>

      </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Doctors Section ======= -->
    <!-- <section id="doctors" class="doctors section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Dokter</h2>
        </div>

        <div class="d-flex justify-content-center">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch m-5">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="frontend/assets/img/doctors/doctors-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Dr. Yanuar Wisnu Wardhana</h4>
                <span>Dokter Umum</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch m-5">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="frontend/assets/img/doctors/doctors-3.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Dr. Tri Abdi Rahman</h4>
                <span>Dokter Umum</span>
              </div>
            </div>
          </div>

         

        </div>
        <div class="section-title">
          <h2>Bidan</h2>
        </div>
        <div class="d-flex justify-content-center">

<div class="col-lg-3 col-md-6 d-flex align-items-stretch m-5">
  <div class="member" data-aos="fade-up" data-aos-delay="100">
    <div class="member-img">
      <img src="frontend/assets/img/doctors/doctors-2.jpg" class="img-fluid" alt="">
    </div>
    <div class="member-info">
      <h4>Ayu Cahyani,S.Tr.Keb.</h4>
      <span>Bidan Klinis</span>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6 d-flex align-items-stretch m-5">
  <div class="member" data-aos="fade-up" data-aos-delay="200">
    <div class="member-img">
      <img src="frontend/assets/img/doctors/doctors-4.jpg" class="img-fluid" alt="">
    </div>
    <div class="member-info">
      <h4>Jumiati, Amd.Keb.</h4>
      <span>Bidan</span>
    </div>
  </div>
</div>


</div>
======= Perawat ======= -->
<!-- <div class="section-title">
      <h2>Perawat</h2>
      <p></p>
    </div>

    <div class="row">


      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="200">
          <div class="member-img">
            <img src="frontend/assets/img/doctors/doctors-2.jpg" class="img-fluid" alt="">
            
          </div>
          <div class="member-info">
          <h4>Ucik Anggraini, A. Md. Kep</h4>
            <span>Perawat</span>
          </div>
        </div>
      </div>


      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="400">
          <div class="member-img">
            <img src="frontend/assets/img/doctors/doctors-4.jpg" class="img-fluid" alt="">
            
          </div>
          <div class="member-info">
            <h4>Kristin Mardiana, A.Md.Kep.</h4>
            <span>Perawat</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="200">
          <div class="member-img">
            <img src="frontend/assets/img/doctors/doctors-2.jpg" class="img-fluid" alt="">
            
          </div>
          <div class="member-info">
            <h4>Novita Zulfatus Nafis, A.Md.Kep </h4>
            <span>Perawat</span>
          </div>
        </div>
      </div>


      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="400">
          <div class="member-img">
            <img src="frontend/assets/img/doctors/doctors-4.jpg" class="img-fluid" alt="">
            
          </div>
          <div class="member-info">
            <h4>Ramania Tri Rahayu, A.Md.Kep</h4>
            <span>Perawat</span>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch m-3">
        <div class="member" data-aos="fade-up" data-aos-delay="400">
          <div class="member-img">
            <img src="frontend/assets/img/doctors/doctors-4.jpg" class="img-fluid" alt="">
            
          </div>

          <div class="member-info">
            <h4>Siti Nurul Chomariyah, S.Kep.,Ns</h4>
            <span>Perawat</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch m-3">
        <div class="member" data-aos="fade-up" data-aos-delay="400">
          <div class="member-img">
            <img src="frontend/assets/img/doctors/doctors-3.jpg" class="img-fluid" alt="">
            
          </div>
          <div class="member-info">
          <h4>Dedik Arifandi</h4>
            <span>Perawat (Non Ners)</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch m-3">
        <div class="member" data-aos="fade-up" data-aos-delay="400">
          <div class="member-img">
            <img src="frontend/assets/img/doctors/doctors-4.jpg" class="img-fluid" alt="">
            
          </div>
          <div class="member-info">
            <h4>Vidya Yuningsih, A.Md.Kep</h4>
            <span>Perawat</span>
          </div>
        </div>
      </div>
Perawat

      </div>
    </section>End Doctors Section -->

    <!-- ======= Gallery Section ======= -->
    <!-- <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up"> -->

        <!-- <div class="section-title">
        <h2>Galeri Layanan Kesehatan</h2>
          <p>Berikut adalah dokumentasi layanan kesehatan dari Klinik Giri Husada sebagai penunjang untuk Anda dalam melakukan pengobatan.</p>
        </div> -->

        <!-- <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="gallery-lightbox" ><img src="frontend/assets/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" ><img src="frontend/assets/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" ><img src="frontend/assets/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" ><img src="frontend/assets/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" ><img src="frontend/assets/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" ><img src="frontend/assets/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" ><img src="frontend/assets/img/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" ><img src="frontend/assets/img/gallery/gallery-8.jpg" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div> -->

      </div>
    </section><!-- End Gallery Section -->

     <!-- ======= Frequently Asked Questioins Section ======= -->
     <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pertanyaan Yang Sering Diajukan</h2>
          <p>Berikut adalah daftar pertanyaan umum dan jawaban yang sering diajukan terkait topik yang ditentukan :</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="accordion wow fadeInLeftBig" id="accordionExample" data-wow-duration="3s" data-wow-delay="0.5s">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Apa alasan memilih topik Kesehatan pelayanan Klinik Giri Husada untuk aplikasi ini ?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Alasannya karena pelayanan kesehatan pada Klinik Giri Husada masih terbatas dalam hal pendaftaran pasien baru masih manual, 
                    konsultasi dokter tentang penyakit pasien terbatas, dan pelayanan obat dari apoteker masih menggunakan data manual tulis tangan yang ditulis oleh Dokter
                    Oleh karena itu dengan adanya aplikasi Klinik Online ini, 
                    dapat membuat masyarakat sekitar lebih mudah dalam melakukan pengobatan dan merasakan layanan kesehatan lebih cepat.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Apakah sistem bisa membuatkan rekam medis untuk pasien yang berobat?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Bisa, Pada sistem Klinik Online ini kami menyediakan fitur rekam medis untuk memudahkan dalam melakukan pencatatan data pasien baru.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Apakah sistem ini bisa merekap slip gaji setiap bulan?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Bisa, Kami juga menyediakan fitur untuk merekap slip gaji setiap bulannya dengan cara menambah data dan menampilkan rekapan berupa tabel.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Apakah sistem ini sudah bisa melakukan pembayaran online ?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Untuk pembayaran online tidak tersedia. Sistem pada aplikasi Klinik Online yakni berfungsi untuk melakukan pengantrian nomor pasien online, 
                    input data pasien, tips tentang kesehatan, dan penambahan pasien baru dalam satu Kartu Keluarga.
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Mengapa tidak membuat sistem layanan kesehatan untuk seluruh Klinik atau Rumah Sakit di daerah Nganjuk ?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Alasan kami tidak membuat sistem layanan kesehatan untuk seluruh Klinik atau Rumah Sakit di daerah Nganjuk, 
                    yaitu karena tentunya setiap permintaan fitur layanan kesehatan di Klinik atau Rumah Sakit berbeda-beda. 
                    Oleh karena itu kami membatasi hal tersebut dengan hanya terpacu pada Klinik Giri Husada.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="faq-image wow fadeInRightBig" data-wow-duration="3s" data-wow-delay="0.5s">
              <img src="frontend/assets/img/faq.png" alt="">
            </div>
          </div>

      </div>
    </section><!-- End Frequently Asked Questioins Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Kontak</h2>
          <p>Untuk informasi lebih lanjut bisa hubungi kontak atau langsung datang ke lokasi Klinik Giri Husada dibawah ini.</p>
        </div>

      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.644212113969!2d111.8677031!3d-7.613637499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e784b3771ab14b5%3A0x30d1a0690c9b89bc!2sKlinik%20Giri%20Husada!5e0!3m2!1sen!2sid!4v1680676117232!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" allowfullscreen></iframe>
      </div>
<!-- End Contact Section -->
  </main><!-- End #main -->
  @endsection