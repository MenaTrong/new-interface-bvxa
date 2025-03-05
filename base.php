<?php
/*
Template Name: Cơ sở
*/
get_header();
?>

<main id="main">
    <?php get_template_part('bannertitle'); ?>
    <section class="container container-post-list">
        <?php
        // Query để lấy các bài viết từ Custom Post Type 'base'
        $args = array(
            'post_type' => 'base',
            'posts_per_page' => -1, // Lấy tất cả bài viết
        );
        $query = new WP_Query($args);

        if ($query->have_posts()): ?>
            <div class="post-list">
                <?php
                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <article class="base" id="post-<?php the_ID(); ?>" <?php post_class('col-12 mb-4'); ?>>
                        <div class="archive-post d-flex flex-md-row flex-column">
                            <!-- Hình ảnh bên trái -->
                            <div class="container post-thumbnail" style="flex: 1;">
                                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'link_chi_tiet_chi_nhanh', true)); ?>">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('medium', [
                                            'class' => 'img-fluid w-100',
                                            'style' => 'object-fit: cover; height: auto;',
                                        ]);
                                    }
                                    ?>
                                </a>
                            </div>

                            <!-- Phần tiêu đề và thông tin bên phải -->
                            <div class="container post-content" style="flex: 2;">
                                <h2 class="post-title">
                                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'link_chi_tiet_chi_nhanh', true)); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div class="post-meta">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <?php echo esc_html(get_post_meta(get_the_ID(), 'dia_chi', true)); ?>
                                </div>
                                <div class="post-meta">
                                    <i class="bi bi-telephone-fill"></i>
                                    <?php echo esc_html(get_post_meta(get_the_ID(), 'so_dien_thoai', true)); ?>
                                </div>
                                <div class="post-meta m-b-20">
                                    <i class="bi bi-pen-fill"></i>
                                    <?php echo get_the_content(); ?>
                                </div>
                                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'link_chi_tiet_chi_nhanh', true)); ?>"
                                    class="btn-get-started">Xem chi tiết</a>
                                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'link_lich_phong_kham', true)); ?>"
                                    class="btn-get-started m-l-10">Xem lịch phòng khám</a>
                            </div>
                        </div>
                    </article>


                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>Không có cơ sở nào để hiển thị.</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); // Đặt lại truy vấn ?>
    </section>

    <?php get_template_part('modal'); ?>
</main>

<?php get_footer(); ?>