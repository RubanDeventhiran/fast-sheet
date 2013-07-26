<?php
/*
 * Choose columns.
 *
 * A dropdown list next to each column contains all optional functions.
 */
?>

<h2>Select columns:</h2>

<script type="text/javascript">
  function toggle_column(table, column) {
    if ($('#column_' + table + '__' + column).attr('checked')) {
      $('#columnfunctiondiv_' + table + '__' + column).show();
      addColumn(table, column);
    } else {
      $('#columnfunctiondiv_' + table + '__' + column).hide();
      removeColumn(table, column);
    }
  };

  function toggle_columnfunction(table, column) {
    var obj = document.getElementById('columnfunction_' + table + '__' + column);
    if (obj.selectedIndex) {
        addColumnFunction(table, column, obj.options[obj.selectedIndex].text);
    } else {
        removeColumnFunction(table, column);
    }
  }
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
      <input type="checkbox" class="choose_column_option" id="column_<?= $table ?>__<?= $column ?>" onclick="toggle_column('<?= $table ?>', '<?= $column ?>')"> <?= $column ?>

      <span id="columnfunctiondiv_<?= $table ?>__<?= $column ?>">
        <select id="columnfunction_<?= $table ?>__<?= $column ?>" onchange="toggle_columnfunction('<?= $table ?>', '<?= $column ?>')">
          <option>Optional function...</option>
          <option>sum</option>
          <option>avg</option>
        </select>
      </span>

      <br/>
<?php
    }
?>
  </div>
<?php
}
?>
