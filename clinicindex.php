<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="justify-content-center align-items-center text-center">
            <div class="row">
                <?php
                // WP Query để lấy tất cả bài viết của Custom Post Type 'base'
                $args = array(
                    'post_type' => 'base',  // Custom Post Type 'base'
                    'posts_per_page' => -1,  // Hiển thị tất cả các bài viết
                );
                $lich_phong_kham_query = new WP_Query($args);

                if ($lich_phong_kham_query->have_posts()):
                    while ($lich_phong_kham_query->have_posts()):
                        $lich_phong_kham_query->the_post();
                        $link = get_post_meta(get_the_ID(), 'link_lich_phong_kham', true);  // Đảm bảo lấy đúng trường link
                        $ten_chi_nhanh = get_post_meta(get_the_ID(), 'ten_chi_nhanh', true);  // Đảm bảo lấy đúng tên chi nhánh
                        ?>
                        <div class="clinic-box col-lg-3">
                            <div class="portfolio-wrap">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                                <?php endif; ?>
                                <span class="department-span">Lịch phòng khám</span>
                                <h4 class="department-title"><?php echo esc_html($ten_chi_nhanh); ?></h4>
                                <!-- Hiển thị tên chi nhánh -->
                                <div class="color-overlay"></div>

                                <!-- Thêm nút xem lịch phòng khám -->
                                <div class="view-schedule-btn">
                                    <button class="btn-view-schedule">Xem lịch</button>
                                </div>
                            </div>
                        </div>

                        <?php
                    endwhile;
                    wp_reset_postdata(); // Đặt lại dữ liệu sau khi query
                else:
                    ?>
                    <p>Chưa có lịch phòng khám nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>