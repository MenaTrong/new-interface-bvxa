<?php
// WP_Query để lấy các slide từ Custom Post Type 'slide'
$args = array(
    'post_type' => 'slide', // CPT đã tạo
    'posts_per_page' => -1, // Lấy tất cả các slide
    'orderby' => 'date',    // Sắp xếp theo ngày đăng
    'order' => 'DESC',      // Đảo ngược theo ngày đăng
);
$query = new WP_Query($args);

// Kiểm tra nếu có slide
if ($query->have_posts()) :
?>

<section class="container slide-index m-t-50">
    <div class="slideshow-container">
        <?php
        $index = 1; // Đánh số slide bắt đầu từ 1
        while ($query->have_posts()) : $query->the_post();
            // Lấy ảnh đại diện của slide
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

            // Lấy link của slide từ custom field
            $link = get_post_meta(get_the_ID(), '_slide_link', true); // Lấy giá trị của trường "Link"
        ?>
            <!-- Full-width images with number and caption text -->
            <a href="<?php echo esc_url($link); ?>" target="_blank"> <!-- Đặt link vào href -->
                <div class="mySlides">
                    <img src="<?php echo esc_url($thumbnail_url); ?>" style="width:100%">
                </div>
            </a>
        <?php
        $index++;
        endwhile;
        ?>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <!-- The dots/circles -->
        <div class="dots-container" style="text-align:center">
            <?php
            // Tạo các dot cho slider
            $index = 1;
            while ($query->have_posts()) : $query->the_post();
            ?>
                <span class="dot" onclick="currentSlide(<?php echo $index; ?>)"></span>
            <?php
            $index++;
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php
endif; // End if($query->have_posts())
wp_reset_postdata();
?>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");

        // Điều chỉnh slideIndex nếu vượt quá số lượng slide
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }

        // Ẩn tất cả các slide
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        // Loại bỏ lớp "active" khỏi tất cả các dots
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        // Hiển thị slide hiện tại và đánh dấu dot tương ứng
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }

    // Tự động chuyển slide mỗi 5 giây (bạn có thể điều chỉnh thời gian)
    setInterval(function () {
        plusSlides(1);
    }, 5000);
</script>
