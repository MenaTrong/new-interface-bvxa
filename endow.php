<?php
/*
Template Name: Ưu đãi
*/
get_header();
?>

<main>
    <!-- ======= Title Section ========= -->
    <?php get_template_part('bannertitle'); ?>

    <!-- ======= Search Box ========= -->
    <div class="card-container card-container-margin-top">
        <div class="card justify-content-center align-items-center text-center">
            <form id="searchForm" class="input-group justify-content-between">
                <div class="col-12">
                    <input id="searchKeyword" class="form-control form-control-lg input-search custom-placeholder"
                        style="border: rgb(35, 109, 137, 0.2) solid 0px; background-color: rgb(248, 248, 248);" name="s"
                        type="search" placeholder="Tìm kiếm chương trình" aria-label="Search">
                </div>

                <div class="col-6 m-t-10">
                    <div class="col-md-12 position-relative p-r-5">
                        <div class="select-wrapper">
                            <select name="promotion" id="promotionSelect"
                                style="border-radius: 8px; background-color: rgb(247, 247, 247);"
                                class="form-control form-control-lg no-border custom-placeholder">
                                <option value="" selected>Nơi áp dụng</option>
                                <?php
                                $promotions = get_terms(array(
                                    'taxonomy' => 'promotion_category',
                                    'hide_empty' => false,
                                ));
                                foreach ($promotions as $promotion) {
                                    echo '<option value="' . esc_attr($promotion->slug) . '">' . esc_html($promotion->name) . '</option>';
                                }
                                ?>
                            </select>
                            <span class="dropdown-arrow"></span>
                        </div>
                    </div>
                </div>

                <div class="col-6 m-t-10">
                    <div class="col-md-12" style="height: 100%;">
                        <button id="showAllPosts" class="btn-get-started" style="border: none" type="submit">
                            Tất cả chương trình
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <!-- End Search Box -->

    <!-- ======= Endow Section ========= -->
    <section id="endowResults" class="container container-package">
        <div class="row" id="departmentResults">
            <!-- Kết quả sẽ được tải qua AJAX ở đây -->
        </div>
    </section>
    <!-- End Endow Section -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchForm = document.getElementById('searchForm');
            const searchKeyword = document.getElementById('searchKeyword');
            const promotionSelect = document.getElementById('promotionSelect');
            const departmentResults = document.getElementById('departmentResults');

            function fetchResults(page = 1) {
                const keyword = searchKeyword.value;
                const promotion = promotionSelect.value;

                fetch('<?php echo admin_url("admin-ajax.php"); ?>?action=search_endow_program&s=' + encodeURIComponent(keyword) + '&promotion=' + encodeURIComponent(promotion) + '&paged=' + page)
                    .then(response => response.text())
                    .then(data => {
                        departmentResults.innerHTML = data;
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

            promotionSelect.addEventListener('change', function () {
                fetchResults(1);
            });

            // Khi bấm nút "Tất cả bài đăng", xóa bộ lọc và hiển thị tất cả bài viết
            document.getElementById('showAllPosts').addEventListener('click', function (event) {
                event.preventDefault();
                searchKeyword.value = ''; // Xóa từ khóa tìm kiếm
                promotionSelect.value = ''; // Xóa chọn danh mục
                fetchResults(1); // Gọi lại AJAX để hiển thị tất cả bài viết
            });

            // Gọi Ajax ngay khi trang load
            fetchResults(1);
        });
    </script>

</main>

<?php get_footer(); ?>
</body>
</html>
