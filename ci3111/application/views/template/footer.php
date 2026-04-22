<?php if (!empty($pengumuman)): ?>
    <div class="modal fade" id="announcementModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-success" id="announcementTitle"></h5>
                </div>
                <div class="modal-body">
                    <div id="announcementContent"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button id="prevBtn" class="btn btn-secondary">Sebelumnya</button>
                    <button class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button id="nextBtn" class="btn btn-secondary">Selanjutnya</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let announcements = <?= json_encode($pengumuman) ?>;
        let currentIndex = 0;

        function showAnnouncement(index) {
            document.getElementById('announcementTitle').innerText =
                announcements[index].judul;
            document.getElementById('announcementContent').innerHTML =
                announcements[index].isi;
        }

        document.getElementById('prevBtn').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + announcements.length) % announcements.length;
            showAnnouncement(currentIndex);
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % announcements.length;
            showAnnouncement(currentIndex);
        });

        document.addEventListener('DOMContentLoaded', () => {
            if (!sessionStorage.getItem('announcementsSeen') && announcements.length > 0) {
                showAnnouncement(0);
                new bootstrap.Modal(document.getElementById('announcementModal')).show();
                sessionStorage.setItem('announcementsSeen', '1');
            }
        });
    </script>
<?php endif; ?>

</main>

<footer id="footer" class="footer position-relative light-background">

    <div class="container">
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/typed.js/typed.umd.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="<?php echo base_url() ?>assets/js/main.js"></script>
<script src="<?php echo base_url() ?>assets/js/livesearch.js"></script>

</body>

</html>