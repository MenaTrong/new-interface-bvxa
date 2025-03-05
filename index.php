<?php get_header(); ?>

<?php
$ad_image_url = get_option('ad_image_url');
if ($ad_image_url): ?>
    <div id="advertisement-modal" class="ads modal-overlay">
        <div class="modal-content">
            <button id="close-ad" class="close-button">&times;</button>
            <img src="<?php echo esc_url($ad_image_url); ?>" alt="Ảnh quảng cáo" class="img-fluid modal-image">
        </div>
    </div>
<?php endif; ?>


<!-- Start banner -->
<?php get_template_part('bannerbvxa'); ?>
<!-- End banner -->
<main>

    <!-- Other -->
    <?php get_template_part('slide'); ?>
    <?php get_template_part('clinicindex'); ?>
    <?php get_template_part('departmentindex'); ?>
    <?php get_template_part('expertindex'); ?>
    <?php get_template_part('newsindex'); ?>

    <!-- ======= FAQ Section ======= -->
    <section id="faqs" class="cta">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 d-flex align-items-center">
                    <div class="">
                        <img src="<?php bloginfo('template_directory') ?>/Images/logo-2.2.png" alt="Ảnh logo"
                            class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center">
                    <h3>Chúng tôi có thế giúp gì cho bạn?</h3>
                    <div class="accordion accordion-flush mt-3" id="accordionExample">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Tôi có thể đi tới Bệnh Đa khoa Xuyên Á bằng cách nào?
                                </button>
                            </h4>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Địa chỉ cơ sở ở 4 tỉnh thành:</p>
                                    <p class="m-l-20">TP. Hồ Chí Minh: 42 QL22, ấp Chợ, Củ Chi, Thành phố Hồ Chí Minh,
                                        Việt Nam</p>
                                    <p class="m-l-20">Vĩnh Long: 68e Đ. Phạm Hùng, Phường 9, Vĩnh Long, Việt Nam</p>
                                    <p class="m-l-20">Tây Ninh: Thanh Phước, Gò Dầu, Tây Ninh, Việt Nam</p>
                                    <p class="m-l-20">Long An: QLN2, TT. Hậu Nghĩa, Đức Hòa, Long An, Việt Nam</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Tôi sẽ mất thời gian bao lâu?
                                </button>
                            </h4>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Quá trình khám bệnh của quý vị thông thường sẽ kéo dài trong khoảng 1-3
                                        tiếng,
                                        tùy thuộc vào tình trạng bệnh, số lượng chỉ định cận lâm sàng và số lượng
                                        bệnh
                                        nhân khám trong ngày. Với các bệnh nhân có kết quả khám bất thường hoặc cần
                                        phải
                                        làm thêm các xét nghiệm chuyên sâu, thời gian khám có thể kéo dài hơn.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Giá các dịch vụ khám và chỉ định xét nghiệm có thể áp dụng bảo hiểm không?
                                </button>
                            </h4>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Bệnh nhân có bảo hiểm y tế và có giấy chuyển đúng tuyến đều được hưởng bảo
                                        hiểm y tế như quy định.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ Section -->

    <?php get_template_part('modal'); ?>

</main>

<!-- Chèn băng rôn logo -->
<?php include('loginsurances.php'); ?>

<?php get_footer() ?>
<script>
    // Khi trang web tải xong
    window.onload = function () {
        var modal = document.getElementById("advertisement-modal");
        var closeButton = document.getElementById("close-ad");

        // Hiển thị modal quảng cáo
        modal.style.display = "flex";

        // Khi người dùng nhấn vào nút đóng
        closeButton.onclick = function () {
            modal.style.display = "none"; // Ẩn quảng cáo
        }

        // Khi người dùng nhấp ra ngoài modal, đóng modal
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    }
</script>

</body>

</html>