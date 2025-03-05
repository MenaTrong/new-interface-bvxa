<?php
/*
Template Name: Tiêm chủng
*/
get_header();
?>

<main>
	<!-- ======= Department section ========= -->
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
					<h1>Trung tâm tiêm chủng</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End Department Section -->

	<div class="card-container card-container-margin-top" style="padding: 0 20px;">
		<div class="featured-services justify-content-center align-items-center text-center">
			<div class="row gy-4">
				<div class="col-xl-3 d-flex">
					<div class="service-item position-relative" style="box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);">
						<div class="icon"><i class="bi bi-1-square-fill icon"></i></div>
						<h4><a class="stretched-link">BVXA TP. Hồ Chí Minh</a></h4>
						<p style="color: #558AA2;">
							Hotline tư vấn tiêm chủng 1 BVXA TP. Hồ Chí Minh (7 – 21 giờ): 0865.855.115
						</p>
						<p style="color: #558AA2;">
							Hotline tư vấn tiêm chủng 2 BVXA TP. Hồ Chí Minh (7 – 16 giờ): 0835.855.115
						</p>
					</div>
				</div>
				<div class="col-xl-3 d-flex">
					<div class="service-item position-relative" style="box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);">
						<div class="icon"><i class="bi bi-2-square-fill icon"></i></div>
						<h4><a class="stretched-link">BVXA Vĩnh Long</a></h4>
						<p style="color: #558AA2;">
							Hotline tư vấn tiêm chủng BVXA – Vĩnh Long (7 – 21 giờ): 0868.455.115
						</p>
					</div>
				</div>
				<div class="col-xl-3 d-flex">
					<div class="service-item position-relative" style="box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);">
						<div class="icon"><i class="bi bi-3-square-fill icon"></i></div>
						<h4><a class="stretched-link">BVXA Tây Ninh</a></h4>
						<p style="color: #558AA2;">
							Hotline tư vấn tiêm chủng BVXA – Tây Ninh (7 – 21 giờ): 0838.855.115
						</p>
						<p style="color: #558AA2;">
							Hotline tư vấn tiêm chủng BVXA – Tây Ninh (7 – 16 giờ): 0839.855.115
						</p>
					</div>
				</div>
				<div class="col-xl-3 d-flex">
					<div class="service-item position-relative" style="box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);">
						<div class="icon"><i class="bi bi-4-square-fill icon"></i></div>
						<h4><a class="stretched-link">BVXA Long An</a></h4>
						<p style="color: #558AA2;">
							Hotline tư vấn tiêm chủng BVXA – Long An (7 – 16 giờ): 0848.855.115
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- ======= Why Us Section ======= -->
	<section id="why-us" class="why-us m-t-50 m-b-50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 align-items-stretch position-relative video-box">
					<!-- Thêm ảnh nền cho video trước khi người dùng bấm vào -->
					<div class="video-thumbnail">
						<img src="<?php bloginfo('template_directory') ?>/Images/anh-tiem-chung/trung-tam-tiem-chung.jpg"" alt="Video nền" />
					</div>
					<!-- Nút Play -->
					<a href="https://www.youtube.com/watch?v=YsROAdm2gXk&list=PL8YFb_LPdXa5vnugo9lvJueJC0LsKETNx&index=2"
						class="glightbox play-btn mb-4"></a>
				</div>
				<div class="col-lg-6 d-flex flex-column justify-content-center align-items-stretch">
					<div class="content">
						<h3>VÌ SAO PHẢI TIÊM CHỦNG VẮC-XIN?</h3>
						<p>
							Thực tế cho thấy, trước khi loài người phát minh ra vắc-xin tiêm chủng, đã có rất nhiều trẻ
							em bị chết, tàn tật vì những căn bệnh truyền nhiễm như: Lao, Bạch hầu, Ho gà, Uốn ván, Bại
							liệt, viêm não Nhật Bản…Nhờ sự tiến bộ không ngừng của khoa học và sự ra đời của vắc-xin đã
							góp phần khống chế, thanh toán hoàn toàn một số bệnh truyền nhiễm nguy hiểm.
						</p>
						<p>
							Hiện nay đã có trên 20 loại bệnh nhiễm trùng có thể dự phòng được bằng vắc-xin. Vắc-xin là
							biện pháp phòng bệnh hiệu quả nhất để bảo vệ cho mọi người. Đặc biệt là trẻ sơ sinh và trẻ
							nhỏ, nếu không được tiêm chủng và bị phơi nhiễm với tác nhân gây bệnh, cơ thể các trẻ sẽ
							không đủ sức để chống lại bệnh tật và sẽ mắc bệnh.
						</p>
						<p style="font-weight: 600;">
							Tại BVXA, chúng tôi có hầu hết các loại vắc-xin cần thiết cho cả trẻ em và người lớn. Việc
							quản lý, sử dụng vắc-xin tuân thủ đúng theo quy định của Bộ Y tế đồng thời bệnh viện luôn
							thực hiện nghiêm ngặt quy trình an toàn tiêm chủng.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Why Us Section -->


	<!-- ======= Services Section ======= -->
	<section id="services" class="services bg-white">
		<div class="container">

			<div class="container">
				<div class="section-header">
					<h3>QUY TRÌNH TIÊM CHỦNG AN TOÀN</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="icon-box">
						<i class="bi bi-1-square" style="color: #0ea5e0;"></i>
						<h4><a href="#">Ghi đầy đủ thông tin</a></h4>
						<p>Các bậc cha mẹ của trẻ, người đi tiêm chủng (người lớn) điền đầy đủ thông tin vào bảng
							kiểm trước tiêm chủng theo mẫu quy định</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="icon-box">
						<i class="bi bi-2-square" style="color: #07cc70;"></i>
						<h4><a href="#">Khám sàng lọc</a></h4>
						<p>Bác sĩ chuyên khoa sẽ thực hiện khám sàng lọc, tư vấn cho các bậc cha mẹ, người đi tiêm
							chủng và chỉ định tiêm chủng</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="icon-box">
						<i class="bi bi-3-square" style="color: #e40373;"></i>
						<h4><a href="#">Khi tiêm chủng</a></h4>
						<p>Nhân viên y tế thực hiện việc kiểm tra đối chiếu thông tin người được tiêm chủng, thông
							báo cho các bậc phụ huynh, người đi tiêm chủng loại vắc-xin cần tiêm, tên, tác dụng,
							xuất xứ, liều dùng, hạn dùng… và thực hiện tiêm chủng đúng quy định, đúng kỹ thuật.</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="icon-box">
						<i class="bi bi-4-square" style="color: #f0b103;"></i>
						<h4><a href="#">Sau tiêm chủng</a></h4>
						<p>Người được tiêm chủng được lưu lại tại bệnh viện khoảng 30’ để Bác sĩ theo dõi sức khỏe
							và các phản ứng sau tiêm (nếu có)</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="icon-box">
						<i class="bi bi-5-square" style="color: #3145fa;"></i>
						<h4><a href="#">30 phút sau tiêm</a></h4>
						<p>Người được tiêm chủng được Bác sĩ khám lại sau 30 phút theo dõi. Nếu tình trạng sức khỏe
							người được tiêm chủng ổn định, Bác sĩ cho ra về và hướng dẫn tiếp tục theo dõi tại nhà
							ít nhất 24 giờ sau tiêm chủng.</p>
					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- End Services Section -->

	<!-- Features Details Section -->
	<section id="features-details" class="features-details section">
		<div class="container">
			<div class="row gy-4 justify-content-between features-item">
				<div class="col-lg-8">
					<div class="container">
						<div class="section-header">
							<h3>TIÊM CHỦNG TẠI BỆNH VIỆN XUYÊN Á</h3>
							<p>
								Lịch tiêm ngừa cho trẻ em tại BVXA, các loại vắc-xin và bảng giá tham khảo tại Bệnh
								Viện Xuyên Á
							</p>
						</div>
					</div>
					<img src="<?php bloginfo('template_directory') ?>/Images/anh-tiem-chung/lichtiem.jpg"
						class="img-fluid" alt="">
				</div>
				<div class="col-lg-4">
					<img src="<?php bloginfo('template_directory') ?>/Images/anh-tiem-chung/giatiem.jpg"
						class="img-fluid" alt="">
				</div>
			</div>
		</div>
	</section>
	<!-- /Features Details Section -->

	<!-- Modal -->
	<?php get_template_part('modal'); ?>
</main>

<?php get_footer(); ?>

</body>

</html>