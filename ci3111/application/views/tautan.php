<!-- Tautan Section -->
<section class="portfolio section light-background services">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?= $title ?></h2>
        <p><?= $desc ?></p>
    </div><!-- End Section Title -->

    <div class="container linkContainer">

        <div class="search-container" data-aos="fade-up">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="search-box" placeholder="Cari..." id="searchInput">
        </div>

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                <?php foreach ($tautan as $item): ?>
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?= $item->master_tim_id ?>">
                        <a href="<?= $item->url ?>" target="_blank" class="portfolio-link">
                            <div class="portfolio-content h-100">
                                <img src="<?= base_url($item->img_loc) ?>" class="img-fluid" alt="">
                            </div>
                            <div class="portfolio-desc">
                                <h4 class="title"><?= $item->nama ?></h4>
                                <p class="description"><?= $item->deskripsi ?></p>
                            </div>
                        </a>
                    </div><!-- End Portfolio Item -->
                <?php endforeach; ?>

            </div><!-- End Portfolio Container -->

        </div>

    </div>

</section><!-- /Tautan Section -->