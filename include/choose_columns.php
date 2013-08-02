<?php
/*
 * Choose columns.
 *
 * A dropdown list next to each column contains all optional functions.
 */
?>

<style type="text/css">
<?php foreach ($tables as $table) { ?>
<?php foreach (getColumns($table) as $column) { ?>
    .column_class_<?= $table ?>__<?= $column ?> { display:none }
    #columnfunctiondiv_<?= $table ?>__<?= $column ?> { display:none }
<?php } ?>
<?php } ?>
</style>

<div class="report_section_title">Select columns</div>
<div class="report_section_description">Click on the columns from which you wish to view data.</div>

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
    <div class="column_list_item"><span>
        <div class="selection_option float" id="column_<?= $table ?>__<?= $column ?>" onclick="toggle_column('<?= $table ?>', '<?= $column ?>')">
            <?= $column ?>
        </div>
        <div id="columnfunctiondiv_<?= $table ?>__<?= $column ?>" class="float">
            <select id="columnfunction_<?= $table ?>__<?= $column ?>" onchange="toggle_columnfunction('<?= $table ?>', '<?= $column ?>')" class="extra_item">
                <option>Optional function...</option>
                <option>sum</option>
                <option>avg</option>
            </select>
        </div>
    </span></div>
<?php
}
?>
  </div>
<?php
}
?>
</div>
