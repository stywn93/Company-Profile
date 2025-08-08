<main id="main">
  <!-- Breadcrumbs -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="<?= base_url('home/#hero') ?>">Home</a></li>
        <li><a href="<?= base_url('home/blog') ?>">Blog</a></li>
        <li><?= esc($detail->judul_layanan) ?></li>
      </ol>
      <h2><?= esc($detail->judul_layanan) ?></h2>
    </div>
  </section>

  <!-- Layanan Detail -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <!-- Konten Utama -->
        <div class="col-lg-8 entries">
          <div class="card entry entry-single">
            <div class="entry-img">
              <img src="<?= base_url('assets/img/layanan/' . $detail->gambar_layanan) ?>" alt="" class="img-fluid mx-auto d-block">
            </div>
            <h2 class="entry-title">
              <a href="#"><?= esc($detail->judul_layanan) ?></a>
            </h2>
            <div class="entry-content">
              <p><?= esc($detail->isi_layanan) ?></p>
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
          <div class="sidebar">
            <h3 class="sidebar-title">Search</h3>
            <div class="sidebar-item search-form">
              <form action="">
                <input type="text"><button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div>

            <h3 class="sidebar-title">Daftar Layanan</h3>
            <div class="sidebar-item recent-posts">
              <?php foreach ($layanan as $value): ?>
                <?php if ($value->status_layanan === "Publish"): ?>
                  <div class="post-item clearfix">
                    <img src="<?= base_url('assets/img/layanan/' . $value->gambar_layanan) ?>" alt="">
                    <h4>
                      <a href="<?= base_url('home/detaillayanan/' . $value->slug_layanan) ?>"><?= esc($value->judul_layanan) ?></a>
                    </h4>
                  </div>
                <?php endif ?>
              <?php endforeach ?>
            </div>

            <h3 class="sidebar-title">Tags</h3>
            <div class="sidebar-item tags">
              <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Tips</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>