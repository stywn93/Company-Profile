<main id="main">
  <!-- Breadcrumbs -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="<?= base_url('home/#hero') ?>">Home</a></li>
        <li>Blog</li>
      </ol>
      <h2>Blog</h2>
    </div>
  </section>

  <!-- Blog Section -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <!-- Blog Entries -->
        <div class="col-lg-8 entries">
          <?php foreach ($berita as $value): ?>
            <?php if ($value->status_berita === "Publish"): ?>
              <?php
                $isi = strip_tags($value->isi_berita);
                $isi = strlen($isi) > 200 ? substr($isi, 0, strrpos(substr($isi, 0, 200), ' ')) : $isi;
              ?>
              <div class="card mb-4 entry">
                <div class="entry-img">
                  <img src="<?= base_url('assets/img/berita/' . $value->gambar_berita) ?>" alt="" class="img-fluid mx-auto d-block">
                </div>
                <h2 class="entry-title">
                  <a href="<?= base_url('home/detail/' . $value->slug_berita) ?>"><?= esc($value->judul_berita) ?></a>
                </h2>
                <div class="entry-meta">
                  <ul>
                    <li><i class="bi bi-person"></i> <?= esc($value->nama) ?></li>
                    <li><i class="bi bi-clock"></i> <?= date('d-M-Y H:i', strtotime($value->date_cretated)) ?></li>
                    <li><i class="bi bi-chat-dots"></i> 12 Comments</li>
                  </ul>
                </div>
                <div class="entry-content">
                  <p><?= esc($isi) ?></p>
                  <div class="read-more">
                    <a href="<?= base_url('home/detail/' . $value->slug_berita) ?>">Read More</a>
                  </div>
                </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>

          <!-- Pagination -->
          <div class="blog-pagination">
            <ul class="justify-content-center">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
            </ul>
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

            <h3 class="sidebar-title">Kategori</h3>
            <div class="sidebar-item categories">
              <ul>
                <?php foreach ($kategori as $values): ?>
                  <li><a href="#"><?= esc($values->nama_kategori) ?> <span>(25)</span></a></li>
                <?php endforeach ?>
              </ul>
            </div>

            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
              <?php foreach ($lastst_berita as $value): ?>
                <?php if ($value->status_berita === "Publish"): ?>
                  <div class="post-item clearfix">
                    <img src="<?= base_url('assets/img/berita/' . $value->gambar_berita) ?>" alt="">
                    <h4><a href="<?= base_url('home/detail/' . $value->slug_berita) ?>"><?= esc($value->judul_berita) ?></a></h4>
                    <time datetime="<?= date('Y-m-d', strtotime($value->date_cretated)) ?>"><?= date('d-m-Y H:i', strtotime($value->date_cretated)) ?></time>
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