<?php
// Cấu hình truy vấn WordPress để lấy 3 bài viết
$args = array(
    'post_status' => 'publish', // Chỉ lấy những bài viết được publish
    'post_type' => 'post', // Lấy những bài viết thuộc post
    'posts_per_page' => 3, // số lượng bài viết
    'cat' => 3, // lấy bài viết trong chuyên mục có id là 3
);
$getposts = new WP_Query($args);
?>

<div class="col-lg-3 m-t-60">
<div class="widget-item px-3 pt-3">
<?php if ($getposts->have_posts()): ?>
    <?php while ($getposts->have_posts()):
        $getposts->the_post(); ?>
       
                <!-- News block -->
                <div class="m-b-35">
                    <!-- Featured image -->
                    <a href="<?php the_permalink(); ?>">
                        <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4" data-mdb-ripple-color="light">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'style' => 'width: 100%; height: 200px; object-fit: cover;', 'alt' => 'Ảnh tiêu biểu']); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/path/to/default-image.jpg" class="img-fluid"
                                    alt="Ảnh tiêu biểu" style="width: 100%; height: 200px; object-fit: cover;" />
                            <?php endif; ?>
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </div>
                    </a>

                    <div class="row">
                        <div class="col-6">
                            <p class=""><?php the_category(', '); ?></p>
                        </div>
                        <div class="col-6 text-end">
                            <p class="m-r-5"><i class="bi bi-clock"></i> <?php echo get_the_date('d-m-Y'); ?></p>
                        </div>
                    </div>
                    
                    <a href="<?php the_permalink(); ?>" class="text-dark">
                        <h5 style="font-weight: 400; color: #263d89;"><?php the_title(); ?></h5>
                        <p style="height: 100%; width: 100%;" class="content-preview"><?php echo wp_trim_words(get_the_excerpt(), 55); ?></p>
                    </a>
                </div>
                
                <!-- News block -->
            
    <?php endwhile; ?>
<?php endif;
wp_reset_postdata(); ?>
</div>
</div>