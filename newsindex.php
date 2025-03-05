<!-- ======= News ========= -->
<section class="news">
    <div class="container">
        <div class="section-header">
            <h3>TIN TỨC MỚI NHẤT</h3>
        </div>
        <div class="news-section">
            <div class="row" style="overflow: hidden;">
                <?php
                $args = array(
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'showposts' => 3,
                );
                ?>
                <?php $getposts = new WP_query($args); ?>
                <?php while ($getposts->have_posts()):
                    $getposts->the_post(); ?>
                    <div class="col-lg-4 col-md-12">
                        <div class="news-card">
                            <a href="<?php the_permalink(); ?>">
                                <div class="news-image">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'style' => 'width: 100%; height: 265px; object-fit: cover;', 'alt' => 'Ảnh tiêu biểu']); ?>
                                    <?php else: ?>
                                        <img class="img-fluid" style="width: 100%; height: auto; object-fit: cover;"
                                            alt="Ảnh tiêu biểu" />
                                    <?php endif; ?>
                                </div>
                            </a>
                            <div class="news-content">
                                <div class="news-meta">
                                    <span class="news-category">
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
                                    </span>

                                    <span class="news-date"><?php echo get_the_date(); ?></span>
                                </div>

                                <a href="<?php the_permalink(); ?>">
                                    <h5 class="news-title"><?php the_title(); ?></h5>
                                </a>

                                <p class="news-excerpt" style="margin: 0;"><?php echo get_the_excerpt(); ?></p>

                                <div class="news-btn">
                                    <div class="text-left">
                                        <a href="/tin-tuc/" class="btn-get-started">
                                            <span>Xem tin</span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>

            <div class="text-center m-t-50">
                <div class="btn-next">
                    <a href="/tin-tuc/">
                        <span>Xem tất cả</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End News -->