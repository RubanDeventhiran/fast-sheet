<?php
/*
 * Choose order by list and limit.
 */
?>

<div class="report_section_title">Miscellaneous</div>
<div class="report_section_description">Select columns to order by.</div>

<div class="tables_list_section">
<?php
foreach ($tables as $table)
{
?>
  <div class="columns_list_section table_class_<?= $table ?>">
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
</div>

<div class="report_section_description">Enter the maximum number of results you desire.</div>
Limit:<input id="limit" type="text" onkeyup="edit_limit()">
