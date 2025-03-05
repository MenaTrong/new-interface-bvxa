<?php
get_header(); // Gọi header của trang

if (have_posts()):
    while (have_posts()):
        the_post(); ?>
        <div class="doctor-details">
            <?php get_template_part('breadcrumbexpert'); ?>
            <div class="doctor-info-wrapper m-b-15">
                <!-- Bên trái: Ảnh bác sĩ -->
                <div class="doctor-image">
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" />
                    <?php else: ?>
                        <img src="path_to_default_image.jpg" alt="Ảnh bác sĩ" />
                    <?php endif; ?>
                </div>


                <!-- Bên phải: Thông tin bác sĩ -->
                <div class="doctor-info container">
                    <h1><?php the_title(); ?></h1>

                    <!-- Vai trò -->
                    <h2><?php echo get_post_meta(get_the_ID(), '_additional_position', true); ?></h2>

                    <!-- Hiển thị chuyên khoa -->
                    <div class="doctor-category">
                        <strong>Chuyên môn:</strong>
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
                    </div>

                    <!-- Thông tin chi tiết -->
                    <div class="doctor-bio m-t-10 m-b-10">
                        <?php echo wpautop(get_post_meta(get_the_ID(), '_additional_information', true)); ?>
                    </div>

                    <!-- Kiểm tra nếu có nội dung thì mới hiển thị div -->
                    <?php if (get_the_content()): ?>
                        <div class="">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                    <!-- Nút điều hướng -->
                    <div class="navigation-btns">
                        <a href="/chuyen-gia" class="btn-nav">
                            <span class="nav-icon">&#8592;</span> Trở lại Chuyên gia
                        </a>
                    </div>
                </div>
            </div>
        </div>
<?php get_template_part('modal'); ?>
    <?php endwhile;
endif;

get_footer(); // Gọi footer của trang
