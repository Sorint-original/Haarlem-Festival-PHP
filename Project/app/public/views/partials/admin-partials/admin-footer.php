<footer class="admin-footer">
    <!-- Admin footer content -->
</footer>

<!-- TinyMCE library / self hosted-->
<script src="/assets/js/tinymce/js/tinymce/tinymce.min.js"></script>
<!-- TinyMCE settings -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
      selector: '.tinymce-editor',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
      height: 400,
      skin: 'oxide',
      content_css: 'default',
      branding: false,
      menubar: true,
      statusbar: true,
      resize: true,
      promotion: false,
      setup: function(editor) {
        editor.on('change', function() {
          editor.save();
        });
      }
    });
  });
</script>