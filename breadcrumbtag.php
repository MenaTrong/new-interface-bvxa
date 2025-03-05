<!-- Breadcrumb -->
<section style="padding-bottom: 0; padding-top: 0;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo home_url(); ?>">
                    <i class="bi bi-house-fill m-r-8"></i>Trang chủ
                </a>
            </li>
            <?php
            // Kiểm tra nếu đang ở trang tag
            if (is_tag()) {
                $tag = get_queried_object(); // Lấy thông tin tag hiện tại
                echo '<li class="breadcrumb-item"><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
            }
            // Nếu là một trang Category
            elseif (is_category()) {
                $category = get_queried_object(); // Lấy thông tin category hiện tại (dùng get_queried_object thay vì get_the_category)
                if ($category) {
                    echo '<li class="breadcrumb-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                }
            }
            // Nếu là một bài viết (single post)
            elseif (is_single()) {
                $categories = get_the_category();
                if ($categories) {
                    // Lấy danh mục đầu tiên của bài viết hoặc có thể tùy chỉnh để chọn một danh mục nào đó
                    $primary_category = $categories[0];
                    echo '<li class="breadcrumb-item"><a href="' . get_category_link($primary_category->term_id) . '">' . $primary_category->name . '</a></li>';
                }
                echo '<li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>';
            }
            ?>
            
        </ol>
    </nav>
</section>
<!-- End Breadcrumb -->
