<?php
/*
Template Name: Chuyên gia
*/
get_header();
?>

<main id="main">
    <?php get_template_part('bannertitle'); ?>

    <!-- ======= Search Box ========= -->
    <div class="card-container card-container-margin-top">
        <div class="card justify-content-center align-items-center text-center">
            <form id="searchForm" class="input-group justify-content-between">
                <div class="col-12">
                    <input id="searchKeyword" class="form-control form-control-lg input-search custom-placeholder"
                        style="border: rgb(35, 109, 137, 0.2) solid 0px; background-color: rgb(248, 248, 248);" name="s"
                        type="search" placeholder="Tìm kiếm tên Bác sĩ" aria-label="Search">
                </div>

                <div class="col-4 m-t-10 p-r-5">
                    <div class="col-md-12 position-relative">
                        <div class="select-wrapper">
                            <select name="specialty" id="specialtySelect"
                                style="border-radius: 8px; background-color: rgb(247, 247, 247);"
                                class="form-control form-control-lg no-border custom-placeholder">
                                <option value="" selected>Chọn chuyên khoa</option>
                                <?php
                                $specialties = get_terms(array(
                                    'taxonomy' => 'specialty',
                                    'hide_empty' => false,
                                ));
                                foreach ($specialties as $specialty) {
                                    echo '<option value="' . esc_attr($specialty->slug) . '">' . esc_html($specialty->name) . '</option>';
                                }
                                ?>
                            </select>
                            <span class="dropdown-arrow"></span>
                        </div>
                    </div>
                </div>

                <div class="col-4 m-t-10">
                    <div class="col-md-12 position-relative">
                        <div class="select-wrapper">
                            <select name="facility" id="facilitySelect"
                                style="border-radius: 8px; background-color: rgb(247, 247, 247);"
                                class="form-control form-control-lg no-border custom-placeholder">
                                <option value="" selected>Chọn bệnh viện</option>
                                <?php
                                $facilities = get_terms(array(
                                    'taxonomy' => 'facility',
                                    'hide_empty' => false,
                                ));
                                foreach ($facilities as $facility) {
                                    echo '<option value="' . esc_attr($facility->slug) . '">' . esc_html($facility->name) . '</option>';
                                }
                                ?>
                            </select>
                            <span class="dropdown-arrow"></span>
                        </div>
                    </div>
                </div>

                <div class="col-4 m-t-10 p-l-5">
                    <div class="col-md-12" style="height: 100%;">
                        <button id="showAllPosts" class="btn-get-started" style="border: none" type="submit">
                            Tất cả
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Search Box -->

    <!-- ======= Experts Section ======= -->
    <section id="experts" class="portfolio m-b-30">
        <div class="container">
            <div id="expertResults"></div>
        </div>
    </section>
    <!-- End Experts Section -->

    <!-- Modal -->
    <?php get_template_part('modal'); ?>

</main>

<?php get_footer(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchForm = document.getElementById('searchForm');
        const searchKeyword = document.getElementById('searchKeyword');
        const specialtySelect = document.getElementById('specialtySelect');
        const facilitySelect = document.getElementById('facilitySelect');
        const expertResults = document.getElementById('expertResults');

        function fetchResults(page = 1) {
            const keyword = searchKeyword.value;
            const specialty = specialtySelect.value;
            const facility = facilitySelect.value;

            fetch('<?php echo admin_url("admin-ajax.php"); ?>?action=search_expert&s=' + encodeURIComponent(keyword) + '&specialty=' + encodeURIComponent(specialty) + '&facility=' + encodeURIComponent(facility) + '&paged=' + page)
                .then(response => response.text())
                .then(data => {
                    expertResults.innerHTML = data;
                    attachPaginationEvents();
                })
                .catch(error => console.error('Error:', error));
        }

        function attachPaginationEvents() {
            document.querySelectorAll('.pagination-link').forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    fetchResults(this.getAttribute('data-page'));
                });
            });
        }

        searchForm.addEventListener('submit', function (event) {
            event.preventDefault();
            fetchResults(1);
        });

        searchKeyword.addEventListener('input', function () {
            fetchResults(1);
        });

        specialtySelect.addEventListener('change', function () {
            fetchResults(1);
        });

        facilitySelect.addEventListener('change', function () {
            fetchResults(1);
        });

        // Khi bấm nút "Tất cả bài đăng", xóa bộ lọc và hiển thị tất cả bài viết
        showAllPosts.addEventListener('click', function (event) {
            event.preventDefault();
            searchKeyword.value = ''; // Xóa từ khóa tìm kiếm
            specialtySelect.value = ''; // Xóa chọn danh mục
            facilitySelect.value = '';
            fetchResults(1); // Gọi lại AJAX để hiển thị tất cả bài viết
        });

        // Gọi Ajax ngay khi trang load
        fetchResults(1);
    });
</script>

</body>

</html>