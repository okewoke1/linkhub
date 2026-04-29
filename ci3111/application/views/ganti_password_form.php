<!-- Contact Section -->
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Ganti Password</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div>
                <form action="<?= site_url('auth/ganti_password/' . $this->session->userdata('id')) ?>" method="post" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="row gy-4">

                        <div class="col-md-12">
                            <label for="subject-field" class="pb-2">Password Lama</label>
                            <input type="password" class="form-control" name="password-lama" id="password-lama" required="">
                        </div>

                        <div class="col-md-12">
                            <label for="subject-field" class="pb-2">Password Baru</label>
                            <input type="password" class="form-control" name="password-baru" id="password-baru" required="">
                        </div>

                        <div class="col-md-12">
                            <label for="subject-field" class="pb-2">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" name="konfirmasi-password-baru" id="konfirmasi-password-baru" required="">
                        </div>

                        <div class="col-md-12 text-center">
                            <?php
                            if ($this->session->flashdata('pesan')) {
                                $message = $this->session->flashdata('pesan');
                                echo $message;
                            }
                            ?>

                            <button type="submit" class="btn" style="background-color:#149ddd;color:white;">Simpan</button>
                        </div>

                    </div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>

</section><!-- /Contact Section -->