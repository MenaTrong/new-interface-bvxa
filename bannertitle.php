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
    <img src="<?php echo esc_url($image_url); ?>" alt="Hero Image" class="img-fluid" id="hero-fullscreen-3-img">
    
    <div class="overlay"></div> <!-- Lớp phủ gradient -->
    
    <div class="container">
        <div class="row">
            <div class="col-6 text-center" data-aos="zoom-out">
                <h1><?php echo esc_html(get_the_title()); ?></h1>
            </div>
        </div>
    </div>
</section>


<?php get_template_part('modal'); ?>