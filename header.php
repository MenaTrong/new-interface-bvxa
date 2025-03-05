<!DOCTYPE html>
<html>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font google -->
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700&display=swap"
		rel="stylesheet">

	<!-- Tag title -->
	<title>Bệnh viện đa khoa Xuyên Á</title>

	<!-- Vendor CSS Files -->
	<link href="<?php bloginfo('template_directory') ?>/assets/vendor/fontawesome-free/css/all.min.css"
		rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css"
		rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/assets/css/variables.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/assets/css/main.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/CSS/util.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="header">
		<div class="container-fluid d-flex align-items-center justify-content-between">
			<!-- Logo -->
			<a href="<?php bloginfo('url'); ?>" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
				<img src="<?php bloginfo('template_directory') ?>/Images/logo.png" width="150" alt="Logo">
			</a>

			<!-- Div chứa Menu và Icon Toggle -->
			<div class="frame-menu-toggle d-flex align-items-center justify-content-end">

				<!-- Nút search và Đặt hẹn tư vấn nằm cạnh nhau -->
				<a class="search-circle-hidden-1280 search-circle-1 align-items-center justify-content-center">
					<i class="bi bi-search"></i>
					<i class="bi bi-x-circle-fill d-none"></i> <!-- Biểu tượng dấu X (ẩn mặc định) -->
				</a>

				<a class="btn-hidden-1280 m-l-10 ms-auto" href="" data-bs-toggle="modal"
					data-bs-target="#exampleModal">Đặt hẹn tư vấn</a>

				<!-- Div chứa Menu và Icon Toggle -->
				<div class="d-flex align-items-center justify-content-end">

					<!-- Menu và Nút Đặt lịch hẹn -->
					<nav id="navbar" class="navbar">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'header-menu',
								'container' => 'false',
								'menu_id' => 'header-menu',
								'menu_class' => 'menu',
								'walker' => new Custom_Nav_Walker() // Sử dụng walker tùy chỉnh
							)
						);
						?>
						<!-- Biểu tượng điều hướng (Mobile) -->
						<i class="bi bi-list mobile-nav-toggle d-none"></i>

						<!-- Nút Đặt lịch hẹn -->
						<a class="hidden-btn btn-getstarted m-l-10" href="" data-bs-toggle="modal"
							data-bs-target="#exampleModal">Đặt hẹn tư vấn</a>

						<!-- Nút search trên mobile -->
						<a class="search-circle d-flex align-items-center justify-content-center">
							<i class="bi bi-search"></i>
							<i class="bi bi-x-circle-fill d-none"></i> <!-- Biểu tượng dấu X (ẩn mặc định) -->
						</a>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- End Header -->

	<!-- Nền trắng mở từ phải ra -->
	<div class="search-overlay hidden">
		<div class="search-content">
			<!-- Nội dung tìm kiếm hoặc bất kỳ nội dung nào khác -->
			<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', () => {
			// Kiểm tra và đồng bộ hóa trạng thái active ngay khi trang được tải
			document.querySelectorAll('li.active').forEach(parentLi => {
				const isActive = true; // Chắc chắn là li đang có active

				// Kiểm tra và đồng bộ hóa cho arrow-button-1
				const allArrows1 = parentLi.querySelectorAll('.arrow-button-1');
				allArrows1.forEach(arrow => {
					arrow.classList.add('active'); // Thêm active cho arrow-button-1
				});
			});

			document.querySelectorAll('.sub-menu li.active').forEach(parentLi => {
				const isActive = true; // Chắc chắn là li đang có active

				// Kiểm tra và đồng bộ hóa cho arrow-button-2
				const allArrows2 = parentLi.querySelectorAll('.arrow-button-2');
				allArrows2.forEach(arrow => {
					arrow.classList.add('active'); // Thêm active cho arrow-button-2
				});
			});

			// Xử lý sự kiện click sau khi đã đồng bộ trạng thái ban đầu
			document.querySelectorAll('.arrow-button').forEach(button => {
				button.addEventListener('click', (event) => {
					event.preventDefault(); // Ngăn không cho nhấp vào button chuyển trang

					const parentLi = button.closest('li'); // Tìm <li> cha
					const submenu = parentLi.querySelector('.sub-menu, .sub-menu-2'); // Tìm submenu

					// Thêm hoặc bỏ lớp active cho menu cấp cha (li)
					const isActive = parentLi.classList.toggle('active'); // Lưu trạng thái active của <li>

					// Đồng bộ hóa lớp active cho button (arrow-button)
					button.classList.toggle('active', isActive);

					// Xử lý các nút mũi tên riêng biệt cho cấp 1 và cấp 2
					if (button.classList.contains('arrow-button-1')) {
						// Xử lý cho arrow-button-1 (menu cấp 1)
						const allArrows1 = parentLi.querySelectorAll('.arrow-button-1');
						allArrows1.forEach(arrow => {
							arrow.classList.toggle('active', isActive); // Đồng bộ hóa với trạng thái active của <li>
						});
					} else if (button.classList.contains('arrow-button-2')) {
						// Xử lý cho arrow-button-2 (menu cấp 2)
						const allArrows2 = parentLi.querySelectorAll('.arrow-button-2');
						allArrows2.forEach(arrow => {
							arrow.classList.toggle('active', isActive); // Đồng bộ hóa với trạng thái active của <li>
						});
					}

					// Hiển thị/ẩn submenu khi click vào mũi tên
					if (submenu) {
						submenu.classList.toggle('active', isActive);
					}
				});
			});
		});

	</script>
</body>

</html>