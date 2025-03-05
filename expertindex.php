<section id="doctor-branch-expert" class="doctor-branch-expert">
    <div class="container">
        <div class="section-header">
            <h3>ĐỘI NGŨ CHUYÊN GIA</h3>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'doctor',
                    'posts_per_page' => 7, // Lấy 7 bác sĩ từ admin
                );

                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $position = get_post_meta(get_the_ID(), '_position', true);
                        $additional_position = get_post_meta(get_the_ID(), '_additional_position', true);
                        ?>
                        <div class="swiper-slide">
                            <div class="member">
                                <div class="pic"><?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?></div>
                                <div class="member-info">
                                    <h4><?php the_title(); ?></h4>
                                    <span><?php echo esc_html($position); ?><?php if ($additional_position): ?><?php echo esc_html($additional_position); ?><?php endif; ?></span>
                                    <p>
                                        <strong>Chuyên Khoa:</strong>
                                        <?php
                                        // Lấy các chuyên khoa mà bác sĩ thuộc về
                                        $terms = get_the_terms(get_the_ID(), 'specialty');
                                        if ($terms && !is_wp_error($terms)):
                                            $term_names = wp_list_pluck($terms, 'name');
                                            echo implode(', ', $term_names); // Hiển thị các chuyên khoa dưới dạng danh sách phân cách bởi dấu phẩy
                                        else:
                                            echo 'Chưa có chuyên khoa';
                                        endif;
                                        ?>
                                    </p>
                                    <span
                                        class="additional-info"><?php echo wpautop(get_post_meta(get_the_ID(), '_additional_information', true)); ?></span>
                                    <!-- Hiển thị thông tin chi tiết trong nút -->
                                    <a href="<?php the_permalink(); ?>" class="btn-get-started">
                                        Xem chi tiết

                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p>Không tìm thấy bác sĩ thuộc chuyên khoa này.</p>';
                }
                wp_reset_postdata();
                ?>

                <!-- Swiper tùy chỉnh -->
                <div class="swiper-slide">
                    <div class="member">
                        <a href="<?php echo esc_url(home_url('http://localhost/wordpress/chuyen-gia/')); ?>"
                            class="another-doctor">
                            <img src="<?php bloginfo('template_directory') ?>/Images/logo-circle.png" alt="Logo"
                                width="100%"></img>
                            <span class="text-overlay">Xem thêm</span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiperContainer = document.querySelector('.swiper-container');
        var slides = swiperContainer.querySelectorAll('.swiper-slide');
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 4, // Hiển thị 4 bác sĩ đầy đủ trên mỗi trang
            slidesPerGroup: 4, // Chuyển cả 4 slide mỗi lần
            spaceBetween: 30,
            centeredSlides: false, // Tắt chế độ căn giữa slide
            loop: true, // Kích hoạt chế độ lặp liên tục
            autoplay: {
                delay: 10000, // Độ trễ giữa các lần chuyển tiếp
                disableOnInteraction: false,
            },
            pagination: slides.length > 1 ? {
                el: '.swiper-pagination',
                clickable: true,
            } : null,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                992: {
                    slidesPerView: 4,
                    slidesPerGroup: 4,
                },
                768: {
                    slidesPerView: 2,
                    slidesPerGroup: 2,
                },
                1: {
                    slidesPerView: 2,
                    slidesPerGroup: 2,
                }
            }
        });
    });

</script>