<?php

// Lấy tệp từ trường ACF (video hoặc hình ảnh)
$hero_content = get_field('hero_content'); // Trường ACF tên là 'hero_content'

// Kiểm tra nếu có tệp video (MP4) được tải lên
if ($hero_content && isset($hero_content['url'])) {
    $file_url = $hero_content['url']; // Lấy URL tệp từ trường ACF

    // Kiểm tra loại tệp (video hay hình ảnh)
    $file_type = $hero_content['mime_type'];
    $is_video = strpos($file_type, 'video') !== false; // Kiểm tra nếu là video
    $is_image = strpos($file_type, 'image') !== false; // Kiểm tra nếu là ảnh
} else {
    $file_url = false; // Nếu không có tệp, đặt biến là false
}

// Kiểm tra nếu có ảnh tiêu biểu hoặc ảnh từ ACF (fallback ảnh)
$image = get_the_post_thumbnail_url(get_the_ID(), 'full');
if (!$image) {
    $image = get_field('hero_image'); // Trường ảnh tùy chỉnh
    if ($image && isset($image['url'])) {
        $image_url = $image['url'];
    } else {
        $image_url = 'https://via.placeholder.com/1600x900'; // Ảnh mặc định
    }
} else {
    $image_url = $image;
}
?>
<section id="hero-fullscreen-3" class="hero-fullscreen-3 dark-background">
    <?php if ($is_video && $file_url): ?>
        <!-- Nếu tệp là video MP4 -->
        <div class="hero-video-wrapper">
            <video autoplay muted loop width="100%" height="100%" playsinline>
                <source src="<?php echo esc_url($file_url); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    <?php elseif ($is_image && $file_url): ?>
        <!-- Nếu tệp là ảnh -->
        <img src="<?php echo esc_url($file_url); ?>" alt="Ảnh tiêu đề" class="img-fluid" id="hero-fullscreen-3-img">
    <?php else: ?>
        <!-- Nếu không có video hoặc ảnh, sử dụng fallback ảnh -->
        <img src="<?php echo esc_url($image_url); ?>" alt="Ảnh tiêu đề" class="img-fluid" id="hero-fullscreen-3-img">
    <?php endif; ?>

    <div class="overlay"></div> <!-- Lớp phủ gradient -->
    
    <div class="container">
        <div class="row">
            <div class="col-8 text-center" data-aos="zoom-out">
                <h1><?php echo esc_html(get_the_title()); ?></h1>
            </div>
        </div>
    </div>
</section>
