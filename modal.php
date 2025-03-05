<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php
            // Chèn shortcode Contact Form 7 vào template PHP
            echo do_shortcode('[contact-form-7 id="f2bdacb" title="Đặt hẹn tư vấn"]');
            ?>
        </div>
    </div>
</div>

<!-- JavaScript để khởi tạo Flatpickr -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#appointment-date", {
      dateFormat: "d/m/Y",  // Định dạng ngày dd/mm/yyyy
      placeholder: "Chọn ngày hẹn",  // Gợi ý placeholder
      allowInput: true, // Cho phép người dùng nhập trực tiếp
    });
  });
</script>
