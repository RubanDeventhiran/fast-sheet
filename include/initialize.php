<?php
/* Initialize all UI elements */
?>

<script type="text/javascript">
  // Toggle on load; for Firefox caching
  window.onload = function initialize() {
<?php foreach ($tables as $table) { ?>
  toggle_table('<?= $table ?>');
  <?php foreach ($columns[$table] as $column) { ?>
    toggle_column('<?= $table ?>', '<?= $column ?>');
    toggle_columnfunction('<?= $table ?>', '<?= $column ?>');
    for (var i = 0; i < createWhereClauseId; i++) {
        edit_whereclause(i);
    }
    toggle_columnsort('<?= $table ?>', '<?= $column ?>');
    edit_limit();
  <?php } ?>
<?php } ?>
  };

  // Prepare the slider
  $(document).ready(function() {
      unoSlider = $('#slider').unoSlider({
          auto: false,
      });
      $('#slider_left').click(function() {
          unoSlider.goBack();
      });
      $('#slider_right').click(function() {
          unoSlider.goForward();
      });
  });
</script>
