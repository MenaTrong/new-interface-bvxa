<?php

// Lấy ảnh tiêu biểu
$image = get_the_post_thumbnail_url(get_the_ID(), 'full'); // 'full' có thể thay đổi theo kích thước mong muốn

// Nếu không có ảnh tiêu biểu, lấy ảnh từ trường ACF
if (!$image) {
    $image = get_field('hero_image'); // Thay 'hero_image' bằng tên trường ACF của bạn
    if ($image && isset($image['url'])) {
        $image_url = $image['url'];
    } else {
        // Nếu không có cả ảnh tiêu biểu và ảnh ACF, sử dụng hình ảnh mẫu
        $image_url = 'https://via.placeholder.com/1600x900';
    }
} else {
    $image_url = $image;
}
?>

<section id="hero-fullscreen-3" class="hero-fullscreen-3 dark-background">
    <img src="<?php echo esc_url($image_url); ?>" alt="Ảnh tiêu đề" class="img-fluid" id="hero-fullscreen-3-img">
</section>
<?php
// Lấy shortcode từ ACF
$slogan_khoa = get_field('slogan_khoa');
?>

<div class="inner-frame">
    <h1><?php echo esc_html(get_the_title()); ?></h1>
    <?php if ($slogan_khoa): ?>
        <span><?php echo do_shortcode($slogan_khoa); ?></span>
    <?php endif; ?>
</div>


<?php get_template_part('modal'); ?>