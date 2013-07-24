<?php
/*
 * Choose tables.
 *
 * For each table, a checkbox is connected to a Javascript function. Checking
 * the checkbox will show all of the corresponding tables on later pages.
 *
 * Put all tables on later pages inside a
 * <div class="table_class_<?= $table ?>">
 */
?>

<h2>Select tables:</h2>

<script type="text/javascript">
  function toggle_table(table) {
    if ($('#table_' + table).attr('checked')) {
      $('.table_class_' + table).show();
      addTable(table);
    } else {
      $('.table_class_' + table).hide();
      removeTable(table);
    }
  };
</script>

<?php
foreach ($tables as $table)
{
?>
  <style type="text/css">
    .table_class_<?= $table ?> {
      display: none;
    }
  </style>

  <input type="checkbox" id="table_<?= $table ?>" onclick="toggle_table('<?= $table ?>')"> <?= $table ?>
  <br/>
<?php
}
?>
