<?php get_header(); ?>

<main id="main">
    <section class="container container-post-list m-b-60" style="padding-bottom: 0; padding-top: 0;">
        <?php get_template_part('breadcrumbtag'); ?>
        <?php if (have_posts()): ?>
            <div class="post-list">
                <?php
                while (have_posts()):
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('base col-12 mb-4'); ?>>
                        <div class="archive-post d-flex flex-md-row flex-column">
                            <!-- Hình ảnh bên trái -->
                            <div class="container post-thumbnail mb-3 mb-md-0" style="flex: 1;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('medium', [
                                            'class' => 'img-fluid w-100', // Đảm bảo width: 100% với class w-100
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
                                <div class="post-meta-archive">
                                    <?php
                                    // Kiểm tra nếu đang ở trang tag
                                    if (is_tag()) {
                                        $tag = get_queried_object(); // Lấy thông tin tag hiện tại
                                        echo '<span class="breadcrumb-item"><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></span>';
                                    }
                                    // Nếu là một trang Category
                                    elseif (is_category()) {
                                        $category = get_queried_object(); // Lấy thông tin category hiện tại (dùng get_queried_object thay vì get_the_category)
                                        if ($category) {
                                            echo '<span class="breadcrumb-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></span>';
                                        }
                                    }
                                    // Nếu là một bài viết (single post)
                                    elseif (is_single()) {
                                        $categories = get_the_category();
                                        if ($categories) {
                                            // Lấy danh mục đầu tiên của bài viết hoặc có thể tùy chỉnh để chọn một danh mục nào đó
                                            $primary_category = $categories[0];
                                            echo '<span class="breadcrumb-item"><a href="' . get_category_link($primary_category->term_id) . '">' . $primary_category->name . '</a></span>';
                                        }
                                        echo '<span class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></span>';
                                    }
                                    ?>

                                    <span class="post-date"><?php echo get_the_date(); ?></span>
                                    
                                </div>
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn-get-started">Đọc thêm</a>
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
                    $total_pages = $wp_query->max_num_pages;
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
    </section>
    <?php get_template_part('modal'); ?>
</main>


<?php get_footer(); ?>