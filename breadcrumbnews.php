<!-- Breadcrumb -->
<section style="padding-bottom: 0; padding-top: 0;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"><i class="bi bi-house-fill m-r-8"></i>Trang chủ</a></li>
            <?php
            // Hiển thị breadcrumb của danh mục
            $category = get_the_category();
            if ($category) {
                echo '<li class="breadcrumb-item"><a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a></li>';
            }
            ?>
            <!-- Breadcrumb cho trang hiện tại -->
            <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
        </ol>
    </nav>
</section>
<!-- End Breadcrumb -->
