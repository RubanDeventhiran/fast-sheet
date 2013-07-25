<?php
/*
 * Choose order by list and limit.
 */
?>

<h2>Select order by and limit:</h2>

<script type="text/javascript">
function toggle_columnsort(table, column) {
  var obj = document.getElementById('columnsorttype_' + table + '__' + column);
  var type = null;
  if (obj.selectedIndex) {
      type = obj.options[obj.selectedIndex].text;
  }
  if ($('#columnsort_' + table + '__' + column).attr('checked')) {
      $('#columnsortdiv_' + table + '__' + column).show();
      editColumnSort(table, column, type);
  } else {
      $('#columnsortdiv_' + table + '__' + column).hide();
      removeColumnSort(table, column);
  }
};

function edit_limit() {
  var obj = document.getElementById('limit');
  editLimit(obj.value);
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
      <input type="checkbox" id="columnsort_<?= $table ?>__<?= $column ?>" onclick="toggle_columnsort('<?= $table ?>', '<?= $column ?>')"> <?= $column ?>
      <span id="columnsortdiv_<?= $table ?>__<?= $column ?>">
        <select id="columnsorttype_<?= $table ?>__<?= $column ?>" onchange="toggle_columnsort('<?= $table ?>', '<?= $column ?>')">
          <option>Sort...</option>
          <option>asc</option>
          <option>desc</option>
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

Limit:<input id="limit" type="text" onkeyup="edit_limit()">
