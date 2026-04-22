<!-- skp Section -->
<section id="skp" class=" team section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?= $title ?></h2>
    </div><!-- End Section Title -->

    <div class="container skpContainer">

        <!-- <div class="search-container" data-aos="fade-up">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="search-box" placeholder="Cari..." id="searchInput">
        </div> -->

        <div class="row gy-4">

            <?php foreach ($skp as $item): ?>
                <div class="col-lg-4 card-column skp-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="<?= base_url($item->img_loc) ?>" loading="lazy" class="img-fluid"
                                alt=""></div>
                        <div class="member-info">
                            <h4><?= $item->nama ?></h4>
                            <span><?= $item->tim_nama ?></span>
                            <br>
                            <p>Folder Drive Bukti Dukung KiP App:</p>
                            <div class="social">
                                <a target="_blank" href="<?= $item->url ?>"
                                    target="_blank"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Member -->
            <?php endforeach; ?>

            <iframe src="<?= $item->url_ckp_bulanan ?>" width="100%" height="500px"></iframe>

        </div>

    </div>

</section><!-- /skp Section -->