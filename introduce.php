<?php
/*
Template Name: Giới thiệu
*/
get_header();
?>

<main>
    <?php get_template_part('bannertitle'); ?>

    <section class="section-header container">
        <div class="sloganmain">
            <h3>
                <span>"</span>
                <span>Chăm</span>
                <span>chút</span>
                <span>từ</span>
                <span>những</span>
                <span>việc</span>
                <span>nhỏ</span>
                <span>nhất</span>
                <span>"</span>
            </h3>
            <span>Đây là những tôn chỉ của chúng tôi để thực hiện cam kết cung cấp dịch vụ y tế kỹ thuật cao, chất lượng
                cao cho toàn bộ người dân</span>
        </div>
    </section>

    <script>
        document.querySelectorAll('.section-header h3 span').forEach((span) => {
            span.addEventListener('mouseenter', () => {
                // Tạo hiệu ứng phóng to và nâng lên khi chuột di vào chữ
                span.style.transform = 'scale(1.1) translateY(-8px)'; // Tăng theo tỷ lệ cố định
            });

            span.addEventListener('mouseleave', () => {
                // Đặt lại trạng thái của chữ khi chuột rời đi
                span.style.transform = 'scale(1) translateY(0)';
            });
        });
    </script>

    <section id="about" class="about bg-white">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <div class="content">
                        <h3>TỔNG QUAN - LỊCH SỬ HÌNH THÀNH</h3>
                        <p>
                            Tiếp nhận bệnh nhân từ 19/5/2014, đến nay hệ thống <span style="font-weight: 700;">Bệnh
                                Viện Đa khoa Xuyên Á (BVXA)</span> đã định hình với bốn bệnh viện: <span
                                style="font-weight: 700;">BVXA
                                - TP. HCM, BVXA - Vĩnh Long, BVXA - Long An và BVXA - Tây Ninh.</span>
                        </p>
                        <p>
                            Đây là hệ thống bệnh viện được đầu tư hiện đại, hệ thống máy móc tối tân và đội ngũ y
                            bác sĩ tận tình với chuyên môn
                            cao. <span style="font-weight: 700;">BVXA</span> cam kết cung cấp dịch vụ y tế kỹ thuật
                            cao, chất lượng cao với giá hợp lý đến cho mọi tầng lớp người dân.
                        </p>
                        <div class="text-center text-lg-start">
                            <a href="/gioi-thieu/tong-quan-lich-su-hinh-thanh/"
                                class="btn-get-started d-inline-flex align-items-center justify-content-center align-self-center">Xem
                                chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <img src="<?php bloginfo('template_directory') ?>/Images/heroxa.jpeg"
                        class="img-fluid border-radius-img" alt="Ảnh tổng quan">
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials bg-white">
        <div class="container">
            <div class="testimonials-slider swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="row testimonial-item">
                            <div class="col-xl-4">
                                <img src="<?php bloginfo('template_directory') ?>/Images/vatchat.jpg"
                                    class="img-fluid border-radius-img" alt="Ảnh cơ sở vật chất">
                            </div>
                            <div class="col-xl-8">
                                <h3>CƠ SỞ VẬT CHẤT HIỆN ĐẠI</h3>
                                <p>
                                    Bố cục các khoa, phòng chức năng được thiết kế chuẩn mực nhằm tạo nên sự cân
                                    bằng và hài hòa giữ công năng và thẩm mỹ.
                                    Tất cả nhằm tạo mọi điều kiện thuận lợi nhất cho người bệnh.
                                </p>
                                <p>
                                    Đặc biệt, với thiết kế không gian mở và thông thoáng, <span
                                        style="font-weight: 700;">BVXA</span> là một bệnh viện không mùi, tạo cảm
                                    giác thoải mái cho khách
                                    hàng khi đến khám và điều trị bệnh.
                                </p>
                                <div class="text-center text-xl-start">
                                    <a href="/gioi-thieu/co-so-vat-chat-hien-dai/"
                                        class="btn-get-started d-inline-flex align-items-center justify-content-center align-self-center">Xem
                                        chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="row testimonial-item">
                            <div class="col-xl-4">
                                <img src="<?php bloginfo('template_directory') ?>/Images/trangthietbi.jpg"
                                    class="img-fluid border-radius-img" alt="Ảnh trang thiết bị">
                            </div>
                            <div class="col-xl-8">
                                <h3>TRANG THIẾT BỊ MÁY MÓC TỐI TÂN</h3>
                                <p>
                                    Chẩn đoán phải chính xác và nhanh chóng, từ đó mới có thể đưa ra phương pháp
                                    điều trị tối ưu. Cuối cùng, người bệnh sẽ
                                    mau khỏi bệnh dẫn đến thời gian điều trị ngắn nhất. Giảm được thời gian điều trị
                                    là giảm được chi phí điều trị.
                                </p>
                                <p>
                                    Chính vì vậy, hệ thống máy móc, trang thiết bị y khoa của hệ thống <span
                                        style="font-weight: 700;">BVXA</span> được chú trọng đầu tư với các dòng máy
                                    hiện đại bậc nhất, phù hợp với nhu cầu hiện tại và trong tương lai.
                                </p>
                                <div class="text-center text-xl-start">
                                    <a href="/gioi-thieu/trang-thiet-bi-may-moc-toi-tan/"
                                        class="btn-get-started d-inline-flex align-items-center justify-content-center align-self-center">Xem
                                        chi tiết</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="row testimonial-item">
                            <div class="col-xl-4">
                                <img src="<?php bloginfo('template_directory') ?>/Images/doingunhanvien.jpg"
                                    class="img-fluid border-radius-img" alt="Ảnh đội ngủ nhân viên">
                            </div>
                            <div class="col-xl-8">
                                <h3>ĐỘI NGŨ NHÂN SỰ NHIỆT HUYẾT</h3>
                                <p>
                                    Cùng với cơ sở vật chất hiện đại, trang thiết bị kỹ thuật cao, hệ thống <span
                                        style="font-weight: 700;">BVXA</span> còn có đội ngũ y bác sĩ cơ hữu đầu
                                    ngành có
                                    kỹ thuật chuyên môn cao, nhiều kinh nghiệm, tư vấn hướng dẫn tận tình và chăm
                                    sóc bệnh nhân chu đáo.
                                </p>
                                <p>
                                    Đây là yếu tố rất quan trọng để người bệnh có thể an tâm, thoải mái khi khám và
                                    điều trị tại <span style="font-weight: 700;">BVXA</span>.
                                </p>
                                <div class="text-center text-xl-start">
                                    <a href="/gioi-thieu/doi-ngu-nhan-su-nhiet-huyet/"
                                        class="btn-get-started d-inline-flex align-items-center justify-content-center align-self-center">Xem
                                        chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="vertical-timeline-section">
        <div class="timeline-container container">
            <h3>GIAI ĐOẠN XÂY DỰNG VÀ PHÁT TRIỂN</h3>

            <!-- Vertical Timeline -->
            <div class="timeline">
                <div class="timeline-item" data-year="2012">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2012</span>
                        <h4>Khởi công BVXA TP.HCM</h4>
                        <p>10/10/2012 - Xây dựng Bệnh Viện Đa Khoa Xuyên Á Thành Phố Hồ Chí Minh</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/cuchi-khoicong.jpg"
                                class="img-fluid" alt="Khởi công BVXA TP.HCM">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2014">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2014</span>
                        <h4>Khánh thành BVXA TP.HCM</h4>
                        <p>19/05/2014 - Khánh Thành Bệnh Viện Đa Khoa Xuyên Á Thành Phố Hồ Chí Minh</p>
                        <p>02/09/2014 - Bắt đầu tiếp nhận bệnh nhân</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/cuchi-hoatdong.jpg"
                                class="img-fluid" alt="Khánh thành BVXA TP.HCM">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2015">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2015</span>
                        <h4>Động thổ Trung tâm tim mạch</h4>
                        <p>19/12/2015 - Động thổ xây dựng Trung tâm tim mạch Bệnh Viện Đa Khoa Xuyên Á Thành Phố Hồ Chí
                            Minh</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/trungtamtimmach-dongtho.jpg"
                                class="img-fluid" alt="Động thổ Trung tâm tim mạch">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2016">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2016</span>
                        <h4>Động thổ BVXA Vĩnh Long</h4>
                        <p>10/10/2016 - Bắt đầu xây dựng Trung tâm tim mạch Bệnh Viện Đa Khoa Xuyên Á Vĩnh Long</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/vinhlong-khoicong.jpg"
                                class="img-fluid" alt="Động thổ BVXA Vĩnh Long">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2017">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2017</span>
                        <h4>Ca can thiệp tim mạch đầu tiên</h4>
                        <p>18/04/2017 - Thực hiện ca can thiệp tim mạch đầu tiên</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/cacanthieptimmachdautien.jpg"
                                class="img-fluid" alt="Ca can thiệp tim mạch đầu tiên">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2017">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2017</span>
                        <h4>Ca phẫu thuật hở van tim đầu tiên</h4>
                        <p>14/07/2017 - Phẫu thuật hở van tim đầu tiên tại Bệnh Viện Đa Khoa Xuyên Á Thành Phố Hồ Chí
                            Minh</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/caphauthuattimdautien.jpg"
                                class="img-fluid" alt="Ca phẫu thuật hở van tim đầu tiên">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2018">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2018</span>
                        <h4>Động thổ BVXA Long An</h4>
                        <p>19/05/2018 - Động thổ Bệnh Viện Đa Khoa Xuyên Á Long An</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/longan-dongtho.jpg"
                                class="img-fluid" alt="Động thổ BVXA Long An">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2018">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2018</span>
                        <h4>BVXA Vĩnh Long đi vào hoạt động</h4>
                        <p>16/08/2018 - Bệnh Viện Đa Khoa Xuyên Á Vĩnh Long bắt đầu tiếp nhận bệnh nhân</p>
                        <p>20/10/2018 - Khánh thành Bệnh Viện Đa Khoa Xuyên Á Vĩnh Long</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/vinhlong-hoatdong.jpg"
                                class="img-fluid" alt="BVXA Vĩnh Long đi vào hoạt động">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2018">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2018</span>
                        <h4>Khởi công BVXA Tây Ninh</h4>
                        <p>10/10/2018 - Bắt đầu xây dựng Bệnh Viện Đa Khoa Xuyên Á Tây Ninh</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/tayninh-khoicong.jpg"
                                class="img-fluid" alt="Khởi công BVXA Tây Ninh">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2020">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2020</span>
                        <h4>BVXA Tây Ninh đi vào hoạt động</h4>
                        <p>04/08/2020 - Bệnh Viện Đa Khoa Xuyên Á Tây Ninh bắt đầu tiếp nhận bệnh nhân</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/tayninh-hoatdong.jpg"
                                class="img-fluid" alt="BVXA Tây Ninh đi vào hoạt động">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2021">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2021</span>
                        <h4>Thành tựu mới</h4>
                        <p>29/04/2021 - Bệnh Viện Đa Khoa Xuyên Á Thành Phố Hồ Chí Minh được cấp giấy phép ghép thận</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/caghepthandautien.jpg"
                                class="img-fluid" alt="Thành tựu mới">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2021">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2021</span>
                        <h4>BVXA Long An đi vào hoạt động</h4>
                        <p>18/07/2021 - Bệnh Viện Đa Khoa Xuyên Á Long An bắt đầu tiếp nhận bệnh nhân</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/longan-hoatdong.jpg"
                                class="img-fluid" alt="BVXA Long An đi vào hoạt động">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2021">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2021</span>
                        <h4>Động thổ KĐT Ung Bướu Kỹ thuật cao</h4>
                        <p>10/10/2021 - Động thổ Khu Điều Trị Ung Bướu Kỹ thuật cao Bệnh Viện Đa Khoa Xuyên Á Thành Phố
                            Hồ Chí Minh</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/kdtubktc-dongtho.jpg"
                                class="img-fluid" alt="Động thổ KĐT Ung Bướu Kỹ thuật cao">
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-year="2023">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2023</span>
                        <h4>Bắt đầu xây dựng BVXA Đắk Nông</h4>
                        <p>15/06/2023 - Khởi công xây dựng Bệnh Viện Đa Khoa Xuyên Á Tây Nguyên (Đắk Nông)</p>
                        <div class="timeline-image">
                            <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/taynguyen-khoicong.jpg"
                                class="img-fluid" alt="Khởi công BVXA Đắk Nông">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Swiper cho Mobile -->
            <div class="swiper-timeline">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2012</span>
                            <h4>Khởi công BVXA TP.HCM</h4>
                            <p>10/10/2012 - Xây dựng Bệnh Viện Đa Khoa Xuyên Á Thành Phố Hồ Chí Minh</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/cuchi-khoicong.jpg"
                                    class="img-fluid" alt="Khởi công BVXA TP.HCM">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2014</span>
                            <h4>Khánh thành BVXA TP.HCM</h4>
                            <p>19/05/2014 - Khánh Thành Bệnh Viện Đa Khoa Xuyên Á Thành Phố Hồ Chí Minh</p>
                            <p>02/09/2014 - Bắt đầu tiếp nhận bệnh nhân</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/cuchi-hoatdong.jpg"
                                    class="img-fluid" alt="Khánh thành BVXA TP.HCM">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2015</span>
                            <h4>Động thổ Trung tâm tim mạch</h4>
                            <p>19/12/2015 - Động thổ xây dựng Trung tâm tim mạch Bệnh Viện Đa Khoa Xuyên Á Thành Phố Hồ
                                Chí Minh</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/trungtamtimmach-dongtho.jpg"
                                    class="img-fluid" alt="Động thổ Trung tâm tim mạch">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2016</span>
                            <h4>Động thổ BVXA Vĩnh Long</h4>
                            <p>10/10/2016 - Bắt đầu xây dựng Trung tâm tim mạch Bệnh Viện Đa Khoa Xuyên Á Vĩnh Long</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/vinhlong-khoicong.jpg"
                                    class="img-fluid" alt="Động thổ BVXA Vĩnh Long">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2017</span>
                            <h4>Ca can thiệp tim mạch đầu tiên</h4>
                            <p>18/04/2017 - Thực hiện ca can thiệp tim mạch đầu tiên</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/cacanthieptimmachdautien.jpg"
                                    class="img-fluid" alt="Ca can thiệp tim mạch đầu tiên">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2017</span>
                            <h4>Ca phẫu thuật hở van tim đầu tiên</h4>
                            <p>14/07/2017 - Phẫu thuật hở van tim đầu tiên tại Bệnh Viện Đa Khoa Xuyên Á Thành Phố Hồ
                                Chí Minh</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/caphauthuattimdautien.jpg"
                                    class="img-fluid" alt="Ca phẫu thuật hở van tim đầu tiên">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2018</span>
                            <h4>Động thổ BVXA Long An</h4>
                            <p>19/05/2018 - Động thổ Bệnh Viện Đa Khoa Xuyên Á Long An</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/longan-dongtho.jpg"
                                    class="img-fluid" alt="Động thổ BVXA Long An">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2018</span>
                            <h4>BVXA Vĩnh Long đi vào hoạt động</h4>
                            <p>16/08/2018 - Bệnh Viện Đa Khoa Xuyên Á Vĩnh Long bắt đầu tiếp nhận bệnh nhân</p>
                            <p>20/10/2018 - Khánh thành Bệnh Viện Đa Khoa Xuyên Á Vĩnh Long</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/vinhlong-hoatdong.jpg"
                                    class="img-fluid" alt="BVXA Vĩnh Long đi vào hoạt động">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2018</span>
                            <h4>Khởi công BVXA Tây Ninh</h4>
                            <p>10/10/2018 - Bắt đầu xây dựng Bệnh Viện Đa Khoa Xuyên Á Tây Ninh</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/tayninh-khoicong.jpg"
                                    class="img-fluid" alt="Khởi công BVXA Tây Ninh">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2020</span>
                            <h4>BVXA Tây Ninh đi vào hoạt động</h4>
                            <p>04/08/2020 - Bệnh Viện Đa Khoa Xuyên Á Tây Ninh bắt đầu tiếp nhận bệnh nhân</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/tayninh-hoatdong.jpg"
                                    class="img-fluid" alt="BVXA Tây Ninh đi vào hoạt động">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2021</span>
                            <h4>Thành tựu mới</h4>
                            <p>29/04/2021 - Bệnh Viện Đa Khoa Xuyên Á Thành Phố Hồ Chí Minh được cấp giấy phép ghép thận
                            </p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/caghepthandautien.jpg"
                                    class="img-fluid" alt="Thành tựu mới">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2021</span>
                            <h4>BVXA Long An đi vào hoạt động</h4>
                            <p>18/07/2021 - Bệnh Viện Đa Khoa Xuyên Á Long An bắt đầu tiếp nhận bệnh nhân</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/longan-hoatdong.jpg"
                                    class="img-fluid" alt="BVXA Long An đi vào hoạt động">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2021</span>
                            <h4>Động thổ KĐT Ung Bướu Kỹ thuật cao</h4>
                            <p>10/10/2021 - Động thổ Khu Điều Trị Ung Bướu Kỹ thuật cao Bệnh Viện Đa Khoa Xuyên Á Thành
                                Phố Hồ Chí Minh</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/kdtubktc-dongtho.jpg"
                                    class="img-fluid" alt="Động thổ KĐT Ung Bướu Kỹ thuật cao">
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="timeline-content">
                            <span class="timeline-year">2023</span>
                            <h4>Bắt đầu xây dựng BVXA Đắk Nông</h4>
                            <p>15/06/2023 - Khởi công xây dựng Bệnh Viện Đa Khoa Xuyên Á Tây Nguyên (Đắk Nông)</p>
                            <div class="timeline-image">
                                <img src="<?php bloginfo('template_directory') ?>/Images/giaidoanphattrien/taynguyen-khoicong.jpg"
                                    class="img-fluid" alt="Khởi công BVXA Đắk Nông">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <?php get_template_part('modal'); ?>
</main>

<?php get_footer(); ?>F

<!-- JavaScript -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Scroll animation
        function handleScroll() {
            const items = document.querySelectorAll('.timeline-item');
            const triggerBottom = window.innerHeight * 0.85;

            items.forEach((item, index) => {
                const itemTop = item.getBoundingClientRect().top;
                if (itemTop < triggerBottom) {
                    setTimeout(() => {
                        item.classList.add('visible');
                    }, index * 200); // Delay từng item
                }
            });
        }

        window.addEventListener('scroll', handleScroll);
        handleScroll();

        // Khởi tạo Swiper
        const swiper = new Swiper('.swiper-timeline', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            effect: 'cube',
            cubeEffect: {
                shadow: false,
                slideShadows: false,
            },
        });
    });
</script>
</body>

</html>