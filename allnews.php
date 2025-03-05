<?php
/*
Template Name: Tin tức
*/
get_header();
?>

<main>

    <!-- ======= Search Box ========= -->
    <div class="card-container card-container-margin-top">
        <div class="card justify-content-center align-items-center text-center">
            <form id="searchForm" class="input-group justify-content-between">
                <div class="col-12">
                    <input id="searchKeyword" class="form-control form-control-lg input-search custom-placeholder"
                        style="border: rgb(35, 109, 137, 0.2) solid 0px; background-color: rgb(248, 248, 248);" name="s"
                        type="search" placeholder="Tìm kiếm tin tức" aria-label="Search">
                </div>

                <div class="col-6 m-t-10">
                    <div class="col-md-12 position-relative p-r-5">
                        <div class="select-wrapper">
                            <select name="category" id="categorySelect"
                                style="border-radius: 8px; background-color: rgb(247, 247, 247);"
                                class="form-control form-control-lg no-border custom-placeholder">
                                <option value="" selected>Chọn loại tin tức</option>
                                <?php
                                $categories = get_categories();
                                foreach ($categories as $category) {
                                    echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
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
                            Tất cả bài đăng
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <!-- End Search Box -->

    <!-- ======= News Section ======= -->
    <section id="news" class="news m-b-30">
        <div class="container">
            <div id="newsResults"></div>
        </div>
    </section>
    <!-- End News Section -->

</main>

<?php get_footer(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchForm = document.getElementById('searchForm');
        const searchKeyword = document.getElementById('searchKeyword');
        const categorySelect = document.getElementById('categorySelect');
        const newsResults = document.getElementById('newsResults');

        function fetchResults(page = 1) {
            const keyword = searchKeyword.value;
            const category = categorySelect.value;

            fetch('<?php echo admin_url("admin-ajax.php"); ?>?action=search_news&s=' + encodeURIComponent(keyword) + '&category=' + encodeURIComponent(category) + '&paged=' + page)
                .then(response => response.text())
                .then(data => {
                    newsResults.innerHTML = data;
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

        categorySelect.addEventListener('change', function () {
            fetchResults(1);
        });

        // Khi bấm nút "Tất cả bài đăng", xóa bộ lọc và hiển thị tất cả bài viết
        showAllPosts.addEventListener('click', function (event) {
            event.preventDefault();
            searchKeyword.value = ''; // Xóa từ khóa tìm kiếm
            categorySelect.value = ''; // Xóa chọn danh mục
            fetchResults(1); // Gọi lại AJAX để hiển thị tất cả bài viết
        });

        // Gọi AJAX ngay khi trang load
        fetchResults(1);
    });
</script>

</body>

</html>