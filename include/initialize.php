<?php
/* Initialize UI elements. Needs to be done here because of Firefox caching. */
?>

<?php require_once "include/DBConnector.php" ?>
<script type="text/javascript">
  window.onload = function initialize() { <?php foreach ($tables as $table) { ?> <?php foreach (getColumns($table) as $column) { ?> toggle_columnfunction('<?= $table ?>', '<?= $column ?>'); for (var i = 0; i < createWhereClauseId; i++) { edit_whereclause(i); } edit_limit(); <?php } ?> <?php } ?> };
</script>
