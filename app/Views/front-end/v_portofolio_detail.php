<main id="main">
  <!-- Breadcrumbs -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="<?= base_url('home') ?>">Home</a></li>
        <li><?= esc($portfolio->judul_portfolio) ?></li>
      </ol>
      <h2><?= esc($portfolio->judul_portfolio) ?></h2>
    </div>
  </section>

  <!-- Portfolio Details -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">
      <div class="row gy-4">
        <!-- Slider -->
        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper-container">
            <div class="swiper-wrapper align-items-center">
              <?php for ($i = 0; $i < 3; $i++): ?>
                <div class="swiper-slide">
                  <img src="<?= base_url('assets/img/portfolio/' . $portfolio->gambar_portfolio) ?>" alt="">
                </div>
              <?php endfor ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <!-- Info -->
        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Project Information</h3>
            <ul>
              <li><strong>Category</strong>: <?= esc($portfolio->nama_layanan) ?></li>
              <li><strong>Client</strong>: <?= esc($portfolio->nama_client) ?></li>
              <li><strong>Project Date</strong>: <?= (new DateTime($portfolio->date_project))->format('d F, Y') ?></li>
              <li><strong>Project URL</strong>: <a href="#"><?= esc($portfolio->website_portfolio) ?></a></li>
              <li><strong>Testimoni</strong>: <?= esc($portfolio->testimoni) ?></li>
            </ul>
          </div>
        </div>

        <!-- Deskripsi -->
        <div class="portfolio-description card card-info mt-4">
          <h2>Portfolio Detail</h2>
          <p><?= esc($portfolio->isi_portfolio) ?></p>
        </div>
      </div>
    </div>
  </section>
</main>