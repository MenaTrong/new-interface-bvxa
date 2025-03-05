<!-- Footer -->
<footer class="bg-footer text-muted">
	<section style="color: #fff;">
		<div class="container mt-1">
			<div class="row container mt-3">

				<div class="col-lg-6 mx-auto mb-4">
					<h6 class="text-uppercase fw-bold mb-4">
						KHOA LÂM SÀNG
					</h6>
					<div class="menu-container">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'clinical-menu',
							'container' => false,
							'menu_class' => 'menufooter menufooter-clinical',
						));
						?>
					</div>
				</div>


				<div class="col-lg-2 mx-auto mb-4">
					<h6 class="text-uppercase fw-bold mb-4">
						KHOA CẬN LÂM SÀNG
					</h6>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'subclinical-menu', // Sử dụng menu footer
						'container' => false,
						'menu_class' => 'menufooter',
					));
					?>
				</div>

				<div class="col-lg-2 mx-auto mb-4">
					<h6 class="text-uppercase fw-bold mb-4">
						ĐƯỜNG DẪN
					</h6>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer-menu', // Sử dụng menu footer
						'container' => false,
						'menu_class' => 'menufooter',
					));
					?>
				</div>

				<div class="col-lg-2 mx-auto mb-4">
					<h6 class="text-uppercase fw-bold mb-4">
						LIÊN HỆ
					</h6>
					<p>
						<i class="bi bi-telephone m-r-5"></i>1800 9075
					</p>
					<p>
						<i class="bi bi-truck m-r-5"></i>(028) 37966999
					</p>
					<p>
						<i class="bi bi-envelope m-r-5"></i>info@bvxuyena.com.vn
					</p>
					<p>
						<i class="bi bi-geo-alt m-r-5"></i><strong>TP Hồ Chí Minh:</strong> Số 42, Quốc Lộ 22, ấp Chợ,
						Xã Tân Phú Trung, Huyện Củ Chi, TP. HCM
					</p>
					<p>
						<i class="bi bi-geo-alt m-r-5"></i><strong>Vĩnh Long:</strong> Số 68E Phạm Hùng, Phường 9, Thành
						Phố Vĩnh Long, Tỉnh Vĩnh Long
					</p>
					<p>
						<i class="bi bi-geo-alt m-r-5"></i><strong>Tây Ninh:</strong> Số 10 Xuyên Á, ấp Trâm Vàng 3, xã
						Thanh Phước, huyện Gò Dầu, tỉnh Tây Ninh
					</p>
					<p>
						<i class="bi bi-geo-alt m-r-5"></i><strong>Long An:</strong> Số 459, Đường tỉnh lộ 825, Ô 4, Khu
						A, Thị Trấn Hậu Nghĩa, huyện Đức Hòa, tỉnh Long An
					</p>
				</div>



				<section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
					<div class="me-5 d-none d-lg-block">
					</div>

					<div style="color: #fff;">
						<h6 class="text-uppercase fw-bold mb-4">Liên hệ với chúng tôi:</h6>
						<a href="https://www.facebook.com/bvxuyena" class="me-4 text-reset">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48"
								viewBox="0 0 48 48">
								<path fill="#3F51B5"
									d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z">
								</path>
								<path fill="#FFF"
									d="M34.368,25H31v13h-5V25h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H35v4h-2.287C31.104,17,31,17.6,31,18.723V21h4L34.368,25z">
								</path>
							</svg>
						</a>
						<a href="https://www.youtube.com/channel/UC2PBZTYZmYqLp4FwidbrT5w" class="me-4 text-reset">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48"
								viewBox="0 0 48 48">
								<path fill="#FF3D00"
									d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z">
								</path>
								<path fill="#FFF" d="M20 31L20 17 32 24z"></path>
							</svg>
						</a>

						<a href="https://zalo.me/benhvienxuyena#sthash.Lf79DdDL.dpuf" class="me-4 text-reset">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48"
								viewBox="0 0 48 48">
								<path fill="#2962ff"
									d="M15,36V6.827l-1.211-0.811C8.64,8.083,5,13.112,5,19v10c0,7.732,6.268,14,14,14h10	c4.722,0,8.883-2.348,11.417-5.931V36H15z">
								</path>
								<path fill="#eee"
									d="M29,5H19c-1.845,0-3.601,0.366-5.214,1.014C10.453,9.25,8,14.528,8,19	c0,6.771,0.936,10.735,3.712,14.607c0.216,0.301,0.357,0.653,0.376,1.022c0.043,0.835-0.129,2.365-1.634,3.742	c-0.162,0.148-0.059,0.419,0.16,0.428c0.942,0.041,2.843-0.014,4.797-0.877c0.557-0.246,1.191-0.203,1.729,0.083	C20.453,39.764,24.333,40,28,40c4.676,0,9.339-1.04,12.417-2.916C42.038,34.799,43,32.014,43,29V19C43,11.268,36.732,5,29,5z">
								</path>
								<path fill="#2962ff"
									d="M36.75,27C34.683,27,33,25.317,33,23.25s1.683-3.75,3.75-3.75s3.75,1.683,3.75,3.75	S38.817,27,36.75,27z M36.75,21c-1.24,0-2.25,1.01-2.25,2.25s1.01,2.25,2.25,2.25S39,24.49,39,23.25S37.99,21,36.75,21z">
								</path>
								<path fill="#2962ff" d="M31.5,27h-1c-0.276,0-0.5-0.224-0.5-0.5V18h1.5V27z"></path>
								<path fill="#2962ff"
									d="M27,19.75v0.519c-0.629-0.476-1.403-0.769-2.25-0.769c-2.067,0-3.75,1.683-3.75,3.75	S22.683,27,24.75,27c0.847,0,1.621-0.293,2.25-0.769V26.5c0,0.276,0.224,0.5,0.5,0.5h1v-7.25H27z M24.75,25.5	c-1.24,0-2.25-1.01-2.25-2.25S23.51,21,24.75,21S27,22.01,27,23.25S25.99,25.5,24.75,25.5z">
								</path>
								<path fill="#2962ff"
									d="M21.25,18h-8v1.5h5.321L13,26h0.026c-0.163,0.211-0.276,0.463-0.276,0.75V27h7.5	c0.276,0,0.5-0.224,0.5-0.5v-1h-5.321L21,19h-0.026c0.163-0.211,0.276-0.463,0.276-0.75V18z">
								</path>
							</svg>
						</a>
						<a href="https://www.tiktok.com/@benhvienxuyena" class="me-4 text-reset">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48"
								viewBox="0 0 48 48">
								<path fill="#212121" fill-rule="evenodd"
									d="M10.904,6h26.191C39.804,6,42,8.196,42,10.904v26.191 C42,39.804,39.804,42,37.096,42H10.904C8.196,42,6,39.804,6,37.096V10.904C6,8.196,8.196,6,10.904,6z"
									clip-rule="evenodd"></path>
								<path fill="#ec407a" fill-rule="evenodd"
									d="M29.208,20.607c1.576,1.126,3.507,1.788,5.592,1.788v-4.011 c-0.395,0-0.788-0.041-1.174-0.123v3.157c-2.085,0-4.015-0.663-5.592-1.788v8.184c0,4.094-3.321,7.413-7.417,7.413 c-1.528,0-2.949-0.462-4.129-1.254c1.347,1.376,3.225,2.23,5.303,2.23c4.096,0,7.417-3.319,7.417-7.413L29.208,20.607L29.208,20.607 z M30.657,16.561c-0.805-0.879-1.334-2.016-1.449-3.273v-0.516h-1.113C28.375,14.369,29.331,15.734,30.657,16.561L30.657,16.561z M19.079,30.832c-0.45-0.59-0.693-1.311-0.692-2.053c0-1.873,1.519-3.391,3.393-3.391c0.349,0,0.696,0.053,1.029,0.159v-4.1 c-0.389-0.053-0.781-0.076-1.174-0.068v3.191c-0.333-0.106-0.68-0.159-1.03-0.159c-1.874,0-3.393,1.518-3.393,3.391 C17.213,29.127,17.972,30.274,19.079,30.832z"
									clip-rule="evenodd"></path>
								<path fill="#fff" fill-rule="evenodd"
									d="M28.034,19.63c1.576,1.126,3.507,1.788,5.592,1.788v-3.157 c-1.164-0.248-2.194-0.856-2.969-1.701c-1.326-0.827-2.281-2.191-2.561-3.788h-2.923v16.018c-0.007,1.867-1.523,3.379-3.393,3.379 c-1.102,0-2.081-0.525-2.701-1.338c-1.107-0.558-1.866-1.705-1.866-3.029c0-1.873,1.519-3.391,3.393-3.391 c0.359,0,0.705,0.056,1.03,0.159V21.38c-4.024,0.083-7.26,3.369-7.26,7.411c0,2.018,0.806,3.847,2.114,5.183 c1.18,0.792,2.601,1.254,4.129,1.254c4.096,0,7.417-3.319,7.417-7.413L28.034,19.63L28.034,19.63z"
									clip-rule="evenodd"></path>
								<path fill="#81d4fa" fill-rule="evenodd"
									d="M33.626,18.262v-0.854c-1.05,0.002-2.078-0.292-2.969-0.848 C31.445,17.423,32.483,18.018,33.626,18.262z M28.095,12.772c-0.027-0.153-0.047-0.306-0.061-0.461v-0.516h-4.036v16.019 c-0.006,1.867-1.523,3.379-3.393,3.379c-0.549,0-1.067-0.13-1.526-0.362c0.62,0.813,1.599,1.338,2.701,1.338 c1.87,0,3.386-1.512,3.393-3.379V12.772H28.095z M21.635,21.38v-0.909c-0.337-0.046-0.677-0.069-1.018-0.069 c-4.097,0-7.417,3.319-7.417,7.413c0,2.567,1.305,4.829,3.288,6.159c-1.308-1.336-2.114-3.165-2.114-5.183 C14.374,24.749,17.611,21.463,21.635,21.38z"
									clip-rule="evenodd"></path>
							</svg>
						</a>
					</div>
				</section>
			</div>
		</div>
	</section>
</footer>

<div class="call-buttons-emergency-container">
	<!-- Nút gọi với biểu tượng điện thoại -->
	<a class="call-emergnecy-circle d-flex align-items-center justify-content-center">
		<i class="bi bi-telephone-fill p-r-5"></i> <!-- Biểu tượng điện thoại -->
		<i class="bi bi-x-circle-fill d-none p-r-5"></i> <!-- Biểu tượng dấu X (ẩn mặc định) -->
		<span class="hotline">Hotline</span>
	</a>

	<!-- Nút Zalo, nằm bên phải và nghiêng -->
	<a href="https://zalo.me/benhvienxuyena#sthash.Lf79DdDL.dpuf" target="_blank"
		class="call-emergnecy-circle-zalo zalo-button d-flex align-items-center justify-content-center">

		<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="80%" height="80%" viewBox="0 0 48 48">
			<path fill="#2962ff"
				d="M15,36V6.827l-1.211-0.811C8.64,8.083,5,13.112,5,19v10c0,7.732,6.268,14,14,14h10	c4.722,0,8.883-2.348,11.417-5.931V36H15z">
			</path>
			<path fill="#eee"
				d="M29,5H19c-1.845,0-3.601,0.366-5.214,1.014C10.453,9.25,8,14.528,8,19	c0,6.771,0.936,10.735,3.712,14.607c0.216,0.301,0.357,0.653,0.376,1.022c0.043,0.835-0.129,2.365-1.634,3.742	c-0.162,0.148-0.059,0.419,0.16,0.428c0.942,0.041,2.843-0.014,4.797-0.877c0.557-0.246,1.191-0.203,1.729,0.083	C20.453,39.764,24.333,40,28,40c4.676,0,9.339-1.04,12.417-2.916C42.038,34.799,43,32.014,43,29V19C43,11.268,36.732,5,29,5z">
			</path>
			<path fill="#2962ff"
				d="M36.75,27C34.683,27,33,25.317,33,23.25s1.683-3.75,3.75-3.75s3.75,1.683,3.75,3.75	S38.817,27,36.75,27z M36.75,21c-1.24,0-2.25,1.01-2.25,2.25s1.01,2.25,2.25,2.25S39,24.49,39,23.25S37.99,21,36.75,21z">
			</path>
			<path fill="#2962ff" d="M31.5,27h-1c-0.276,0-0.5-0.224-0.5-0.5V18h1.5V27z"></path>
			<path fill="#2962ff"
				d="M27,19.75v0.519c-0.629-0.476-1.403-0.769-2.25-0.769c-2.067,0-3.75,1.683-3.75,3.75	S22.683,27,24.75,27c0.847,0,1.621-0.293,2.25-0.769V26.5c0,0.276,0.224,0.5,0.5,0.5h1v-7.25H27z M24.75,25.5	c-1.24,0-2.25-1.01-2.25-2.25S23.51,21,24.75,21S27,22.01,27,23.25S25.99,25.5,24.75,25.5z">
			</path>
			<path fill="#2962ff"
				d="M21.25,18h-8v1.5h5.321L13,26h0.026c-0.163,0.211-0.276,0.463-0.276,0.75V27h7.5	c0.276,0,0.5-0.224,0.5-0.5v-1h-5.321L21,19h-0.026c0.163-0.211,0.276-0.463,0.276-0.75V18z">
			</path>
		</svg>
	</a>

	<!-- Danh sách các số điện thoại -->
	<div class="call-emergency-base" id="emergency-numbers">
		<a href="tel:18009075" class="call-emergency d-flex align-items-center justify-content-center">Tổng đài: 1800
			9075</a>
		<a href="tel:(028)37966999" class="call-emergency d-flex align-items-center justify-content-center">24/24: (083)
			999 9910</a>
		<a href="tel:(028)37966999" class="call-emergency d-flex align-items-center justify-content-center">Củ Chi:
			(028) 379 6699</a>
		<a href="tel:(0270)6250999" class="call-emergency d-flex align-items-center justify-content-center">Vĩnh Long:
			(0270) 6250 999</a>
		<a href="tel:(0272)3649999" class="call-emergency d-flex align-items-center justify-content-center">Long An:
			(0272) 364 999</a>
		<a href="tel:(0276)3762999" class="call-emergency d-flex align-items-center justify-content-center">Tây Ninh:
			(0276) 3762 999</a>
	</div>
</div>

<!-- Nút scroll-top -->
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script>
	// Lắng nghe sự kiện cuộn trang
	window.addEventListener('scroll', function () {
		// Lấy tham chiếu đến các phần tử
		const scrollTopButton = document.querySelector('.scroll-top');
		const emergencyContainer = document.querySelector('.call-buttons-emergency-container');

		// Kiểm tra vị trí cuộn của trang
		if (window.scrollY > 100) {  // Nếu người dùng cuộn xuống hơn 100px
			scrollTopButton.style.display = 'flex';  // Hiển thị nút "scroll-top"
			emergencyContainer.classList.add('shifted');  // Lùi vào trong
		} else {
			scrollTopButton.style.display = 'none';  // Ẩn nút "scroll-top"
			emergencyContainer.classList.remove('shifted');  // Trở lại vị trí cũ
		}
	});
</script>
<!-- Vendor JS Files -->
<script src="<?php bloginfo('template_directory') ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/assets/vendor/aos/aos.js"></script>
<script src="<?php bloginfo('template_directory') ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="<?php bloginfo('template_directory') ?>/assets/js/main.js"></script>

<?php wp_footer(); ?>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const toggle = document.querySelector('.mobile-nav-toggle');
		const adminBar = document.getElementById('wpadminbar');
		if (toggle && adminBar) {
			const adminBarHeight = adminBar.offsetHeight;
			toggle.style.top = `${20 + adminBarHeight}px`;
		}
	});
</script>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		var searchCircle = document.querySelector('.search-circle');
		var searchCircle1 = document.querySelector('.search-circle-1'); // Thêm phần này
		var searchOverlay = document.querySelector('.search-overlay');
		var searchIcon = searchCircle.querySelector('.bi-search');
		var closeIcon = searchCircle.querySelector('.bi-x-circle-fill');
		var searchIcon1 = searchCircle1.querySelector('.bi-search'); // Biểu tượng kính lúp cho searchCircle1
		var closeIcon1 = searchCircle1.querySelector('.bi-x-circle-fill'); // Biểu tượng dấu X cho searchCircle1

		// Sự kiện click vào .search-circle (nút kính lúp đầu tiên)
		searchCircle.addEventListener('click', function (event) {
			event.stopPropagation(); // Ngừng sự kiện lan truyền

			// Kiểm tra xem nền trắng có đang hiển thị không
			if (searchOverlay.classList.contains('visible')) {
				// Nếu nền trắng đang hiển thị, ẩn đi
				searchOverlay.classList.remove('visible');
				searchIcon.classList.remove('d-none'); // Hiển thị lại icon kính lúp
				closeIcon.classList.add('d-none'); // Ẩn icon dấu X
			} else {
				// Nếu nền trắng không hiển thị, hiển thị nó
				searchOverlay.classList.add('visible');
				searchIcon.classList.add('d-none'); // Ẩn icon kính lúp
				closeIcon.classList.remove('d-none'); // Hiển thị icon dấu X
			}
		});

		// Sự kiện click vào .search-circle-1 (nút kính lúp thứ hai)
		searchCircle1.addEventListener('click', function (event) {
			event.stopPropagation(); // Ngừng sự kiện lan truyền

			// Kiểm tra xem nền trắng có đang hiển thị không
			if (searchOverlay.classList.contains('visible')) {
				// Nếu nền trắng đang hiển thị, ẩn đi
				searchOverlay.classList.remove('visible');
				searchIcon1.classList.remove('d-none'); // Hiển thị lại icon kính lúp
				closeIcon1.classList.add('d-none'); // Ẩn icon dấu X
			} else {
				// Nếu nền trắng không hiển thị, hiển thị nó
				searchOverlay.classList.add('visible');
				searchIcon1.classList.add('d-none'); // Ẩn icon kính lúp
				closeIcon1.classList.remove('d-none'); // Hiển thị icon dấu X
			}
		});

		// Sự kiện click vào icon dấu X để đóng nền trắng (cho searchCircle)
		closeIcon.addEventListener('click', function (event) {
			event.stopPropagation(); // Ngừng sự kiện lan truyền

			// Ẩn nền trắng và chuyển lại icon về kính lúp
			searchOverlay.classList.remove('visible');
			searchIcon.classList.remove('d-none'); // Hiển thị lại icon kính lúp
			closeIcon.classList.add('d-none'); // Ẩn icon dấu X
		});

		// Sự kiện click vào icon dấu X để đóng nền trắng (cho searchCircle1)
		closeIcon1.addEventListener('click', function (event) {
			event.stopPropagation(); // Ngừng sự kiện lan truyền

			// Ẩn nền trắng và chuyển lại icon về kính lúp
			searchOverlay.classList.remove('visible');
			searchIcon1.classList.remove('d-none'); // Hiển thị lại icon kính lúp
			closeIcon1.classList.add('d-none'); // Ẩn icon dấu X
		});

		// Sự kiện click ra ngoài nền trắng và nút kính lúp
		document.addEventListener('click', function (event) {
			if (!searchOverlay.contains(event.target) && !searchCircle.contains(event.target) && !searchCircle1.contains(event.target)) {
				// Nếu click ngoài nền trắng và nút kính lúp
				searchOverlay.classList.remove('visible');
				searchIcon.classList.remove('d-none'); // Hiển thị lại icon kính lúp
				closeIcon.classList.add('d-none'); // Ẩn icon dấu X

				// Cũng ẩn cho searchCircle1
				searchIcon1.classList.remove('d-none'); // Hiển thị lại icon kính lúp
				closeIcon1.classList.add('d-none'); // Ẩn icon dấu X
			}
		});
	});
</script>


<script>
	document.addEventListener('DOMContentLoaded', function () {
		var emergencyCircle = document.querySelector('.call-emergnecy-circle');
		var hotline = document.querySelector('.hotline');
		var emergencyBase = document.querySelector('.call-emergency-base');
		var phoneIcon = emergencyCircle.querySelector('.bi-telephone-fill');
		var closeIcon = emergencyCircle.querySelector('.bi-x-circle-fill');

		// Sự kiện click vào .call-emergnecy-circle (nút gọi điện thoại)
		emergencyCircle.addEventListener('click', function (event) {
			event.stopPropagation(); // Ngừng sự kiện lan truyền

			// Kiểm tra xem danh sách có đang hiển thị không
			if (emergencyBase.classList.contains('visible')) {
				// Nếu danh sách đang hiển thị, ẩn đi
				emergencyBase.classList.remove('visible');
				emergencyBase.classList.add('hidden');
				phoneIcon.classList.remove('d-none'); // Hiển thị lại biểu tượng điện thoại
				hotline.classList.remove('d-none');
				closeIcon.classList.add('d-none'); // Ẩn biểu tượng dấu X
			} else {
				// Nếu danh sách không hiển thị, hiển thị nó
				emergencyBase.classList.remove('hidden');
				emergencyBase.classList.add('visible');
				phoneIcon.classList.add('d-none'); // Ẩn biểu tượng điện thoại
				hotline.classList.add('d-none'); // Ẩn hotline
				closeIcon.classList.remove('d-none'); // Hiển thị biểu tượng dấu X
			}
		});

		// Sự kiện click vào icon dấu X để ẩn danh sách
		closeIcon.addEventListener('click', function (event) {
			event.stopPropagation(); // Ngừng sự kiện lan truyền

			// Ẩn danh sách và chuyển lại icon về điện thoại
			emergencyBase.classList.remove('visible');
			emergencyBase.classList.add('hidden');
			phoneIcon.classList.remove('d-none'); // Hiển thị lại biểu tượng điện thoại
			hotline.classList.remove('d-none');
			closeIcon.classList.add('d-none'); // Ẩn biểu tượng dấu X
		});

		// Sự kiện click ra ngoài .call-emergency-base và .call-emergnecy-circle
		document.addEventListener('click', function (event) {
			if (!emergencyBase.contains(event.target) && !emergencyCircle.contains(event.target)) {
				// Nếu click ngoài danh sách và nút gọi
				emergencyBase.classList.remove('visible');
				emergencyBase.classList.add('hidden');
				phoneIcon.classList.remove('d-none'); // Hiển thị lại biểu tượng điện thoại
				hotline.classList.remove('d-none');
				closeIcon.classList.add('d-none'); // Ẩn biểu tượng dấu X
			}
		});
	});

</script>