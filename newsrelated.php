<?php
// Lấy trang hiện tại
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Lấy giá trị chuyên mục từ ACF
$custom_category = get_field('tin_tuc_chuyen_khoa'); // Đảm bảo rằng bạn đã thay thế 'custom_category' bằng tên trường thực tế của bạn

// Cấu hình truy vấn WordPress để lấy 3 bài viết theo chuyên mục
$args = array(
    'post_status' => 'publish', // Chỉ lấy những bài viết đã được publish
    'post_type' => 'post', // Lấy những bài viết thuộc post
    'posts_per_page' => 3, // số lượng bài viết
    'paged' => $paged, // Trang hiện tại
    'category_name' => $custom_category, // Lọc theo chuyên mục từ ACF
);
$getposts = new WP_Query($args);
?>

<section class="container-post-list">

    <div class="container">
        <div class="section-header-underline">
            <h2>TIN TỨC LIÊN QUAN</h2>
            <div class="underline"></div>
        </div>
    </div>

    <?php if ($getposts->have_posts()): ?>
        <div class="post-list">
            <?php
            // Lặp qua các bài viết trong truy vấn tùy chỉnh
            while ($getposts->have_posts()):
                $getposts->the_post();
                ?>
                <!-- Bài viết dạng ngang -->
                <article id="post-<?php the_ID(); ?>" <?php post_class('base col-12 mb-4'); ?>>
                    <div class="archive-post d-flex flex-md-row flex-column">
                        <!-- Hình ảnh bên trái -->
                        <div class="container post-thumbnail mb-3 mb-md-0" style="flex: 1;">
                            <a href="<?php the_permalink(); ?>">
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

                        <!-- Phần tiêu đề và mô tả bên phải -->
                        <div class="container post-content" style="flex: 2;">
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="post-meta-archive" style="color: #888; margin-bottom: 10px;">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    // Lấy danh mục đầu tiên
                                    $category = $categories[0];

                                    // Kiểm tra nếu danh mục có danh mục cha
                                    if ($category->parent != 0) {
                                        // Lấy danh mục cha
                                        $parent_category = get_category($category->parent);
                                        echo '<a href="' . esc_url(get_category_link($parent_category->term_id)) . '">' . esc_html($parent_category->name) . '</a>';
                                    } else {
                                        // Nếu không có danh mục cha, hiển thị chính nó
                                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                    }
                                } else {
                                    // Fallback nếu bài viết không có danh mục nào
                                    echo '<span class="no-category">Uncategorized</span>';
                                }
                                ?>
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                            </div>
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn-get-started mt-auto">Đọc thêm</a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <!-- Phân trang -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <!-- Previous Page -->
                <li class="page-item <?php if ($paged <= 1)
                    echo 'disabled'; ?>">
                    <a class="page-link border-radius-number" href="<?php echo get_pagenum_link(max(1, $paged - 1)); ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                </li>

                <?php
                $total_pages = $getposts->max_num_pages;
                $current_page = max(1, get_query_var('paged'));

                for ($i = 1; $i <= $total_pages; $i++):
                    $active_class = ($i == $current_page) ? 'active' : '';
                    ?>
                    <li class="page-item <?php echo $active_class; ?>">
                        <a class="page-link border-radius-number" href="<?php echo get_pagenum_link($i); ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>

                <!-- Next Page -->
                <li class="page-item <?php if ($paged >= $total_pages)
                    echo 'disabled'; ?>">
                    <a class="page-link border-radius-number"
                        href="<?php echo get_pagenum_link(min($total_pages, $paged + 1)); ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </li>
            </ul>
        </nav>

    <?php else: ?>
        <p>Không có bài viết nào</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); // Đặt lại dữ liệu bài viết sau truy vấn ?>
</section>