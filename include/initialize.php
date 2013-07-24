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
  <?php } ?>
<?php } ?>
  };
</script>
