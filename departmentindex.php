<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row gy-4">

            <div class="col-xl-3 col-lg-6 col-md-6">
                <header class="section-header-department text-left">
                    <div class="btn-next">
                        <h3 style="font-weight: 700; margin-bottom: 5px;">CHUYÊN KHOA</h3>
                        <a href="/chuyen-khoa">Xem tất cả chuyên khoa<i class="bi bi-arrow-right"></i></a>
                        <p style="margin-top: 10px;">
                            Hệ thống Bệnh Viện Đa khoa Xuyên Á được thành lập năm 2014. Với nhiều chuyên khoa lâm sàng
                            và cận lâm sàng.
                        </p>
                    </div>
                </header>
            </div>

            <?php
            $args = array( 
                'post_type' => 'specialization',
                'posts_per_page' => 7,
            );

            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $position = get_post_meta(get_the_ID(), '_position', true);
                    $additional_position = get_post_meta(get_the_ID(), '_additional_position', true);
                    ?>

                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <a href="<?php
							// Get the custom link from the custom field
							$specialization_link = get_post_meta(get_the_ID(), '_specialization_link', true);

							// Check if the link exists, otherwise fallback to the default permalink
							echo esc_url($specialization_link ? $specialization_link : get_permalink());
							?>">
                            <div class="portfolio-wrap">
                                <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                                <h4 class="department-title"><?php the_title(); ?></h4>
                                <div class="color-overlay"></div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            } else {
                echo '<p>Không tìm thấy bác sĩ thuộc chuyên khoa này.</p>';
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>