<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">RESTECHNO</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= base_url('auth'); ?>">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead" style="background: url('vendor/creative/img/4.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold" style="text-shadow: 2px 2px black;">Let's Order Your Favourite Food Now</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5" style="text-shadow: 2px 2px black;">Di <b>RESTECHNO</b> Anda Dapat Memesan Makanan Atau Minuman Yang Anda Inginkan, Tanpa Harus Datang Ke Tempat.</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">We've got what you need!</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">Kami Berusaha Membuat Anda Semudah Mungkin Untuk Memesan Makanan Dengan Tidak Memakan Banyak Waktu, Lihat Pelayanan Kami!</p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">Our Service</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-hamburger text-primary mb-4"></i>
            <h3 class="h4 mb-2">Food</h3>
            <p class="text-muted mb-0">Kami Memiliki Menu Dari Berbagai Daerah Di Indonesia.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-mug-hot text-primary mb-4"></i>
            <h3 class="h4 mb-2">Drink</h3>
            <p class="text-muted mb-0">Kami Menyediakan Minuman Dari Bahan Bahan Terbaik.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-user-circle text-primary mb-4"></i>
            <h3 class="h4 mb-2">A Professional Chef</h3>
            <p class="text-muted mb-0">Kami Memiliki Chef Yang Professional Dan Bersertifikat.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-motorcycle text-primary mb-4"></i>
            <h3 class="h4 mb-2">A Friendly Driver</h3>
            <p class="text-muted mb-0">Kami Menjamin Pesanan Anda Sampai Ke Tujuan</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?= base_url('vendor/creative/') ?>img/portfolio/fullsize/burger.jpg">
            <img class="img-fluid" src="<?= base_url('vendor/creative/') ?>img/portfolio/thumbnails/burger.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Fast Food
              </div>
              <div class="project-name">
                Hamburger
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?= base_url('vendor/creative/') ?>img/portfolio/fullsize/bbq.jpg">
            <img class="img-fluid" src="<?= base_url('vendor/creative/') ?>img/portfolio/thumbnails/bbq.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Meat
              </div>
              <div class="project-name">
                Chicken Barbeque
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?= base_url('vendor/creative/') ?>img/portfolio/fullsize/dessert.jpg">
            <img class="img-fluid" src="<?= base_url('vendor/creative/') ?>img/portfolio/thumbnails/dessert.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Dessert
              </div>
              <div class="project-name">
                Sweet Cake
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?= base_url('vendor/creative/') ?>img/portfolio/fullsize/seafood.jpg">
            <img class="img-fluid" src="<?= base_url('vendor/creative/') ?>img/portfolio/thumbnails/seafood.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Seafood
              </div>
              <div class="project-name">
                Fresh Crab
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?= base_url('vendor/creative/') ?>img/portfolio/fullsize/coffee.jpg">
            <img class="img-fluid" src="<?= base_url('vendor/creative/') ?>img/portfolio/thumbnails/coffee.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Hot Drink
              </div>
              <div class="project-name">
                Cappuccino
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?= base_url('vendor/creative/') ?>img/portfolio/fullsize/juice.jpg">
            <img class="img-fluid" src="<?= base_url('vendor/creative/') ?>img/portfolio/thumbnails/juice.jpg" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-category text-white-50">
                Cold Drink
              </div>
              <div class="project-name">
                Juice
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">Klik Tombol Di Bawah Untuk Login Dan Melihat Menu Lainnya!</h2>
      <a class="btn btn-light btn-xl" href="<?= base_url('auth') ?>">Login Now!</a>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+1 (202) 555-0149</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
        </div>
      </div>
    </div>
  </section>