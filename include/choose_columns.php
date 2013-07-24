<?php
/*
 * Choose columns.
 */
?>

<h2>Select columns:</h2>

<script type="text/javascript">
  function toggle_column(table, column) {
    if ($('#column_' + table + '__' + column).attr('checked')) {
      addColumn(table, column);
    } else {
      removeColumn(table, column);
    }
  };
</script>

<?php
foreach ($tables as $table)
{
?>
  <div class="table_class_<?= $table ?>">
  <h4>Table <?= $table ?></h4>
    <?php
    foreach ($columns[$table] as $column)
    {
    ?>
      <input type="checkbox" class="choose_column_option" id="col_<?= $table ?>__<?= $column ?>" onclick="toggle_column('<?= $table ?>', '<?= $column ?>')"> <?= $column ?>
      <br/>
    <?php
    }
    ?>
  </div>
<?php
}
?>
