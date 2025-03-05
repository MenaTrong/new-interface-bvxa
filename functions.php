<?php
function theme_settup()
{
    register_nav_menu('header-menu', __('Menu chính'));
    register_nav_menu('footer-menu', __('Menu chân'));
    register_nav_menu('clinical-menu', __('Menu lâm sàng'));
    register_nav_menu('subclinical-menu', __('Menu cận lâm sàng'));
}
add_action('init', 'theme_settup');

function highlight_news_menu_item($items, $args)
{
    // Kiểm tra nếu menu là "header-menu" và bạn đang ở trong chuyên mục 'tin-tuc' hoặc bài viết thuộc chuyên mục đó
    if ($args->theme_location == 'header-menu') {
        foreach ($items as $item) {
            // Kiểm tra nếu menu là 'Tin tức'
            if (strpos($item->title, 'Tin tức') !== false) {
                // Nếu trang hiện tại là chuyên mục "Tin tức" hoặc bài viết thuộc chuyên mục "Tin tức", thêm class active
                if (is_category('tin-tuc') || (is_single() && has_term('tin-tuc', 'category'))) {
                    $item->classes[] = 'current-menu-item'; // Thêm class active vào menu
                }
            }
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'highlight_news_menu_item', 10, 2);

function add_custom_class_to_menu_items($classes, $item, $args)
{
    if ($args->theme_location == 'header-menu') {
        $classes[] = 'nav-link scrollto';
        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'active';
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_custom_class_to_menu_items', 10, 3);


function add_custom_class_to_anchor($atts, $item, $args)
{
    if ($args->theme_location == 'header-menu') {
        $atts['class'] = 'nav-link scrollto';
        if (in_array('current-menu-item', $item->classes)) {
            $atts['class'] .= ' active';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_custom_class_to_anchor', 10, 3);

function add_active_class_to_parent($classes, $item, $args)
{
    // Kiểm tra nếu menu đang sử dụng vị trí 'header-menu'
    if ($args->theme_location == 'header-menu') {
        global $post;

        // Kiểm tra xem mục menu có phải là trang cha hay không
        if (is_page() && $item->object == 'page') {
            // Lấy các trang cha của trang hiện tại
            $ancestors = get_post_ancestors($post);

            // Nếu mục menu là trang cha của trang hiện tại, thêm class 'active'
            if (in_array($item->object_id, $ancestors)) {
                $classes[] = 'active';
            }
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class_to_parent', 10, 3);


function custom_admin_styles()
{
    // Chỉ áp dụng style cho trang viết bài mới
    $screen = get_current_screen();
    if ($screen->id == 'post') {
        echo '<style>
            /* Ví dụ CSS tuỳ chỉnh */
            #postdivrich { background-color: #f9f9f9; }
            #post-body-content { font-size: 16px; }
            #post-body-content .wp-editor-container { border: 1px solid #ccc; }
            /* Thêm CSS của bạn ở đây */
        </style>';
    }
}
add_action('admin_head', 'custom_admin_styles');


add_theme_support('post-thumbnails');


// Đảm bảo wpautop đang hoạt động
add_filter('the_content', 'wpautop');


function search_news()
{
    $paged = isset($_GET['paged']) ? absint($_GET['paged']) : 1;
    $s = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
    $category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 12, // Số lượng bài viết mỗi trang
        'paged' => $paged,
        's' => $s,
    );

    if (!empty($category)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $category,
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="row gy-4 news-container p-b-25 news">';
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="col-lg-4 col-md-12 news-section">
                <a href="<?php the_permalink(); ?>">

                    <div class="news-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="news-image">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'style' => 'width: 100%; height: 265px; object-fit: cover;', 'alt' => 'Ảnh tiêu biểu']); ?>
                                <?php else: ?>
                                    <img class="img-fluid" style="width: 100%; height: auto; object-fit: cover;" alt="Ảnh tiêu biểu" />
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

                            <p class="news-excerpt"><?php echo get_the_excerpt(); ?></p>

                            <div class="news-btn">
                                <div class="text-left">
                                    <a href="<?php the_permalink(); ?>" class="btn-get-started">
                                        <span>Xem tin</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </a>
            </div>
            <?php
        }
        echo '</div>';

        // Phân trang trong AJAX
        $total_pages = $query->max_num_pages;
        if ($total_pages >= 1 && $total_pages <= 5) {
            echo '<nav aria-label="Page navigation">';
            echo '<ul class="pagination justify-content-center">';

            // Nút "<<" (Về trang đầu)
            $first_disabled = ($paged == 1) ? ' disabled' : '';
            echo '<li class="page-item' . $first_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="1" href="#">««</a>';
            echo '</li>';

            // Nút "<" (Trang trước)
            $prev_disabled = ($paged <= 1) ? ' disabled' : '';
            echo '<li class="page-item' . $prev_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="' . max(1, $paged - 1) . '" href="#">«</a>';
            echo '</li>';

            // Hiển thị các số trang, giới hạn tối đa là 5
            $start_page = max(1, $paged - 2); // Trang bắt đầu
            $end_page = min($total_pages, $paged + 2); // Trang kết thúc
            for ($i = $start_page; $i <= $end_page; $i++) {
                $active_class = ($i == $paged) ? ' active' : '';
                echo '<li class="page-item' . $active_class . '">';
                echo '<a class="page-link pagination-link border-radius-number" data-page="' . $i . '" href="#">' . $i . '</a>';
                echo '</li>';
            }

            // Nút ">" (Trang sau)
            $next_disabled = ($paged >= $total_pages) ? ' disabled' : '';
            echo '<li class="page-item' . $next_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="' . min($total_pages, $paged + 1) . '" href="#">»</a>';
            echo '</li>';

            // Nút ">>" (Tới trang cuối)
            $last_disabled = ($paged == $total_pages) ? ' disabled' : '';
            echo '<li class="page-item' . $last_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-numberborder-radius-number" data-page="' . $total_pages . '" href="#">»»</a>';
            echo '</li>';

            echo '</ul>';
            echo '</nav>';
        }

    } else {
        echo '<p>Không có kết quả nào.</p>';
    }

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_search_news', 'search_news');
add_action('wp_ajax_nopriv_search_news', 'search_news');


function search_expert()
{
    $paged = isset($_GET['paged']) ? absint($_GET['paged']) : 1;
    $s = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
    $specialty = isset($_GET['specialty']) ? sanitize_text_field($_GET['specialty']) : '';
    $facility = isset($_GET['facility']) ? sanitize_text_field($_GET['facility']) : '';

    $args = array(
        'post_type' => 'doctor',
        'posts_per_page' => 8, // Số lượng bài viết mỗi trang
        'paged' => $paged,
        's' => $s,
    );

    $tax_query = array();

    if (!empty($specialty)) {
        $tax_query[] = array(
            'taxonomy' => 'specialty',
            'field' => 'slug',
            'terms' => $specialty,
        );
    }

    if (!empty($facility)) {
        $tax_query[] = array(
            'taxonomy' => 'facility',
            'field' => 'slug',
            'terms' => $facility,
        );
    }

    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="row gy-4 doctor-branch-expert p-b-25">';
        while ($query->have_posts()) {
            $query->the_post();
            $position = get_post_meta(get_the_ID(), '_position', true);
            $additional_position = get_post_meta(get_the_ID(), '_additional_position', true);
            ?>
            <div class="col-lg-3 col-6">
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
        echo '</div>';

        // Phân trang
        $total_pages = $query->max_num_pages;
        if ($total_pages >= 1 && $total_pages <= 5) {
            echo '<nav aria-label="Page navigation">';
            echo '<ul class="pagination justify-content-center">';

            // Nút "<<" (Về trang đầu)
            $first_disabled = ($paged == 1) ? ' disabled' : '';
            echo '<li class="page-item' . $first_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="1" href="#">««</a>';
            echo '</li>';

            // Nút "<" (Trang trước)
            $prev_disabled = ($paged <= 1) ? ' disabled' : '';
            echo '<li class="page-item' . $prev_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="' . max(1, $paged - 1) . '" href="#">«</a>';
            echo '</li>';

            // Hiển thị các số trang, giới hạn tối đa là 5
            $start_page = max(1, $paged - 2); // Trang bắt đầu
            $end_page = min($total_pages, $paged + 2); // Trang kết thúc
            for ($i = $start_page; $i <= $end_page; $i++) {
                $active_class = ($i == $paged) ? ' active' : '';
                echo '<li class="page-item' . $active_class . '">';
                echo '<a class="page-link pagination-link border-radius-number" data-page="' . $i . '" href="#">' . $i . '</a>';
                echo '</li>';
            }

            // Nút ">" (Trang sau)
            $next_disabled = ($paged >= $total_pages) ? ' disabled' : '';
            echo '<li class="page-item' . $next_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="' . min($total_pages, $paged + 1) . '" href="#">»</a>';
            echo '</li>';

            // Nút ">>" (Tới trang cuối)
            $last_disabled = ($paged == $total_pages) ? ' disabled' : '';
            echo '<li class="page-item' . $last_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="' . $total_pages . '" href="#">»»</a>';
            echo '</li>';

            echo '</ul>';
            echo '</nav>';
        }


    } else {
        echo '<p>Không có kết quả nào.</p>';
    }

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_search_expert', 'search_expert');
add_action('wp_ajax_nopriv_search_expert', 'search_expert');



function search_specialization()
{
    $paged = isset($_GET['paged']) ? absint($_GET['paged']) : 1;
    $s = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
    $specialization = isset($_GET['specialization']) ? sanitize_text_field($_GET['specialization']) : '';

    $args = array(
        'post_type' => 'specialization',
        'posts_per_page' => 8, // Số lượng bài viết mỗi trang
        'paged' => $paged, // Phân trang đúng theo AJAX
        's' => $s,
    );

    if (!empty($specialization)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'specialization_category',
            'field' => 'slug',
            'terms' => $specialization,
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="row gy-4 portfolio-container p-b-25">';
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="col-lg-3 col-md-6">
                <a href="<?php
                $specialization_link = get_post_meta(get_the_ID(), '_specialization_link', true);
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
        echo '</div>';

        // Phân trang trong AJAX
        $total_pages = $query->max_num_pages;
        if ($total_pages >= 1) {
            echo '<nav aria-label="Page navigation">';
            echo '<ul class="pagination justify-content-center">';

            // Nút "<<" (Về trang đầu)
            $first_disabled = ($paged == 1) ? ' disabled' : '';
            echo '<li class="page-item' . $first_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="1" href="#">««</a>';
            echo '</li>';

            // Nút "<" (Trang trước)
            $prev_disabled = ($paged <= 1) ? ' disabled' : '';
            echo '<li class="page-item' . $prev_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="' . max(1, $paged - 1) . '" href="#">«</a>';
            echo '</li>';

            // Hiển thị các số trang, giới hạn tối đa là 5
            $start_page = max(1, $paged - 2); // Trang bắt đầu
            $end_page = min($total_pages, $paged + 2); // Trang kết thúc
            for ($i = $start_page; $i <= $end_page; $i++) {
                $active_class = ($i == $paged) ? ' active' : '';
                echo '<li class="page-item' . $active_class . '">';
                echo '<a class="page-link pagination-link border-radius-number" data-page="' . $i . '" href="#">' . $i . '</a>';
                echo '</li>';
            }

            // Nút ">" (Trang sau)
            $next_disabled = ($paged >= $total_pages) ? ' disabled' : '';
            echo '<li class="page-item' . $next_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="' . min($total_pages, $paged + 1) . '" href="#">»</a>';
            echo '</li>';

            // Nút ">>" (Tới trang cuối)
            $last_disabled = ($paged == $total_pages) ? ' disabled' : '';
            echo '<li class="page-item' . $last_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="' . $total_pages . '" href="#">»»</a>';
            echo '</li>';

            echo '</ul>';
            echo '</nav>';
        }

    } else {
        echo '<p>Không có kết quả nào.</p>';
    }

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_search_specialization', 'search_specialization');
add_action('wp_ajax_nopriv_search_specialization', 'search_specialization');

// Hàm xử lý tìm kiếm và phân trang AJAX cho chương trình ưu đãi
function search_endow_program() {
    $paged = isset($_GET['paged']) ? absint($_GET['paged']) : 1;
    $s = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
    $promotion = isset($_GET['promotion']) ? sanitize_text_field($_GET['promotion']) : '';

    $args = array(
        'post_type' => 'package',
        'posts_per_page' => 6, // Số bài viết mỗi trang
        'paged' => $paged,
        's' => $s,
    );

    // Thêm bộ lọc chuyên khoa nếu có
    if (!empty($promotion)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'promotion_category',
                'field' => 'slug',
                'terms' => $promotion,
            )
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="row">';
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center m-b-20">
                <div class="card-package">
                    <?php
                    // Lấy thông tin nhãn nổi bật từ meta box
                    $featured_label = get_post_meta(get_the_ID(), '_featured_label', true);
                    ?>
                    <span class="featured"><?php echo esc_html($featured_label ?: 'Xuyên Á'); ?></span>
                    <div class="bg-image hover-overlay shadow-1-strong ripple mb-4">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'style' => 'width: 100%; height: 200px; object-fit: cover;']); ?>
                        <?php else: ?>
                            <img class="img img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/default-thumbnail.jpg" alt="Ảnh giới thiệu chương trình" />
                        <?php endif; ?>
                    </div>
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    <a class="btn-get-started m-t-20" href="<?php echo esc_url(get_post_meta(get_the_ID(), 'link', true)); ?>" target="_blank" rel="noopener noreferrer">Xem thêm</a>
                </div>
            </div>
            <?php
        }
        echo '</div>';

        // Phân trang
        // Phân trang trong AJAX
        $total_pages = $query->max_num_pages;
        if ($total_pages >= 1) {
            echo '<nav aria-label="Page navigation">';
            echo '<ul class="pagination justify-content-center">';

            // Nút "<<" (Về trang đầu)
            $first_disabled = ($paged == 1) ? ' disabled' : '';
            echo '<li class="page-item' . $first_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="1" href="#">««</a>';
            echo '</li>';

            // Nút "<" (Trang trước)
            $prev_disabled = ($paged <= 1) ? ' disabled' : '';
            echo '<li class="page-item' . $prev_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="' . max(1, $paged - 1) . '" href="#">«</a>';
            echo '</li>';

            // Hiển thị các số trang, giới hạn tối đa là 5
            $start_page = max(1, $paged - 2); // Trang bắt đầu
            $end_page = min($total_pages, $paged + 2); // Trang kết thúc
            for ($i = $start_page; $i <= $end_page; $i++) {
                $active_class = ($i == $paged) ? ' active' : '';
                echo '<li class="page-item' . $active_class . '">';
                echo '<a class="page-link pagination-link border-radius-number" data-page="' . $i . '" href="#">' . $i . '</a>';
                echo '</li>';
            }

            // Nút ">" (Trang sau)
            $next_disabled = ($paged >= $total_pages) ? ' disabled' : '';
            echo '<li class="page-item' . $next_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="' . min($total_pages, $paged + 1) . '" href="#">»</a>';
            echo '</li>';

            // Nút ">>" (Tới trang cuối)
            $last_disabled = ($paged == $total_pages) ? ' disabled' : '';
            echo '<li class="page-item' . $last_disabled . '">';
            echo '<a class="page-link pagination-link border-radius-number" data-page="' . $total_pages . '" href="#">»»</a>';
            echo '</li>';

            echo '</ul>';
            echo '</nav>';
        }
    } else {
        echo '<p>Không có chương trình ưu đãi nào.</p>';
    }

    wp_reset_postdata();
    wp_die();
}

// Thêm hàm AJAX cho người dùng đã đăng nhập và chưa đăng nhập
add_action('wp_ajax_search_endow_program', 'search_endow_program');
add_action('wp_ajax_nopriv_search_endow_program', 'search_endow_program');


function enqueue_custom_scripts()
{
    wp_enqueue_script('jquery');
    // Nếu cần thêm các script khác
    // wp_enqueue_script('your-script-handle', 'path-to-your-script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


function create_default_content_for_new_page($post_ID, $post, $update)
{
    if ($post->post_type == 'page' && !$update) {
        // Kiểm tra xem có phải là trang mới hay không (không phải cập nhật)

        // Nội dung mặc định
        $default_content = '
            <h1>Tiêu đề trang mặc định</h1>
            <p>Đây là nội dung mặc định cho trang mới.</p>
        ';

        // Cập nhật nội dung trang
        wp_update_post(array(
            'ID' => $post_ID,
            'post_content' => $default_content,
        ));
    }
}
add_action('wp_insert_post', 'create_default_content_for_new_page', 10, 3);

function custom_mobile_nav_toggle_styles()
{
    // Kiểm tra nếu người dùng đã đăng nhập và có thanh công cụ admin
    if (is_user_logged_in() && is_admin_bar_showing()) {
        ?>
        <style type="text/css">
            @media (min-width: 1px) and (max-width: 600px) {
                .mobile-nav-toggle {
                    top: 12.5px !important;
                    position: fixed;
                }

                .header {
                    position: fixed;
                }
            }

            @media (min-width: 601px) and (max-width: 782px) {
                .mobile-nav-toggle {
                    top: 58px !important;
                }

                .navbar ul {
                    padding-top: 50px;
                }

                .menu ul {
                    padding-top: 0;
                }

                .header {
                    top: 46px;
                }

                .search-overlay {
                    top: 124px;
                }
            }

            @media (min-width: 783px) and (max-width: 1279px) {
                .mobile-nav-toggle {
                    top: 44px !important;
                    /* Khoảng cách từ thanh công cụ admin */
                }

                .navbar ul {
                    padding-top: 35px;
                }

                .menu ul {
                    padding-top: 0;
                }

                .header {
                    top: 32px;
                }

                .search-overlay {
                    top: 110px;
                }
            }

            @media (min-width: 1280px) {
                .header {
                    top: 32px;
                }

                .search-overlay {
                    top: 110px;
                }
            }
        </style>
        <?php
    }
}
add_action('wp_footer', 'custom_mobile_nav_toggle_styles');

// function custom_session_timeout() {
//     $timeout = 60; // 10 phút
//     if (is_user_logged_in()) {
//         $current_time = time();
//         $session_expiry = $current_time + $timeout;

//         if (!isset($_COOKIE['session_timeout']) || $_COOKIE['session_timeout'] < $current_time) {
//             wp_clear_auth_cookie();
//             wp_redirect(wp_login_url());
//             exit();
//         } else {
//             // Cập nhật cookie
//             setcookie('session_timeout', $session_expiry, $session_expiry, '/', '', false, true);
//         }
//     }
// }
// add_action('wp', 'custom_session_timeout');
function enqueue_swiper_assets()
{
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');

function save_specialization_meta_box($post_id)
{
    if (array_key_exists('specialization_link', $_POST)) {
        update_post_meta(
            $post_id,
            '_specialization_link',
            sanitize_text_field($_POST['specialization_link'])
        );
    }
}
add_action('save_post', 'save_specialization_meta_box');

function theme_setup()
{
    add_theme_support('editor-styles');
    add_editor_style();
}
add_action('after_setup_theme', 'theme_setup');

class Custom_Nav_Walker extends Walker_Nav_Menu
{
    // Tạo mục menu
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Lấy các lớp CSS từ menu
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Xử lý lớp CSS cho menu item
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        // Thêm thuộc tính style để điều chỉnh khoảng cách (nếu cần)
        $style = 'style=""';

        // Tạo thẻ <li>
        $output .= $indent . '<li' . $class_names . ' ' . $style . '>';

        // Tạo thẻ <a>
        $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title);

        // Thêm mũi tên cho các mục có sub-menu-2
        if ($depth == 1 && in_array('menu-item-has-children', $classes)) {
            $output .= '<div class="arrow-right" style="margin-left: auto;"><span class="bi bi-caret-right"></span></div>'; // Mũi tên sang phải
        }

        // Kiểm tra nếu menu có sub-menu con
        if (in_array('menu-item-has-children', $classes)) {
            // Thêm nút mũi tên vào menu có submenu
            if ($depth == 0) {
                $output .= '<div class="arrow-wrapper"><button class="arrow-button arrow-button-1" aria-label="Toggle submenu" aria-expanded="false"></button></div>';
            } elseif ($depth == 1) {
                $output .= '<div class="arrow-wrapper"><button class="arrow-button arrow-button-2" aria-label="Toggle submenu" aria-expanded="false"></button></div>';
            }
        }

        // Đóng thẻ <a>
        $output .= '</a>';
    }

    // Tạo menu con
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 1) {
            $output .= '<ul class="sub-menu-2" style="margin-bottom: 0;">'; // Sub-menu cấp 2
        } else {
            $output .= '<ul class="sub-menu">'; // Sub-menu cấp 1
        }
    }

    // Đóng menu con
    function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '</ul>';
    }
}


//====================================================================================================
//====================================================================================================
// Taxonomy Chuyên khoa
// Register the post type (you already have this)
function register_specialization_post_type()
{
    $labels = array(
        'name' => _x('Chuyên khoa', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Chuyên khoa', 'Post type singular name', 'textdomain'),
        'menu_name' => _x('Chuyên khoa', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Chuyên khoa', 'Add New on Toolbar', 'textdomain'),
        'add_new' => __('Thêm mới', 'textdomain'),
        'add_new_item' => __('Thêm mới Chuyên khoa', 'textdomain'),
        'new_item' => __('Chuyên khoa mới', 'textdomain'),
        'edit_item' => __('Chỉnh sửa Chuyên khoa', 'textdomain'),
        'view_item' => __('Xem Chuyên khoa', 'textdomain'),
        'all_items' => __('Tất cả Chuyên khoa', 'textdomain'),
        'search_items' => __('Tìm kiếm Chuyên khoa', 'textdomain'),
        'parent_item_colon' => __('Parent Specializations:', 'textdomain'),
        'not_found' => __('No specializations found.', 'textdomain'),
        'not_found_in_trash' => __('No specializations found in Trash.', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'chuyen-khoa'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 21,
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('specialization', $args);
}

// Register the taxonomy (you already have this)
function register_specialization_taxonomy()
{
    $labels = array(
        'name' => _x('Chuyên mục Chuyên khoa', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Chuyên mục Chuyên khoa', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Tìm kiếm Chuyên mục', 'textdomain'),
        'all_items' => __('Tất cả Chuyên mục', 'textdomain'),
        'parent_item' => __('Parent Chuyên mục', 'textdomain'),
        'parent_item_colon' => __('Parent Chuyên mục:', 'textdomain'),
        'edit_item' => __('Chỉnh sửa Chuyên mục', 'textdomain'),
        'update_item' => __('Cập nhật Chuyên mục', 'textdomain'),
        'add_new_item' => __('Thêm mới Chuyên mục', 'textdomain'),
        'new_item_name' => __('Tên Chuyên mục mới', 'textdomain'),
        'menu_name' => __('Chuyên mục', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'chuyen-muc'),
    );

    register_taxonomy('specialization_category', array('specialization'), $args);
}

// Add the meta box for 'specialization_link'
function render_specialization_link_meta_box($post)
{
    // Get the current value of the custom field
    $specialization_link = get_post_meta($post->ID, '_specialization_link', true);
    ?>
    <label for="specialization_link"><?php _e('Link:', 'textdomain'); ?></label>
    <input type="text" id="specialization_link" name="specialization_link"
        value="<?php echo esc_attr($specialization_link); ?>" style="width: 100%;" />
    <?php
}

// Register the meta box
function add_specialization_link_meta_box()
{
    add_meta_box(
        'specialization_link', // Meta box ID
        __('Chuyên khoa Link', 'textdomain'), // Title
        'render_specialization_link_meta_box', // Callback function
        'specialization', // Post type
        'normal', // Context (normal, side, advanced)
        'high' // Priority
    );
}
add_action('add_meta_boxes', 'add_specialization_link_meta_box');

// Save the custom field data
function save_specialization_link_meta($post_id)
{
    // Check if it's an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    // Check if the user has permission to edit the post
    if (!current_user_can('edit_post', $post_id))
        return $post_id;

    // Save the specialization link value
    if (isset($_POST['specialization_link'])) {
        update_post_meta($post_id, '_specialization_link', sanitize_text_field($_POST['specialization_link']));
    }
}
add_action('save_post', 'save_specialization_link_meta');

add_action('init', 'register_specialization_post_type');
add_action('init', 'register_specialization_taxonomy');


//====================================================================================================
//====================================================================================================
// Taxonomy Chi Nhánh
function create_facility_taxonomy()
{
    $labels = array(
        'name' => _x('DS Chi nhánh', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Chi nhánh', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Tiềm kiếm Chi nhánh', 'textdomain'),
        'all_items' => __('Tất cả Chi nhánh', 'textdomain'),
        'parent_item' => __('Parent Facility', 'textdomain'),
        'parent_item_colon' => __('Parent Facility:', 'textdomain'),
        'edit_item' => __('Chỉnh sửa Chi nhánh', 'textdomain'),
        'update_item' => __('Cập nhật Chi nhánh', 'textdomain'),
        'add_new_item' => __('Thêm mới Chi nhánh', 'textdomain'),
        'new_item_name' => __('Tên Chi nhánh mới', 'textdomain'),
        'menu_name' => __('Chi nhánh', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true, // Tạo taxonomy phân cấp giống như categories
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'cac-chi-nhanh'),
    );

    register_taxonomy('facility', array('doctor'), $args);
}
add_action('init', 'create_facility_taxonomy');

function create_base_post_type()
{
    register_post_type(
        'base',
        array(
            'labels' => array(
                'name' => __('Chi nhánh và lịch phòng khám'),
                'singular_name' => __('Chi nhánh và lịch phòng khám')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'thumbnail', 'editor'),
            'rewrite' => array('slug' => 'cac-chi-nhanh'),
        )
    );
}
add_action('init', 'create_base_post_type');

// Thêm trường tùy chỉnh cho Custom Post Type 'base'
function base_custom_meta_boxes()
{
    add_meta_box(
        'base_info_meta_box', // ID
        'Thông tin chi nhánh', // Tiêu đề
        'base_info_meta_box_callback', // Callback
        'base', // Post type
        'normal', // Context
        'high' // Priority
    );
}
add_action('add_meta_boxes', 'base_custom_meta_boxes');

function base_info_meta_box_callback($post)
{
    // Lấy giá trị hiện tại của các trường
    $dia_chi = get_post_meta($post->ID, 'dia_chi', true);
    $so_dien_thoai = get_post_meta($post->ID, 'so_dien_thoai', true);
    $link_chi_tiet_chi_nhanh = get_post_meta($post->ID, 'link_chi_tiet_chi_nhanh', true);
    $link_lich_phong_kham = get_post_meta($post->ID, 'link_lich_phong_kham', true);
    $ten_chi_nhanh = get_post_meta($post->ID, 'ten_chi_nhanh', true); // Lấy giá trị Tên chi nhánh
    ?>
    <label for="dia_chi">Địa chỉ:</label>
    <input type="text" id="dia_chi" name="dia_chi" value="<?php echo esc_attr($dia_chi); ?>" style="width: 100%;" />

    <label for="so_dien_thoai">Số điện thoại:</label>
    <input type="text" id="so_dien_thoai" name="so_dien_thoai" value="<?php echo esc_attr($so_dien_thoai); ?>"
        style="width: 100%;" />

    <label for="link_chi_tiet_chi_nhanh">Link chi tiết chi nhánh:</label>
    <input type="url" id="link_chi_tiet_chi_nhanh" name="link_chi_tiet_chi_nhanh"
        value="<?php echo esc_attr($link_chi_tiet_chi_nhanh); ?>" style="width: 100%;" />

    <div style="display: flex; gap: 20px;">
        <!-- Tên chi nhánh và Link lịch phòng khám nằm chung 1 hàng -->
        <div style="flex: 1;">
            <label for="ten_chi_nhanh">Tên chi nhánh:</label>
            <input type="text" id="ten_chi_nhanh" name="ten_chi_nhanh" value="<?php echo esc_attr($ten_chi_nhanh); ?>"
                style="width: 100%;" />
        </div>

        <div style="flex: 1;">
            <label for="link_lich_phong_kham">Link lịch phòng khám:</label>
            <input type="url" id="link_lich_phong_kham" name="link_lich_phong_kham"
                value="<?php echo esc_attr($link_lich_phong_kham); ?>" style="width: 100%;" />
        </div>
    </div>

    <?php
}


// Lưu giá trị của các trường tùy chỉnh
function save_base_info_meta_box($post_id)
{
    if (array_key_exists('dia_chi', $_POST)) {
        update_post_meta($post_id, 'dia_chi', sanitize_text_field($_POST['dia_chi']));
    }
    if (array_key_exists('so_dien_thoai', $_POST)) {
        update_post_meta($post_id, 'so_dien_thoai', sanitize_text_field($_POST['so_dien_thoai']));
    }
    if (array_key_exists('link_chi_tiet_chi_nhanh', $_POST)) {
        update_post_meta($post_id, 'link_chi_tiet_chi_nhanh', esc_url($_POST['link_chi_tiet_chi_nhanh']));
    }
    if (array_key_exists('link_lich_phong_kham', $_POST)) {
        update_post_meta($post_id, 'link_lich_phong_kham', esc_url($_POST['link_lich_phong_kham']));
    }
    if (array_key_exists('ten_chi_nhanh', $_POST)) { // Lưu giá trị của trường Tên chi nhánh
        update_post_meta($post_id, 'ten_chi_nhanh', sanitize_text_field($_POST['ten_chi_nhanh']));
    }
}
add_action('save_post', 'save_base_info_meta_box');


//====================================================================================================
//====================================================================================================
// Taxonomy Bác sĩ

function register_doctor_post_type()
{
    $labels = array(
        'name' => _x('Bác sĩ', 'Post type general name', 'textdomain'),
        'singular_name' => _x('Bác sĩ', 'Post type singular name', 'textdomain'),
        'menu_name' => _x('Bác sĩ', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Bác sĩ', 'Add New on Toolbar', 'textdomain'),
        'add_new' => __('Thêm mới', 'textdomain'),
        'add_new_item' => __('Thêm mới Bác sĩ', 'textdomain'),
        'new_item' => __('Bác sĩ mới', 'textdomain'),
        'edit_item' => __('Chỉnh sửa Bác sĩ', 'textdomain'),
        'view_item' => __('Xem Bác sĩ', 'textdomain'),
        'all_items' => __('Tất cả Bác sĩ', 'textdomain'),
        'search_items' => __('Tiềm kiếm Bác sĩ', 'textdomain'),
        'parent_item_colon' => __('Parent Doctors:', 'textdomain'),
        'not_found' => __('No doctors found.', 'textdomain'),
        'not_found_in_trash' => __('No doctors found in Trash.', 'textdomain'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'bac-si'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('doctor', $args);
}
add_action('init', 'register_doctor_post_type');

// Thêm meta box cho post type Doctor
// Thêm meta box cho post type Doctor
function add_doctor_meta_boxes()
{
    // Meta box Vai trò
    add_meta_box(
        'doctor_additional_position',       // ID của meta box
        'Vai trò',                          // Tiêu đề của meta box
        'display_doctor_additional_position_meta_box', // Callback để hiển thị nội dung meta box
        'doctor',                           // Post type
        'normal',                           // Context (vị trí trong trang chỉnh sửa)
        'high'                              // Priority
    );

    // Meta box Thông tin chi tiết
    add_meta_box(
        'doctor_additional_information',    // ID của meta box mới
        'Thông tin chi tiết',               // Tiêu đề của meta box mới
        'display_doctor_additional_information_meta_box', // Callback để hiển thị nội dung meta box mới
        'doctor',                           // Post type
        'normal',                           // Context (vị trí trong trang chỉnh sửa)
        'high'                              // Priority
    );
}
add_action('add_meta_boxes', 'add_doctor_meta_boxes');

// Hiển thị nội dung của meta box Vai trò
function display_doctor_additional_position_meta_box($post)
{
    $additional_position = get_post_meta($post->ID, '_additional_position', true);
    ?>
    <label for="additional_position">Vai trò</label>
    <textarea name="additional_position" id="additional_position" rows="5"
        style="width:100%;"><?php echo esc_textarea($additional_position); ?></textarea>
    <?php
}

// Hiển thị nội dung của meta box Thông tin chi tiết
function display_doctor_additional_information_meta_box($post)
{
    // Lấy giá trị đã lưu (nếu có) từ meta
    $additional_information = get_post_meta($post->ID, '_additional_information', true);

    // Sử dụng wp_editor() thay vì textarea
    $editor_settings = array(
        'textarea_name' => 'additional_information',  // Tên của trường input sẽ được gửi lên khi lưu
        'editor_height' => 200,                      // Chiều cao của editor
        'media_buttons' => false,                    // Tắt nút Media
        'textarea_rows' => 10,                       // Số dòng hiển thị
        'teeny' => true,                             // Giới hạn các công cụ cho editor (tùy chọn nhỏ gọn)
    );

    wp_editor($additional_information, 'additional_information_editor', $editor_settings);
}


// Lưu dữ liệu của meta box Vai trò và Thông tin chi tiết
function save_doctor_meta_box_data($post_id)
{
    // Kiểm tra xem có phải là autosave không
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    // Kiểm tra quyền của người dùng để chỉnh sửa bài viết
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Lưu Vai trò
    if (isset($_POST['additional_position'])) {
        update_post_meta(
            $post_id,
            '_additional_position',
            sanitize_textarea_field($_POST['additional_position'])
        );
    }

    // Lưu Thông tin chi tiết
    if (isset($_POST['additional_information'])) {
        update_post_meta(
            $post_id,
            '_additional_information',
            wp_kses_post($_POST['additional_information'])  // Sử dụng wp_kses_post để bảo vệ HTML
        );
    }

    return $post_id;
}

add_action('save_post', 'save_doctor_meta_box_data');


// Thêm một filter để thêm class 'active' vào các mục menu tương ứng
function add_active_class_to_menu_item($classes, $item)
{
    // Kiểm tra nếu đây là trang chi tiết bác sĩ
    if (is_singular('doctor') && $item->title == 'Chuyên gia') {
        $classes[] = 'active'; // Thêm lớp active vào mục 'Chuyên gia'
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class_to_menu_item', 10, 2);

function load_expertsingle_template($template)
{
    if (is_singular('doctor')) {  // Kiểm tra xem đây có phải là bài viết thuộc post type "doctor" không
        // Kiểm tra nếu file expertsingle.php tồn tại trong theme
        $new_template = locate_template(array('expertsingle.php'));
        if (!empty($new_template)) {
            return $new_template; // Trả về đường dẫn của file expertsingle.php
        }
    }
    return $template; // Trả về template mặc định nếu không phải là post type "doctor"
}
add_filter('template_include', 'load_expertsingle_template');

// Đăng ký taxonomy 'Chuyên khoa của bác sĩ' cho post type 'doctor'
function register_doctor_category_taxonomy()
{
    $labels = array(
        'name' => _x('Chuyên khoa của BS', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Chuyên khoa của BS', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Tìm kiếm Chuyên khoa của BS', 'textdomain'),
        'all_items' => __('Tất cả Chuyên khoa của BS', 'textdomain'),
        'parent_item' => __('Parent Chuyên khoa của BS', 'textdomain'),
        'parent_item_colon' => __('Parent Chuyên khoa của BS:', 'textdomain'),
        'edit_item' => __('Chỉnh sửa Chuyên khoa của BS', 'textdomain'),
        'update_item' => __('Cập nhật Chuyên khoa của BS', 'textdomain'),
        'add_new_item' => __('Thêm mới Chuyên khoa của BS', 'textdomain'),
        'new_item_name' => __('Tên Chuyên khoa của BS mới', 'textdomain'),
        'menu_name' => __('Chuyên khoa của BS', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true, // Cho phép phân cấp (parent-child)
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'chuyen-khoa-cua-bac-si'), // Slug URL
    );

    // Đăng ký taxonomy cho post type 'doctor'
    register_taxonomy('specialty', array('doctor'), $args);
}

// Đăng ký taxonomy cho post type 'doctor'
add_action('init', 'register_doctor_category_taxonomy');


//====================================================================================================
//====================================================================================================
// Taxonomy CT Ưu đãi
function create_custom_post_type()
{
    register_post_type(
        'package',
        array(
            'labels' => array(
                'name' => __('CT ưu đãi', 'textdomain'),
                'singular_name' => __('CT ưu đãi', 'textdomain')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'packages'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'register_meta_box_cb' => 'add_package_meta_box', // Tạo Meta Box cho custom field
        )
    );
}
add_action('init', 'create_custom_post_type');

// Thêm Meta Box cho 'custom_link' và 'featured_label'
// Thêm Meta Box cho trường 'link' trong CPT 'package'
function add_package_meta_box()
{
    // Thêm Meta Box cho 'custom_link'
    add_meta_box(
        'custom_link_meta', // ID của Meta Box
        __('Đường dẫn chương trình', 'textdomain'), // Tiêu đề
        'custom_link_meta_box_callback', // Callback để hiển thị trường
        'package', // CPT 'package'
        'normal', // Vị trí (normal, side)
        'high' // Mức độ ưu tiên
    );

    // Thêm Meta Box cho 'featured_label'
    add_meta_box(
        'featured_label_metabox',
        'Featured',
        'display_featured_label_metabox',
        'package',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'add_package_meta_box');

// Callback để hiển thị trường 'link' trong Meta Box
function custom_link_meta_box_callback($post)
{
    // Lấy giá trị của 'link' từ Post Meta
    $link = get_post_meta($post->ID, 'link', true);

    // Hiển thị trường nhập liệu cho 'link'
    echo '<label for="link">' . __('Nhập đường dẫn:', 'textdomain') . '</label>';
    echo '<input type="url" id="link" name="link" value="' . esc_url($link) . '" size="25" />';
}

// Lưu dữ liệu 'link' khi bài đăng được lưu
function save_package_meta_box_data($post_id)
{
    // Kiểm tra quyền của người dùng
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Kiểm tra và lưu dữ liệu 'link'
    if (isset($_POST['link'])) {
        $link = sanitize_text_field($_POST['link']);
        update_post_meta($post_id, 'link', esc_url($link));
    }
}
add_action('save_post', 'save_package_meta_box_data');


// Hiển thị meta box 'featured_label'
function display_featured_label_metabox($post)
{
    $featured_label = get_post_meta($post->ID, '_featured_label', true);
    ?>
    <label for="featured_label">Featured Label:</label>
    <input type="text" name="featured_label" id="featured_label" value="<?php echo esc_attr($featured_label); ?>"
        style="width:100%;">
    <?php
}

// Lưu Featured Label
function save_featured_label($post_id)
{
    if (isset($_POST['featured_label'])) {
        update_post_meta($post_id, '_featured_label', sanitize_text_field($_POST['featured_label']));
    }
}
add_action('save_post', 'save_featured_label');

// Register the custom taxonomy for "Chuyên mục nơi áp dụng ưu đãi"
function register_promotion_category_taxonomy() {
    $labels = array(
        'name'              => _x( 'Chuyên mục nơi áp dụng ưu đãi', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Chuyên mục nơi áp dụng ưu đãi', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Tìm kiếm chuyên mục', 'textdomain' ),
        'all_items'         => __( 'Tất cả chuyên mục', 'textdomain' ),
        'parent_item'       => __( 'Chuyên mục cha', 'textdomain' ),
        'parent_item_colon' => __( 'Chuyên mục cha:', 'textdomain' ),
        'edit_item'         => __( 'Chỉnh sửa chuyên mục', 'textdomain' ),
        'update_item'       => __( 'Cập nhật chuyên mục', 'textdomain' ),
        'add_new_item'      => __( 'Thêm mới chuyên mục', 'textdomain' ),
        'new_item_name'     => __( 'Tên chuyên mục mới', 'textdomain' ),
        'menu_name'         => __( 'Chuyên mục', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true, // Set to true if you want parent/child relationship
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'promotion-category' ),
    );

    // Register taxonomy for 'package' CPT
    register_taxonomy( 'promotion_category', 'package', $args );
}
add_action( 'init', 'register_promotion_category_taxonomy', 0 );



//====================================================================================================
//====================================================================================================
// Taxonomy Hiệu ứng và Quảng Cáo
function add_custom_confetti_script()
{
    // Enqueue thư viện Confetti từ CDN
    wp_enqueue_script('confetti-js', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'add_custom_confetti_script');

// Tạo menu trong trang admin
function tete_ad_image_selector_menu()
{
    add_menu_page(
        'Hiệu ứng và Quảng Cáo',  // Tên trang
        'Hiệu ứng và Quảng Cáo',  // Tên menu
        'manage_options',         // Quyền truy cập
        'tete_ad_image_selector', // Slug của menu
        'tete_ad_image_selector_page',  // Hàm hiển thị trang
        'dashicons-smiley',       // Biểu tượng menu
        90                        // Vị trí menu
    );
}
add_action('admin_menu', 'tete_ad_image_selector_menu');

// Hàm hiển thị trang cài đặt
function tete_ad_image_selector_page()
{
    ?>
    <div class="wrap">
        <h1>Quản lý Hiệu ứng và Quảng Cáo</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('tete_ad_image_group'); // Đăng ký nhóm cài đặt
            do_settings_sections('tete_ad_image_selector'); // Hiển thị các trường cài đặt
            ?>
            <table class="form-table">
                <!-- Bật/Tắt hiệu ứng bắn pháo giấy -->
                <tr valign="top">
                    <th scope="row">Bật/Tắt hiệu ứng bắn pháo giấy</th>
                    <td>
                        <input type="checkbox" name="tete_effects_enable_confetti" value="1" <?php checked(1, get_option('tete_effects_enable_confetti'), true); ?> />
                        <label for="tete_effects_enable_confetti">Kích hoạt hiệu ứng bắn pháo giấy</label>
                    </td>
                </tr>

                <!-- Màu sắc pháo giấy -->
                <tr valign="top">
                    <th scope="row">Chọn màu sắc pháo giấy</th>
                    <td>
                        <input type="text" name="tete_effects_confetti_colors"
                            value="<?php echo esc_attr(get_option('tete_effects_confetti_colors')); ?>" class="regular-text"
                            placeholder="Ví dụ: #ff0000, #00ff00, #0000ff" />
                        <p class="description">Nhập mã màu, cách nhau bằng dấu phẩy.</p>
                    </td>
                </tr>

                <!-- Chọn ảnh quảng cáo -->
                <tr valign="top">
                    <th scope="row">Chọn ảnh quảng cáo</th>
                    <td>
                        <input type="text" name="ad_image_url" id="ad_image_url"
                            value="<?php echo esc_url(get_option('ad_image_url')); ?>" class="regular-text">
                        <button type="button" class="button" id="upload_ad_image_button">Chọn Ảnh</button>
                        <br><br>
                        <img src="<?php echo esc_url(get_option('ad_image_url')); ?>" id="ad_image_preview"
                            style="max-width: 100%; height: auto;">
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Đăng ký các tùy chọn và trường cài đặt
function tete_ad_image_selector_settings_init()
{
    // Đăng ký cài đặt cho hiệu ứng
    register_setting('tete_ad_image_group', 'tete_effects_enable_confetti');
    register_setting('tete_ad_image_group', 'tete_effects_confetti_colors');

    // Đăng ký cài đặt cho ảnh quảng cáo
    register_setting('tete_ad_image_group', 'ad_image_url');

    // Thêm các trường cài đặt
    add_settings_section(
        'tete_ad_image_section',
        'Cài đặt Hiệu ứng và Quảng Cáo',
        null,
        'tete_ad_image_selector'
    );

}
add_action('admin_init', 'tete_ad_image_selector_settings_init');

// Callback cho trường "Bật/Tắt hiệu ứng"
function tete_effects_checkbox_callback()
{
    $checked = get_option('tete_effects_enable_confetti') ? 'checked' : '';
    echo '<input type="checkbox" name="tete_effects_enable_confetti" value="1" ' . $checked . ' />';
}

// Callback cho trường màu sắc
function tete_effects_colors_callback()
{
    $colors = get_option('tete_effects_confetti_colors');
    echo '<input type="text" name="tete_effects_confetti_colors" value="' . esc_attr($colors) . '" class="regular-text" />';
}

// Callback cho trường ảnh quảng cáo
function ad_image_field_callback()
{
    $ad_image_url = get_option('ad_image_url');
    ?>
    <input type="text" name="ad_image_url" id="ad_image_url" value="<?php echo esc_url($ad_image_url); ?>"
        class="regular-text">
    <button type="button" class="button" id="upload_ad_image_button">Chọn Ảnh</button>
    <br><br>
    <img src="<?php echo esc_url($ad_image_url); ?>" id="ad_image_preview" style="max-width: 100%; height: auto;">
    <?php
}

// Thêm script Media Uploader
function ad_image_selector_script()
{
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            var mediaUploader;
            $('#upload_ad_image_button').click(function (e) {
                e.preventDefault();

                // Nếu đã có media uploader, dùng lại
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                // Mở cửa sổ media uploader
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Chọn Ảnh Quảng Cáo',
                    button: {
                        text: 'Chọn Ảnh'
                    },
                    multiple: false // Không cho phép chọn nhiều ảnh
                });

                mediaUploader.on('select', function () {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#ad_image_url').val(attachment.url); // Lưu URL ảnh
                    $('#ad_image_preview').attr('src', attachment.url); // Hiển thị ảnh đã chọn
                });

                mediaUploader.open();
            });
        });
    </script>
    <?php
}
add_action('admin_footer', 'ad_image_selector_script');

// Thêm hiệu ứng bắn pháo giấy (confetti) trên frontend
// Thêm hiệu ứng bắn pháo giấy (confetti) và ảnh quảng cáo lên frontend
// Thêm hiệu ứng bắn pháo giấy (confetti) và ảnh quảng cáo lên frontend
function enqueue_confetti_script()
{
    // Kiểm tra xem hiệu ứng bắn pháo giấy có được bật không và chỉ chạy trên trang chủ
    if (get_option('tete_effects_enable_confetti') == 1 && is_front_page()) {
        wp_enqueue_script('confetti-js', 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js', array(), null, true);

        // Thêm mã JavaScript để chạy hiệu ứng bắn pháo bông
        wp_add_inline_script('confetti-js', '
            document.addEventListener("DOMContentLoaded", function() {
                var colors = "' . esc_js(get_option('tete_effects_confetti_colors')) . '".split(",");
                var duration = 2000; // Thời gian bắn pháo bông
                var animationEnd = Date.now() + duration;
                var defaults = { origin: { y: 0.7 } };

                function shootConfettiFrom(side) {
                    return {
                        ...defaults,
                        particleCount: 50,
                        spread: 50,
                        angle: side === "left" ? 45 : 135,
                        origin: { x: side === "left" ? 0 : 1, y: 0.5 },
                        velocity: 0.8,
                        colors: colors
                    };
                }

                // Ẩn ảnh quảng cáo trước khi bắt đầu bắn pháo bông
                var adImageUrl = "' . esc_url(get_option('ad_image_url')) . '";
                var adImage = document.getElementById("ad_image_preview");
                if (adImageUrl && adImage) {
                    adImage.style.display = "none"; // Ẩn ảnh trước khi bắn pháo bông
                }

                // Bắt đầu bắn pháo bông
                var interval = setInterval(function() {
                    var timeLeft = animationEnd - Date.now();
                    if (timeLeft <= 0) return clearInterval(interval);
                    confetti(shootConfettiFrom("left"));
                    confetti(shootConfettiFrom("right"));
                }, 100);

                // Hiển thị lại ảnh quảng cáo sau khi bắn pháo bông kết thúc
                setTimeout(function() {
                    if (adImageUrl && adImage) {
                        adImage.style.display = "block"; // Hiển thị lại ảnh sau khi pháo bông kết thúc
                    }
                }, duration);
            });
        ');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_confetti_script');

// Đăng ký Custom Post Type cho Slide
function create_slide_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Slides',
            'singular_name' => 'Slide',
            'add_new' => 'Thêm Slide mới',
            'add_new_item' => 'Thêm Slide mới',
            'edit_item' => 'Chỉnh sửa Slide',
            'new_item' => 'Slide mới',
            'view_item' => 'Xem Slide',
            'search_items' => 'Tìm kiếm Slide',
            'not_found' => 'Không có slide nào',
            'not_found_in_trash' => 'Không có slide trong thùng rác',
            'all_items' => 'Tất cả Slides',
            'menu_name' => 'Slides',
            'name_admin_bar' => 'Slide'
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail'), // Chỉ hỗ trợ Title và Featured Image
        'menu_icon' => 'dashicons-images-alt2', // Icon trong admin menu
        'rewrite' => array('slug' => 'slide'),
        'show_in_menu' => true,
    );

    register_post_type('slide', $args);
}
add_action('init', 'create_slide_post_type');

// Thêm Meta Box cho trường "Link" trong Slide
function add_slide_meta_box()
{
    add_meta_box(
        'slide_link_meta_box',         // ID của meta box
        'Link chương trình',              // Tiêu đề của meta box
        'render_slide_link_meta_box',  // Hàm để render nội dung meta box
        'slide',                       // Chỉ định loại post cần hiển thị meta box
        'normal',                      // Vị trí hiển thị meta box (normal, side, hoặc advanced)
        'high'                         // Độ ưu tiên (high, low)
    );
}
add_action('add_meta_boxes', 'add_slide_meta_box');

// Hàm render nội dung của Meta Box
function render_slide_link_meta_box($post)
{
    // Lấy giá trị link hiện tại nếu có
    $link = get_post_meta($post->ID, '_slide_link', true);
    ?>
    <label for="slide_link">URL của chương trình:</label>
    <input type="text" id="slide_link" name="slide_link" value="<?php echo esc_attr($link); ?>" style="width: 100%;" />
    <p><small>Nhập liên kết mà bạn muốn trỏ đến khi người dùng nhấp vào slide này.</small></p>
    <?php
}

// Lưu giá trị trường "Link" khi bài viết được lưu
function save_slide_link_meta($post_id)
{
    // Kiểm tra xem có phải là autosave hay không
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    // Kiểm tra quyền của người dùng
    if (!current_user_can('edit_post', $post_id))
        return $post_id;

    // Kiểm tra và lưu giá trị trường "Link"
    if (isset($_POST['slide_link'])) {
        update_post_meta($post_id, '_slide_link', sanitize_text_field($_POST['slide_link']));
    }
}
add_action('save_post', 'save_slide_link_meta');

// Thêm mã ngẫu nhiên vào tên người bình luận trước khi lưu, trừ khi là admin
function add_random_code_to_comment_author($commentdata)
{
    // Kiểm tra nếu người bình luận đã đăng nhập và là admin
    if (!is_user_logged_in() || !current_user_can('administrator')) {
        // Tạo mã số ngẫu nhiên 5 chữ số
        $random_code = sprintf('%05d', rand(0, 99999));

        // Nếu người bình luận không nhập tên, gán là "Khách"
        if (empty($commentdata['comment_author'])) {
            $commentdata['comment_author'] = 'Khách';
        }

        // Thêm mã số vào tên người bình luận
        $commentdata['comment_author'] = $commentdata['comment_author'] . ' - ' . $random_code;
    }

    return $commentdata;
}
add_filter('preprocess_comment', 'add_random_code_to_comment_author');



