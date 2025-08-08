<footer class="main-footer">
  <div class="footer-right text-dark">
    Copyright &copy;<strong><?= date('Y') ?></strong>
  </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url('vendor/back-end/assets/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/js/page/bootstrap-modal.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/js/jquery.nicescroll.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/js/moment.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/js/stisla.js') ?>"></script>

<!-- DataTables -->
<script src="<?= base_url('vendor/back-end/assets/plugins/dataTables/datatables.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/plugins/dataTables/DataTables-1.10.24/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/plugins/dataTables/DataTables-1.10.24/js/dataTables.bootstrap4.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/plugins/dataTables/Responsive-2.2.7/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/plugins/dataTables/Buttons-1.7.0/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/plugins/dataTables/Buttons-1.7.0/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/plugins/dataTables/Buttons-1.7.0/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/plugins/dataTables/Buttons-1.7.0/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/plugins/dataTables/Buttons-1.7.0/js/buttons.colVis.min.js') ?>"></script>

<!-- Template & Custom JS -->
<script src="<?= base_url('vendor/back-end/assets/js/custom.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/js/scripts.js') ?>"></script>

<!-- Chart & DayJS -->
<script src="<?= base_url('vendor/back-end/assets/plugins/dayjs/dayjs.min.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/plugins/apexcharts/apexcharts.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/js/page/ui-apexchart.js') ?>"></script>
<script src="<?= base_url('vendor/back-end/assets/js/page/index-0.js') ?>"></script>

<!-- TinyMCE -->
<script src="<?= base_url('vendor/back-end/assets/plugins/tinymce/tinymce.min.js') ?>"></script>
<script>
  tinymce.init({
    selector: '#berita, #misi, #sejarah, #profile, #portfolio',
    theme: "modern",
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "save table contextmenu directionality emoticons template paste textcolor"
    ],
    content_css: "css/content.css",
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons"
  });
</script>

<!-- File Preview -->
<script>
  function previewFile(input) {
    const file = input.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = () => $("#image-previews").attr("src", reader.result);
      reader.readAsDataURL(file);
    }
  }
</script>

<!-- Input Validation -->
<script>
  function validate(evt) {
    let key = evt.type === 'paste' ? evt.clipboardData.getData('text/plain') : String.fromCharCode(evt.keyCode || evt.which);
    if (!/^[0-9.]+$/.test(key)) {
      evt.preventDefault();
    }
  }
</script>

<!-- DataTable Activation -->
<script>
  $(function() {
    $('#example1').DataTable({
      paging: true,
      lengthChange: true,
      searching: true,
      ordering: true,
      info: true,
      autoWidth: false,
      responsive: true,
      dom: 'Bfrtip',
      buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });
  });
</script>

<!-- Toastr Notifications -->
<script src="<?= base_url('vendor/back-end/assets/plugins/toastr/toastr.min.js') ?>"></script>
<script>
  toastr.options = {
    closeButton: true,
    positionClass: "toast-top-center",
    timeOut: "5000",
    showDuration: "600",
    hideDuration: "1000"
  };
</script>
<?php foreach (['success', 'info', 'warning', 'error'] as $type) : ?>
  <?php if (session()->getFlashdata($type)) : ?>
    <script>toastr.<?= $type ?>("<?= esc(session($type)) ?>");</script>
  <?php endif ?>
<?php endforeach ?>
</body>
</html>