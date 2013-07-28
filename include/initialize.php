<?php
/* Initialize UI elements. Needs to be done here because of Firefox caching. */
?>

<script type="text/javascript">
  window.onload = function initialize() { <?php foreach ($tables as $table) { ?> toggle_table('<?= $table ?>'); <?php foreach ($columns[$table] as $column) { ?> toggle_column('<?= $table ?>', '<?= $column ?>'); toggle_columnfunction('<?= $table ?>', '<?= $column ?>'); for (var i = 0; i < createWhereClauseId; i++) { edit_whereclause(i); } toggle_columnsort('<?= $table ?>', '<?= $column ?>'); edit_limit(); <?php } ?> <?php } ?> };
</script>
