<?php
/*
 * Choose order by list and limit.
 */
?>

<style type="text/css">
<?php foreach ($tables as $table) { ?>
<?php foreach (getColumns($table) as $column) { ?>
    #columnsortdiv_<?= $table ?>__<?= $column ?> { display:none }
<?php } ?>
<?php } ?>
</style>

<div class="report_section_title">Miscellaneous</div>
<div class="report_section_description">Select columns to order by.</div>

<span>
<div class="tables_list_section">
<?php
foreach ($tables as $table)
{
?>
  <div class="columns_list_section table_class_<?= $table ?>">
  <h4>Table <?= $table ?></h4>
<?php
foreach (getColumns($table) as $column)
{
?>
    <div class="column_list_item column_class_<?= $table ?>__<?= $column ?>"><span>
        <div class="selection_option float" id="columnsort_<?= $table ?>__<?= $column ?>" onclick="toggle_columnsort('<?= $table ?>', '<?= $column ?>')">
            <span id="selected_column_<?= $table ?>__<?= $column ?>"><?= $column ?></span>
        </div>
        <div id="columnsortdiv_<?= $table ?>__<?= $column ?>" class="float">
            <select id="columnsorttype_<?= $table ?>__<?= $column ?>" onchange="change_columnsort('<?= $table ?>', '<?= $column ?>')" class="extra_item">
                <option>Sort...</option>
                <option>asc</option>
                <option>desc</option>
            </select>
        </div>
    </div>
<?php
}
?>
  </div>
<?php
}
?>
</div>
</span>

<div class="report_section_description">Enter the maximum number of results you desire.</div>
<span class="limit_name">Limit</span><input id="limit" type="text" onkeyup="edit_limit()">
